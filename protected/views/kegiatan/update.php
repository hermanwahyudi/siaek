<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatan'=>array('index'),
	$model->nama_kegiatan=>array('view','id'=>$model->id_kegiatan),
	'Ubah',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'View Kegiatan', 'url'=>array('view', 'id'=>$model->id_kegiatan)),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Ubah Kegiatan <?php echo $model->nama_kegiatan; ?></h1>  </div> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>