<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatan'=>array('index'),
	$model->nama_kegiatan,
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'Update Kegiatan', 'url'=>array('update', 'id'=>$model->id_kegiatan)),
	array('label'=>'Delete Kegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kegiatan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify"><?php echo $model->nama_kegiatan; ?></h1>  </div>

<div class="row clearfix">
    <div class="col-md-12 column"> <br>
		<table class="table">
            <tbody>
                <tr>
					<td align="left"><strong>ID Kegiatan</strong></td><td align="left">: <?php echo $model->id_kegiatan; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Nama Kegiatan</strong></td><td align="left">: <?php echo $model->nama_kegiatan; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Pembicara</strong></td><td align="left">: <?php echo $model->pembicara; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Materi</strong></td><td align="left">: <?php echo $model->materi; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Jenis Kegiatan</strong></td><td align="left">: <?php echo $model->jenis_kegiatan; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Hari</strong></td><td align="left">: <?php echo $model->hari; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Tanggal</strong></td><td align="left">: <?php echo $model->tanggal; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Waktu Mulai</strong></td><td align="left">: <?php echo $model->waktu_mulai; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Waktu Selesai</strong></td><td align="left">: <?php echo $model->waktu_selesai; ?></td>
				</tr>
			</tbody>
        </table>
	</div>
</div>
<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kegiatan',
		'materi',
		'waktu_mulai',
		'waktu_selesai',
		'pembicara',
		'hari',
		'tanggal',
		'jenis_kegiatan',
		'id_regional',
		'nama_kegiatan',
	),
)); ?>-->
<div style="float:left">
<?php echo CHtml::link('Back', array('kegiatan/index')); ?>
</div>
