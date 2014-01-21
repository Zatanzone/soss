<!-- main Content -->
<div class="row">
<div class="large-8 columns">
<h4><?php echo $name;?> ( <?php echo $role;?> )</h4><hr />
<div class="row">
			<div class="large-12 columns">
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
							 <?php foreach ($member as $mb){
							 	if ($wp['TID']==$mb['TID']){
							 		echo $mb['NAME'];
							 	}
							 }?>
						</div>
						<div class="large-2 columns">
						
							 <input type="text" placeholder="1-100%" >
							
						</div>
						<div class="large-2 columns">
								<a href="<?php echo base_url()?>template/<?php echo $wp['TEMPLATE'];?>">Template</a>
						</div>
						<div class="large-2 columns">
								<a onclick="showuploadbox()">File</a>
						</div>		
				</div>
				<hr />
				<?php }
				
				if (!$checkPM) {?> 
					<center>
					<a href="" class="button success small">Save</a>
					</center>
		<?php }else{?>
			
			
			<div  id="doc-box" style="display:none;" class="large-12 columns">
					<div class="large-4 columns">
					Select Document 
					</div>
					<div class="large-4 columns">
						<select>
							<option value ="" selected>Document</option>
							<option value ="">Software Requirement Specification</option>
							<option value ="">Test case and Test procedure</option>
							<option value ="">User Document</option>
							<option value ="">Other</option>
						</select>
					</div>
					<div class="large-4 columns">
						<select>
									<option value ="" selected>Reponsibility</option>
									<option value ="">Sirakoop	Chimmee</option>
									<option value ="">Isarapong	Bulan</option>
									<option value ="">Worawan Kwundee</option>
								</select>
					</div>
					
					
					<p><a href="" class="button right small" style="margin-right:15px;">Submit</a></p>
					<p><a class="button right alert small" style="margin-right:15px;" onclick="hidedocbox()">Cancel</a></p>

					<hr />
			</div>
			<center>
			<a onclick="showdocbox()" class="button small">Add +</a>
			<a href="" class="button success small">Save</a>
			</center>
			<?php }?>
			
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