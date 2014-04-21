<?php
/* @var $this RegionalController */
/* @var $model Regional */

$this->breadcrumbs=array(
	'Regionals'=>array('index'),
	$model->id_regional,
);

$this->menu=array(
	array('label'=>'List Regional', 'url'=>array('index')),
	array('label'=>'Create Regional', 'url'=>array('create')),
	array('label'=>'Update Regional', 'url'=>array('update', 'id'=>$model->id_regional)),
	array('label'=>'Delete Regional', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_regional),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regional', 'url'=>array('admin')),
);
?>

<div class="headline"> <h1 class="text-justify"><?php echo $model->nama; ?></h1>  </div>

<div class="row clearfix">
    <div class="col-md-12 column"> <br>
		<table class="table">
            <tbody>
                <tr>
					<td align="left"><strong>ID Regional</strong></td><td align="left">: <?php echo $model->id_regional; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Nama</strong></td><td align="left">: <?php echo $model->nama; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Alamat</strong></td><td align="left">: <?php echo $model->alamat; ?></td>
				</tr>
			</tbody>
        </table>
	</div>
</div>
<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_regional',
		'nama',
		'alamat',
		'id_user',
	),
)); ?> -->
<div style="float:left">
<?php echo CHtml::link('Back', array('regional/index')); ?>
</div>
