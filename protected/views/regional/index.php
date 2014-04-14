<?php
/* @var $this RegionalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regionals',
);

$this->menu=array(
	array('label'=>'Create Regional', 'url'=>array('create')),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<h1>Regionals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
