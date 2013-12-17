<div class="row">
		<div class="large-8 columns">
			<h4><?php echo $pname;?> ( Your Role )</h4><hr />
			<input type="hidden" id="pid" value="<?php echo $pid?>"/>
			<div class="row">
				<div class="large-6 columns">
					<div class="panel">
						<input type="text" id="key" name="key" placeholder="Search team member">
						
					</div>
				</div>
				<div class="large-3 columns left">
					<input  type="button" class ="button" id="searchbt" value="Search">
				</div>
			</div>
			<hr />
			<div class="row large-12 columns" id="show"></div>
		</div>

<script >

function conf()
{
	var str = "Do you want to invite  to your project";
    var answer = confirm(str)
    if (answer){
        document.messages.submit();
    }
    
    return false;  
} 

$("#searchbt").on("click",function(){

	key = $("#key").val();
	pid = $("#pid").val();

	/* Get result form array by json and at it it to html table*/
	$.getJSON('member/search/'+key, function(data) { 
	      var table='<center><table class="large-12 columns">';
	      /* loop over each object in the array to create rows*/
	      $.each( data, function( index, item){
	            /* add to html string started above*/
		 table+="<tr><td>"+item.NAME+"</td><td>"+item.EMAIL+"</td><td><a href='member/add/"+item.UID+"/"+pid+"' onclick='return conf();'>Invite</a></td></tr>";       
	      });
	      table+='</table></center>';
	/* insert the html string*/
	      $("#show").html( table );		
	});

	});


</script>