<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id_kegiatan,
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'Update Kegiatan', 'url'=>array('update', 'id'=>$model->id_kegiatan)),
	array('label'=>'Delete Kegiatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kegiatan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>View Kegiatan #<?php echo $model->id_kegiatan; ?></h1>

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
)); ?>
