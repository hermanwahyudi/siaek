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
  <div class="row clearfix">
  <div class="col-md-3 column">
    <a href="/siaek/feedback/index">
    <div class="panel panel-primary">
        <div class="panel-body">
            <p class="text-center">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Feedback.png" width="100" height="100"  alt="b10" class="img-circle">
            </p>
                
                    <p class="text-center">
                    Feedback  
                </p>
           
        </div>
    </div>
     </a>
</div>
    <div class="col-md-3 column">
         <a href="/siaek/rekapan/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Rekapan.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
          
                    <p class="text-center">
                        Rekapan  
                    </p>
          
            </div>
        </div>
        <a>
    </div> 
    <div class="col-md-3 column">
        <a href="/siaek/rekapan/comparerekapan">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Perbandingan Rekapan.png" width="100" height="100"  alt="b10" class="img-circle">
                    </p>
                        
                            <p class="text-center">
                          Perbandingan Rekapan  
                      </p>
                  
            </div>
      </div>
  </a>
    </div>
    <div class="col-md-3 column">
        <a href="/siaek/kegiatan/deadline">
        <div class="panel panel-primary">
            <div class="panel-body">
               <p class="text-center">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/deadline.png" width="100" height="100"  alt="b10" class="img-circle">
                    </p>
                        
                            <p class="text-center">
                            Menentukan Deadline    
                        </p>
                    
            </div>
        </div>
        </a>
    </div>
      </div>
  <div class="row clearfix">
    <div class="col-md-3 column">
        <a href="/siaek/kegiatan/index">
         <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/kegiatan.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                
                    <p class="text-center">
                        Kegiatan 
                    </p>
                
             </div>
        </div>
    </a>
    </div>
      <div class="col-md-3 column">
        <a href="/siaek/absensi/index">
          <div class="panel panel-primary">
              <div class="panel-body">
                  <p class="text-center">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/isi_absensi.png" width="100" height="100"  alt="b10" class="img-circle">
                  </p>
                  
                      <p class="text-center">
                          Isi Absensi
                      </p>
                  
              </div>
          </div>
          </a>
      </div>
      </div>
    <?php } else if(Yii::app()->user->getLevel() == "1") { ?>
            <!-- Menu Admin -->
    <div class="col-md-4 column">
        <a href="/siaek/user/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                         <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pengurus.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                
                    <p class="text-center">
                        Pengurus   
                    </p>
                
            </div>
        </div>
        </a>
    </div>
    <div class="col-md-4 column">
        <a href="/siaek/regional/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/regional.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                
                    <p class="text-center">
                        Regional  
                    </p>
                
            </div>
        </div>
        </a>
    </div>
    
    <?php } else { ?>
    <div class="col-md-4 column">
        <a href="/siaek/absensi/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                 <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/isi_absensi.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                    
                        <p class="text-center">
                           Isi Absensi
                        </p>
                    
            </div>
         </div>
         </a>
    </div>
    <div class="col-md-4 column">
        <a href="/siaek/peserta/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/peserta_didik.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                        
                            <p class="text-center">
                                Peserta Didik
                            </p>
                        
            </div>
        </div>
        </a>
    </div>
    <div class="col-md-4 column">
        <a href="/siaek/feedback/index">
        <div class="panel panel-primary">
            <div class="panel-body">
                <p class="text-center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Feedback.png" width="100" height="100"  alt="b10" class="img-circle">
                </p>
                
                    <p class="text-center">
                        Melihat Feedback
                    </p>
                
            </div>
        </div>
        </a>
    </div>
    <?php } ?>
</div><!--end row clearfix atas-->
    <div class="row clearfix">
        <div class="col-md-3 column">
            
        </div>
    </div>
    <!--end kolom 2-->


