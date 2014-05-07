<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan'=>array('compareRekapan'),
	'Hasil',
); ?>

<div class="tag-box tag-box-v3">
              <div class="headline"><h1 class="text-center">Perbandingan Rekapan</h1></div>
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