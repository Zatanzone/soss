<div class="row">
<div class="large-8 columns">
	<div class="large-12 columns">
	<h4><?php echo $name;?> <br>( <?php echo $role;?> )</h4>
		<hr />
		<input type="hidden" id="pid" value="<?php echo $pid?>" />
		
	<div class="large-12 columns">
	<h3>Project Plan</h3>
	<?php echo form_open('')?>
		<div id="newtask"  >
				<div class="panel">
					<h5>Add task</h5><hr />
						<div class = "row">
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
							echo form_label('Duration', 'duration',array('style'=>'color: #303030;')); 
							echo form_input(array('name'=>'start','value'=>'','size'=>'50','style'=>'width:25%; float: left;'));

							echo form_input(array('name'=>'end','value'=>'','size'=>'50','style'=>'width:25%'));
						?>
						
						</div>
						
						<input type="submit" class="button success" value="Create">
						<button class="alert" onclick="hideNewproject()">Cancel</button>
				</div>
			</div>
		<?php echo form_close();?>
	</div>
</div>
</div>
