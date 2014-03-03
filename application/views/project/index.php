	<!-- line under status -->
	<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<h4><?php echo $project;?> :: <?php echo $role;?></h4><hr />
			<?php if ($status == 'F') {
				echo '<h5 align ="center" style="color: red;">==============  This project is closed ==============</h5>';
			}?>
			<div class="row">
				<div class="large-4 columns">
						<a href="<?php echo base_url();?>member/index/<?php echo $pid;?>">
						<center><img src="<?php echo base_url()?>images/member.png" width="128" height="128" border="0" alt=""></center>
						<center><h6>Member & Role</h6></center>
						</a>
				</div>
				<div class="large-4 columns">
						<a href="<?php echo base_url();?>document/index/<?php echo $pid;?>" onclick='return check()'>
						<center><img src="<?php echo base_url()?>images/documenter.png" width="128" height="128" border="0" alt=""></center>
						<center><h6>Document</h6></center>
						</a>
				
				</div>
				<div class="large-4 columns">
						<a href="<?php echo base_url();?>plan/index/<?php echo $pid;?>">
						<center><img src="<?php echo base_url()?>images/calendarplan.png" width="128" height="128" border="0" alt=""></center>
						<center><h6>Plan</h6></center>
						</a>
				</div>
			</div>
			<hr />
			
			<div class="row">
					<div class="row">
						<div class="large-1 columns">
							&nbsp
						</div>
						<div class="large-3 columns">
							<h6>Project Detail</h6>
						</div>
						<div class="large-1 columns">
							:
						</div>
						<div class="large-7 columns">
							<?php echo $detail;?>
						</div>
					</div>
					<div class="row">
						<div class="large-1 columns">
							&nbsp
						</div>
						<div class="large-3 columns">
							<h6>Project Start</h6>
						</div>
						<div class="large-1 columns">
							:
						</div>
						<div class="large-7 columns">
							<?php echo $start;?>
						</div>
					</div>
					<div class="row">
						<div class="large-1 columns">
							&nbsp
						</div>
						<div class="large-3 columns">
							<h6>Project End</h6>
						</div>
						<div class="large-1 columns">
							:
						</div>
						<div class="large-7 columns">
							<?php echo $end;?>
						</div>
					</div>
			</div>
			
			
			<div class="row ">
					<div class="large-12 columns">
						&nbsp
					</div>
					<div class="large-12 columns">
					<?php 
					if ($pm && $status == 'N') echo anchor('project/getcloseproject/'.$pid,'<center><button class="alert">Close Project</button><center>');
					?>
					</div>
					
			</div>
			
		
		</div>

		<script type='text/javascript'>
		function check(){
		<?php if (!$chkRole) {?>
				alert('Member not found in project. \n Please add members before adding documents.');
				return false;
		<?php }else {?>
				return true;
			<?php }?>
    		
		}
		</script>
