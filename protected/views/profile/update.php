<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id_user)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Edit Profile</h1>  </div>


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
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nip'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'nip', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'nip'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'role'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'role', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'role'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'username'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'username'); ?></span>
			</div>
	</div>
	
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'nama'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'nama', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'nama'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'jenis_kelamin'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'jenis_kelamin', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'jenis_kelamin'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'email'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'email'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'no_telp'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textField($model,'no_telp', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'no_telp'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'alamat'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->textArea($model,'alamat', array('class'=>'form-control', 'rows'=>6, 'cols'=>50)); ?>
			<span class="error-label"><?php echo $form->error($model,'alamat'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'url_image'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->fileField($model,'url_image', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'url_image'); ?></span>
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