<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */



?>


<div class="row clearfix">
		<div class="col-md-4 column">
		</div>
		<div class="col-md-4 column">

<form role="form" action="/siaek/site/login" method="post">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Login</h3>
				  </div>
				  <div class="panel-body">
	<!--p class="note">Fields with <span class="required">*</span> are required.</p-->

	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<span style="color:red"><?php echo $form->error($model,'username'); ?></span>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<span style="color:red"><?php echo $form->error($model,'password'); ?><span style="color:red">
		
	</div>


	<div class="form-group">
		<?php echo CHtml::submitButton('Login'); ?>
		<?php echo Chtml::link("Forgot Password?", array('site/forget')); ?>
	</div>
</div>
</div>
</form>
</div>
		<div class="col-md-4 column">
		</div>
<?php $this->endWidget(); ?>
</div><!-- form -->


