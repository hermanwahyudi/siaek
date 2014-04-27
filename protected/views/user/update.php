<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Pengurus'=>array('index'),
	$model->nama=>array('view','id'=>$model->id_user),
	'Ubah',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id_user)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify">Ubah  <?php echo $model->nama; ?></h1></div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>