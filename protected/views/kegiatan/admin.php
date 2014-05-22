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
<div class="form-horizontal" role="form">


    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'kegiatan-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
	<div class="form-group">
        <div class="col-sm-3">
            <div class="controls">
                <?php echo CHtml::activeDropDownList($model, 'jenis_kegiatan', $model->getTipeOption(), array('class' => 'form-control')); ?>
				<?php echo CHtml::submitButton("Filter", array('class' => 'btn btn-default')); ?>
            </div>
            <span class="error-label"><?php echo $form->error($model, 'jenis_kegiatam'); ?></span>
			
        </div>
    </div>
	<?php $this->endWidget(); ?>

</div><!-- form -->
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