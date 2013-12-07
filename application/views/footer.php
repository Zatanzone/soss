<!-- side botton -->
	<section class="side-bottom">
	<div class="row">
		<div class="large-4 columns">	
			<div><img src="../images/talk-us.png" width="200" height="64" border="0" alt=""></div>
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
			<div><img src="../images/social-us.png" width="200" height="64" border="0" alt=""></div>
			<p>Stay connected to our social</p>

			<span><a href="#" onmouseover="changeicon(f)"><img src="../images/icon-social/facebook-a.png" width="32" height="32" border="0" alt=""></a></span>
	
			<span><a href="#" onmouseover="changeicon(t)"><img src="../images/icon-social/twitter-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(s)"><img src="../images/icon-social/skype-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(g)"><img src="../images/icon-social/google-a.png" width="32" height="32" border="0" alt=""></a></span>

			<span><a href="#" onmouseover="changeicon(y)"><img src="../images/icon-social/youtube-a.png" width="32" height="32" border="0" alt=""></a></span>
		</div>
		<div class="large-4 columns">	
			<img src="../images/sos_logo_tran.png" width="120" height="40" border="0" alt="">
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
	<!-- Sign in Box-->
	<div id="signin-box"  style="display:none;" class="signin-box" >
		<div>
			<span style="float:left; margin-left:100px;"><center><h6>Sign in</h6></center></span>
			<span style="float:right; cursor:pointer;" onclick="hideSignin()"><img src="../images/button-cross_sticker.png" width="" height="" border="0" alt=""></span>
			<hr />
			<div style="padding-left:10px; padding-right:10px;">
			<h4>Email</h4>
			<input type="email" id="" name="" placeholder="Email Address">
			<h4>Password</h4>
			<input type="password" id="" name="" placeholder="Password">
			<a href="#">Forget Password ?</a>
			<hr />
			<span style="float:left;"><p><a href="main.html" class="button">Sign in</a></p></span>
			<span style="float:right;"><p><a href="#" class="button success" onclick="showSignup()">Sign up</a></p></span>
			
			</div>
		</div>
	</div>
	<!-- Sign in Box-->
	<!-- Sign up Box-->
	<div id="signup-box" class="large-6 columns signup-box" style="display:none;">
			<div>
				<div style="float:left; margin-left:13px"><h5>Sign Up</h5></div>
				<div style="float:right;" onclick="hideSignup()"><img src="../images/button-cross_sticker.png" width="" height="" border="0" alt=""></div>
				<hr />
			</div>
			
			<div class="large-6 columns">
				<h6>Email</h6>
				<input type="email" id="" name="" placeholder="Email Address">
				<h6>Password</h6>
				<input type="password" id="" name="" placeholder="Password">
				<h6>Confirm Password</h6>
				<input type="password" id="" name="" placeholder="Confirm Password">
			</div>
			<div class="large-6 columns">	
				<h6>Your Name</h6>
				<input type="text" id="" name="" placeholder="Your Name">
				<hr />
				<img src="../images/picture-home/profile.png" width="150" height="150" border="0" alt="">
				<input type="file" id="" name="">
				<span style="float:left;"><p><a href="#" class="button success">Sign up</a></p></span>
				<span style="margin-left:10px"><input type="reset" id="" name="" class="button alert" value="Reset"></span>
			</div>		
		</div>
	<!-- Sign up Box-->

  <script>
	function showSignin() {
		document.getElementById('signin-box').style.display = "block";
	}
	function hideSignin() {
		document.getElementById('signin-box').style.display = "none";
	}
	function showMenu() {
		document.getElementById('menu-small').style.display = "block";
	}
	function hideMenu() {
		document.getElementById('menu-small').style.display = "none";
	}
	function showSignup() {
		document.getElementById('signup-box').style.display = "block";
	}
	function hideSignup() {
		document.getElementById('signup-box').style.display = "none";
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
</body>
</html>