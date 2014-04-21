<?php
	
	class ProfileController extends Controller {
	
		public function actionIndex() {
			
		}
		public function actionView($id) {
			$model = User::model()->findByPk($id);
			
			$this->render('view', 
							array('model' => $model));
		}
		public function actionUpdate($id) {
			$model = $this->loadModel($id);
			
			$this->render('update', 
						array('model' => $model));
		}
		public function actionPassword($id) {
			$model = User::model()->findByPk($id);
			$this->render('password', array('model' => $model));
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
?>