<?php ?>

<div class="headline"> <h1 class="text-justify"><?php echo $model->nama; ?></h1>  </div>

<div class="row clearfix">
    <div class="col-md-12 column"> <br>
		<table class="table">
            <tbody>
                <tr>
					<td align="left"><strong>ID User</strong></td><td align="left">: <?php echo $model->id_user; ?></td>
				</tr>
				<tr>
					<td align="left"><strong>Role</strong><td align="left">:
						<select class="selectpicker">
   							 <option>Admin</option>
   							 <option>Pengurus Pusat</option>
   							<option>Pengurus Regional</option>
   									 
  						</select>
  				</td>
  					</td>
					<!-- <td align="left"><strong>Role</strong></td><td align="left">: <?php echo $model->role; ?></td> -->
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
					<td align="left"><strong> Jenis Kelamin </strong><td align="left">:
					<select class="selectpicker">
   									 <option>Pria</option>
   									 <option>Wanita</option>
   									 
  						</select></td>
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
<!-- 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'role',
		'username',
		'password',
		'nama',
		'jenis_kelamin',
		'email',
		'nip',
		'no_telp',
		'alamat',
		'url_image',
	),
)); 
?> -->
<div style="float:left">
<?php echo CHtml::button('Edit', array('class'=>'btn btn-default', 'submit' => array('profile/update', 'id' => $model->id_user))); ?>

<?php echo CHtml::button('Edit Password', array('class'=>'btn btn-default', 'submit' => array('profile/password', 'id' => $model->id_user))); ?>
<?php echo CHtml::link('Back', array('site/index')); ?>
</div>
</div>
