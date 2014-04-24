<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<!--div class="form"-->
<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'role'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'role'); ?>
			<span class="error-label">
		<?php echo $form->error($model,'role'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'username'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'username'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'password'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>64)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'password'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'nama'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>64)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'nama'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'jenis_kelamin'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'email'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'email'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'nip'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'nip',array('size'=>60,'maxlength'=>64)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'nip'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'no_telp'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textField($model,'no_telp',array('size'=>20,'maxlength'=>20)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'no_telp'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'alamat'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50)); ?>
			<span class="error-label">
		<?php echo $form->error($model,'alamat'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">
		<?php echo $form->labelEx($model,'url_image'); ?>
		</label>
			<div class="col-sm-4">
		<?php echo CHtml::activeFileField($model,'url_image'); ?>
			<span class="error-label">
		<?php echo $form->error($model,'url_image'); ?>
		</span>
			</div>
	</div>

	<div class="form-group">
		<div class="col-sm-3">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::link('Back', array('user/index')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->