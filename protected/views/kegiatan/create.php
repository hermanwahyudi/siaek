<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Create Kegiatan</h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>