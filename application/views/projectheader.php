<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin9/top.css"></script>
<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.0.3.js"></script>
  <meta name="viewport" content="width=device-width">
  <title>SOSsystem</title>

  <link rel="stylesheet" href="<?php echo base_url();?>css/foundation.css">
  
  
  <script src="js/vendor/custom.modernizr.js"></script>
</head>
<body>
	<!-- Menu Bar Large Resolution -->
	<nav class="top-bar">
      
        <li class="name">
          <h1>
            <?php if ("" == $this->session->userdata('user_id')){?>
            <a href="<?php echo base_url();?>index"><img src="<?php echo base_url();?>images/sos_logo_tran.png" width="120" height="40" border="0" alt=""></a>
           <?php }else {?>
           <a href="<?php echo base_url();?>main/index"><img src="<?php echo base_url();?>images/sos_logo_tran.png" width="120" height="40" border="0" alt=""></a>
           <?php }?>
          </h1>	  
		</li>
		<div class="icon-profile" >
			<a href="<?php echo base_url();?>main"><img src="<?php echo base_url();?>images/home_w.png" width="32" height="32" border="0" alt=""></a>
		</div>
		
	 </nav>
	

	 <!-- Menu Bar Large Resolution -->
	 <!-- Menu Small Resolution -->
	 <div class="row show-for-small small-menu">
	  <div class="large-6 columns">
		<section>
			<div style="float:left;" onclick="showMenu()"><h6><a><img src="<?php echo base_url();?>images/menu-wht.png" width="25" height="auto" border="0" alt="">Notifications</a></h6></div>
			<div id="menu-small" style="display: none;">
					<hr />
					<li><a href="index">HOME</a></li>
					<hr />
					<li><a href="guide">GUIDE</a></li>
					<hr />
					<li><a href="knowledge">KNOWLEDGE</a></li>
					<hr />
					<li><a href="contactus">CONTACT</a></li>
					<hr />
					<li><a href="contactus">SIGN UP</a></li>
					<hr />

				<center><div style="cursor:pointer;" onclick="hideMenu()"><img src="<?php echo base_url();?>images/arrow-up-01-16.png" width="24" height="24" border="0" alt="">
				</div></center>
			</div>
		</section>
	   </div>
	  </div>
	  <!-- Menu Small Resolution -->
	 
	<!-- line under status -->
	<section class="carousel-line">
		<div class="row">
			<div class="large-12 columns">	
			<hr />
			</div>	
		</div>
	</section>

		


		