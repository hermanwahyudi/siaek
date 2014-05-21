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

		<?php 
			if(Yii::app()->user->hasFlash('successTambah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successTambah')."</div>";
			} else if(Yii::app()->user->hasFlash('successUbah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successUbah')."</div>";
			} else if(Yii::app()->user->hasFlash('successDelete')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successDelete')."</div>";
			}
		?>

<?php echo CHtml::link('Tambah Peserta', array('peserta/create', 'class'=>'col-sm-1')); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_regional',
		'nomor_peserta',
		'nama',
		'no_handphone',
		'email',
		'jenis_kelamin',
		array('name'=>'status_aktif', 'value'=>'$data->status_aktif == 1 ? "Aktif" : "Tidak Aktif"'),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>
