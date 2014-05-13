<?php
 
$this->breadcrumbs=array(
	'Profil'=>array('profile', 'id'=>$model->id_user),
	'Ubah Password',
);

?>
<div class="headline"> <h1 class="text-justify">Edit Password</h1>  </div>

<?php 
	if(Yii::app()->user->hasFlash('errorNewPass')) {
		echo "<div style='color:red'>".Yii::app()->user->getFlash('errorNewPass')."</div>";
	} else if(Yii::app()->user->hasFlash('errorPassConfirm')) {
		echo "<div style='color:red'>".Yii::app()->user->getFlash('errorPassConfirm')."</div>";
	} else if(Yii::app()->user->hasFlash('errorCurrentPass')) {
		echo "<div style='color:red'>".Yii::app()->user->getFlash('errorCurrentPass')."</div>";
	}
?><br>

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
		<label for="" class="col-sm-2 control-label"><?php $model->password=''; echo $form->labelEx($model,'password_sekarang'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model,'password_sekarang', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'password_sekarang'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model, 'password_baru'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model, 'password_baru', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model, 'password_baru'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model, 'password_baru_repeat'); ?></label>
			<div class="col-sm-4">
				<?php echo $form->passwordField($model, 'password_baru_repeat', array('class'=>'form-control')); ?>
			<span class="error-label"><?php echo $form->error($model,'password_baru_repeat'); ?></span>
			</div>
	</div>
	<div class="form-group">
		<div class="col-sm-3">
			<!-- <button type="submit" class="btn btn-default">Tambah</button> -->
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-default')); ?>
			<br>
                        <?php echo CHtml::link('Back', array('user/profile', 'id' => $model->id_user)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->