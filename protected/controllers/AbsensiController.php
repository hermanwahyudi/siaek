<?php

class AbsensiController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(

            array('allow', // allow authenticated user to perform 'create' and 'update' actions

                'actions' => array('index', 'create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan', 'isiAbsensi', 'editAbsensi', 'create', 'view'),
                'expression' => 'Yii::app()->user->getLevel() == 3',
            ),

            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /*
     *
     * */
    public function actionIndex()
    {
        $this->actionListKegiatan();
    }

    public function actionListKegiatan()
    {
        $criteria = new CDbCriteria();
        $count = Kegiatan::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $model = Kegiatan::model()->findAll($criteria);
        $this->render("listKegiatan", array('model' => $model, 'pages' => $pages));
    }

    public function actionIsiAbsensi($id)
    {
        $model = $this->loadKegiatan($id);
        $id_regional = $model->id_regional;
        $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $model->id_regional . "'";
        $dbCommand = Yii::app()->db->createCommand($sql);
        $peserta = $dbCommand->queryAll();
        if (isset($_POST['Absensi'])) {
            $absensi = $_POST['Absensi'];
            foreach ($_POST['Absensi'] as $j => $modelp) {
                if (isset($_POST['Absensi'][$j])) {
                    //inisialisasi
                    $absensi[$j] = new Absensi; // if you had static model only
                    $absensi[$j]->alasan = $_POST['Absensi'][$j]['alasan'];
                    $absensi[$j]->id_status = (int)$_POST['Absensi'][$j]['id_status'];
                    $absensi[$j]->id_kegiatan = $model->id_kegiatan;
                    $absensi[$j]->id_peserta = (int)$peserta[$j]['id_peserta'];
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

    /*
     * @return kegiatan
     * */
    public function loadKegiatan($id)
    {
        $model = Kegiatan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /*
     * @
     * */
    public function actionEditAbsensi($id)
    {
        $model = $this->loadKegiatan($id);
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        if (isset($_POST['Absensi'])) {
            foreach ($_POST['Absensi'] as $j => $item) {
                $id_peserta = $absensi[$j]['id_peserta'];
                $alasan = $_POST['Absensi'][$j]['alasan'];
                $id_status = $_POST['Absensi'][$j]['id_status'];
                $sql = "UPDATE absensi SET id_status=$id_status,alasan='" . $alasan . "' WHERE id_peserta=$id_peserta and id_kegiatan=$id ";
                $connection = Yii::app()->db;
                $command = $connection->createCommand($sql)->execute();
            }
            $this->actionView($id);
        }
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        $this->render('edit', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
    }

    public function actionView($id)
    {

        $model = $this->loadKegiatan($id);
        $absensi = $this->loadModelAbsensi($model->id_kegiatan);
        $this->render('view', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
    }

    /*
     * @return absensi berdasarkan id kegiatan
     * */
    public function loadModelAbsensi($id)
    {
        $model = Absensi::model()->findAllByAttributes(array('id_kegiatan' => $id));
        if ($model === null)
            throw new CHttpException(404, 'The requested Absensi does not exist.');
        return $model;
    }

    public function actionCreate()
    {
        $model = new Kegiatan;

        $id_user = Yii::app()->user->id;
        $objRegional = Regional::model()->findByAttributes(array('id_user' => $id_user));

        $id_regional = $objRegional->id_regional;

        if (isset($_POST['Absensi'])) {
            $model->attributes = $_POST['Kegiatan'];
            $model->id_regional = $id_regional;
            $model->status_isi = 1;
            if ($model->save()) {
                foreach ($_POST['Absensi'] as $j => $item) {
                    if (isset($_POST['Absensi'][$j])) {
                        $absensi[$j] = new Absensi;
                        $absensi[$j]->id_peserta = $j;
                        $absensi[$j]->id_status = $_POST['Absensi'][$j]['id_status'];
                        $absensi[$j]->alasan = $_POST['Absensi'][$j]['alasan'];
                        $absensi[$j]->id_kegiatan = $model->id_kegiatan;
                        $absensi[$j]->save();
                    }
                }
            }
            $this->redirect(array('view', 'id' => $model->id_kegiatan));
        }

        $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $id_regional . "'";
        $dbCommand = Yii::app()->db->createCommand($sql);
        $peserta = $dbCommand->queryAll();

        $absensi = array();

        foreach ($peserta as $i => $item) {
            $id = $item['id_peserta'];
            $absensi[$id] = Absensi::model();
            $absensi[$id]->id_peserta = $id;

        }

        $this->render('create', array(
            'model' => $model,
            'absensi' => $absensi,
        ));
    }
}
