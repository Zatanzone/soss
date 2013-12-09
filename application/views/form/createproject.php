<center>
<div class = "createproject-box large-5 columns center" style="float:center;">
<h1>Create project</h1>
<?php echo form_open('form/createproject'); ?>
<?php echo form_error('projectname','<font color="error">');?>
	<div class="row">
 		<div class="large-3 columns">	
			<p>Project Name : </p>				
		</div>
		<div class="large-9 columns">
			<input type="text" name="projectname" value="" size="50" placeholder="Project Name" />			
		</div>
	</div>
	<div class="row">
 		<div class="large-3 columns">	
			<p>Project detail : </p>				
		</div>
		<div class="large-9 columns">
			<textarea name="projectdetail" placeholder="Enter your project detail"></textarea>			
		</div>
	</div>
	<div class="row">
 		<div class="large-3 columns">	
			<p>Member : </p>				
		</div>
		<div class="large-9 columns">
			<input type="number" name="member" value="" min="1" max="100" style="width:70px;float:left;">
			<?php echo form_error('member','<font color="error">');?>			
		</div>
	</div>
	<div class="row">
 		<div class="large-3 columns">	
			<p>Date : </p>				
		</div>
		<div class="large-4 columns">
			<input type="date" name="projectdate1">
			<?php echo form_error('projectdate1','<font color="error">');?>
		</div>
		<div class="large-1 columns">
			<p>until</p>
		</div>
		<div class="large-4 columns">
			<input type="date" name="projectdate2">
			<?php echo form_error('projectdate2','<font color="error">');?>
		</div>
		<hr />
	</div>
	<div class="row">
			<div class="large-4 columns">&nbsp</div>
 			<div class="large-2 columns" style="margin-left:-20px;">
 				<input type="submit" value="Create" class="button"/>
 			</div>
 			<div  class="large-2 columns" style="margin-left:20px;">
 				<input type="button" value="Cancel" class="button alert"/>
 			</div>
 			<div class="large-4 columns">&nbsp</div>
	</div>
</form>
</div>
</center>
</body>
</html>