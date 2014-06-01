<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/html5shiv.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/p.gif">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fusioncharts.js"></script>


    <!-- Javascript Datepicker -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/datepicker.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/eye.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/utils.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/layout.js?ver=1.0.2"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/style.css"/>
    <!-- DateTimePicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.datetimepicker.css"/>

    <!-- Datepicker CSS --> 
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/date/datepicker.css" type="text/css"/>
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/date/layout.css"/>


    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);
        var jam = 0;
        var menit = 0;
        var detik = 0;
        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            jam = (tanggal.getHours() < 10) ? "0" + tanggal.getHours() : tanggal.getHours();
            menit = (tanggal.getMinutes() < 10) ? "0" + tanggal.getMinutes() : tanggal.getMinutes();
            detik = (tanggal.getSeconds() < 10) ? "0" + tanggal.getSeconds() : tanggal.getSeconds();

            document.getElementById("output").innerHTML = jam + ":" + menit + ":" + detik;
        }
    </script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">

    <div class="row clearfix">
        <div class="col-md-12 column" style="border-radius:5px;">
            <div class="page-header">
                <!--h2 class="text-center">Sistem Informasi Absensi dan Evaluasi Kegiatan</h2-->
                <div class="row">
                    <img class="col-md-12 column" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo1.jpg"
                         width="100%" height="200" alt=""/>
                </div>
            </div>

        </div>
        <?php if (!Yii::app()->user->isGuest) { ?>
            <p>
            <div class="login-as"><i>Logged in
                    as <?php echo CHtml::link(Yii::app()->user->name, array('user/profile')); ?></i> <?php echo CHtml::link('Logout', array('site/logout')); ?>
            </div></p>
        <?php } ?>
    </div>

    <div align="left">
        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'htmlOptions' => array('class' => 'breadcrumb'),
            ));
            ?><!-- breadcrumbs -->
            <br>
            <br>
        <?php endif ?></div>
    <?php if (!Yii::app()->user->isGuest) { ?>
    <!--contain-->
    <div class="row clearfix">
        <!--kolom 1-->
        <div class="col-md-2 column">
            <!--buat profil -->
            <p class="text-center"></p>

            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <p class="text-center">
                            <?php $model = User::model()->findByPk(Yii::app()->user->id); ?>

                            <img
                                src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $model->url_image; ?>"
                                width="100" height="100" alt="b10" class="img-rounded"></p>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            <?php echo CHtml::link('<h4>Profil</h4>', array('user/profile')); ?></div>
                    </div>
                </div>
            </div>
            <!--buat kalender -->
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center">Kalender</h4>

                    </div>
                    <div class="panel-body">
                        <div>

                            <div class="row">

                                <?php
                                $this->widget('ext.simple-calendar.SimpleCalendarWidget');
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center"> Waktu Server</h4>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <?php
                            $mydate = getdate(date("U"));
                            echo "<h2>$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]</h2>";
                            ?><br>

                        <h1>
                            <div id="output"></div>
                        </h1>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!--end kolom 1-->

        <!--kolom pembatas-->
        <div class="col-md-1 column">

        </div>
        <!--end kolom pembatas-->
        <div class="col-md-9 column"><br>
            <?php } ?>
            <?php echo $content; ?>

            <?php if (!Yii::app()->user->isGuest) { ?>
        </div>

    </div>
<?php } ?>
    <!--end contain-->
    <!--footer-->
    <div class="row clearfix">
        <div class="col-md-12 column">
            <footer>
                <hr>
                <h6 class="text-center">Copyright @ 2014 Propensi B10 SIAEK</h6>
                <br>
            </footer>
        </div>
    </div>
    <!--end footer-->

</div>
<!-- page -->

</body>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.datetimepicker.js"></script>

<script type="text/javascript">
    $('.datetimepicker').datetimepicker({
        timepicker: false,

    });
    $('.datetimepicker2').datetimepicker();
</script>
<script>
    jQuery('#Kegiatan_waktu_mulai').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
    jQuery('#Kegiatan_waktu_selesai').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
</script>
</html>
