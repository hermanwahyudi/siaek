<?php 
	class RekapanController extends Controller {
		
		public function actionIndex() {
			$model = new Absensi;
			
			if(isset($_POST['Absensi'])) {
				$bulan = $_POST['Absensi']['bulan'];
				$tahun = $_POST['Absensi']['tahun'];
				$this->actionGeneratePdf($bulan, $tahun);
			} else {
				$this->render('index', array('model' => $model));
			}
		}
		public function actionCompareRekapan() {
			$this->render('compare');
		}
		public function actionResult() {
			$this->render('result');
		}
		public function actionGeneratePdf($bulan, $tahun) {
		
			$model = array(
						'bulan'=>$bulan,
						'tahun'=>$tahun,
					);
			
		   # mPDF
			$mPDF1 = Yii::app()->ePdf->mpdf();
	 
			# You can easily override default constructor's params
			$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
	 
			# render (full page)
			# $mPDF1->WriteHTML($this->render('view', array(), true));
	 
			# Load a stylesheet
			# $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
			# $mPDF1->WriteHTML($stylesheet, 1);
	 
			# renderPartial (only 'view' of current controller)
			$mPDF1->WriteHTML($this->renderPartial('view', array('model'=>$model), true));
	 
			# Renders image
			# $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
	 
			# Outputs ready PDF
			$mPDF1->Output();
		}
	}
?>