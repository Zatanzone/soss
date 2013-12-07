<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin9/top.css"></script>
<head>
  <meta charset="utf-8">
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
           <a href="index.html"><img src="<?php echo base_url();?>images/sos_logo_tran.png" width="120" height="40" border="0" alt=""></a>
          </h1>	  
		</li>
		<div class="icon-profile" onclick="showProfile()">
			<img src="<?php echo base_url();?>images/iUser.png" width="32" height="32" border="0" alt="">
		</div>
		<p><a href="#" onclick="showNotifications()" class="small secondary button notifications">Notifications</a></p>
	 </nav>
	 <!--icon-button & text search -->
	 <div class="search-box hide-for-small"><input type="text" id="" name="" placeholder="search"></div>
	 <div class="search-icon hide-for-small"><img src="<?php echo base_url();?>images/search-32.png" width="32" height="32" border="0" alt=""></div>
	 <!--icon-button & text search -->

	 <!-- Menu Bar Large Resolution -->
	 <!-- Menu Small Resolution -->
	 <div class="row show-for-small small-menu">
	  <div class="large-6 columns">
		<section>
			<div style="float:left;" onclick="showMenu()"><h6><a><img src="<?php echo base_url();?>images/menu-wht.png" width="25" height="auto" border="0" alt="">Notifications</a></h6></div>
			<div id="menu-small" style="display:none;">
				 <hr />
				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
  				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
  				 <li><a href="#">more</a></li>

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
	<!-- line under status -->
	<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<p><a href="#" class="button" onclick="showNewproject()">Create New Project</a></p>
			<!-- New Project Box-->
			<div id="newproject"  style="display:none;" class="" >
				<div class="panel">
					<h5>Create New Project</h5><hr />

						<h5>Project Name : </h5>
						<input type="text" id="" name="">
						<h5>Detail : </h5>
						<textarea></textarea>
						<h5>Member : </h5>
						<input type="number" id="" name=""  min="1" max="20" style="width:150px">
						<h5>Time : </h5>
						<input type="date" id="" name="" style="width:150px;float:left;margin-right:5px;">
						<input type="date" id="" name="" style="width:150px;">
						<input type="submit" class="button success" value="Create">
						<button class="alert" onclick="hideNewproject()">Cancel</button>
		
				</div>
			</div>
			<!-- New Project Box-->


		<div class="tabs_holder large-12 columns">
		<ul>
			<li class="tab_selected"><a href="#myproject">My Project</a></li>
			<li ><a href="#myteam">My Team</a></li>
			<li ><a href="#mysuccess">My Success</a></li>
		</ul>
			<div class="content_holder">
			<div id = "myproject">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Duration</th></tr></thead>
				<tbody>
				<tr>
					<td><a href="projectroom.html">1</td>
					<td><a href="projectroom.html">Project A</td>
					<td><a href="projectroom.html">4 Months</td>
				</tr>
				<tr class="alt">
					<td>2</td>
					<td>Project B</td>
					<td>1 year</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Project C</td>
					<td>6 Months</td>
				</tr>
			
				</tbody>
				</table>
			</div>	
			</div>

			<div id = "myteam">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Project Manager</th><th>Role</th></tr></thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Project Q</td>
					<td>Sirakoop</td>
					<td>Tester</td>
				</tr>
				<tr class="alt">
					<td>2</td>
					<td>Project W</td>
					<td>Worawan</td>
					<td>Test Designer</td>
				</tr>
							
				</tbody>
				</table>
			</div>	
			</div>

			<div id = "mysuccess">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Project Manager</th><th>Role</th><th>Duration</th></tr></thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Project X</td>
					<td>Wooddy</td>
					<td>Tester</td>
					<td>6 Months</td>
				</tr>
				<tr class="alt">
					<td>2</td>
					<td>Project Y</td>
					<td>Atom</td>
					<td>Test Designer</td>
					<td>2 Months</td>
				</tr>
							
				</tbody>
				</table>
			</div>	
			</div>
			
			</div>

	<!-- 		<div id="myteam">
			<div class="row">
				<div class="large-8 columns">
					<div class="panel">
						<li class="project-name"><a href="projectroom.html">Project D Portfolio Storage & Management System</a></li>
						<li class="project-name"><a href="projectroom.html">Project E Service House Long Stay</a></li>
						<li class="project-name"><a href="projectroom.html">Project F Repair Computer Online</a></li>
						<li class="project-name"><a href="projectroom.html">Project G Phuket Island Public Transportation</a></li>
					</div>
				</div>
			</div>
			</div>

			<div id="mysuccess">
			<div class="row">
				<div class="large-8 columns">
					<div class="panel">
						<li class="project-name"><a href="projectroom.html">Project X Repair Computer Online</a></li>
						<li class="project-name"><a href="projectroom.html">Project Y 02_Eim Bun Phuket</a></li>
					</div>
				</div>
			</div>
			</div>
 -->
			</div><!-- /.content_holder -->
			</div><!-- /.tabs_holder -->

			

		

	<!-- main Content -->
	<!-- Side Profile -->
		<div class="large-3 columns hide-for-small">
	
			<div><img src="<?php echo base_url();?>images/i2User.png" width="180" height="180" border="0" alt=""></div>
			<hr />
			<div class="panel">
				<h6><?php echo $this->session->userdata('user_name');?></h6>
				<p><?php echo $this->session->userdata('user_email');?></p>
				<p><a href="session/signout" class="small alert button">Sign Out</a></p>
				<hr />
				<h6><a href="newproject.html" id="" name="">New Project</a></h6>
				<h6><a href="notifications.html" id="" name="">Notifications</a></h6>

			</div>
		</div>
	</div>	
	<!-- Side Profile -->
	<!-- line under content -->
	<section class="side-knowledge">
	<div class="row">
				<div class="large-12 columns">
				<hr />
				</div>
	</div>
	</section>
	<!-- line under content -->
	
	<!-- side botton -->
	<section class="side-bottom">
	<div class="row">
		<div class="large-4 columns">	
			<div><img src="<?php echo base_url();?>images/talk-us.png" width="200" height="64" border="0" alt=""></div>
			<div><a>wor-enterprise.co,.Ltd</a></div>
			<p>PSU Phuket, Thailand<br>
                        Project Room<br>
                        1101A-1102A, Office<br>
                        Tel : +66 08 1990 48XX<br>
                        Email : sossinfo@soss.com<br>
                        80, Moo 1, Vichitsongkram Road,83120
            </p>
		</div>
		<div class="large-4 columns social">	
			<div><img src="<?php echo base_url();?>images/social-us.png" width="200" height="64" border="0" alt=""></div>
			<p>Stay connected to our social</p>

			<span><a href="#" onmouseover="changeicon(f)"><img src="<?php echo base_url();?>images/icon-social/facebook-a.png" width="32" height="32" border="0" alt=""></a></span>
	
			<span><a href="#" onmouseover="changeicon(t)"><img src="<?php echo base_url();?>images/icon-social/twitter-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(s)"><img src="<?php echo base_url();?>images/icon-social/skype-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(g)"><img src="<?php echo base_url();?>images/icon-social/google-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(y)"><img src="<?php echo base_url();?>images/icon-social/youtube-a.png" width="32" height="32" border="0" alt=""></a></span>
		</div>
		<div class="large-4 columns">	
			<img src="<?php echo base_url();?>images/sos_logo_tran.png" width="120" height="40" border="0" alt="">
			<p>Software-Operation Support System</p>
			<hr />
			<p>Email Address</p>
			<input type="email" id="" name="" placeholder="Email Address">
			<p>Message</p>
			<textarea rows="5" placeholder="Comment"></textarea>
			<input type="submit" value="submit">
		</div>
	</div>
	</section>
	<!-- side bottom -->
	<!-- Bottom bar -->
	
	<!-- Bottom bar -->
	<!-- Profile Box-->
	<div id="profile-box"  style="display:none;" class="signin-box" >
		<div>
			<span style="float:left; margin-left:10px;"><center><h6>Name:User01</h6></center></span>
			<span style="float:right; cursor:pointer;" onclick="hideProfile()"><img src="<?php echo base_url();?>images/button-cross_sticker.png" width="" height="" border="0" alt=""></span>
			<hr />
			<div style="margin-left:10px;margin-right:10px;">
			<h6><a href="main.html">Main</a></h6>
			<h6><a href="notifications.html">Notification</a></h6>
			<hr />
			<h6><a href="newproject.html">Create New Project</a></h6>
			<hr />
			
			<h6><a href="#">Help</a></h6>
			<h6><a href="#">Account Setting</a></h6>
			<hr />
			<h6><a href="#">Sigh Out</a></h6>
			</div>
			</div>
		</div>
	</div>
	<!-- Profile Box-->
	<!-- Notifications Box-->
	<div id="notifications-box"  style="display:none;" class="signin-box large-3 columns" >
		<div>
			<span style="float:left; margin-left:10px;"><center><h6>Notifications</h6></center></span>
			<span style="float:right; cursor:pointer;" onclick="hideNotifications()"><img src="<?php echo base_url();?>images/button-cross_sticker.png" width="" height="" border="0" alt=""></span>
			<hr />
			<div style="margin-left:10px;margin-right:10px;">
				<img src="<?php echo base_url();?>images/iUser.png" width="32" height="32" border="0" alt="">
				<a href="#">User02 ... at 10:00am</a>
			<hr />
				<img src="<?php echo base_url();?>images/iUser.png" width="32" height="32" border="0" alt="">
				<a href="#">User03 ... at 09:45am</a>
			<hr />
				<img src="<?php echo base_url();?>images/iUser.png" width="32" height="32" border="0" alt="">
				<a href="#">User04 ... at 09:25am</a>
			<hr />
				<center><a href="notifications.html">See All Notifications</a></center>
			</div>
			</div>
		</div>
	</div>
	<!-- Notifications Box-->

  <script>
	function showProfile() {
		document.getElementById('profile-box').style.display = "block";
	}
	function hideProfile() {
		document.getElementById('profile-box').style.display = "none";
	}
	function showNotifications() {
		document.getElementById('notifications-box').style.display = "block";
	}
	function hideNotifications() {
		document.getElementById('notifications-box').style.display = "none";
	}
	function showMenu() {
		document.getElementById('menu-small').style.display = "block";
	}
	function hideMenu() {
		document.getElementById('menu-small').style.display = "none";
	}
	function showNewproject() {
		document.getElementById('newproject').style.display = "block";
	}
	function hideNewproject() {
		document.getElementById('newproject').style.display = "none";
	}
  </script>
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://onlinehtmltools.com/tab-generator/skinable_tabs.min.js"></script>
<script type="text/javascript">
  $('.tabs_holder').skinableTabs({
    effect: 'overlapping',
    skin: 'skin9',
    position: 'top'
  });
</script>
</body>
</html>
