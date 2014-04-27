<?php
/* @var $this PesertaController */
/* @var $data Peserta */
?>




<div class="view">
<Table class ="table">
	<thead>
	
		<td align="center"><strong>Peserta</strong</td>
		<td align="center"><strong>Regional</strong</td>
		<td align="center"><strong>Nomor_Peserta</strong</td>
		<td align="center"><strong>Nama</strong</td>
		<td align="center"><strong>No. Handphone</strong</td>
		<td align="center"><strong>e-mail</strong</td>
		<td align="center"><strong>Jenis Kelamin</strong</td>
		
	</thead>
		
	<tbody>
		
		<td><?php echo CHtml::link(CHtml::encode($data->id_peserta), array('view', 'id'=>$data->id_peserta)); ?></td>
		<td><?php echo CHtml::encode($data->id_regional); ?></td>
		<td><?php echo CHtml::encode($data->nomor_peserta); ?></td>
		<td><?php echo CHtml::encode($data->nama); ?></td>
		<td><?php echo CHtml::encode($data->no_handphone); ?></td>
		<td><?php echo CHtml::encode($data->email); ?></td>
		<td><?php echo CHtml::encode($data->jenis_kelamin); ?></td>
		
	</tbody>
</table>

	
	


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_aktif')); ?>:</b>
	<?php echo CHtml::encode($data->status_aktif); ?>
	<br />

	*/ ?>

</div>