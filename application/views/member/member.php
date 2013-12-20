<div class="row">
<div class="large-8 columns">
	<div class="large-12 columns">
		
	<h4><?php echo $pname;?> <br>( Project Manager )</h4>
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
	<div class="row large-12 columns" id="member"></div>
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
	 table+="<tr><td>"+item.NAME+"</td><td>"+item.EMAIL+"</td><td><a href='member/add/"+item.UID+"/"+pid+"' onclick='return conf();' style='color: #fff!important;' class='small alert button'>Retire</a></td></tr>";       
    });
    table+='</table></center>';
/* insert the html string*/
    $("#member").html( table );		

	});


</script>
