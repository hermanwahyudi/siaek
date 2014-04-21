<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id_feedback=>array('view','id'=>$model->id_feedback),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feedback', 'url'=>array('index')),
	array('label'=>'Create Feedback', 'url'=>array('create')),
	array('label'=>'View Feedback', 'url'=>array('view', 'id'=>$model->id_feedback)),
	array('label'=>'Manage Feedback', 'url'=>array('admin')),
);
?>

<h1>Update Feedback <?php echo $model->id_feedback; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>