<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
    '',);
?>

<!--kolom 2-->

<div class="row clearfix">
  <?php if(Yii::app()->user->getLevel() == "2") { ?>
  <!-- Menu Pengurus Pusat -->
  <div class="col-md-3 column">
    <div class="panel panel-primary">
        <div class="panel-body">
            <p class="text-center">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Feedback.png" width="100" height="100"  alt="b10" class="img-circle">
            </p>
                <a href="/siaek/feedback/index">
                    <p class="text-center">
                    Feedback  
                </p>
            </a>
        </div>
    </div>
</div>
    <div class="col-md-3 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Rekapan.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                <a href="/siaek/rekapan/index">
                    <p class="text-center">
                        Rekapan  
                    </p>
                </a>
            </div>
        </div>
    </div> 
    <div class="col-md-3 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Perbandingan Rekapan.png" width="100" height="100"  alt="b10" class="img-circle">
                    </p>
                        <a href="/siaek/rekapan/comparerekapan">
                            <p class="text-center">
                          Perbandingan Rekapan  
                      </p>
                  </a>
            </div>
      </div>
    </div>
    <div class="col-md-3 column">
        <div class="panel panel-primary">
            <div class="panel-body">
               <p class="text-center">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/deadline.png" width="100" height="100"  alt="b10" class="img-circle">
                    </p>
                        <a href="/siaek/kegiatan/deadline">
                            <p class="text-center">
                            Menentukan Deadline    
                        </p>
                    </a>
            </div>
        </div>
    </div>
    <div class="col-md-3 column">
         <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                <a href="/siaek/kegiatan/index">
                    <p class="text-center">
                        Kegiatan 
                    </p>
                </a>
             </div>
        </div>
    </div>
    <?php } else if(Yii::app()->user->getLevel() == "1") { ?>
            <!-- Menu Admin -->
    <div class="col-md-4 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                         <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pengurus.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                <a href="/siaek/user/index">
                    <p class="text-center">
                        Pengurus   
                    </p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/regional.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                <a href="/siaek/regional/index">
                    <p class="text-center">
                        Regional  
                    </p>
                </a>
            </div>
        </div>
    </div>
    
    <?php } else { ?>
    <div class="col-md-4 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                 <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/isi_absensi.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                    <a href="/siaek/absensi/index">
                        <p class="text-center">
                           Isi Absensi 
                        </p>
                    </a>
            </div>
         </div>
    </div>
    <div class="col-md-4 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/peserta_didik.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                        <a href="/siaek/peserta/index">
                            <p class="text-center">
                                Peserta Didik
                            </p>
                        </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 column">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Feedback.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                <a href="/siaek/feedback/index">
                    <p class="text-center">
                        Melihat Feedback  
                    </p>
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div><!--end row clearfix atas-->
    <div class="row clearfix">
        <div class="col-md-3 column">
            
        </div>
    </div>
    <!--end kolom 2-->


