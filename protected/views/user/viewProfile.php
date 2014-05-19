<?php 
$this->breadcrumbs=array(
	'Profil',
	
);
?>

<div class="headline"> <h1 class="text-justify"><?php echo $model->nama; ?></h1>  </div>
<?php 
if(Yii::app()->user->hasFlash('passChanged')):
    echo "<div style='color:green'>".Yii::app()->user->getFlash('passChanged')."</div>";
endif;
?>
<?php if(Yii::app()->user->hasFlash('successProfile')):
    echo "<div style='color:green'>".Yii::app()->user->getFlash('successProfile')."</div>";
endif;
?>
<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,

)); ?>
<br>
<div class="row clearfix">
    <div class="col-md-12 column"> <br>
		<table class="table">
            <tbody>
				<tr>
					<td align="left"><strong>Role</strong></td><td align="left">:
						<?php echo $model->role; ?>
  				</td>
  					
				</tr>
				<tr>
					<td align="left"><strong>NIP<strong></td><td align="left">: <?php echo $model->nip; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Username</strong></td><td align="left">: <?php echo $model->username; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Nama</strong></td><td align="left">: <?php echo $model->nama; ?></td>
				</tr>
				<tr>
					<td align="left"><strong> Jenis Kelamin </strong></td><td align="left">:
					<?php echo $model->jenis_kelamin; ?>
  					</td>
					<!-- <td align="left"><strong>Jenis Kelamin</strong></td><td align="left">: <?php echo $model->jenis_kelamin; ?></td> -->
				</tr>
				<tr>
					<td align="left"><strong>Email</strong></td><td align="left">: <?php echo $model->email; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>No. Telp</strong></td><td align="left">: <?php echo $model->no_telp; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Alamat</strong></td><td align="left">: <?php echo $model->alamat; ?></td>
				</tr>
			</tbody>
        </table>
	</div>
</div>

<div style="float:left">
<button type="button" class="btn btn-alert active"><?php echo CHtml::link('Edit', array('user/updateprofile')); ?></button>

<button type="button" class="btn btn-alert active"><?php echo CHtml::link('Edit Password', array('user/password')); ?></button>
<br>
<?php echo CHtml::link('Back', array('site/index')); ?>
</div>
<?php $this->endWidget(); ?>
</div>


