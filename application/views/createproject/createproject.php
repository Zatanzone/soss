 <center>
<div class = "createproject-box large-6 columns center" style="float:center;">
<h1>Create project</h1>
<?php echo form_open('createproject/create'); ?>

	<div class="row">
 		<div class="large-4 columns">	
			<p>Project Name : </p>				
		</div>
		<div class="large-8 columns">
			<input type="text" name="projectname" value="" size="50" placeholder="Project Name" />			
		</div>
		<?php echo form_error('projectname','<font color="error">');?>
	</div>
	<div class="row">
 		<div class="large-4 columns" style="color: #000;">	
			<p>Project detail : </p>				
		</div>
		<div class="large-8 columns">
			<textarea name="projectdetail" placeholder="Enter your project detail"></textarea>			
		</div>
	</div>
	<div class="row">
 		<div class="large-4 columns" >	
			<p>From Date : </p>				
		</div>
		<div class="large-3 columns">
			<input type="text" id=startdate name="startdate" />
			<?php echo  form_error('startdate','<font color="error">');?>
		</div>
		<div class="large-1 columns">
			<p>to</p>
		</div>
		<div class="large-3 columns">
			<input type="text" id="enddate" name="enddate" />
			<?php echo  form_error('enddate','<font color="error">');?>
		</div>	
		
        <!--date checker javascript-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
        	$dateformat = "yy-mm-dd";
        	$animated = "blind";
        	$(document).ready(function(){
    			$("#startdate").datepicker({
       			 	numberOfMonths: 1,
        		 	onSelect: function(selected) {  	
            		$("#startdate").datepicker( "option", "dateFormat", $dateformat );        		 	            		 	
	         		$("#enddate").datepicker("option","minDate",  selected);		
        		}
    		});
    			$("#enddate").datepicker({
       				numberOfMonths: 1,
       				onSelect: function(selected) {
           			$("#enddate").datepicker( "option", "dateFormat", $dateformat );	
           			$("#startdate").datepicker("option","maxDate", selected);
        		}
    		});  
		});
        	
        </script>
        <!--date checker javascript-->
		<hr />
	</div>
	<div class="row">
 				<input type="submit" value="Create" class="button"/>
 				<a href="<?php echo base_url();?>main" class="button alert">Cancel</a>	
	</div>
</form>
</div>
</center>
</body>
</html>