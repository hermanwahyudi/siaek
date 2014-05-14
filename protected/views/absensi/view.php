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

<h1>View Feedback <?php echo $model->nama_kegiatan; ?></h1>

<div class="row clearfix">
    <div class="col-md-11 column"> <br>
        <table class="table">
            <tbody>
                <tr>
                    <td align="left"><strong>Nama Kegiatan</strong></td><td align="left">: <?php echo $model->nama_kegiatan; ?></td>
                </tr>
                <tr>
                    <td align="left"><strong>Komentar</strong></td><td align="left">: <?php echo $model->status_isi; ?></td>
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
            <tbody>

                <?php for ($i = 0; $i < count($absensi); $i++) { ?>
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
<?php } ?>
            </tbody>
        </table>
    </div>
</div>
<p align="left">



