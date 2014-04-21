<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_feedback'); ?>
		<?php echo $form->textField($model,'id_feedback'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar'); ?>
		<?php echo $form->textArea($model,'komentar',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_regional'); ?>
		<?php echo $form->textField($model,'id_regional'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_kegiatan'); ?>
		<?php echo $form->textField($model,'nama_kegiatan',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->