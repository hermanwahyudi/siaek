<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar'); ?>
		<?php echo $form->textArea($model,'komentar',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'komentar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_regional'); ?>
                <div class="controls">
				   <?php echo CHtml::activeDropDownList($model,'id_regional', $model->getRegionalOption(),array('class'=>'form-control','prompt' => 'Select a Regional')); ?>
                </div>
		 
		<!--?php echo $form->textField($model,'id_regional'); ?-->
		<?php echo $form->error($model,'id_regional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kegiatan'); ?>
		<?php echo $form->textField($model,'nama_kegiatan',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nama_kegiatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->