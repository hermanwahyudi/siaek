<?php

class AbsensiController extends Controller {

    public function filters() {
        return array(
                'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            
            array('allow', // allow authenticated user to perform 'create' and 'update' actions

                'actions' => array('index','create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan', 'isiAbsensi','editAbsensi'),
                'expression' => 'Yii::app()->user->getLevel() == 3',
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
        $criteria = new CDbCriteria();
        $count = Kegiatan::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 10;
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
        if (isset($_POST['Absensi'])) {
            $absensi = $_POST['Absensi'];
            //print_r($absensi);
            $valid = true;
            foreach ($_POST['Absensi'] as $j => $modelp) {
                if (isset($_POST['Absensi'][$j])) {
                    //inisialisasi
                    $absensi[$j] = new Absensi; // if you had static model only
                    $absensi[$j]->alasan = $_POST['Absensi'][$j]['alasan'];
                    $absensi[$j]->id_status = (int) $_POST['Absensi'][$j]['id_status'];
                    $absensi[$j]->id_kegiatan = $model->id_kegiatan;
                    $absensi[$j]->id_peserta = (int) $peserta[$j]['id_peserta'];
                    $absensi[$j]->save();
                }
            }
            $model->status_isi = 1;
            $model->save();


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

        //print_r($absensi);
        if (isset($_POST['Absensi'])) {
            //var_dump($_POST['Absensi']);
            foreach ($_POST['Absensi'] as $j => $modelp) {

                //inisialisasi
                // if you had static model only
                $status = $_POST['Absensi'][$j]['id_status'];
                $alasan = $_POST['Absensi'][$j]['alasan'];
                $id_peserta = $j;
                //print_r($alasan);
                Absensi::model()->updateByPk(array('id_kegiatan' => $id, 'id_peserta' => $j), array('id_status' => $status, 'alasan' => $alasan));
                //$absensi[$j]->alasan = $_POST['Absensi'][$j]['alasan'];
                //$absensi[$j]->id_status =$_POST['Absensi'][$j]['id_status'];
                //$absensi[$j]->save();
            }

            $this->actionView($id);
        }
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        $this->render('edit', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
    }

    public function actionView($id) {

        $model = $this->loadKegiatan($id);
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        $this->render('view', array(
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

    public function actionCreate() {
        $model = new Kegiatan;
        $absensi = array();
        $i = 0;
        while ($i < 1) {
            $absensi[$i] = Absensi::model();
            $i++;
        }
        if (isset($_POST['Kegiatan'], $_POST['Absensi'])) {
            $model->attributes = $_POST['Kegiatan'];
            if ($model->save()) {
                $valid = true;
                foreach ($_POST['Absensi'] as $j => $item) {
                    if (isset($_POST['Absensi'][$j])) {
                        //inisialisasi
                        $absensi[$j] = new Absensi;
                        $absensi[$j]->attributes = $modelp;
                        $absensi[$j]->id_kegiatan = $model->id_kegiatan;
                        $valid = $absensi[$j]->validate() && $valid;
                    }
                }
                if ($valid) {
                    $i = 0;
                    while (isset($absensi[$i])) {
                        $absensi[$i++]->save(false);
                    }
                }
                $this->redirect(array('view', 'id' => $model->id_kegiatan));
            }
        }
        $id_user = Yii::app()->user->id;
        $objRegional = Regional::model()->findByAttributes(array('id_user'=>$id_user));

	$id_regional = $objRegional->id_regional;
        $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $id_regional . "'";
        $dbCommand = Yii::app()->db->createCommand($sql);
        $peserta = $dbCommand->queryAll();
        var_dump($peserta);
         $this->render('create', array(
            'model' => $model, 
             'absensi' => $absensi,
             'peserta'=>$peserta,
        ));
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
