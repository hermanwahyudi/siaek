<?php
/* @var $this FeedbackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Feedback',
);

?>


<div class="headline"><h1>Feedback</h1></div>
<div align = "center">

<div class="row clearfix">
    <div class="col-md-11 column"> <br>
		<table class="table table-striped table-bordered" aling="center">
			<thead>
				
					<td align="center"><h3><b>No.</b></h3></td>
				
				
					<td align="center"><strong>Nama Kegiatan</strong></td>
				
			
					<td align="center"><strong>Komentar</strong></td>
					<td align="center"><strong>Action</strong></td>
				
			</thead>
            <tbody>
            	<?php
               $i=0;
	foreach($dataFeedback as $x=>$y) {
		
		echo "<tr><td>".++$i."</td><td align='left'>". $y->nama_kegiatan . "</td>";
		echo "<td align='left'>".$y->komentar . "</td><td>". CHtml::link('Detail', array('feedback/view', 'id'=>$y->id_feedback)) ."</td></tr>";
	} ?>
			</tbody>
        </table>

        <?php foreach($dataFeedback as $model): ?>
    
		<?php endforeach; ?>

		<?php $this->widget('CLinkPager', array(
    	'pages' => $pages,
		)) ?>

        <p align="left">
<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>
	</div>
</div>

</div>