<div class="row">
<div class="large-12 columns">
	<div class="large-12 columns">
	<h4><?php echo $name;?> <br>( <?php echo $role;?> )</h4>
		<hr />
		
		
	<div class="large-12 columns">
	<h3>Project Plan</h3>
	
	<a class="button" id="addplan">Add Task</a>
	<a class="button" id="adddoc">Document Task</a>
	
	<?php echo form_open('plan/save')?>
			<div id="newtask"  >
				<div class="panel">
					<h5>Add task</h5><hr />
						<div class = "row">
						<input type="hidden" name="pid" id ="pid" value="<?php echo $pid;?>">
							<?php 
							echo form_error('taskname','<font color="error">');
							echo form_label('Task Name', 'taskname',array('style'=>'color: #303030;'));
							echo form_input(array('name'=>'taskname','value'=>'','maxlength'=>'100','size'=>'50','style'=>'width:80%'))
							?>
						</div>
						<div class="row">
						<?php 
						//$string = 'Here is a string containing "quoted" text.';
			
						echo form_label('Task Description', 'taskname',array('style'=>'color: #303030;'));
						echo form_textarea(array('name'=>'description','rows'=>10,'cols'=>50,'style'=>'width:80%'));
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
						
						<div class="row">
						<?php 
						echo form_label('	Responsible', 'member',array('style'=>'color: #303030;'));
						echo form_dropdown('member', $memberoption,null,'style="width: 240px; height: 32px; font-size: 14px"');?>
						
						</div>
						
						<input type="submit" class="button success" value="Create">
						<button class="alert" onclick="hideNewproject()">Cancel</button>
				</div>
			</div>
		<?php echo form_close();?>
	
		<div id="doctask">
				<div class="panel">
				<h5>Document Task</h5>
				<div class ="row">	
				<?php echo form_open('plan/savedoc')?>
					<input type="hidden" name="pid" id ="pid" value="<?php echo $pid;?>">
					<?php 
					echo form_label('	Select Document', 'doc',array('style'=>'color: #303030;'));
					echo form_dropdown('doc', $docoption,null,'style="width: 240px; height: 32px; font-size: 14px"');
					echo form_label('Duration', 'duration',array('style'=>'color: #303030;'));
					echo form_input(array('name'=>'startdoc','id'=>'docstartdate','value'=>'','size'=>'50','style'=>'width:25%; float: left;'));
					echo form_input(array('name'=>'enddoc','id'=>'docenddate','value'=>'','size'=>'50','style'=>'width:25%'));
					?>
				</div>
				<input type="submit" class="button success" value="Save">		
				<?php echo form_close();?>
				<button class="alert" id="canceldoc">Cancel</button>
				
				</div>
		</div>
		
	</div>
</div>

	<?php echo anchor ( "plan/show/" . $pid, "Plan",array('class' => 'button','style'=>'float: right') );?>
	
<div>
			<table border="1" class="tableuser" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Task Name</th>
						<th>Start</th>
						<th>End</th>
						<th>Progress(%)</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
<?php
	if (count ( $task ) == 0) { 
		echo "<tr><td colspan = '4' align='center'> -- no task --</td></tr>";
	} else {
		$no = 1;
		
		foreach ( $task as $r ) {
			echo "<tr  >";
			echo "<td width='2%' align='center'>$no</td>";
			echo "<td width='*'>" . $r ['TASK'] . "</td>";
			echo "<td width='15%'>" .$r ['STARTDATE']. "</td>";
			echo "<td width='15%'>" .$r ['ENDDATE']. "</td>";
			echo "<td width='10%'>" .$r ['PROGRESS'] ."</td>";
			echo "<td>" . anchor ( "plan/edit/" . $r ['PLID'], "Edit" ) . "</td>";
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
<input type="hidden" name="num" id ="num" value="<?php echo $no-1;?>">
</div>
</div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>

  		
  		
        	$dateformat = "yy-mm-dd";
        	$animated = "blind";
			
        	$(document).ready(function(){

        		$('#canceldoc').click(function(){
      		
      				$('#doctask').css("display","none");
      	  			});
        	
            		$("#addplan").click( function(){
						$('#newtask').css("display","none");
					});

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

				$("#docstartdate").datepicker({ 	
        			
       			 	numberOfMonths: 1,
        		 	onSelect: function(selected){ 
					date = $("#docstartdate").val();
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
										$("#docstartdate").val('');
            		 				} 
        		 				}
        		 			}); 
					          		 					 		
            		$("#docstartdate").datepicker( "option", "dateFormat", $dateformat );    		 	            		 	
	         		$("#docenddate").datepicker("option","minDate",  selected);		
        		}
    			
    		});
    			$("#docenddate").datepicker({
       				numberOfMonths: 1,
       				onSelect: function(selected) {

       					date = $("#docenddate").val();
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
    										$("#docenddate").val('');
                		 				} 
            		 				}
            		 			}); 
           				
           			$("#docenddate").datepicker( "option", "dateFormat", $dateformat );	
           			$("#docstartdate").datepicker("option","maxDate", selected);
        		}
    		});  
			num = $("#num").val();
			for(var i=1;i<=num;i++){
					$("#editstartdate"+i).datepicker({ 	
        			
       			 	numberOfMonths: 1,
        		 	onSelect: function(selected){ 
						date = $("#editstartdate"+i).val();
            			$("#editstartdate"+i).datepicker( "option", "dateFormat", $dateformat );    		 	            		 	
	         			$("#editenddate"+i).datepicker("option","minDate",  date);		
        			}
    				});
    				
					$("#editenddate"+i).datepicker({ 	
	       			 	numberOfMonths: 1,
	        		 	onSelect: function(selected){ 
							date = $("#editenddate"+i).val();
	            			$("#editenddate"+i).datepicker( "option", "dateFormat", $dateformat );    		 	            		 	
		         			$("#editstartdate"+i).datepicker("option","maxDate",  selected);		
	        			}
	    				});
    				
				}
			
        		
		});
 </script>