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

		<?php 
			if(Yii::app()->user->hasFlash('successDelete')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successDelete')."</div>";
			}
		?>

<?php echo CHtml::link('Tambah Kegiatan', array('kegiatan/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kegiatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
             'name'=>'regional',
              'value'=>'$data->regional->nama',
        ),
		'nama_kegiatan',
		'pembicara',
		'materi',
		array('name'=>'jenis_kegiatan', 
			'value'=>'$data->jenis_kegiatan == "1" ? "Bulanan" : ($data->jenis_kegiatan == "2" ? "Pekanan" : ($data->jenis_kegiatan == "3" ? "Lokal" : "Khusus"))'),
		//'hari',
		'tanggal',
		'waktu_mulai',
		'waktu_selesai',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?> 
<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>