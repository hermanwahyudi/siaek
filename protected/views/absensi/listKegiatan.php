<?php
$this->breadcrumbs = array(
    'List Kegiatan',
);
?>
<h2><b>Daftar Absensi</b><h2>
<br>
    <?php
    if (Yii::app()->user->hasFlash('successIsi')){
        echo "<div style='color:green'>" . Yii::app()->user->getFlash('successIsi') . "</div>";
    }
    ?>
<br>
    <?php
        if(Yii::app()->user->getLevel()==3){
            echo CHtml::link('Tambah Absensi', array('absensi/create'),array('class'=>'btn btn-default'));
        }
    ?>
    <br>
    <br>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <b>No</b>
        </th>
        <th>
            <b>Nama Kegiatan</b>
        </th>
        <th>
            <b>Pembicara</b>
        </th>
        <th>
            <b>Jenis Kegiatan</b>
        </th>
        <th>
            <b>Nama Regional</b>
        </th>
        <th>
            <b>Tanggal Deadline</b>
        </th>
        <th><b>Status Isi</b></th>
        <th><b>Action</b></th>
    </tr>
    </thead>
    <tbody>
    <?php $i=0;?>
        <?php foreach($models as $model): ?>

            <?php $jenis_kegiatan = "";
            if($model->jenis_kegiatan == "1") $jenis_kegiatan = "Bulanan";
            if($model->jenis_kegiatan == "2") $jenis_kegiatan = "Pekanan";
            if($model->jenis_kegiatan == "3") $jenis_kegiatan = "Lokal";
            if($model->jenis_kegiatan == "4") $jenis_kegiatan = "Khusus";



            ?>
            <?php
            $nama_regional = "";
            $model2 = Regional::model()->findByPk($model->id_regional);
            if($model->id_regional == $model2->id_regional) $nama_regional = $model2->nama;
            ?>
            <?php
            $status_isi = "";
            if($model->status_isi == "2") $status_isi = "<span style='color:red'>Telat Isi</span>";
            if($model->status_isi == "1") $status_isi = "Sudah Diisi";
            if($model->status_isi == "0") $status_isi = "<span style='color:red'>Belum Diisi</span>";


            ?>
            <?php if($i%2==0){
                    echo "<tr class="."'active'".">";
                  }else{
                    echo "<tr>";
            }?>
            <?php echo "<td>" . ++$i . "</td><td>" . $model->nama_kegiatan . "</td>"; ?>
            <?php echo "<td>" . $model->pembicara . "</td><td>" . $jenis_kegiatan . "</td>"; ?>
            <?php echo "<td>" . $nama_regional . "</td><td>" . $model->deadline . "</td>"; ?>
            <?php echo "<td>" . $status_isi . "</td>"; ?>
            <?php
            if ($model->status_isi == 0) {
                if(Yii::app()->user->getLevel()==2 && $model->jenis_kegiatan==1){

                }else{
                    echo "<td>" . CHtml::link('Isi Absensi', array('absensi/isiAbsensi', 'id' => $model->id_kegiatan)) . "</td></tr>";        
                }
                
                
            } else {
                if(Yii::app()->user->getLevel()==2 && $model->jenis_kegiatan==1){

                }else{
                    echo "<td>" . CHtml::link('Edit Absensi', array('absensi/editAbsensi', 'id' => $model->id_kegiatan)) . "</td>";    
                }
                
                echo "<td>" . CHtml::link('Lihat', array('absensi/view', 'id' => $model->id_kegiatan)) . "</td></tr>";

            }
            ?>

<?php endforeach; ?>
    </tbody>
</table>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

<?php echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
)); ?>