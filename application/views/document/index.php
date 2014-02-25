<!-- main Content -->
<div id="fade" class="black_overlay">
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<style>
.black_overlay{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: #000;
z-index:1001;
-moz-opacity: 0.6;
opacity:.60;
filter: alpha(opacity=60);
}
.white_content {
display: none;
position: absolute;
top: 25%;
left: 70%;
width: 400px;
height: 350px;
padding: 16px;
border: 5px solid gray;
background-color: white;
z-index:1002;
overflow: auto;
}
.textright{float: right;}
</style>
<div class="row">
<div class="large-8 columns">
<h4><a href ="<?php echo base_url();?>project/index/<?php echo $pid?>"><?php echo $name;?></a> <br>( <?php echo $role;?> )</h4><hr />
<div class="row">
			<div class="large-12 columns hide-for-small">
						<div class="large-3 columns">
							 <h6>Document</h6>
						</div>
						<div class="large-3 columns">
							 <h6>Responsible</h6>
						</div>
						<div class="large-2 columns">
							 <h6>Progress</h6>
						</div>
						<div class="large-2 columns">
							 <h6>Download</h6>
						</div>
						<div class="large-2 columns">
						     <h6>Version</h6>
						</div>		
				</div>
				<?php foreach ($product as $wp){?>
				<div class="large-12 columns">
					<div class="large-3 columns">
							 <?php echo $wp['DOCUMENT'];?> 
					</div>
					<div class="large-3 columns">
							 <?php echo $wp['NAME'];?>
					</div>
					
					<?php 
						if($wp['PROGRESS']){
					?>
					
					<div class="large-2 columns">
							 <div id="progressbar<?php echo $wp['WID'];?>"></div>
							 <script>
								$(function() {
								    $( "#progressbar<?php echo $wp['WID'];?>" ).progressbar({
								      value: <?php echo $wp['PROGRESS'];?>
								    });
								  });

							</script>
					</div>
					<?php }else{?>
					<div class="large-2 columns">
							 <div id="progressbar<?php echo $wp['WID'];?>"></div>
							 <script>
							$(function() {
								    $( "#progressbar<?php echo $wp['WID'];?>" ).progressbar({
								      value: 0
								    });
								  });

							  
							</script>
					</div>
					
					<?php }?>
						
					<div class="large-2 columns">
								<a class="button small" style="background-color:grey;" href="<?php echo base_url()?>template/<?php echo $wp['TEMPLATE'];?>">Template</a>
					</div>
					
					<?php if($wp['UID'] == $this->session->userdata('user_id')){?>

					<div class="large-2 columns">
							
							<a style="width:95px !important;" class="button small showpop<?php echo $wp['WID']; ?>">Upload
							<a class="button small success showpopdon<?php echo $wp['WID']; ?>">Download</a>
							
									
					</div>
						
						<?php }else{?>
						
						
					<div class="large-2 columns">
							
								<a class="button small success showpopdon<?php echo $wp['WID']; ?>">Download</a>	
					</div>	
						<?php }?>		
						
				<center>			 
				
				
				<div id="light<?php echo $wp['WID']; ?>" class="white_content">
					<a class="hidepop<?php echo $wp['WID']; ?> textright">Close</a>
					<br>
					
					<h4><a href="#">Upload file new version</a></h4>
					<?php //echo $error;?>
					<?php echo form_open_multipart('document/do_upload');?>
						<h6><?php  echo $wp['DOCUMENT']; ?></h6>
						<input type="hidden" name="pid" value="<?php echo $pid ?>">
						<input type="hidden" name="projectname" value="<?php echo $name; ?>">
						<input type="hidden" name="docname" value="<?php  echo $wp['DOCUMENT']; ?>">
						<input type="hidden" name="docid" value="<?php echo $wp['WID']; ?>">
						<input type="file" name="docfile" size="10" accept=".pdf,.doc,.doc" />
						<center> 
							Progress<input type="number" name="progress" value = "<?php if("" == $wp['PROGRESS']){ echo 0; }else {echo $wp['PROGRESS'];}?>" 
									style="width:8em;padding:3px;margin:0;margin-top: 10px;border:1px solid #ddd;border-radius:5px;" 
									min="<?php if($wp['PROGRESS'] == ""){ echo 0; }else {echo $wp['PROGRESS'];}?>" max="100" value="0" >
						</center>
						<br /><br />
						<input type="submit" class="button small" value="upload" />
						<hr>
						
					</form>	
				</div>
				
				<div id="lightdon<?php echo $wp['WID']; ?>" class="white_content">
					<a class="hidepopdon<?php echo $wp['WID']; ?> textright">Close</a>
					<br>
						
						<h4><a>Latest version</a></h4>
						<hr>
						<?php $count = 0;
						foreach ($loadDoc as $doc){
						 if ($wp['WID'] == $doc['WID']){ 
							$count = $count+1;?>
							<a href="<?php echo base_url()?>versionupload/<?php echo $doc['FILENAME'];?>"><?php echo $doc['FILENAME']; ?></a>
							<br/>
							<center><?php echo $doc['UPLOADTIME'];?></center>
							<hr>
						<?php }
						 }
						 if ($count == 0) {
						 	echo "No lastest version";
						 }?>
					
				</div>
				
				</center>
						
				</div>
				<hr />
				<script>

							$(".showpop<?php echo $wp['WID']; ?>").click(function(){
							    $("#light<?php echo $wp['WID']; ?>").show();
								$("#fade").show(); 
							});
							
							$(".hidepop<?php echo $wp['WID']; ?>").click(function(){
								$("#light<?php echo $wp['WID']; ?>").hide();
								$("#fade").hide();
							});

							$(".showpopdon<?php echo $wp['WID']; ?>").click(function(){
								$("#lightdon<?php echo $wp['WID']; ?>").show();
								$("#fade").show(); 
							});
						
							$(".hidepopdon<?php echo $wp['WID']; ?>").click(function(){
								$("#lightdon<?php echo $wp['WID']; ?>").hide();
								$("#fade").hide();
							});			
								 
				</script>
				<?php }
				
				if (!$checkPM) {?> 
					<center>
					<!--  <a href="" class="button success small">Save</a>-->
					</center>
		<?php }else{?>
			
			<?php
				if ($docOP== null) { 
					
			} else {?>
			<div  id="doc-box" style="display:none;" class="large-12 columns">
			<?php echo form_open_multipart('document/addDoc');?>
					<div class="large-4 columns">
					Select Document 
					</div>
					<div class="large-4 columns">
					<input type="hidden" name="pid" value="<?php echo $pid ?>">
						<?php echo form_dropdown('did[]', $docOP,null,'style="width: 200px; height: 25px; font-size: 14px"');?>
					</div>
					<?php echo form_error('did','<font color="error">');?>
					<div class="large-4 columns">
						<?php echo form_dropdown('uid[]', $member,null,'style="width: 200px; height: 25px; font-size: 14px"');?>
					</div>
					<?php echo form_error('uid','<font color="error">');?>
					<p><input type="submit" class="button right small" style="margin-right:15px;" value="Submit" /></p>
					<p><a class="button right alert small" style="margin-right:15px;" onclick="hidedocbox()">Cancel</a></p>
					<hr />
					</from>
			</div>
			<center>
			<a onclick="showdocbox()" class="button">Add +</a>
			<!--  <a href="" class="button success small">Save</a> -->
			</center>
			<?php }
			}?>
			
			<script>
					function showdocbox() {
						document.getElementById('doc-box').style.display = "block";
					}
					function hidedocbox() {
						document.getElementById('doc-box').style.display = "none";
					}
			</script>
	</div>
</div>