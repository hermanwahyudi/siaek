<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regional',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#regional-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="headline"> <h1 class="text-justify">List Regional</h1>  </div>
		<?php 
			if(Yii::app()->user->hasFlash('successTambah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successTambah')."</div>";
			} else if(Yii::app()->user->hasFlash('successUbah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successUbah')."</div>";
			} else if(Yii::app()->user->hasFlash('successDelete')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successDelete')."</div>";
			}
		?>

<?php echo CHtml::link('Tambah Regional', array('regional/create', 'class'=>'col-sm-1')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'regional-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_regional',
		'nama',
		'alamat',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::link('Back', array('site/index')); ?>
