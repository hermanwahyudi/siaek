<?php
/* @var $this KegiatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kegiatans',
);

$this->menu=array(
	array('label'=>'Create Kegiatan', 'url'=>array('create')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>Kegiatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
