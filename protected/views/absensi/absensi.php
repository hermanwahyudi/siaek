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
                                                Alasan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM peserta WHERE id_regional = '" . $model->id_regional. "'";
                                        $dbCommand = Yii::app()->db->createCommand($sql);
                                        $data = $dbCommand->queryAll();
                                        
                                        
                                        ?>
                                        <?php foreach ($data as $itemPeserta): ?>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                               <?php echo $itemPeserta['id_peserta'] ?>
                                            </td>
                                            <td>
                                                <?php echo $itemPeserta['nama']; ?>
                                            </td>
                                            <td >
                                                <?php echo CHtml::activeDropDownList($absensi,'id_status', $absensi->getStatusOption(),array('class'=>'form-control')); ?>
                                            </td>
                                            
                                            <td>
                                                <textarea class="form-control" rows="1" placeholder="Message"> ket</textarea>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
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
                                