<?php

class KegiatanController extends Controller
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
			//array('allow',  // allow all users to perform 'index' and 'view' actions
				//'actions'=>array('index','view', 'UpdateDeadline'),
				//'users'=>array('*'),
			//),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'delete', 'deadline', 'index','view','UpdateDeadline'),
				'expression'=>'Yii::app()->user->getLevel() == "2"',
				//'users'=>array('@'),
			),
			//array('allow', // allow admin user to perform 'admin' and 'delete' actions
				//'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
			//),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Kegiatan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kegiatan));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kegiatan));
		}

		$this->render('update',array(
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
		if(Yii::app()->user->getLevel() == '2') 
			$this->actionAdmin();
	


	}
	
	public function actionDeadline() { // Nampilin list kegiatan
		$criteria=new CDbCriteria();
   		$count=Kegiatan::model()->count($criteria);
    	$pages=new CPagination($count);

    	// results per page
    	$pages->pageSize=10;
    	$pages->applyLimit($criteria);

		$model = Kegiatan::model()->findAll($criteria);
		
		$this->render("deadline", 
				array('model'=>$model, 'pages' => $pages));
	}
	public function actionUpdateDeadline($id) {
		$model=$this->loadModel($id);
		
		if(isset($_POST['Kegiatan'])) { // Klik submit save
			$model->deadline = $_POST['Kegiatan']['deadline'];
			$arrDeadline01 = explode(" ", $model->deadline);
			if(preg_match("/-/", $arrDeadline01[0])) $arrDeadline02 = explode("-", $arrDeadline01[0]);
			else $arrDeadline02 = explode("/", $arrDeadline01[0]);
			
			date_default_timezone_set("Asia/Jakarta");
			$arrDeadline03 = explode(":", $arrDeadline01[1]);
			$arrDatenow = explode("-", date("Y-m-d"));
			$arrTimenow = explode(":", date("H:i"));
			
			$sumDatenow = $arrDatenow[0]+$arrDatenow[1]+$arrDatenow[2];
			$sumDeadline = $arrDeadline02[0]+$arrDeadline02[1]+$arrDeadline02[2];
			if($sumDatenow <= $sumDeadline) {
				if($arrTimenow[0] < $arrDeadline03[0]) {
					if($arrTimenow[1] < $arrDeadline03[1]) {
						Yii::app()->user->setFlash('errorDeadline', 'Waktu menit deadline tidak boleh masa lalu.');
						$this->redirect(array('UpdateDeadline', 'id'=>$id));
					} else {
						if(!empty($model->deadline)) { 
							$model->save();
							Yii::app()->user->setFlash('successDeadline', 'Deadline telah berhasil diubah.');
							$this->redirect(array('deadline'));
						} else {
							Yii::app()->user->setFlash('errorDeadline', 'Salah masukan deadline.');
							$this->redirect(array('UpdateDeadline', 'id'=>$id));
						}
					}
				} else {
					Yii::app()->user->setFlash('errorDeadline', 'Waktu jam deadline tidak boleh masa lalu.');
					$this->redirect(array('UpdateDeadline', 'id'=>$id));
				}
			} else {
				Yii::app()->user->setFlash('errorDeadline', 'Tanggal deadline tidak boleh masa lalu.');
				$this->redirect(array('UpdateDeadline', 'id'=>$id));
			}
		} else  { // Klik Edit di list
			$this->render("formDeadline", 
				array('model'=>$model));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kegiatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kegiatan']))
			$model->attributes=$_GET['Kegiatan'];

		$this->render('admin',array(
			'model'=>$model,
		));
		/*$params =array(
        'model'=>$model,
    	);
		 if(!isset($_GET['ajax'])) $this->render('admin', $params);
    	else  $this->renderPartial('admin', $params);*/


	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kegiatan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kegiatan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kegiatan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
            if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
	}
}
