<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Pengurus'=>array('index'),
	'Tambah Pengurus',
);


?>
<div class="headline"> <h1 class="text-justify">Tambah Pengurus</h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>