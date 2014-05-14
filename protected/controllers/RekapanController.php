<?php 
	class RekapanController extends Controller {
		
		public function actionIndex() {
			$model = new Kegiatan;
			
			if(isset($_POST['Kegiatan'])) {
				$bulan = $_POST['Kegiatan']['bulan'];
				$tahun = $_POST['Kegiatan']['tahun'];
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
				$bulan2 = $_POST['Kegiatan']['bulan2'];
				$tahun1 = $_POST['Kegiatan']['tahun1'];
		
				if(!($bulan2-$bulan1 < 0)) {
					$arrBulan = $this->getArrayBulan($bulan1, $bulan2);
					$sumBulan = $bulan2-$bulan1;
					
					$bulan_idx = $bulan1;
					
					$dataJumlahKegiatan[][] = array();
					$sumRegional = count(Regional::model()->findAll());
					$dataReader1 = Regional::model()->getRegional();
					$j=0;
					while(($row1=$dataReader1->read())!==false) { 
						$id_regional = $row1['id_regional'];
						for($i=0;$i<=$sumBulan;$i++) {
							$dataReader = Kegiatan::model()->getAktifKegiatan($id_regional, '0'. $bulan_idx, $tahun1);
							$row = $dataReader->read();
							$dataJumlahKegiatan[$j][$i] = ($row['jumlah'] + 1) * 10;
							
							$bulan_idx++;
						}
						$j++;
					}
					
					$this->render('result', array('modelKegiatan' => $modelKegiatan, 
												  'bulan1' => $this->getBulan($bulan1), 'bulan2' => $this->getBulan($bulan2), 
												  'tahun1' => $tahun1, 
												  'arrBulan' => $arrBulan,
												  'dataJumlahKegiatan' => $dataJumlahKegiatan,
												  'nameRegional' => $this->getNameRegional(),
												  'sumRegional' => $sumRegional)
								);
				} else {
					Yii::app()->user->setFlash('errorPeriode', 'Salah masukan periode!');
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
		
			
			
		   # mPDF
			$mPDF1 = Yii::app()->ePdf->mpdf();
	 
			# You can easily override default constructor's params
			$mPDF1 = Yii::app()->ePdf->mpdf('', 'A3');
	 
			# render (full page)
			# $mPDF1->WriteHTML($this->render('view', array(), true));
	 
			# Load a stylesheet
			# $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
			# $mPDF1->WriteHTML($stylesheet, 1);
	 
			# renderPartial (only 'view' of current controller)
			$mPDF1->WriteHTML($this->renderPartial('view', array(
													'bulan' => $this->getBulan($bulan),
													'tahun' => $tahun,
													),
													true));
	 
			# Renders image
			# $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
	 
			# Outputs ready PDF
			$mPDF1->Output();
		}
	}
?>