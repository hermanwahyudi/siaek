<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->id_peserta=>array('view','id'=>$model->id_peserta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'View Peserta', 'url'=>array('view', 'id'=>$model->id_peserta)),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>Update Peserta <?php echo $model->id_peserta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>