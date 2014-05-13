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
		
		//Silahkan otak-atik fungsi ini buat dapet data dari kegiatan
		public function actionCompareRekapan() {
			$modelKegiatan = new Kegiatan;
			
			if(isset($_POST['Kegiatan'])) {
				$bulan1 = $_POST['Kegiatan']['bulan1'];
				$tahun1 = $_POST['Kegiatan']['tahun1'];
				
				$bulan2 = $_POST['Kegiatan']['bulan2'];
				$tahun2 = $_POST['Kegiatan']['tahun2'];
				if(!($bulan2-$bulan1 <= 0)) {
					$arrBulan = $this->getArrayBulan($bulan1, $bulan2);
					$sumBulan = $bulan2-$bulan1;
					
					$startBulan = $bulan1;
					
					$dataDummyRandom[][] = array();
					$sumRegional = count(Regional::model()->findAll());
					for($j=0;$j<$sumRegional;$j++) {
						$id_regional = $j+1;
						for($i=0;$i<=$sumBulan;$i++) {
							$dataReader = Kegiatan::model()->getAktifKegiatan($id_regional, '0'. $startBulan);
							$row = $dataReader->read();
							$dataDummyRandom[$j][$i] = ($row['jumlah'] + 1) * 10;
							
							$startBulan++;
						}
					}
					
					$this->render('result', array('modelKegiatan' => $modelKegiatan, 
												  'bulan1' => $this->getBulan($bulan1), 'bulan2' => $this->getBulan($bulan2), 
												  'tahun1' => $tahun1, 'tahun2' => $tahun2,
												  'arrBulan' => $arrBulan,
												  'dataDummyRandom' => $dataDummyRandom,
												  'nameRegional' => $this->getNameRegional(),
												  'sumRegional' => $sumRegional)
								);
				} else {
					Yii::app()->user->setFlash('errorPeriode', 'Error masukan periode!');
					$this->redirect(array('comparerekapan'));
				}
			} else {
				$this->render('compare', array('modelKegiatan' => $modelKegiatan));
			}
		}
		//fungsi getNameRegional isinya ganti pake Query ngambil nama regional
		public function getNameRegional() {
			$arrRegional = array();
			$dataReader = Regional::model()->getRegional();
			$i=0;
			while(($row=$dataReader->read())!==false) {
				$arrRegional[$i++] = $row['nama'];
			}
			return $arrRegional;
		}
		public function getArrayBulan($bulan1, $bulan2) {
			$arrBulan = array();
			$j=0;
			for($i = $bulan1; $i <= $bulan2; $i++) {
				$arrBulan[$j++] = $this->getBulan($i);
			}
			return $arrBulan;
		}
		public function getBulan($i) {
			switch ($i) {
				case 1 : return 'Januari'; break;
				case 2 : return 'Februari'; break;
				case 3 : return 'Maret'; break;
				case 4 : return 'April'; break;
				case 5 : return 'Mei'; break;
				case 6 : return 'Juni'; break;
				case 7 : return 'Juli'; break;
				case 8 : return 'Agustus'; break;
				case 9 : return 'September'; break;
				case 10 : return 'Oktober'; break;
				case 11 : return 'November'; break;
				case 12 : return 'Desember'; break;
			}
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