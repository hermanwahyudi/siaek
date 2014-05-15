<?php
$this->breadcrumbs = array(
    'Tambah Absensi',
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
        <div class="headline">
            <h1 class="text-justify">
                Isi Absensi
            </h1>
        </div>
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <br>
                    <h1>
                        <?php echo $model->nama_kegiatan; ?>
                    </h1>
                    <div class="col-md-6 column">

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'nama_kegiatan'); ?>
                                <?php echo $form->textField($model, 'nama_kegiatan', array('class' => 'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'pembicara'); ?>
                                <?php echo $form->textField($model, 'pembicara', array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'materi'); ?>
                                <?php echo $form->textField($model, 'materi', array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'hari'); ?>
                                <?php echo $form->textField($model, 'hari', array('class' => 'form-control')); ?>
                            </div>
                        <form>	
                    </div>
                    <div class="col-md-6 column">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'id_kegiatan'); ?>
                                <?php echo $form->textField($model, 'id_kegiatan', array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'tanggal'); ?>
                                <?php echo $form->textField($model, 'tanggal', array('class' => 'form-control datetimepicker')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'waktu_mulai'); ?>
                                <?php echo $form->textField($model, 'waktu_mulai', array('class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'waktu_selesai'); ?>
                                <?php echo $form->textField($model, 'waktu_selesai', array('class' => 'form-control')); ?>
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
                                    Keterangan
                                </th>
                                <th>
                                    Alasan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($absensi as $i=>$item) { ?>
                            <tr>
                                <td>
                                   
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    <?php echo CHtml::activeDropDownList($item, "id_status", $item->getStatusOption(), array('class' => 'form-control')); ?>
                                </td>
                                <td>
                                    <?php echo CHtml::activeTextArea($item, 'alasan');?>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <button>Save</button>
                </div>
                <br>
                <?php
                    echo TbHtml::pager(array(
                    array('label' => 'Back', 'url' => '../site/index'),
                    ));
                ?>
            </div> 
       </div>
    </div>
<?php $this->endWidget(); ?>
</div>
