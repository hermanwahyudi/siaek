<?php

class AbsensiController extends Controller {

    public function filters() {
        return array(
            //'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'UpdateDeadline'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan','isiAbsensi'),
                'expression' => 'Yii::app()->user->getLevel() == "3"',
            //'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        //$this->render('index2');
        $this->actionListKegiatan();
    }

    public function actionListKegiatan() {
        //dapetin daftar kegiatan pada bulan ini
        $model = Kegiatan::model()->findAll();
        //$this->render('index2');
        $this->render("listKegiatan", array('model' => $model));
    }

    public function actionIsiAbsensi($id) {
        $this->layout="main";
        $model = $this->loadKegiatan($id);
        $absensi = array();
        $i = 0;
        while ($i < 1) {
            $absensi[$i] = Absensi::model();
            $i++;
        }

        if (isset($_POST['Kegiatan'])) {
            $model->attributes = $_POST['Kegiatan'];
            if ($model->save()) {
                if (isset($_POST['Absensi'])) {


                    foreach ($_POST['Absensi'] as $j => $modelp) {
                        if (isset($_POST['Absensi'][$j])) {
                            $absensi[$j] = new Absensi;

                            $absensi[$j]->attributes = $modelp;
                            $absensi[$j]->id_kegiatan = $model->id_kegiatan;

                            $absensi->save();
                        }
                    }
                    $this->redirect(array('view', 'id' => $model->id_kegiatan));
                }
            }
        }

        $this->render('absensi', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
    }

    public function loadKegiatan($id) {
        $model = Kegiatan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
