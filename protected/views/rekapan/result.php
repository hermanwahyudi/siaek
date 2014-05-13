<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan'=>array('compareRekapan'),
	'Hasil',
); ?>
	<?php
		$temp = array();
		for($i=0; $i<$sumRegional; $i++) {
			$temp[$i] = array('name' => $nameRegional[$i] , 'data' => $dataJumlahKegiatan[$i]);
		}
	?>
<div class="tag-box tag-box-v3">
              <div class="headline"><h1 class="text-center">Perbandingan Rekapan</h1></div>
			  <?php
				 $this->Widget('ext.highcharts.HighchartsWidget', array(
				   'options'=>array(
					  'title' => array('text' => 'Rekapan Kegiatan Antar Regional PPSDMS <br><br><br>'. $bulan1 . ' - ' . $bulan2 . ' '. $tahun1 . '/'.$tahun2),
					  'xAxis' => array(
						 'categories' => $arrBulan
					  ),
					  'yAxis' => array(
						 'title' => array('text' => 'Persentase')
					  ),
					  'credits' => array('enabled' => false),
					  'series' => $temp
				   )
				));
				?>
			  
			 
			<?php echo CHtml::link("Back", "comparerekapan"); ?>
              <div class="row clearfix">
              <br>
              <div class="col-md-10 column">
                            
            </div>
          </div>
</div> 