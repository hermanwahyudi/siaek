<?php 
	class RekapanController extends Controller {


		 public function filters() {
        return array(
                'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('Index', 'comparerekapan', 'GeneratePdf'),
                'expression' => 'Yii::app()->user->getLevel() == 2',
                
            ),
           
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

		
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
		public function listBulanan($bulan, $tahun, $temp) {
			$dataReader = Kegiatan::model()->getRekapKegiatan($bulan, $tahun, '1');
			$temp = $temp . "<h4>Bulanan</h4><table><tr><td>Regional<hr></td><td>Kegiatan<hr></td><td align='center'>Pembicara<hr></td><td align='center'>Materi<hr></td><td align='center'>Tanggal Pelaksanaan<hr></td><td>Persentase Kehadiran<hr></td></tr>";
			while(($row = $dataReader->read()) !== false) {
				$row1 = Kegiatan::model()->getCountPeserta($row['id_regional'], $row['id_kegiatan'])->read();
				$row2 = Kegiatan::model()->getCountHadir($row['id_regional'], $row['id_kegiatan'])->read();
				$arr = explode("-", $row['tanggal']);
				
				$temp = $temp . "<tr><td>". $row['nama'] ."</td><td align='center'>".$row['nama_kegiatan']."</td><td align='center'>".
								$row['pembicara'] . "</td><td align='center'>".$row['materi']."</td><td align='center'>". $arr[2] ."/".$arr[1]."</td><td align='center'>". (int)($row2['peserta_hadir']/$row1['jumlah_peserta'] * 100)."%</td></tr>";
			}
			$temp = $temp . "</table>";
			return $temp;
		}
		public function listPekanan($bulan, $tahun, $temp) {
			$dataReader = Kegiatan::model()->getRekapKegiatan($bulan, $tahun, '2');
			$temp = $temp . "<h4>Pekanan</h4><table><tr><td>Regional<hr></td><td>Kegiatan<hr></td><td align='center'>Pembicara<hr></td><td align='center'>Materi<hr></td><td align='center'>Tanggal Pelaksanaan<hr></td><td>Persentase Pelaksanaan<hr></td></tr>";
			while(($row = $dataReader->read()) !== false) {
				$row1 = Kegiatan::model()->getCountPekanan($row['id_regional'], $row['id_kegiatan'])->read();
				$arr = explode("-", $row['tanggal']);
				
				$temp = $temp . "<tr><td>". $row['nama'] ."</td><td align='center'>".$row['nama_kegiatan']."</td><td align='center'>".
								$row['pembicara'] . "</td><td align='center'>".$row['materi']."</td><td align='center'>". $arr[2] ."/".$arr[1]."</td><td align='center'>". (int)(($row1['jumlah_pelaksanaan']/4) * 100) ."%</td></tr>";
			}
			$temp = $temp . "</table>";
			return $temp;
		}
		public function listLokal($bulan, $tahun, $temp) {
			$dataReader = Kegiatan::model()->getRekapKegiatan($bulan, $tahun, '3');
			$temp = $temp . "<h4>Lokal</h4><table><tr><td>Regional<hr></td><td>Kegiatan<hr></td><td align='center'>Pembicara<hr></td><td align='center'>Materi<hr></td><td align='center'>Tanggal Pelaksanaan<hr></td></tr>";
			while(($row = $dataReader->read()) !== false) {
				$arr = explode("-", $row['tanggal']);
				
				$temp = $temp . "<tr><td>". $row['nama'] ."</td><td align='center'>".$row['nama_kegiatan']."</td><td align='center'>".
								$row['pembicara'] . "</td><td align='center'>".$row['materi']."</td><td align='center'>". $arr[2] ."/".$arr[1]."</td></tr>";
			}
			$temp = $temp . "</table>";
			return $temp;
		}
		public function listKhusus($bulan, $tahun, $temp) {
			$dataReader = Kegiatan::model()->getRekapKegiatan($bulan, $tahun, '4');
			$temp = $temp . "<h4>Khusus</h4><table><tr><td>Regional<hr></td><td>Kegiatan<hr></td><td align='center'>Pembicara<hr></td><td align='center'>Materi<hr></td><td align='center'>Tanggal Pelaksanaan<hr></td></tr>";
			while(($row = $dataReader->read()) !== false) {
				$arr = explode("-", $row['tanggal']);
				
				$temp = $temp . "<tr><td>". $row['nama'] ."</td><td align='center'>".$row['nama_kegiatan']."</td><td align='center'>".
								$row['pembicara'] . "</td><td align='center'>".$row['materi']."</td><td align='center'>". $arr[2] ."/".$arr[1]."</td></tr>";
			}
			$temp = $temp . "</table>";
			return $temp;
		}
		public function actionGeneratePdf($bulan, $tahun) {

			$bulan = ($bulan > 9) ? $bulan : "0" . $bulan;
			$temp = "";
			$temp = $this->listBulanan($bulan, $tahun, $temp);
			$temp = $this->listPekanan($bulan, $tahun, $temp);
			$temp = $this->listLokal($bulan, $tahun, $temp);
			$temp = $this->listKhusus($bulan, $tahun, $temp);
			
			//echo $temp;
			/*
			$mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1 = Yii::app()->ePdf->mpdf('', 'A3');
			$mPDF1->WriteHTML($this->renderPartial('view', array(
													'bulan' => $this->getBulan($bulan),
													'tahun' => $tahun,
													'data' => $temp,
													),
													true));
			$mPDF1->Output();
			*/
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($this->renderPartial('view', array(
                                                     'bulan'=>$this->getBulan($bulan),
                                                    'tahun' => $tahun,
                                                    'data' => $temp,
                                                    ),
                                                    true));
            $html2pdf->Output();
		}
	}
?>