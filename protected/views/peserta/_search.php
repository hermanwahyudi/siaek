<?php
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_peserta'); ?>
		<?php echo $form->textField($model,'id_peserta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_regional'); ?>
		<?php echo $form->textField($model,'id_regional'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomor_peserta'); ?>
		<?php echo $form->textField($model,'nomor_peserta',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_handphone'); ?>
		<?php echo $form->textField($model,'no_handphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_kelamin'); ?>
		<?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_aktif'); ?>
		<?php echo $form->textField($model,'status_aktif'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->