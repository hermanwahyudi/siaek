<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regionals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<h1>Create Regional</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>