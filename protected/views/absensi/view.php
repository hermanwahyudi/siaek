<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs = array(
    'Absensi' => array('index'),
    $model->nama_kegiatan,
);

$this->menu = array(
);
?>

<h1>Absensi Kegiatan <?php echo $model->nama_kegiatan; ?></h1>

<div class="row clearfix">
    <div class="col-md-11 column">
        <?php
        if (Yii::app()->user->hasFlash('successEdit')){
            echo "<div style='color:green'>" . Yii::app()->user->getFlash('successEdit') . "</div>";
        }else if(Yii::app()->user->hasFlash('successTambah')){
            echo "<div style='color:green'>" . Yii::app()->user->getFlash('successTambah') . "</div>";
        }else{

        }
        ?>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <td align="left"><strong>Nama Kegiatan</strong></td><td align="left">: <?php echo $model->nama_kegiatan; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>Pembicara</strong></td><td align="left">: <?php echo $model->pembicara; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>Materi</strong></td><td align="left">: <?php echo $model->materi; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>Tanggal</strong></td><td align="left">: <?php echo $model->tanggal; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>waktu mulai</strong></td><td align="left">: <?php echo $model->waktu_mulai; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>waktu selesai</strong></td><td align="left">: <?php echo $model->waktu_selesai; ?></td>
                </tr>
            </tbody>
        </table>
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
            <h1>Daftar Peserta</h1>
            <tbody>

                <?php for ($i = 0; $i < count($absensi); $i++) {; ?>
                    <tr>
                        <td>

                            <?php echo $absensi[$i]['id_peserta']; ?>
                        </td>

                        <td>
                            <?php
                            $id_peserta = $absensi[$i]['id_peserta'];
                            $peserta = Peserta::model()->findByPk($id_peserta);
                            print_r($peserta['nama']);
                            ?>
                        </td>
                        <td >
                            <?php echo $absensi[$i]['id_status']; ?>
                        </td>

                        <td>
                            <?php echo $absensi[$i]['alasan']; ?>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo CHtml::link('Back', array('absensi/index')); ?>



