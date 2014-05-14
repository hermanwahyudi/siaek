<?php $this->breadcrumbs=array(
	'Lihat Rekapan',
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
                       <div class="headline"> <h1 class="text-justify">Lihat Rekapan</h1>  </div>  
                        <div class="row clearfix">
                            <div class="col-md-6 column">
								<h1>Bulan</h1>
                                <div class="btn-group">
                                    <?php echo  CHtml::activeDropDownList($model, 'bulan', $model->getBulan(), array('class' => 'form-control')); ?>
                                </div>
                            </div>
							<div class="col-md-6 column">
							<h1>Tahun</h1>
                                <div class="btn-group">
                                    <?php echo CHtml::activeDropDownList($model, 'tahun', $model->getTahun(), array('class' => 'form-control')); ?>
                                </div>
							</div>
                        </div>
                        <div class="row clearfix">
                            <br>
                            <div class="col-md-13 column">
                                <br>
									<p class="text-center"><?php echo CHtml::submitButton('Export to PDF', array('class' => 'btn btn-default')); ?></p>
									<br>	
									<?php echo CHtml::link('Back', array('site/index')); ?>
									
						   </div>
                        </div>
                    </div> 
	<?php $this->endWidget(); ?>
				
	</div><!-- form -->