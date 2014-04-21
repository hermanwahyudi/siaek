<?php 
	class RekapanController extends Controller {
		
		public function actionIndex() {
			$model = new Absensi;
			
			$this->render('index', array('model' => $model));
		}
		public function actionCompareRekapan() {
			$this->render('compare');
		}
		public function actionResult() {
			$this->render('result');
		}
	}
?>