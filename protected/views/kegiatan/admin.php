<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kegiatan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="headline"> <h1 class="text-justify">List Kegiatan</h1>  </div>

<?php echo CHtml::link('Create New Kegiatan', array('kegiatan/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kegiatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_kegiatan',
		'nama_kegiatan',
		'pembicara',
		'materi',
		'jenis_kegiatan',
		'hari',
		'tanggal',
		'waktu_mulai',
		'waktu_selesai',
		'id_regional',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
 
<?php echo CHtml::link('Back', array('site/index')); ?>