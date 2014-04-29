<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
/* @var $form CActiveForm */
?>

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
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'id_regional'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'id_regional', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'id_regional'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nama_kegiatan'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'nama_kegiatan', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'nama_kegiatan'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'pembicara'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'pembicara', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'pembicara'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'materi'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textArea($model,'materi', array('class'=>'form-control', 'rows'=>6, 'cols'=>50)); ?>
			<span class="error-label"><?php echo $form->error($model,'materi'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'hari'); ?></label>
			<div class="col-sm-4">
				<?php echo CHtml::activeDropDownList($model, 'hari', $model->getDayOption()); ?>
			<span class="error-label"><?php echo $form->error($model,'hari'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'tanggal'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'tanggal', array('class'=>'form-control', 'class'=>'datetimepicker')); ?>
			<span class="error-label"><?php echo $form->error($model,'tanggal'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'waktu_mulai'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'waktu_mulai', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'waktu_mulai'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'waktu_selesai'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'waktu_selesai', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'waktu_selesai'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'jenis_kegiatan'); ?></label>
			<div class="col-sm-4">
				<?php echo CHtml::activeDropDownList($model, 'jenis_kegiatan', $model->getTipeOption()); ?>
			<span class="error-label"><?php echo $form->error($model,'jenis_kegiatam'); ?></span>
			</div>
	</div>

	<div class="form-group">
		<div class="col-sm-3">
			<!-- <button type="submit" class="btn btn-default">Tambah</button> -->
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-default')); ?>
			<?php echo CHtml::link('Back', array('kegiatan/index')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->