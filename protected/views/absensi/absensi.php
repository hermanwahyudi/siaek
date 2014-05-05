<?php
$this->breadcrumbs = array(
    'Isi Absensi',
);
?>
<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'absensi-form',
        'enableAjaxValidation' => false,
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
                                <?php echo $form->labelEx($model,'pembicara'); ?>
                                <?php echo $form->textField($model, 'pembicara',array('class'=>'form-control')); ?>
                               
                            </div>
                            <div class="form-group">
                                 <?php echo $form->labelEx($model,'materi'); ?>
                                <?php echo $form->textField($model, 'materi',array('class'=>'form-control')); ?>
                                
                            </div>
                            <div class="form-group">
                                 <?php echo $form->labelEx($model,'hari'); ?>
                                <?php echo $form->textField($model, 'hari',array('class'=>'form-control')); ?>
                                
                            </div>
                            <form>	
                                </div>

                                <div class="col-md-6 column">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'tanggal'); ?>
                                                <?php echo $form->textField($model, 'tanggal', array('class' => 'form-control datetimepicker')); ?>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'waktu_mulai'); ?>
                                                <?php echo $form->textField($model, 'waktu_mulai', array('class' => 'form-control')); ?>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'waktu_selesai'); ?>
                                                <?php echo $form->textField($model, 'waktu_selesai', array('class' => 'form-control')); ?>
                                           
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            
                                            <th>
                                                No Peserta
                                            </th>
                                            <th>
                                                Nama Peserta
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
                                        <?php
                                        $sql = "SELECT * FROM peserta WHERE status_aktif=1 and id_regional = '" . $model->id_regional. "'";
                                        $dbCommand = Yii::app()->db->createCommand($sql);
                                        $data = $dbCommand->queryAll();
                                        
                                        
                                        ?>
                                        <?php foreach ($data as $itemPeserta): ?>
                                        <tr>
                                            <td>
                                               <?php echo $itemPeserta['nomor_peserta'] ?>
                                            </td>
                                           
                                            <td>
                                                <?php echo $itemPeserta['nama']; ?>
                                            </td>
                                            <td >
                                                <?php echo CHtml::activeDropDownList($absensi,'id_status', $absensi->getStatusOption(),array('class'=>'form-control')); ?>
                                            </td>
                                            
                                            <td>
                                                <textarea nama="absensi[$itemPeserta['id_peserta']][alasan]" class="form-control" rows="1" placeholder="Message"> ket</textarea>
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
                                