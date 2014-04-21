<?php
/* @var $this FeedbackController */
/* @var $data Feedback */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_feedback')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_feedback), array('view', 'id'=>$data->id_feedback)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('komentar')); ?>:</b>
	<?php echo CHtml::encode($data->komentar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regional')); ?>:</b>
	<?php echo CHtml::encode($data->id_regional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kegiatan); ?>
	<br />


</div>