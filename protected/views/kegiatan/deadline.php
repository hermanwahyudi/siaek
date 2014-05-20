<?php

$this->breadcrumbs=array(
	'Deadline',
	
);?>
<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row clearfix">
			<div class="headline"> <h1 class="text-justify">Menentukan Deadline</h1>  </div>
			<?php 
				if(Yii::app()->user->hasFlash('successDeadline')):
					echo "<div style='color:green'>".Yii::app()->user->getFlash('successDeadline')."</div>";
				endif;
			?><br>
			
				<div class="col-md-12 column">	
				<!--</div>-->
				<!--</div>-->
			<!--<div class="row clearfix">-->
				<!--<div class="col-md-12 column">-->
					<table class="table">
						<thead>
							<tr>
								<th>
									No.
								</th>
								<th>
									Nama Kegiatan
								</th>
								<th>
									Pembicara
								</th>
								<th>
									Jenis Kegiatan
								</th>
								<th>
									Nama Regional
								</th>
								<th>
									Tanggal Deadline
								</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=0;foreach($model as $x=>$y) { ?>
						<?php $jenis_kegiatan = ""; 
								if($y->jenis_kegiatan == "1") $jenis_kegiatan = "Bulanan";
								if($y->jenis_kegiatan == "2") $jenis_kegiatan = "Pekanan";
								if($y->jenis_kegiatan == "3") $jenis_kegiatan = "Lokal";
								if($y->jenis_kegiatan == "4") $jenis_kegiatan = "Khusus";
						?>
						<?php echo "<tr><td>". ++$i ."</td><td>". $y->nama_kegiatan ."</td>";?>
						<?php echo "<td>". $y->pembicara . "</td><td>". $jenis_kegiatan ."</td>"; ?>
						<?php echo "<td>". $y->regional->nama ."</td><td>". $y->deadline ."</td>"; ?>
						<?php echo "<td>". CHtml::link('Edit', array('kegiatan/UpdateDeadline', 'id'=>$y->id_kegiatan)) ."</td></tr>"; ?>
						
						<?php } ?>
							
						</tbody>
					</table> 

					<?php foreach($model as $model): ?>
    
					<?php endforeach; ?>

					<?php $this->widget('CLinkPager', array(
    				'pages' => $pages,
					)) ?>



				</div>
				<br>
				<?php echo CHtml::link('Back', array('site/index')); ?>
				<br><br>
				
			</div>
		</div>
<?php $this->endWidget(); ?>