<div class="row">
<div class="large-8 columns">
	<div class="large-12 columns">

	<h4><?php echo $name?> <br>( <?php echo $role?> )</h4>
		<hr />
		<input type="hidden" id="pid" value="<?php echo $pid?>" />
	</div>
	<div class="large-12 columns">
	<h3>Project Member</h3>
	<div class="row large-12 columns" id="member">
	
	<div id = "myproject">
			<div class="">
			<table>
				<thead><tr><th>List</th><th>Member Name</th><th>Role</th><th>Phone</th></tr></thead>
				<tbody>
				<?php
				if (count ( $member ) == 0) { // ตรวจสอบว่าข้อมูลถูกส่งมาหรือไหม
					echo "<tr><td colspan = '4' align='center'> -- no member --</td></tr>";
					} else {
				$no = 1;
				foreach ( $member as $mb ) {
					echo "<tr>";
					echo "<td align='center'>$no</td>";
					echo "<td>"  .$mb['NAME'] ."</td>";
					echo "<td>".$mb['ROLE']."</td>";
					echo "<td>".$mb['PHONE']."</td>";
					$no++;
				}
			}
			 ?>
			
				</tbody>
				</table>
			</div>	
			</div>
	
	</div>
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
	$.getJSON('member/search/'+key, function(data) { 
	      var table='<center><table class="large-12 columns">';
	      /* loop over each object in the array to create rows*/
	      if(data!=null){
	      
	      $.each( data, function( index, item){
	            /* add to html string started above*/
		 table+="<tr><td>"+item.NAME+"</td><td>"+item.EMAIL+"</td><td><a href='member/add/"+item.UID+"/"+pid+"' onclick='return conf();'>Invite</a></td></tr>";       
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
