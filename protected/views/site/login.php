<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

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
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
</div>
</form>
</div>
		<div class="col-md-4 column">
		</div>
<?php $this->endWidget(); ?>
</div><!-- form -->


