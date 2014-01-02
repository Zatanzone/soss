


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

			<div class="forgot"><a href="#" style="display: none;">Forgot your password?</a></div>
			
		</div>
		</center>
</div>



</form>

</body>
</html>