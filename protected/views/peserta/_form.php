<?php
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'peserta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'id_regional',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'nomor_peserta',array('span'=>5,'maxlength'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>5,'maxlength'=>64)); ?>

            <?php echo $form->textFieldControlGroup($model,'no_handphone',array('span'=>5,'maxlength'=>20)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>64)); ?>

            <?php echo $form->textFieldControlGroup($model,'jenis_kelamin',array('span'=>5,'maxlength'=>1)); ?>

            <?php echo $form->textFieldControlGroup($model,'status_aktif',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->