	<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<h4><?php echo $project;?> :: <?php echo $role;?></h4><hr />
			<div class="large-12 columns">
						<div class="large-3 columns"><h6> Project Start  </h6></div>
						<div class="large-9 columns"> <?php echo $start;?></div>
			</div>
			<div class="large-12 columns">
						<div class="large-3 columns"><h6> Project End  </h6></div>
						<div class="large-9 columns"> <?php echo $end;?></div>
			</div>
			<div class="large-12 columns">
						<div class="large-3 columns"><h6> Project Task</h6></div>
						<div class="large-3 columns"> <?php echo $counttask.'  tasks';?></div>
						<div class="large-3 columns"> <?php echo 'Finished  : '.$finished;?></div>
						<div class="large-3 columns"> <?php echo 'None-Finish : '.$nonFinished;?></div>
			</div>
			<div class="large-12 columns">
						<div class="large-3 columns"><h6> Project Document</h6></div>
						<div class="large-3 columns"> <?php echo $countDoc.'  tasks';?></div>
						<div class="large-3 columns"> <?php echo 'Finished  : '.$docfinished;?></div>
						<div class="large-3 columns"> <?php echo 'None-Finish : '.$docnonFinished;?></div>
			</div>
			
			<div class="large-12 columns">
						<div style="float: right;">
						<?php echo form_open('project/confirmclose')?>
						<?php echo  form_hidden('pid',$pid)?>
						<input type="submit" value="Close Project" class="button signin-btn" style="width: 150px;"/>	
						<a href="<?php echo base_url('project/index/'.$pid)?>" class="button alert" style="border-radius: 5px;">Cancel</a>
						<?php echo form_close();?>
						</div>
				</div>

			</div>
		
		