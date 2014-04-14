<?php
/* @var $this KegiatanController */
/* @var $data Kegiatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kegiatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kegiatan), array('view', 'id'=>$data->id_kegiatan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('materi')); ?>:</b>
	<?php echo CHtml::encode($data->materi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_selesai')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_selesai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pembicara')); ?>:</b>
	<?php echo CHtml::encode($data->pembicara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?>:</b>
	<?php echo CHtml::encode($data->hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regional')); ?>:</b>
	<?php echo CHtml::encode($data->id_regional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kegiatan); ?>
	<br />

	*/ ?>

</div>