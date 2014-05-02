<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Kirim Feedback',
); ?>
	<?php 
	if(Yii::app()->user->hasFlash('notifFeedback')) {
		echo "<div style='color:green'>".Yii::app()->user->getFlash('notifFeedback')."</div><br>";
		echo CHtml::link('Back', array('feedback/create'));
	} else { $this->renderPartial('formFeedback', array('model'=>$model)); } 
	?>
