<?php

class AbsensiController extends Controller
{
    /*
     * @return void
     * */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }
    /*
     * @return void
     * */
    public function accessRules()
    {
        return array(

            array('allow', // allow authenticated user to perform 'create' and 'update' actions

                'actions' => array('index', 'create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan', 'isiAbsensi', 'editAbsensi', 'create', 'view'),
                'expression' => 'Yii::app()->user->getLevel() == 3',
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions

                'actions' => array('index', 'create', 'update', 'admin', 'delete', 'deadline', 'listKegiatan', 'isiAbsensi', 'editAbsensi', 'create', 'view'),
                'expression' => 'Yii::app()->user->getLevel() == 2',
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
    /*
     * @param page objek dari pagination
     * @param count jumlah kegiatan
     * @param model kegiatan
     * */
    public function actionListKegiatan()
    {
        $criteria = new CDbCriteria();
        $count = Kegiatan::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
		if(Yii::app()->user->getLevel()==3){
            $id_user = Yii::app()->user->id;
            $objRegional = Regional::model()->findByAttributes(array('id_user' => $id_user));
            $id_regional = $objRegional['id_regional'];
            $model = Kegiatan::model()->findAllByAttributes(array('id_regional' => $id_regional),array('order'=>'id_kegiatan desc'));
        }else{
            $model = Kegiatan::model()->findAll($criteria);
        }

        $this->render("listKegiatan", array('model' => $model, 'pages' => $pages));
    }
    /*
     * @param model kegiatan
     * @param sql statement query
     * @param peserta peserta dari kegiatan
     * @param absensi absensi dari masing-masing peserta
     *
     * */
    public function actionIsiAbsensi($id)
    {
        $model = $this->loadKegiatan($id);
        $id_regional = $model->id_regional;
        if(Yii::app()->user->getLevel()==3){
            $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $model->id_regional . "'";
        }else{
            $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1";
        }

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
            $now= new CDbExpression('NOW()');

            if( $now <= $model->deadline ){
                $model->status_isi = 1;
            }else{
                $model->status_isi = 2;
            }

            $model->waktu_isi = $now;
            if($model->save()){
                Yii::app()->user->setFlash('successIsi', 'Absensi sudah berhasil diisi.');
                $this->actionListKegiatan();
            }

        }
        $absensi = Absensi::model();

        $this->render('absensi', array(
            'model' => $model,
            'absensi' => $absensi,
            'peserta' => $peserta,
        ));
    }

    /*
     * @param model kegiatan
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

            $now= new CDbExpression('NOW()');
            var_dump($model->deadline);
            if( $now >  $model->deadline ){
                $model->status_isi = 2;
            }else{
                $model->status_isi = 1;
            }
            $model->waktu_isi = $now;
            if($model->save()){
                Yii::app()->user->setFlash('successEdit', 'Absensi berhasil diubah.');
                $this->actionView($id);
                break;
                
            }
            $this->redirect(array('view', 'id' => $id));

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
    /*
     * @param model kegiatan baru
     * @param id_user id dari user yang sedang login
     * @param id_regional id dari regional dimana user tersebut bertanggung jawab
     * @param absensi data absensi untuk masing-masing peserta yang ada dalam regional tersebut
     * */
    public function actionCreate()
    {
        $model = new Kegiatan;

        $id_user = Yii::app()->user->id;
        $objRegional = Regional::model()->findByAttributes(array('id_user' => $id_user));

        $id_regional = $objRegional->id_regional;

        if (isset($_POST['Absensi'])) {
            $model->attributes = $_POST['Kegiatan'];
            $model->id_regional = $id_regional;
            $model->waktu_isi = new CDbExpression('NOW()');
            $model->status_isi = 1;
            if ($model->save()) {
                $valid = true;
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

            Yii::app()->user->setFlash('successTambah', 'Absensi sudah ditambahkan');
            $this->actionView($model->id_kegiatan);
            break;
        }
        if(Yii::app()->user->getLevel()==3){
            $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1 and id_regional = '" . $id_regional . "'";
        }else{
            $sql = "SELECT id_peserta,nama FROM peserta WHERE status_aktif=1";
        }

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
    /**
     * Performs the AJAX validation.
     * @param Absensi $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='absensi-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
