<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->nama=>array('view','id'=>$model->id_peserta),
	'Ubah',
);

?>

<div class="headline"> <h1 class="text-justify">Ubah Peserta <?php echo $model->nama; ?></h1>  </div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>