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
									ID Regional
								</th>
								<th>
									Tanggal Deadline
								</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=0;foreach($model as $x=>$y) { ?>
						<?php echo "<tr><td>". ++$i ."</td><td>". $y->nama_kegiatan ."</td>";?>
						<?php echo "<td>". $y->pembicara . "</td><td>". $y->jenis_kegiatan ."</td>"; ?>
						<?php echo "<td>". $y->id_regional ."</td><td>". $form->textField($y,'deadline', array('class'=>'form-control', 'class'=>'datetimepicker')) ."</td></tr>"; ?> 
						<?php } ?>
							
						</tbody>
					</table> 
				</div>
				<button type="button" class="btn btn-default">Submit</button><br>
				<?php echo CHtml::link('Back', array('site/index')); ?>
				<br><br>
				
			</div>
		</div>
<?php $this->endWidget(); ?>