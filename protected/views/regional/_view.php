<?php
/* @var $this RegionalController */
/* @var $data Regional */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regional')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_regional), array('view', 'id'=>$data->id_regional)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />


</div>