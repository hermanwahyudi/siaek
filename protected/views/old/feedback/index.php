
<div class="headline"> <h1 class="text-justify">Feedback</h1>  </div>

<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Regional</label>
			<div class="col-sm-4">
				<input type='text' class='form-control' />
			<span class="error-label"><?php // echo $form->error($model,'regional'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Nama Kegiatan</label>
			<div class="col-sm-4">
				<input type='text' class='form-control' />
			<span class="error-label"><?php // echo $form->error($model,'regional'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Feedback<?php //echo $form->labelEx($model,'regional'); ?></label>
			<div class="col-sm-4">
				<textarea class='form-control' rows='5' cols='50'></textarea><?php //echo $form->textArea($model,'regional', array('class'=>'form-control', 'cols'=>60, 'rows'=>50)); ?>
			<span class="error-label"><?php //echo $form->error($model,''); ?></span>
			</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-3">
			<!-- <button type="submit" class="btn btn-default">Tambah</button> -->
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save', array('class'=>'btn btn-default')); ?>
			<?php echo CHtml::link('Back', array('site/index')); ?>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
</div>