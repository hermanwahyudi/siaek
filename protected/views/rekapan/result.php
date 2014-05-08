<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan'=>array('compareRekapan'),
	'Hasil',
); ?>

<div class="tag-box tag-box-v3">
              <div class="headline"><h1 class="text-center">Perbandingan Rekapan</h1></div>
			  <?php
				 $this->Widget('ext.highcharts.HighchartsWidget', array(
				   'options'=>array(
					  'title' => array('text' => 'Rekapan Kegiatan Antar Regional PPSDMS <br><br><br>Agustus - Desember 2013'),
					  'xAxis' => array(
						 'categories' => array('Agustus', 'September', 'Oktober', 'November', 'Desember')
					  ),
					  'yAxis' => array(
						 'title' => array('text' => 'Jumlah')
					  ),
					  'credits' => array('enabled' => false),
					  'series' => array(
						 array('name' => 'Regional 1 Putra Jakarta', 'data' => array(25, 26,27,28,33)),
						 array('name' => 'Regional 1 Putri Jakarta', 'data' => array(30, 28, 25, 36,40)),
						 array('name' => 'Regional Bandung', 'data' => array(17, 14,15,16,18)),
						 array('name' => 'Regional Jogjakarta', 'data' => array(30, 28, 25, 26,28)),
					  )
				   )
				));
				?>
			  <?php
						$this->widget('ext.highcharts.HighchartsWidget', array(
					   'options'=>array(
						  'title' => array('text' => 'Rekapan Antar-Regional PPSDMS'),
						  'series' => array(
							 array('type'=>'pie',
								   'data' => array(array('Regional Jakarta 1',4),array('Regional Bandung',5),array('Regional Jogjakarta',2),)
								  )
						  ),
						  'tooltip' => array(
							'formatter' => 'js:function(){ return "<b>"+this.point.name+"> :"+this.y; }'
						  ),
						  'plotOptions'=>array('pie'=>(array(
										'allowPointSelect'=>true,
										'showInLegend'=>true,
										'cursor'=>'pointer',
									)
								)                       
							),
						  'credits'=>array('enabled'=>false),
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