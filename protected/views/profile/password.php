
<div class="headline"> <h1 class="text-justify">Edit Password</h1>  </div>
<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'password'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'password'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Password Baru *</label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model, 'password', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'password'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">Verifikasi Password Baru *</label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model, 'password', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'password'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<div class="col-sm-3">
			<!-- <button type="submit" class="btn btn-default">Tambah</button> -->
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-default')); ?>
			<?php echo CHtml::link('Back', array('profile/view', 'id' => $model->id_user)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->