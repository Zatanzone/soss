	<!-- line under status -->
	<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<h4><?php echo $project;?> :: <?php echo $role;?></h4><hr />
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
			<h4>Calendar</h4><hr />
			<img src="<?php echo base_url()?>images/picture/calendar.jpg" width="695" height="464" border="0" alt="">

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
