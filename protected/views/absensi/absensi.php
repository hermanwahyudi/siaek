<?php
$this->breadcrumbs = array(
    'Isi Absensi',
);
?>
<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'kegiatan-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    
    <div class="row clearfix">
        <div class="headline"> <h1 class="text-justify">Isi Absensi</h1>  </div>
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <br>
                    <h2>
                        <u><?php echo $model->nama_kegiatan; ?></u>
                    </h2>
                    <br>

                    <br>

                    <div class="col-md-6 column">

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
<?php echo $form->textField($model, 'nama_kegiatan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Pembicara</label>
                                <div class="col-sm-6">
<?php echo $form->textField($model, 'pembicara'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Materi</label>
                                <div class="col-sm-6">
<?php echo $form->textField($model, 'materi'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Hari</label>
                                <div class="col-sm-6">
<?php echo $form->textField($model, 'hari'); ?>
                                </div>
                            </div>
                            <form>	
                                </div>

                                <div class="col-md-6 column">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Tanggal</label>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model, 'tanggal', array('class' => 'form-control datetimepicker')); ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Waktu Mulai</label>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model, 'waktu_mulai', array('class' => 'form-control')); ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Waktu Selesai</label>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model, 'waktu_selesai', array('class' => 'form-control')); ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th>
                                                NO.
                                            </th>
                                            <th>
                                                Id Peserta
                                            </th>
                                            <th>
                                                Nama
                                            </th>
                                            <th>
                                                Absensi
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
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                00000001
                                            </td>
                                            <td>
                                                Malika
                                            </td>
                                            <td >
                                                <select class="selectpicker">
                                                    <option>Hadir</option>
                                                    <option>Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td >
                                                <select class="selectpicker">
                                                    <option>H</option>
                                                    <option>TI</option>
                                                    <option>TTI</option>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="1" placeholder="Message"> ket</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                00000002
                                            </td>
                                            <td>
                                                Ani
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>Hadir</option>
                                                    <option>Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>H</option>
                                                    <option>TI</option>
                                                    <option>TTI</option>
                                                </select>
                                            </td>
                                            <td >

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                00000003
                                            </td>
                                            <td>
                                                Sarah
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>Hadir</option>
                                                    <option>Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>H</option>
                                                    <option>TI</option>
                                                    <option>TTI</option>
                                                </select>
                                            </td>
                                            <td>
                                                tidak ada
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                00000004
                                            </td>
                                            <td>
                                                Munawaroh
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>Hadir</option>
                                                    <option>Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>H</option>
                                                    <option>TI</option>
                                                    <option>TTI</option>
                                                </select>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                5
                                            </td>
                                            <td>
                                                00000005
                                            </td>
                                            <td>
                                                Munaroh
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>Hadir</option>
                                                    <option>Tidak Hadir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="selectpicker">
                                                    <option>H</option>
                                                    <option>TI</option>
                                                    <option>TTI</option>
                                                </select>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12 column">
                                        <button type="button" class="btn btn-sm btn-success">Simpan</button>
                                    </div><br><?php echo CHtml::link('Back', array('site/index')); ?>
                                </div> 
                                </div>
                                </div>
    <?php $this->endWidget(); ?>
 
    </div><!-- form -->
                                