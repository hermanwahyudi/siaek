<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Peserta',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#peserta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="headline"> <h1 class="text-justify">List Peserta</h1>  </div>


<?php echo CHtml::link('Tambah Peserta', array('peserta/create', 'class'=>'col-sm-1')); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_peserta',
		'id_regional',
		'nomor_peserta',
		'nama',
		'no_handphone',
		'email',
		'jenis_kelamin',
		'status_aktif',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::link('Back', array('site/index')); ?>
