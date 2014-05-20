<?php
$this->breadcrumbs = array(
    'List Kegiatan',
);
?>
<div class="form-horizontal" role="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row clearfix">
        <div class="headline"> <h1 class="text-justify">Daftar Kegiatan</h1>  </div>
        <?php
        if (Yii::app()->user->hasFlash('successDeadline')):
            echo "<div style='color:green'>" . Yii::app()->user->getFlash('successDeadline') . "</div>";
        endif;
        ?>
        <br>
        <?php echo CHtml::link('Tambah Absensi', array('absensi/create'),array('class'=>'btn btn-default')); ?>
        <div class="col-md-12 column">	
            
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Nama Kegiatan
                        </th>
                        <th>
                            Pembicara
                        </th>
                        <th>
                            Jenis Kegiatan
                        </th>
                        <th>
                            ID Regional
                        </th>
                        <th>
                            Tanggal Deadline
                        </th>
                        <th>Status Isi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($model as $x => $y) { ?>
                        <?php echo "<tr><td>" . ++$i . "</td><td>" . $y->nama_kegiatan . "</td>"; ?>
                        <?php echo "<td>" . $y->pembicara . "</td><td>" . $y->jenis_kegiatan . "</td>"; ?>
                        <?php echo "<td>" . $y->id_regional . "</td><td>" . $y->deadline . "</td>"; ?>
                        <?php echo "<td>" . $y->status_isi . "</td>"; ?>
                        <?php
                        if ($y->status_isi == 0) {

                            echo "<td>" . CHtml::link('Isi Absensi', array('absensi/isiAbsensi', 'id' => $y->id_kegiatan)) . "</td></tr";
                            
                        } else {
                            echo "<td>" . CHtml::link('Edit Absensi', array('absensi/editAbsensi', 'id' => $y->id_kegiatan)) . "</td>";
                            echo "<td>" . CHtml::link('Lihat', array('absensi/view', 'id' => $y->id_kegiatan)) . "</td></tr>";
                            
                        }
                        ?>
                    <?php };?>

                </tbody>
            </table> 

            <?php foreach ($model as $model): ?>

            <?php endforeach; ?>

            <?php
            $this->widget('CLinkPager', array(
                'pages' => $pages,
            ))
            ?>
        </div>

        <br>
<?php
echo TbHtml::pager(array(
    array('label' => 'Back', 'url' => '../site/index'),
));
?>
        <br><br>

    </div>
</div>
<?php $this->endWidget(); ?>