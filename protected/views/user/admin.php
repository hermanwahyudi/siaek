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

		<?php 
			if(Yii::app()->user->hasFlash('successTambah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successTambah')."</div>";
			} else if(Yii::app()->user->hasFlash('successUbah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successUbah')."</div>";
			} else if(Yii::app()->user->hasFlash('successDelete')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successDelete')."</div>";
			}
		?>

<?php echo CHtml::link('Tambah Pengurus', array('user/create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_user',
		'nip',
		array('name'=>'role', 
			'value'=>'$data->role == "1" ? "Administrator" : ($data->role == "2" ? "Pengurus Pusat" : "Pengurus Regional")'),
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