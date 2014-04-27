<?php $this->breadcrumbs=array(
	'Perbandingan Rekapan'=>array('compareRekapan'),
	'Hasil',
); ?>

<div class="tag-box tag-box-v3">
              <div class="headline"><h1 class="text-center">Perbandingan Rekapan</h1></div>
                    
                        
              <h3 class="text-center">Rekapan Periode Mei - Juli 2014</h3>
			  <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/graph.png" />
			  
              <p class="text-center">
					
					<table id="myHtmlTable" border="2"><tbody>
						<caption><h4>Detail</h4></caption><br>
						<tr style="background-color:#E0FFFF"><th>Regional</th><th>Result</th></tr>
						<tr>
							<td align="left">Regional Jakarta 1 - Putra</td><td>10</td>
						</tr>
						<tr>
							<td align="left">Regional Jakarta 2 - Putri</td><td>8</td>
						</tr>
						<tr>
							<td align="left">Regional Jogjakarta</td><td>15</td>
						</tr>
						<tr>
							<td align="left">Regional Bandung</td><td>12</td>
						</tr>
						</tbody>
					</table>
				
					<script type="text/javascript">
						$('#myHtmlTable').convertToFusionCharts({
							swfPath: "siaek/charts/",
							type: "MSColumn3D",
							data: "#myHtmlTable",
							dataFormat: "HTMLTable"
						});
					</script>
			  </p>
			  <?php echo CHtml::link("Back", "comparerekapan"); ?>
              <div class="row clearfix">
              <br>
              <div class="col-md-10 column">
                            
            </div>
          </div>
</div> 