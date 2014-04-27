<?php
 
$this->breadcrumbs=array(
	'Deadline'=>array('deadline'),
	'Ubah',
);

?>
<div class="headline"> <h1 class="text-justify">Ubah Deadline</h1>  </div>
<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kegiatan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo "Nama Kegiatan"; ?></label>
			<div class="col-sm-4">
				<?php echo $model->nama_kegiatan; ?>
			
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo "Jenis Kegiatan"; ?></label>
			<div class="col-sm-4">
				<?php echo $model->jenis_kegiatan; ?>
			
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo "Regional"; ?></label>
			<div class="col-sm-4">
				<?php echo $model->id_regional; ?>
			
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model, 'deadline'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'deadline', array('class'=>'form-control', 'class'=>'datetimepicker')); ?>
			<span class="error-label"><?php echo $form->error($model,'deadline'); ?></span>
			</div>
	</div>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', array('class'=>'btn btn-default')); ?><br><br>
	<?php echo CHtml::link('Back', array('kegiatan/deadline')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
