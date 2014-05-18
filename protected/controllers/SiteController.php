<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model = new User;
        if (Yii::app()->user->isGuest) {
            $this->actionLogin();
        } else {
            $this->render('index', array("model" => $model));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionForget() {
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $email = $_POST['LoginForm']['email'];
            //print_r($email);

            $user = User::model()->findByAttributes(array("email" => $email));
            
            if ($user === null) {
                Yii::app()->user->setFlash('errorForgot', 'Salah masukan email.');
                $this->redirect(array('forget'));
            }
            $this->actionReset($user);
        } else
            $this->render('forget', array('model' => $model));
    }

    public function actionReset($user) {
        //$model = User::model()->find('LOWER(email)=?', array($model->email));
       //print_r($user);
        $password = "" . rand(1000000, 10000000);
        $user->password = md5($password);

        /*
          $model=new User;
          if(isset($_POST['User']))
          {
          $model->attributes=$_POST['User'];
          $user = User::model()->find('LOWER(username)=?', array($model->username));

          if($user!==null){
          //make a verifed code
          //$verCode = $user->hashPassword($user->password);
          //save to database
          $connection=Yii::app()->db;
          $sql = "REPLACE INTO user (id_user, password) VALUES ('$user->id' ,'$password);";
          $command=$connection->createCommand($sql);
          $rowCount=$command->execute();
          //send to email
          $user->sendMail($model->email, $password);
          }
          } */



        if ($user->save(false)) {
            $message = "Hi " . $user->nama . ", this is your new password. " .
                    "Your Username : " . $user->username .
                    "Your New Password : " . $password;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Contact-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: no-reply <no-reply@siaek.ppsdms.org>' . "\r\n";

            $user->sendMail($user->email, $message);
        }
        $this->render('confirm');
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
            //$this->render('contact',array('model'=>$model));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
