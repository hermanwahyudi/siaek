<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_kegiatan'); ?>
		<?php echo $form->textField($model,'id_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'materi'); ?>
		<?php echo $form->textArea($model,'materi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu_mulai'); ?>
		<?php echo $form->textField($model,'waktu_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu_selesai'); ?>
		<?php echo $form->textField($model,'waktu_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pembicara'); ?>
		<?php echo $form->textField($model,'pembicara',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hari'); ?>
		<?php echo $form->textField($model,'hari',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_kegiatan'); ?>
		<?php echo $form->textField($model,'jenis_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_regional'); ?>
		<?php echo $form->textField($model,'id_regional'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_kegiatan'); ?>
		<?php echo $form->textArea($model,'nama_kegiatan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->