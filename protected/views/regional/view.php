<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regionals'=>array('index'),
	$model->id_regional,
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Create Regional', 'url'=>array('create')),
	array('label'=>'Update Regional', 'url'=>array('update', 'id'=>$model->id_regional)),
	array('label'=>'Delete Regional', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_regional),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<h1>View Regional #<?php echo $model->id_regional; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_regional',
		'nama',
		'alamat',
		'id_user',
	),
)); ?>
