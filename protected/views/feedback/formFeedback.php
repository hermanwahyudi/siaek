<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'feedback-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="headline"> 
        <h1 class="text-justify">Form Kirim Feedback</h1>  
    </div>
    <div class="row">
        <div class="form-group">
            <label for="" class="col-md-3 control-label">
                <?php echo $form->labelEx($model, 'nama_kegiatan'); ?>
            </label>
            <div class="col-md-5">
                <?php echo $form->textField($model, 'nama_kegiatan', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <span class="error-label">
                    <?php echo $form->error($model, 'nama_kegiatan'); ?>
                </span>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="form-group">
            <label for="" class="col-sm-3 control-label">
                <?php echo "Regional *"; ?>
            </label>
            <div align ="left" class="col-sm-5">
                <div class="controls">
                    <?php echo CHtml::activeDropDownList($model, 'id_regional', $model->getRegionalOption(), array('class' => 'form-control')); ?>
                </div>
                <span class="error-label">
                    <?php echo $form->error($model, 'id_regional'); ?>
                </span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group">
            <label for="" class="col-md-3 control-label">
                <?php echo $form->labelEx($model, 'komentar'); ?>
            </label>
            <div class="col-md-5">
                <?php echo $form->textArea($model, 'komentar', array('class' => 'form-control')); ?>
                <span class="error-label">
                    <?php echo $form->error($model, 'komentar'); ?>
                </span>
            </div>
        </div>
    </div>
    <br>


    <br>

    <div class="col-sm-7">
        <!-- <button type="submit" class="btn btn-default">Tambah</button> -->
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Kirim' : 'Save', array('class' => 'btn btn-default')); ?>
        <?php echo CHtml::link('Back', array('site/index')); ?>

    </div>
    <div class="col-sm-1">
        <div align="right">

        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->