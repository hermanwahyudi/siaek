<?php
$this->breadcrumbs = array(
     'Absensi'=>array('index'),
    'Isi Absensi',
);
?>
<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'absensi-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>


    <div class="row clearfix">
        <div class="headline"> <h1 class="text-justify">Isi Absensi</h1>  </div>
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <br>
                    <h1>
                        <?php echo $model->nama_kegiatan; ?>
                    </h1>
                    <br>

                    <br>

                    <div class="col-md-6 column">

                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'pembicara'); ?>:
                                <!--?php echo $form->textField($model, 'pembicara', array('class' => 'form-control')); ?-->
                                <?php echo $model->pembicara; ?>

                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'materi'); ?>:
                                <!--?php echo $form->textField($model, 'materi', array('class' => 'form-control')); ?-->
                                <?php echo $model->materi; ?>

                            </div>
                           <div class="form-group">
                                <?php echo $form->labelEx($model, 'jenis_kegiatan'); ?>:
                                <!--?php echo $form->textField($model, 'materi', array('class' => 'form-control')); ?-->
                                <?php echo $model->jenis_kegiatan; ?>

                            </div>
                            <form>	
                                </div>

                                <div class="col-md-6 column">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'tanggal'); ?>:
                                            <!--?php echo $form->textField($model, 'tanggal', array('class' => 'form-control datetimepicker')); ?-->
                                            <?php echo $model->tanggal; ?>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'waktu_mulai'); ?>:
                                            <!--?php echo $form->textField($model, 'waktu_mulai', array('class' => 'form-control')); ?-->
                                            <?php echo $model->waktu_mulai; ?>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'waktu_selesai'); ?>:
                                            <!--?php echo $form->textField($model, 'waktu_selesai', array('class' => 'form-control')); ?-->
                                            <?php echo $model->waktu_selesai; ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model, 'deadline'); ?>:
                                            <!--?php echo $form->textField($model, 'waktu_selesai', array('class' => 'form-control')); ?-->
                                            <?php echo $model->deadline; ?>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">

                                            <th>
                                    <p class="text-center">Nomor Peserta</p>
                                    </th>
                                    <th>
                                        Nama Peserta
                                    </th>
                                    <th>
                                        Regional
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                    <th>
                                        Alasan
                                    </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($absensi as $i => $item) {

                                            ;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php $id_peserta =$item['id_peserta'];
                                                        $peserta = Peserta::model()->findByPk($id_peserta);

                                                        echo $peserta['nomor_peserta'];?>
                                                </td>

                                                <td>
                                                    <?php 
                                                        echo $peserta['nama'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $peserta['id_regional'];
                                                    ?>
                                                </td>
                                                <td>
    <?php echo CHtml::activeDropDownList($item, "[$i]id_status", $item->getStatusOption(), array('class' => 'form-control')); ?>
                                                </td>

                                                <td>
    <?php echo CHtml::activeTextField($item, "[$i]alasan", array('class' => 'form-control')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                           <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Simpan', array( 'class'=>'btn btn-primary btn-sm' )); ?>
                                    </div>
                                    <br>
                                    <?php
                                        echo CHtml::link("Back", array("absensi/index"));
                                    ?>
                                </div> 
                                </div>
                                </div>
<?php $this->endWidget(); ?>

                                </div><!-- form -->
