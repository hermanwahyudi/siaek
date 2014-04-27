<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Kirim Feedback',
); ?>

<?php $this->renderPartial('formFeedback', array('model'=>$model)); ?>