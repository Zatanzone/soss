
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>SOSsystem</title>

<link rel="stylesheet" href="<?php echo base_url()?>css/foundation.css">
<link rel="shortcut icon" href="<?php echo base_url()?>images/soss.ico" />

<script src="js/vendor/custom.modernizr.js"></script>
</head>
<body>
<!-- Menu Bar Large Resolution -->
<nav class="top-bar">
<ul>
<li class="name">
<h1>
<a href="<?php echo base_url()?>index"><img src="<?php echo base_url()?>images/sos_logo_tran.png"
						width="100%" height="40" border="0" alt=""></a>
						</h1>
						</li>
						</ul>
						<ul class="Menu-top hide-for-small">
						<a href="<?php echo base_url()?>index">HOME</a>
						<a href="<?php echo base_url()?>guide">GUIDE</a>
						<a href="<?php echo base_url()?>knowledge">KNOWLEDGE</a>
						<a href="<?php echo base_url()?>contactus">CONTACT</a>
						<a href="<?php echo base_url()?>form/signup">SIGN UP</a>
						</ul>


						</nav>
						<!-- Menu Bar Large Resolution -->
						<!-- Menu Small Resolution -->
						<div class="row show-for-small small-menu">
						<div class="large-6 columns">
						<section>
						<div style="float: left;" onclick="showMenu()">
						<h6>
						<a><img src="<?php echo base_url()?>images/menu-wht.png" width="25" height="auto"
								border="0" alt="">Menu</a>
								</h6>
								</div>
										<div id="menu-small" style="display: none;">
										<hr />
										<li><a href="<?php echo base_url()?>index">HOME</a></li>
										<hr />
										<li><a href="<?php echo base_url()?>guide">GUIDE</a></li>
												<hr />
												<li><a href="<?php echo base_url()?>knowledge">KNOWLEDGE</a></li>
												<hr />
												<li><a href="<?php echo base_url()?>contactus">CONTACT</a></li>
												<hr />
												<li><a href="<?php echo base_url()?>contactus">SIGN UP</a></li>
					<hr />
						
					<center>
						<div style="cursor: pointer;" onclick="hideMenu()">
						<img src="<?php echo base_url()?>images/arrow-up-01-16.png" width="24" height="24"
								border="0" alt="">
						</div>
	
					</center>
				</div>
			</section>
		</div>
	</div>
	<script>
				function showMenu() {
					document.getElementById('menu-small').style.display = "block";
				}
				function hideMenu() {
					document.getElementById('menu-small').style.display = "none";
				}
  	</script>