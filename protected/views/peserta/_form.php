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

    
<div class="form-horizontal" role="form">
        
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nomor_peserta'); ?></label>
                <div class="col-sm-4">
                    <?php echo $form->textField($model,'nomor_peserta',array('class'=>'form-control')); ?>
                    <span class="error-label"><?php echo $form->error($model,'nomor_peserta'); ?></span>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nama'); ?></label>
                <div class="col-sm-4">
                    <?php echo $form->textField($model,'nama',array('class'=>'form-control')); ?>
                    <span class="error-label"><?php echo $form->error($model,'nama'); ?></span>
                </div>
        </div>
        
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'no_handphone'); ?></label>
                <div class="col-sm-4">
                    <?php echo $form->textField($model,'no_handphone',array('class'=>'form-control')); ?>
                    <span class="error-label"><?php echo $form->error($model,'no_handphone'); ?></span>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'email'); ?></label>
                <div class="col-sm-4">
                    <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                    <span class="error-label"><?php echo $form->error($model,'email'); ?></span>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'jenis_kelamin'); ?></label>
                <div class="col-sm-4">
                    <?php echo "Laki-laki  " . $form->radioButton($model,'jenis_kelamin', array('value'=>'L', 'uncheckValue'=>null)); 
					  echo "  Perempuan  " . $form->radioButton($model,'jenis_kelamin', array('value'=>'P', 'uncheckValue'=>null)); 
				?>
                    <span class="error-label"><?php echo $form->error($model,'jenis_kelamin'); ?></span>
                </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'status_aktif'); ?></label>
                <div class="col-sm-4">
                    <?php echo "Aktif  " . $form->radioButton($model, 'status_aktif', array('value'=>'1', 'uncheckValue'=>null)); 
					  echo "  Tidak Aktif  " . $form->radioButton($model,'status_aktif', array('value'=>'0', 'uncheckValue'=>null)); 
				?>
                    <span class="error-label"><?php echo $form->error($model,'status_aktif'); ?></span>
                </div>
        </div>


            

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?><br>
<br>		<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>
    </div>
</div>

    <?php $this->endWidget(); ?>

</div><!-- form -->