<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regional'=>array('index'),
	'Tambah Regional',
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Form Tambah Regional</h1>  </div> 

<?php $this->renderPartial('_form', array('model'=>$model)); ?>