<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'view', 'profile', 'password', 'updateprofile', 'delete', 'create','update', 'admin'),
				'expression' => 'Yii::app()->user->getLevel() == 1',
			),/*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('*'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		if($model->role === '1') $model->role = 'Administrator';
		else if($model->role === '2') $model->role = 'Pengurus Pusat';
		else $model->role = 'Pengurus Regional';
		$this->render('view',array(
			'model'=>$model,
		));
	}
	public function actionProfile() {
		$model = $this->loadModel(Yii::app()->user->id);
		if($model->role === '1') $model->role = 'Administrator';
		else if($model->role === '2') $model->role = 'Pengurus Pusat';
		else $model->role = 'Pengurus Regional';
		$this->render('viewProfile', array('model' => $model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new User;  // this is my model related to table
        if(isset($_POST['User']))
        {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes=$_POST['User'];
			if(!empty($_POST['User']['password'])) 
				$model->password = md5($_POST['User']['password']);
 
            $uploadedFile=CUploadedFile::getInstance($model,'url_image');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->url_image = $fileName;
 
            if($model->save())
            {
                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$fileName);  // image will uplode to rootDirectory/banner/
                $this->redirect(array('admin'));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));



		// $model=new User;

		// // Uncomment the following line if AJAX validation is needed
		// // $this->performAjaxValidation($model);

		// if(isset($_POST['User']))
		// {
		// 	$model->attributes=$_POST['User'];
		// 	if($model->save())
		// 		$this->redirect(array('view','id'=>$model->id_user));
		// }

		// $this->render('create',array(
		// 	'model'=>$model,
		// ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{

		$model=$this->loadModel($id);
		
        if(isset($_POST['User']))
        {
            $_POST['user']['url_image'] = $model->url_image;
            $model->attributes=$_POST['User'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'url_image');
 
            if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$model->url_image);
                }
                $this->redirect(array('admin'));
            }
 
        }
 
        $this->render('update',array(
            'model'=>$model,
        ));





		// $model=$this->loadModel($id);

		// // Uncomment the following line if AJAX validation is needed
		// // $this->performAjaxValidation($model);

		// if(isset($_POST['User']))
		// {
		// 	$model->attributes=$_POST['User'];
		// 	if($model->save())
		// 		$this->redirect(array('view','id'=>$model->id_user));
		// }

		// $this->render('update',array(
		// 	'model'=>$model,
		// ));
	}
	
	public function actionUpdateProfile() {
        $model = $this->loadModel(Yii::app()->user->id);
		$old_image = $model->url_image;
		
        if(isset($_POST['User']))
        {
            //$_POST['user']['url_image'] = $model->url_image;
            $model->attributes=$_POST['User'];
			if($model->username === $_POST['User']['username']) {
			
			} {
				$uploadedFile=CUploadedFile::getInstance($model,'url_image');
				
				if(!empty($uploadedFile))  // check if uploaded file is set or not
				{
					$model->url_image = rand(10000, 1000000) . ".jpg";
					if($model->save()) {
						//$this->redirect(array('admin'));
						$uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$model->url_image);
						Yii::app()->user->setFlash('successProfile', 'Profile telah berhasil diubah.');
						$this->redirect(array('profile'));
					}
				} else {
					$model->url_image = $old_image;
					if($model->save()) {
						Yii::app()->user->setFlash('successProfile', 'Profile telah berhasil diubah.');
						$this->redirect(array('profile'));
					}
				}
            }
 
        }
            
            
//            
//		$model=$this->loadModel($id);
//		$old_image = $model->url_image;
//		
//        if(isset($_POST['User']))
//        {
//                         $model->attributes=$_POST['User'];
//			
//			if(!empty($_POST['User']['url_image'])) {
//				$model->url_image = $old_image;
//				$model->save();
//				
//				Yii::app()->user->setFlash('successProfile', 'Profile telah berhasil diubah.');
//				$this->redirect(array('profile', 'id' => $model->id_user));
//			} else {
//			
//				$model->url_image = rand(10000, 1000000) . ".jpg";
//				
//				if($model->save()) {
//					$uploadedFile=CUploadedFile::getInstance($model,'url_image');
//					if(!empty($uploadedFile))  { // check if uploaded file is set or not 
//						$uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$model->url_image);
//						Yii::app()->user->setFlash('successProfile', 'Profile telah berhasil diubah.');
//						$this->redirect(array('profile', 'id' => $model->id_user));
//					}
//					
//				}
//			}
// 
//        }
		
        $this->render('updateProfile',array(
            'model'=>$model,
        ));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->getLevel() == '1') 
			$this->actionAdmin();
	}
	
	public function actionPassword() {
		$model = $this->loadModel(Yii::app()->user->id);
		
		$this->performAjaxValidation($model);
		
		if(isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			
			if($model->password === md5($_POST['User']['password_sekarang'])) {
				if($_POST['User']['password_baru'] !== '') {
					if($model->password_baru_repeat !== '') {
						$password_baru = "" . $_POST['User']['password_baru'];
						$password_baru_repeat = "" . $_POST['User']['password_baru_repeat'];
						if($password_baru === $password_baru_repeat) {
							$model->password = md5($password_baru_repeat);
							if($model->save(false)) {
								Yii::app()->user->setFlash('passChanged', 'Password Anda telah berhasil diubah.');
								$this->redirect(array('profile'));
							}
						} else {
							Yii::app()->user->setFlash('errorNewPass', 'Password baru tidak sama dengan password baru repeat.');
							$this->redirect(array('password'));
						}
					} else {
						Yii::app()->user->setFlash('errorPassConfirm', 'Konfirmasi password harus diisi.');
						$this->redirect(array('password'));
					} 
				} else {
					Yii::app()->user->setFlash('errorPassConfirm', 'Password baru password harus diisi.');
					$this->redirect(array('password'));
				}
			} else {
				Yii::app()->user->setFlash('errorCurrentPass', 'Password sekarang tidak sama dengan di sistem.');
                $this->redirect(array('password'));
			}
		} 
			$this->render('password', array('model' => $model));
		
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
		
		

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
}
