<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatan',
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

<?php echo CHtml::link('Tambah Kegiatan', array('kegiatan/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kegiatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nama_kegiatan',
		'pembicara',
		'materi',
		'jenis_kegiatan',
		'hari',
		'tanggal',
		'waktu_mulai',
		'waktu_selesai',
		array(
                 'name'=>'nama_kegiatan',
                 'type'=>'raw',
                   'value'=> 'CHtml::encode($data->nama_kegiatan)'
                ),
		array(
                 'name'=>'regional',
                   'value'=>'$data->regional->nama',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?> 
<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>