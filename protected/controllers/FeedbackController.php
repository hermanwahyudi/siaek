<?php 
	class FeedbackController extends Controller {
		
		public function actionIndex() {
			$model = new Feedback;
			
			$this->render('index', array('model' => $model));
		}
		public function actionView() {
			$this->render("view");
		}
	}
?>