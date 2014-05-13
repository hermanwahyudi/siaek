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
                'actions' => array('create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan', 'isiAbsensi','editAbsensi'),
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
        $criteria=new CDbCriteria();
        $count=Kegiatan::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize=10;
        $pages->applyLimit($criteria);

        //dapetin daftar kegiatan pada bulan ini
        $model = Kegiatan::model()->findAll($criteria);
        //$this->render('index2');
        $this->render("listKegiatan", array('model' => $model, 'pages' => $pages));
    }

    public function actionIsiAbsensi($id) {

        $model = $this->loadKegiatan($id);
       
        


        $id_regional = $model->id_regional;
        $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $model->id_regional . "'";
        $dbCommand = Yii::app()->db->createCommand($sql);
        $peserta = $dbCommand->queryAll();
        if (isset($_POST['Absensi'])){
            $absensi = $_POST['Absensi'];
            //print_r($absensi);
            $valid=true;
             foreach ($_POST['Absensi'] as $j => $modelp) {
                 if (isset($_POST['Absensi'][$j])) {
                        //inisialisasi
                        $absensi[$j] = new Absensi; // if you had static model only
                        $absensi[$j]->alasan = $_POST['Absensi'][$j]['alasan'];
                        $absensi[$j]->id_status = (int)$_POST['Absensi'][$j]['id_status'];
                        $absensi[$j]->id_kegiatan = $model->id_kegiatan;
                        $absensi[$j]->id_peserta=(int)$peserta[$j]['id_peserta'];
                        $absensi[$j]->save();
                       
                    }
             }
             print_r($absensi);
             
             
             $this->actionListKegiatan();
            
        }
        $absensi = Absensi::model();
        
        $this->render('absensi', array(
            'model' => $model,
            'absensi' => $absensi,
            'peserta' => $peserta,
        ));
    }

    public function loadKegiatan($id) {
        $model = Kegiatan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function actionEditAbsensi($id) {
       
        $model = $this->loadKegiatan($id);
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        
        $this->render('edit', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
        
        
    }
     public function loadModelAbsensi($id) {
        $model = Absensi::model()->findAllByAttributes(array('id_kegiatan' => $id));
        if ($model === null)
            throw new CHttpException(404, 'The requested Absensi does not exist.');
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
    public function actionApa() {
        $absensi = array();
        $absensi['1'] = '1';
        $absensi['2'] = 'b';
        $absensi['3'] = ' z';
        $absensi['4'] = 'a';
        print_r($absensi);
    }

}
