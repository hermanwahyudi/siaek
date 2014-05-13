<?php

class FeedbackController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'create'),
				'expression'=>'Yii::app()->user->getLevel() == "2"',
				//'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','delete','admin'),
				'expression'=>'Yii::app()->user->getLevel() == "3"',
				//'users'=>array('*'),
			),
			
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
			//  	'actions'=>array('delete','admin'),
			//  	'expression'=>'Yii::app()->user->getLevel() = "3"',
			//  	//'users'=>array('admin'),
			//  ),
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
		$model=new Feedback;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                

		if(isset($_POST['Feedback']))
		{
			$model->attributes=$_POST['Feedback'];
			if($model->save()){
                    if (Yii::app()->user->getLevel() == 3) {
                       $this->redirect(array('view','id'=>$model->id_feedback));
                    }
					Yii::app()->user->setFlash('notifFeedback', 'Feedback telah dikirim.');
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

		if(isset($_POST['Feedback']))
		{
			$model->attributes=$_POST['Feedback'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_feedback));
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
		$model = Feedback::model();
		if (Yii::app()->user->getLevel() == 2) {
			$this->actionCreate();
		}
		else{
			$dataProvider =new CActiveDataProvider('Feedback');
			//$model = new Feedback;

			$id_user = Yii::app()->user->id;
			$objRegional = Regional::model()->findByAttributes(array('id_user'=>$id_user));


			$id_regional = $objRegional->id_regional;

			$criteria=new CDbCriteria();
    		$count=Feedback::model()->count($criteria);
    		$pages=new CPagination($count);

    			// results per page
   			$pages->pageSize=2;
    		$pages->applyLimit($criteria);

			$dataFeedback = Feedback::model()->findAllByAttributes(array('id_regional'=>$id_regional), $criteria);

			$this->render('index',array(
				'dataFeedback'=>$dataFeedback, 'pages' => $pages
			));
		}
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Feedback('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Feedback']))
			$model->attributes=$_GET['Feedback'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Feedback the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Feedback::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Feedback $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='feedback-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
