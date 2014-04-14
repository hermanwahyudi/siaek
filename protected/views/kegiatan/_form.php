<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kegiatan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'materi'); ?>
		<?php echo $form->textArea($model,'materi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'materi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_mulai'); ?>
		<?php echo $form->textField($model,'waktu_mulai'); ?>
		<?php echo $form->error($model,'waktu_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_selesai'); ?>
		<?php echo $form->textField($model,'waktu_selesai'); ?>
		<?php echo $form->error($model,'waktu_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pembicara'); ?>
		<?php echo $form->textField($model,'pembicara',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'pembicara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari'); ?>
		<?php echo $form->textField($model,'hari',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'hari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kegiatan'); ?>
		<?php echo $form->textField($model,'jenis_kegiatan'); ?>
		<?php echo $form->error($model,'jenis_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_regional'); ?>
		<?php echo $form->textField($model,'id_regional'); ?>
		<?php echo $form->error($model,'id_regional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kegiatan'); ?>
		<?php echo $form->textArea($model,'nama_kegiatan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'nama_kegiatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->