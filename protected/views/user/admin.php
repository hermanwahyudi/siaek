<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Pengurus',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="headline"> <h1 class="text-justify">List Pengurus</h1>  </div>

<?php echo CHtml::link('Tambah Pengurus', array('user/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_user',
		'nip',
		'role',
		'username',
		//'password',
		'nama',
		'jenis_kelamin',
		'email',
		'no_telp',
		'alamat',
		//'url_image',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link('Back', array('site/index')); ?>