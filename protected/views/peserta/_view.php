<?php
/* @var $this PesertaController */
/* @var $data Peserta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_peserta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_peserta), array('view', 'id'=>$data->id_peserta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regional')); ?>:</b>
	<?php echo CHtml::encode($data->id_regional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_peserta')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_peserta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_handphone')); ?>:</b>
	<?php echo CHtml::encode($data->no_handphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_aktif')); ?>:</b>
	<?php echo CHtml::encode($data->status_aktif); ?>
	<br />

	*/ ?>

</div>