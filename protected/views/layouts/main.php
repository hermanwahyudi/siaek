<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/date/datepicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/date/layout.css" />
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/style.css" />
	
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/p.gif">
	 
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js" ></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fusioncharts.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.js"></script>
	
	<!-- Javascript Datepicker -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/datepicker.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/eye.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/utils.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/date/layout.js?ver=1.0.2"></script>
    <?php Yii::app()->bootstrap->register(); ?>

	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">

	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
					<!--h2 class="text-center">Sistem Informasi Absensi dan Evaluasi Kegiatan</h2-->
                    <p class="text-center">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo1.jpg" width="1140" height="200" alt="" />
					 </p>
			</div>
			
		</div>
		<?php if(!Yii::app()->user->isGuest) { ?>
				<p><div class="login-as"><i>Logged in as <?php echo CHtml::link(Yii::app()->user->name, array('user/view', 'id' => Yii::app()->user->id)); ?></i> <?php echo CHtml::link('Logout', array('site/logout')); ?></div></p>
			<?php }?>
	</div>

	
	<!--?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<!--?php endif?-->
	<?php if(!Yii::app()->user->isGuest) { ?>
	<!--contain-->
            <div class="row clearfix">
                <!--kolom 1-->
                <div class="col-md-2 column">
                    <!--buat profil -->
                    <p class="text-center"></p>
                    <div class ="row">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <p class="text-center">
									<?php $model = User::model()->findByPk(Yii::app()->user->id); ?>
									
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $model->url_image; ?>" width="100" height="100"  alt="b10" class="img-rounded"></p>
                            </div>
                            <div class="panel-body">
                                <div class="alert alert-info">
                                    <?php echo CHtml::link('<h4>Profile</h4>',array('user/profile', 'id'=> Yii::app()->user->id)); ?></div>
                            </div>
                        </div>
                    </div>
                    <!--buat kalender -->
                    <div class ="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="text-center">Kalender</h4>

                            </div>
                            <div class="panel-body">
                                <?php
                                    $this->widget('ext.simple-calendar.SimpleCalendarWidget');
                                ?> 
                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="text-center"> Waktu Server</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-center">
                                    Senin, 16 April 2014
                                    <br>11:55 am
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
	
	<?php if(!Yii::app()->user->isGuest) { ?>
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

</div><!-- page -->

</body>
</html>
