
<div class="large-3 columns hide-for-small">
<div><img src="<?php echo base_url();?>/images/pic_profile/<?php echo $this->session->userdata('user_avatar');?>" width="220" height="180" border="0" alt=""></div>
<hr />
<div class="panel">
<h6><?php echo $this->session->userdata('user_name');?></h6>
				<p><?php echo $this->session->userdata('user_email');?></p>
				<p><a href="<?php echo base_url()?>session/signout" class="small alert button">Sign Out</a></p>
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
