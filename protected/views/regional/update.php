<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regional'=>array('index'),
	$model->nama=>array('view','id'=>$model->id_regional),
	'Ubah',
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Create Regional', 'url'=>array('create')),
	array('label'=>'View Regional', 'url'=>array('view', 'id'=>$model->id_regional)),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Form Ubah Regional</h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>