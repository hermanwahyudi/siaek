<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	$model->id_kegiatan=>array('view','id'=>$model->id_kegiatan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'View Kegiatan', 'url'=>array('view', 'id'=>$model->id_kegiatan)),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Create Kegiatan <?php echo $model->nama_kegiatan; ?></h1>  </div> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>