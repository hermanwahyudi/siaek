<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Create Pengurus</h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>