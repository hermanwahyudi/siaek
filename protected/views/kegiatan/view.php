<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatan'=>array('index'),
	$model->nama_kegiatan,
);

?>

<div class="headline"> <h1 class="text-justify"><?php echo $model->nama_kegiatan; ?></h1>  </div>
			<?php
			if(Yii::app()->user->hasFlash('successTambah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successTambah')."</div>";
			} else if(Yii::app()->user->hasFlash('successUbah')) {
				echo "<div style='color:green'>".Yii::app()->user->getFlash('successUbah')."</div>";
			} 
			?>
<div class="row clearfix">
    <div class="col-md-12 column"> <br>
		<table class="table">
            <tbody>
                
				<tr>
					<td align="left"><strong>Nama Kegiatan</strong></td><td align="left">: <?php echo $model->nama_kegiatan; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Pembicara</strong></td><td align="left">: <?php echo $model->pembicara; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Materi</strong></td><td align="left">: <?php echo $model->materi; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Jenis Kegiatan</strong></td><td align="left">: <?php 
					$jenis_kegiatan = ""; 
					if($model->jenis_kegiatan == "1") $jenis_kegiatan = "Bulanan";
					if($model->jenis_kegiatan == "2") $jenis_kegiatan = "Pekanan";
					if($model->jenis_kegiatan == "3") $jenis_kegiatan = "Lokal";
					if($model->jenis_kegiatan == "4") $jenis_kegiatan = "Khusus";
					echo $jenis_kegiatan; ?></td>
				</tr>
			
				<tr>
					<td align="left"><strong>Tanggal</strong></td><td align="left">: <?php echo $model->tanggal; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Waktu Mulai</strong></td><td align="left">: <?php echo $model->waktu_mulai; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Waktu Selesai</strong></td><td align="left">: <?php echo $model->waktu_selesai; ?></td>
				</tr>
			</tbody>
        </table>
	</div>
</div>
<!--
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kegiatan',
		'materi',
		'waktu_mulai',
		'waktu_selesai',
		'pembicara',
		'hari',
		'tanggal',
		'jenis_kegiatan',
		'id_regional',
		'nama_kegiatan',
	),
)); ?>-->
<div style="float:left">
<?php echo CHtml::link('Back', array('kegiatan/index')); ?>
</div>
