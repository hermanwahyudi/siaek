<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>Create Peserta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>