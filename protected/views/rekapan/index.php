<div class="form-horizontal" role="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'absensi-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	
 <div class="tag-box tag-box-v3">
                       <div class="headline"> <h1 class="text-justify">Lihat Rekapan</h1>  </div>  
                        <div class="row clearfix">
                            <div class="col-md-11 column">
                                <h3 class="text-center" >Pilih Periode </h3>
                                <div class="text-center">
                                <div class="btn-group">
                                    <select class="form-control">
                                        <option value="one">Januari</option>
                                        <option value="two">Februari</option>
                                        <option value="three">Maret</option>
                                        <option value="four">April</option>
                                        <option value="five">Mei</option>
                                        <option value="one">Juni</option>
                                        <option value="two">Juli</option>
                                        <option value="three">Agustus</option>
                                        <option value="four">September</option>
                                        <option value="five">Oktober</option>
                                        <option value="four">November</option>
                                        <option value="five">Desember</option>
                                    </select>
                                </div>
                                    
                                <div class="btn-group">
                                    <select class="form-control">
                                        <option value="1">2013</option>
                                        <option value="2">2014</option>
                                    </select>
                                </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <br>
                            <div class="col-md-11 column">
                                <br>
                                
                                <p class="text-center">
                                    <button type="button" class="btn btn-alert active"><a href="HasilUI.html">Export to PDF</a></button></p>
									 <?php echo CHtml::link("Back", array("site/index")); ?> 
						   </div>
                        </div>
                    </div> 
	<?php $this->endWidget(); ?>
				
	</div><!-- form -->