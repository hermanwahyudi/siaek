<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan',
); ?>

<div class="tag-box tag-box-v3">
                       <div class="headline"> <h1 class="text-justify">Perbandingan Rekapan</h1>  </div>  
                        <div class="row clearfix">
                            <div class="col-md-6 column">
                                <h3 >Periode Awal </h3>
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

                            <div class="col-md-6 column">
                                <h3 >Periode Akhir </h3>
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

                        <div class="row clearfix">
                            <br>
                            <div class="col-md-10 column">
                                <br>
                                <br>
                                <br>
                                <p class="text-center">
                                    <button type="button" class="btn btn-alert active"><?php echo CHtml::link("Submit", array("rekapan/result")); ?></button></p>
									<?php echo CHtml::link("Back", array("site/index")); ?> 
							</div>
                        </div>
                    </div> 