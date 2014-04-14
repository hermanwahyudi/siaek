<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regionals'=>array('index'),
	$model->id_regional=>array('view','id'=>$model->id_regional),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Create Regional', 'url'=>array('create')),
	array('label'=>'View Regional', 'url'=>array('view', 'id'=>$model->id_regional)),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<h1>Update Regional <?php echo $model->id_regional; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>