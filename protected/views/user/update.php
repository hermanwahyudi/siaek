<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Pengurus'=>array('index'),
	$model->nama=>array('view','id'=>$model->id_user),
	'Ubah',
);


?>

<div class="headline"> <h1 class="text-justify">Ubah  <?php echo $model->nama; ?></h1></div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>