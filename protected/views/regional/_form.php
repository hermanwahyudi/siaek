<?php
/* @var $this RegionalController */
/* @var $model Regional */
/* @var $form CActiveForm */
?> 

	<div class="form-horizontal" role="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'regional-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
		
		<div class="form-group">
			<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'id_user'); ?></label>
				<div class="col-sm-4">
				   <!--?php echo $form->textField($model,'id_user', array('class'=>'form-control')); ?-->
                   <div class="controls">

				    <?php echo CHtml::activeDropDownList($model,'id_user', $model->Users(),array('class'=>'form-control')); ?>

                   </div>
				   <span class="error-label"><?php echo $form->error($model,'id_user'); ?></span>
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
			<label for="" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'alamat'); ?></label>
				<div class="col-sm-4">
				   <?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
				   <span class="error-label"><?php echo $form->error($model,'alamat'); ?></span>
				</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-3">
				<!-- <button type="submit" class="btn btn-default">Tambah</button> -->
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-default')); ?>
				<?php echo CHtml::link('Back', array('regional/index')); ?>
			</div>
		</div>


	<?php $this->endWidget(); ?>

	</div><!-- form -->
