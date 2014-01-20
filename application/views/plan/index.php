<div class="row">
<div class="large-8 columns">
	<div class="large-12 columns">
	<h4><?php echo $name;?> <br>( <?php echo $role;?> )</h4>
		<hr />
		
		
	<div class="large-12 columns">
	<h3>Project Plan</h3>
	<?php echo form_open('plan/save')?>
	
		<div id="newtask"  >
				<div class="panel">
					<h5>Add task</h5><hr />
						<div class = "row">
						<input type="hidden" name="pid" id ="pid" value="<?php echo $pid;?>">
							<?php 
						
						/* 	$data = array(
									'name'        => 'username',
									'id'          => 'username',
									'value'       => '',
									'maxlength'   => '100',
									'size'        => '50',
									'style'       => 'width:50%',
							);
							
							echo form_input($data); */
							echo form_error('taskname','<font color="error">');
							echo form_label('Task Name', 'taskname',array('style'=>'color: #303030;'));
							echo form_input(array('name'=>'taskname','value'=>'','maxlength'=>'100','size'=>'50','style'=>'width:80%'))
							?>
						</div>
						<div class="row">
						<?php 
						//$string = 'Here is a string containing "quoted" text.';
			
						echo form_label('Task Description', 'taskname',array('style'=>'color: #303030;'));
						echo form_textarea(array('name'=>'description','rows'=>10,'cols'=>50,'style'=>'width:80%'))
						?>
						</div>
						<div class ="row">
						<?php 
							echo form_error('start','<font color="error">');
							echo form_error('end','<font color="error">');
							echo form_label('Duration', 'duration',array('style'=>'color: #303030;')); 
							echo form_input(array('name'=>'start','id'=>'startdate','value'=>'','size'=>'50','style'=>'width:25%; float: left;'));

							echo form_input(array('name'=>'end','id'=>'enddate','value'=>'','size'=>'50','style'=>'width:25%'));
						?>
						
						</div>
						
						<input type="submit" class="button success" value="Create">
						<button class="alert" onclick="hideNewproject()">Cancel</button>
				</div>
			</div>
		<?php echo form_close();?>
	</div>
</div>
<div>


			<table border="1" class="tableuser" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Task Name</th>
						<th>Start</th>
						<th>End</th>
						<th>Progress(%)</th>
					</tr>
				</thead>
				<tbody>
<?php
	if (count ( $task ) == 0) { 
		echo "<tr><td colspan = '4' align='center'> -- no task --</td></tr>";
	} else {
		$no = 1;
		foreach ( $task as $r ) {
			echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td>" . $r ['TASK'] . "</td>";
			echo "<td>" . $r ['STARTDATE'] . "</td>";
			echo "<td>" . $r ['ENDDATE'] . "</td>";
			//echo "<td>" . form_input(array('name'=>'taskname','value'=>$r ['PROGRESS'],'size'=>'30')) ."</td>";
			echo "<td><div id= 'progressbar'></div></td>";
			$no++;
		}
	}
	?>
	
	<script>
  $(function() {
    $( "#progressbar" ).progressbar({
      value: 37
    });
  });
  </script>
  
</tbody>
</table>
</div>
</div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
        	$dateformat = "yy-mm-dd";
        	$animated = "blind";

        	$(document).ready(function(){

				pid = $("#pid").val();
            	
    			$("#startdate").datepicker({ 	
        			
       			 	numberOfMonths: 1,
        		 	onSelect: function(selected){ 
					date = $("#startdate").val();
					res = false;
        		 		var postData = {
        		 			    "pid" : pid,
        		 			    "date" : date
        		 			};

        		 	 	$.ajax({
        		 			  type: "POST",
        		 			  url: "../checkLastTask",
        		 			  data: postData,
        		 			  success: function(res){
        		 				if(res==0){
										alert('Your start date is less than last task of project.'+'\n'+' Please seleced the other date.');
										$("#startdate").val('');
            		 				} 
        		 				}
        		 			}); 
					          		 					 		
            		$("#startdate").datepicker( "option", "dateFormat", $dateformat );    		 	            		 	
	         		$("#enddate").datepicker("option","minDate",  selected);		
        		}
    			
    		});
    			$("#enddate").datepicker({
       				numberOfMonths: 1,
       				onSelect: function(selected) {

       					date = $("#enddate").val();
    					res = false;
            		 		var postData = {
            		 			    "pid" : pid,
            		 			    "date" : date
            		 			};

            		 	 	$.ajax({
            		 			  type: "POST",
            		 			  url: "../lastDate",
            		 			  data: postData,
            		 			  success: function(res){
            		 				if(res==0){
    										alert('Your end date is more than project duration .'+'\n'+' Please seleced the other date.');
    										$("#enddate").val('');
                		 				} 
            		 				}
            		 			}); 
           				
           			$("#enddate").datepicker( "option", "dateFormat", $dateformat );	
           			$("#startdate").datepicker("option","maxDate", selected);
        		}
    		});  
		});
 </script>