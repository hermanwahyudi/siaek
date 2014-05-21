<?php

class PesertaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','delete','update','admin','create'),
				'expression'=>'Yii::app()->user->getLevel() >= "3"',
				//'users'=>array('*'),
			),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
			// 	'actions'=>array('create','update'),
			// 	'users'=>array('@'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
			// 	'actions'=>array('admin','delete'),
			// 	'users'=>array('@'),
			// ),
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
		$model=new Peserta;
		
		$id_user = Yii::app()->user->id;
		$objRegional = Regional::model()->findByAttributes(array('id_user'=>$id_user));

		$id_regional = $objRegional->id_regional;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$model->id_regional = $id_regional;
		if(isset($_POST['Peserta']))
		{
			$model->attributes=$_POST['Peserta'];
			$dataPeserta = Peserta::model()->findByAttributes(array('nomor_peserta' => $model->nomor_peserta));
			
			if(empty($dataPeserta)) {
				if($model->save()) {
					Yii::app()->user->setFlash('successTambah', 'Peserta telah berhasil ditambah.');
					$this->redirect(array('create'));
				}
			} else {
				Yii::app()->user->setFlash('errorNomorPeserta', 'Nomor peserta telah ada di database.');
				$this->redirect(array('create'));
			}
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

		if(isset($_POST['Peserta']))
		{
		//	$model->attributes=$_POST['Peserta'];
			if($_POST['Peserta']['nomor_peserta'] === $model->nomor_peserta) {
				if($model->save()) {
					Yii::app()->user->setFlash('successUbah', 'Peserta telah berhasil diubah.');
					$this->redirect(array('index'));
				}
			} else {
				$dataPeserta = Peserta::model()->findByAttributes(array('nomor_peserta' => $model->nomor_peserta));
				if(empty($dataPeserta)) {
					if($model->save()) {
						Yii::app()->user->setFlash('successUbah', 'Peserta telah berhasil diubah.');
						$this->redirect(array('index'));
					}
				} else {
					Yii::app()->user->setFlash('errorNomorPeserta', 'Nomor peserta telah ada di database.');
					$this->redirect(array('update', 'id'=>$id));
				}
			}
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
		if(!isset($_GET['ajax'])) {
			Yii::app()->user->setFlash('successDelete', 'Peserta telah berhasil dihapus.');
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$this->actionListPeserta();
	}

	/**
	 * Manages all models.
	 */
	public function actionListPeserta()
	{
		
		$id_user = Yii::app()->user->id;
		$objRegional = Regional::model()->findByAttributes(array('id_user'=>$id_user));

		$id_regional = $objRegional->id_regional;
		//$dataPeserta = Peserta::model()->findAllByAttributes(array('id_regional'=>$id_regional));
		
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$model->id_regional = $id_regional;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Peserta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Peserta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Peserta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='peserta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
