<div class="row">
<div class="large-12 columns">
	<div class="large-12 columns">
	
	<h4><?php echo $name;?> <br>( <?php echo $role;?> )</h4>
		<hr />

		
	<div class="large-12 columns">
	<h3>Project Plan</h3>
	
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
				//$strNewDate2 =  date('Y-m-d',strtotime($projectSdate));
			
			foreach ($task as $tk){
				//$strNewDate2 =  date('Y-m-d',strtotime($projectSdate));
				echo '<tr>';

				echo '<td width = "30%">'.$tk['TASK'].'</td>';
				
				//$taskStart = $tk['STARTDATE'];
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
									//$title = $tk['TASK'].'<br> Start at : '.$tk['STARTDATE'].'<br> End at : '.$tk['ENDDATE'];
									$title = $tk['TASK'];
									$title = $title.'  Duration : '.$tk['STARTDATE'];
									$title =$title.'  --  '.$tk['ENDDATE'];
								echo '<td class = "tdplan"  Title = "'.$title.'" style="background-color: red; " ></td>';
								$taskStart = date ("Y-m-d", strtotime("+1 day", strtotime($taskStart)));
								$i++;
								}
							}			
						}else{
						echo '<td></td>';
						//$taskStart = date ("Y-m-d", strtotime("+1 day", strtotime($taskStart)));
						}
					$strNewDate2 = date ("Y-m-d", strtotime("+1 day", strtotime($strNewDate2)));
				}
				
				
				/* $taskStartDate =  date('Y-m-d',strtotime($tk['STARTDATE']));
				$taskEndDate =  date('Y-m-d',strtotime($tk['ENDDATE']));
				$dura = $tk['duration'];
				while (strtotime($taskStartDate) <= strtotime($taskEndDate)) {
					$WorkDay = date("w", strtotime($taskStartDate));
					if($WorkDay == 0 || $WorkDay ==6){
						$dura++;
					}
					$taskStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($taskStartDate)));
				}
				
			//	$strDate = date ("Y-m-d", strtotime("+1 day", strtotime($tk['STARTDATE'])));
				if ($start==0) {
					if($i<$dura);{			
						echo '<td colspan="'.$dura.'" style="background-color: red;"></td>';
						$i=$dura;
					}
					//echo $i;
					$start =$i;
					 while ($i<$projectDura) {
						echo '<td>'.$i.'</td>';
						$i++;
					}  
				}else{
					$x = 0;
					while ($x<$start) {
						echo '<td></td>';
						$x++;
					}
	
					if($i<($start+$dura));{
						echo '<td colspan = "'.$dura.'"style="background-color: red; width: 3px;"></td>';
						$x=($start+$dura);
					}
					
					$start =$x;
					while ($x<$projectDura) {
						echo '<td></td>';
						$x++;
					} 
					
				}
				
				 */
				echo '</tr>';
			}
			?>
		</tbody>
		</table>
	</div>
</div>