<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Peserta'=>array('index'),
	$model->nama,
);

?>

<div class="headline"> <h1 class="text-justify">Peserta <?php echo $model->nama; ?></h1>  </div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_peserta',
		'id_regional',
		'nomor_peserta',
		'nama',
		'no_handphone',
		'email',
		'jenis_kelamin',
		'status_aktif',
	),
)); ?>
<?php echo CHtml::link('Back', array('peserta/index')); ?>
