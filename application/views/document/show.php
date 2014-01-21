<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<h4><?php echo $name;?> ( <?php echo $role;?> )</h4><hr />
			<?php echo form_open('document/create/'.$pid.''); ?>
			<div class="row">
				<div class="large-12 columns">
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="1">  Acceptance Record 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="2">  Change Request 	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="3">  Correction Register 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="4">  Maintenance Documentation	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="5">  Meeting Record
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="6">  Product Operation Guide 	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="7">  Progress Status Record
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="8">  Project Plan  	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="9">  Project Repository 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="10">  Project Repository Backup 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="11">  Requirements Specification 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="12">  Software Components 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="13">  Software Configuration 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="14">  Software Design
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="15">  Software User Documentation 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="16">  Statement of Work 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="17">  Test Cases and Test Procedures 	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="18">  Test Report
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="19">  Traceability Record 	
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="20">  Verification Results 
						</div>
						<div class="large-6 columns">
								<input type="checkbox" name="did[]" id="did[]" value="21">  Validation Results 
						</div>
				</div>
			</div>
			<hr />
			<center><p><div><input type="submit" value="Next" class="button"/></div></p></center>
		</div>