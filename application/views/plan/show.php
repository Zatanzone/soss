<div class="row">
<div class="large-12 columns">
	<div class="large-12 columns">
	
	<h4 style="float: left;"><a href ="<?php echo base_url();?>project/index/<?php echo $pid?>"><?php echo $name;?></a> <br>( <?php echo $role;?> )</h4>
		<?php if ($pm) 
			echo anchor ( "plan/index/" . $pid, "List",array('class' => 'button','style'=>'float: right; margin-top: 20px; margin-bottom: 0px;') );
			?>
	<hr />

	<div class="large-12 columns" style="overflow: auto;">
	
	
			<div>	
			<h3 style="float: left;">Project Plan</h3>
		</div>

	<?php 
		if($task==null){
			echo '<h4 align ="center">===========  No Task ============</h4>';
			echo '<h4 align ="center">Please, Wait your PM add Task for Project plan</h4>';
		}else{
	?>
		
		
		<table width = "80%">
		<thead>
			<th rows ="2" width = "30%">Task Name</th>
			<th  align = "center" width = "70%" colspan = "<?php echo $projectDura;?>">Durations</th>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<?php 
				$strNewDate =  date('Y-m-d',strtotime($projectSdate));
					
				for($th=0;$th<$projectDura;$th++){
					
				
				//$sunOrsat = date ("Y-m-d", strtotime("-1 day", strtotime($strNewDate)));
				$calendar = date ("d", strtotime($strNewDate));
				
				$check = date("w", strtotime($strNewDate));
				if ($check ==0 || $check == 6) {
					echo '<td class = "tdplan"style="background-color: #c2c2c2; " >'.($calendar).'</td>';
				}else 				
				echo '<td class = "tdplan" >'.($calendar).'</td>';
				$strNewDate = date ("Y-m-d", strtotime("+1 day", strtotime($strNewDate)));
				} 	

				echo '</tr>';

				$start = 0;
				$i=0;
				$dura = 0;

			
			foreach ($task as $tk){

				echo '<tr>';

				echo '<td width = "30%">'.$tk['TASK'].'</td>';

				$taskStart =  date('Y-m-d',strtotime($tk['STARTDATE']));
				//echo $taskStart;
				$strNewDate2 =  date('Y-m-d',strtotime($projectSdate));
				$dura = $dura+($tk['duration']+1);
				for($th=0;$th<$projectDura;$th++){
					$calendar = date ("d", strtotime($strNewDate2));
						if ($taskStart == $strNewDate2) {
							 if ($i<$dura) {
								$check = date("w", strtotime($strNewDate2));
								if ($check ==0 || $check == 6) {
									echo '<td class = "tdplan" style="background-color: #c2c2c2; " ></td>';
									$taskStart = date ("Y-m-d", strtotime("+1 day", strtotime($taskStart)));
									$i++;
								}else
								{ 
								$title = $tk['TASK'];
								$title = $title.'  Duration : '.$tk['STARTDATE'];
								$title =$title.'  --  '.$tk['ENDDATE'];
									if ($tk['PROGRESS'] ==0) {
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: #000; "  ></td>';
									}
									elseif ($tk['PROGRESS'] < 25) {
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: #8A0868; "  ></td>';
									}
									elseif ($tk['PROGRESS'] > 25 && $tk['PROGRESS'] < 50){
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: red; "  ></td>';
									}elseif ($tk['PROGRESS'] > 50 && $tk['PROGRESS'] < 75){
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: #FF8000; "  ></td>';
									}elseif ($tk['PROGRESS'] > 75 && $tk['PROGRESS'] < 100){
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: #FFFF00; "  ></td>';
									}elseif ($tk['PROGRESS'] ==100){
										echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: #01DF01; "  ></td>';
									}
								$taskStart = date ("Y-m-d", strtotime("+1 day", strtotime($taskStart)));
								$i++;
								}
							}			
						}else{
						echo '<td></td>';

						}
					$strNewDate2 = date ("Y-m-d", strtotime("+1 day", strtotime($strNewDate2)));
				}
				
				echo '</tr>';
			}
			}?>
		</tbody>
		</table>
	</div>
</div>