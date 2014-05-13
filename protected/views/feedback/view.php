<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->nama_kegiatan,
);

$this->menu=array(
	//array('label'=>'List Feedback', 'url'=>array('index')),
	//array('label'=>'Create Feedback', 'url'=>array('create')),
	//array('label'=>'Update Feedback', 'url'=>array('update', 'id'=>$model->id_feedback)),
	//array('label'=>'HapusFeedback', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_feedback),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Feedback', 'url'=>array('admin')),
);
?>

<h1>View Feedback <?php echo $model->nama_kegiatan; ?></h1>

<div class="row clearfix">
    <div class="col-md-11 column"> <br>
		<table class="table">
            <tbody>
                <tr>
					<td align="left"><strong>Nama Kegiatan</strong></td><td align="left">: <?php echo $model->nama_kegiatan; ?></td>
				</tr>
                                <tr>
					<td align="left"><strong>Komentar</strong></td><td align="left">: <?php echo $model->komentar; ?></td>
				</tr>
				
				
			</tbody>
        </table>
	</div>
</div>
<p align="left">
<?php echo CHtml::link('Back', array('feedback/index')); ?></p>


