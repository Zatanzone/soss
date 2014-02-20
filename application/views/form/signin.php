<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
.blackwall{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: #000;
z-index:1001;
-moz-opacity: 0.6;
opacity:.60;
filter: alpha(opacity=60);
}
.whitewall {
display: none;
position: absolute;
top: 25%;
left: 35%;
width: 370px;
height: 230px;
padding: 16px;
border: 5px solid gray;
background-color: white;
z-index:1002;
overflow: auto;
}
.textright{float: right;}
</style>
<div id="fade" class="blackwall"></div>
<div class="row">
	<center>
		<div class="large-5 columns signin-box">
		
		
			<h1>Sign in</h1>
			<h6 style="color: red;"><?php echo $this->session->flashdata('signin'); ?></h6>
			<?php echo form_open('form/signin'); ?>
			<?php echo form_error('email','<font color="error">');?>
			<input type="text" name="email" value="" size="50" placeholder="Email Address" style="width: 230px;"/><br>
			<?php echo form_error('password','<font color="error">');?>

			<input type="password" name="password" value="" size="20" placeholder="Password" style="width: 230px;"/><br>

			<div><input type="submit" value="Sign In" class="button signin-btn"/></div>

			<div class="forgot">
			
					<a class="showpop">Forgot your password?</a>
			
			</div>
			
		</div>
		</center>
</div>
</form>

<div id="light" class="whitewall">
					<a class="hidepop textright">Cancel</a>
					<br>
					<h5><a>Forget Password</a></h5>
					
<?php
			if (isset($_REQUEST['email']))
			//if "email" is filled out, send email
			  {
			  //send email
			  $to = $_REQUEST['email'] ;
			  $subject = "Forget Password From Soss Website" ;
			  $email = "soss.phuket@gmail.com" ;
			  $message = "Press link to change password form"."\r\n\r\n\n"."http://soss.netau.net/form/forgetpassword"."\r\n\r\n\n\n"."Thank You!! \n"."Soss Developer Team";
			  
			  $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n" .'X-Mailer: PHP/' . phpversion();
			  
			  mail($to, $subject, $message, $headers);
			  
			  echo '<script language="javascript">';
			  echo 'alert("Sending link:Url for change password to your Email")';
			  echo '</script>';
			  //echo "Sending link:Url for change password to your Email";
			  }
			else
			//if "email" is not filled out, display the form
			  {
			  echo "<form method='post' action=''>
			  <h6>Your Email</h6>		
			  <input name='email' type='text' >
			  <input type='submit' class='button small'>
			  </form>";
			  }
?>
				
</div>

<script>
							$(".showpop").click(function(){
							    $("#light").show();
								$("#fade").show(); 
							});
							
							$(".hidepop").click(function(){
								$("#light").hide();
								$("#fade").hide();
							});

													 
</script>

</body>
</html>