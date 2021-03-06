<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan',
); ?>

<div class="form-horizontal" role="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'rekapan-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	
<div class="tag-box tag-box-v3">
			<?php if(Yii::app()->user->hasFlash('errorPeriode')):
						echo "<div style='color:red'>".Yii::app()->user->getFlash('errorPeriode')."</div>";
					endif;
			?>
                       <div class="headline"> <h1 class="text-justify">Perbandingan Rekapan</h1>  </div>  
                        <div class="row clearfix">
                            <div class="col-md-4 column">
								
                                <h1>Bulan Awal </h1>
                                <div class="btn-group">
                                     <?php echo  CHtml::activeDropDownList($modelKegiatan, 'bulan1', $modelKegiatan->getBulan(), array('class' => 'form-control')); ?>
                                </div>
                            </div>
							<div class="col-md-4 column">
							<h1>Bulan Akhir </h1>
                               <div class="btn-group">
                                    <?php echo  CHtml::activeDropDownList($modelKegiatan, 'bulan2', $modelKegiatan->getBulan(), array('class' => 'form-control')); ?>
                               </div>
							</div>
							<div class="col-md-4 column">
							<h1>Tahun</h1>
                                <div class="btn-group">
                                    <?php echo  CHtml::activeDropDownList($modelKegiatan, 'tahun1', $modelKegiatan->getTahun(), array('class' => 'form-control')); ?>
                             
                                </div>
                           </div>
                        </div>

                        <div class="row clearfix">
                            <br>
                            <div class="col-md-11 column">
                                <br>
                                <br>
                                <br>
                                <p class="text-center">
                                    <?php echo CHtml::submitButton("Submit", array('class' => 'btn btn-default')); ?></p><br>
									<?php echo CHtml::link("Back", array("site/index")); ?> 
							</div>
                        </div>
                    </div> 
	<?php $this->endWidget(); ?>
</div>