<div class="row clearfix">
<div class="col-md-4 column">
</div>
<div class="col-md-4 column">
<form role="form" action="/siaek/site/reset" method="post">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
		    <h3 class="panel-title">Forgot Password</h3>
		</div>
		<div class="panel-body">
		<div class="form-group">
           <?php echo $form->labelEx($model, 'username'); ?>
           <?php echo $form->textField($model, 'username'); ?>
           <span style="color:red"><?php echo $form->error($model, 'username'); ?></span>
        </div>
        <div class="form-group">
           <?php echo CHtml::submitButton('Reset Password'); ?>
		   <?php echo CHtml::link("Back", array("site/index")); ?>
        </div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
</div>
</div>