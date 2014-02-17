<div class="row">
<div class="large-8 columns">
	<div class="large-12 columns">
	<h4><?php echo $name;?> <br>( <?php echo $role;?> )</h4>
		<hr />
		<input type="hidden" id="pid" value="<?php echo $pid?>" />
		<div class="row">
			<div class="large-6 columns">
				<div class="panel">
					<input type="text" id="key" name="key"
						placeholder="Search team member">

				</div>
			</div>
			<div class="large-3 columns left">
				<input type="button" class="button" id="searchbt" value="Search">
			</div>
		</div>
		<div class="row large-12 columns" id="show"></div>
		<hr />
		
	</div>
	<div class="large-12 columns">
	<h3>Project Member</h3>
	
	<div class="row large-12 columns" id="member">
	
	<div id = "myproject">
			<div class="">
	<?php echo form_open('member/setRole')?>
			<table>
				
				<thead><tr><th>List</th><th>Member Name</th><th>Role</th><th>Active</th></tr></thead>
				<tbody>
				<?php
				
				if (count ( $member ) == 0) { // ตรวจสอบว่าข้อมูลถูกส่งมาหรือไหม
					echo "<tr><td colspan = '4' align='center'> -- no member --</td></tr>";
					} else {
				$no = 1;
				foreach ( $member as $mb ) {
					
					echo "<tr>";
					echo "<td align='center'>$no<input type='hidden' name='uid[]' value=".$mb['UID']." /></td>";
					echo "<td>"  .$mb['NAME'] ."</td>";
 					if ($mb['RID']==5) {
 						echo "<td>".form_label('Project Manager','role['.$mb['UID'].']')."<input type='hidden' name='pm' value=".$mb['UID']."></td>";
 					}else{
						echo "<td>".form_dropdown('role['.$mb['UID'].']', $roleOption, $mb['RID'])."</td>";
					}
					
					
					echo "<td class='small alert button'>".anchor ( "member/del/" . $mb['TID'].'/'.$mb['PID'], 'Retire'  )."</td>";
					$no++;
				}
			}
			 ?>
			
				</tbody>
				</table>
				<input type="hidden" name="pid" value="<?php echo $pid?>" />
				<input type="submit" value="Set Role" class="button" style=" float: right;"/>
			</div>	
			</div>
	
	</div>
	<?php echo form_close();?>
	</div>
</div>
	<script>

function conf()
{
	var str = "Do you want to invite  to your project";
    var answer = confirm(str)
    if (answer){
        document.messages.submit();
    }
    
    return false;  
} 
	pid = $("#pid").val();

$("#searchbt").on("click",function(){

	key = $("#key").val();	

	/* Get result form array by json and at it it to html table*/
	$.getJSON('../search/'+key, function(data) { 
	      var table='<center><table class="large-12 columns">';
	      /* loop over each object in the array to create rows*/
	      if(data!=null){
	      
	      $.each( data, function( index, item){
	            /* add to html string started above*/
	           
		 table+="<tr><td>"+item.NAME+"</td><td>"+item.EMAIL+"</td><td><a href='../add/"+item.UID+"/"+pid+"' onclick='return conf();'>Add</a></td></tr>";       
	      });
	      table+='</table></center>';
	/* insert the html string*/
	      $("#show").html( table );
	      }	else{
			var rs = '<p style="color: red;">The result about <b>'+key+'</b> Not Found!!!</p>';
			$("#show").html( rs );
		      }	
	});


	
	});

	
$.getJSON('member/memberList/'+pid, function(data) { 
    var table='<center><table class="large-12 columns">';
    /* loop over each object in the array to create rows*/
   	 $.each( data, function( index, item){
          /* add to html string started above*/
	 table+="<tr><td>"+item.NAME+"</td><td>"+item.EMAIL+"</td>";
	 table+="<td></td>";      
	 table+="<td><a href='member/add/"+item.UID+"/"+pid+"' onclick='return conf();' style='color: #fff!important;' class='small alert button'>Retire</a></td></tr>"; 
    });
    table+='</table></center>';
/* insert the html string*/
    $("#member").html( table );		

	});


</script>
