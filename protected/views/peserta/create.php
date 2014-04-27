<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Peserta'=>array('index'),
	'Tambah',
);
?>

<div class="headline"> <h1 class="text-justify">Tambah Peserta</h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>