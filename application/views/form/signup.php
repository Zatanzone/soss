<div class="row">
		<center>
		<div class="large-8 columns signup-box">
			<h1>Sign Up</h1>
			<?php echo form_open_multipart('form/signup'); ?>
				
			<div class="row">
				<div class="large-6 columns">
					<div class="small-4 columns">
						<label for="right-label" class="right inline">Email*</label>
					</div>
					<div class="large-8 columns">
						<input type="text" id="right-label" name="email"placeholder="Enter your email">
					</div>
					<?php echo form_error('email','<font color="error">');?>
					<div class="large-4 columns">
						<label for="right-label" class="right inline">Password*</label>
					</div>
					<div class="large-8 columns">
						<input type="password" id="right-label" name="password"placeholder="Enter your password">
					</div>
					<?php echo form_error('password','<font color="error">');?>
					<div class="large-4 columns">
						<label for="right-label" class="right inline">Name*</label>
					</div>
					<div class="large-8 columns">
						<input type="text" id="right-label" name="name"placeholder="Enter your name">
					</div>
					<?php echo form_error('name','<font color="error">');?>
					<div class="large-4 columns">
						<label for="right-label" class="right inline">Phone</label>
					</div>
					<div class="large-8 columns">
						<input type="text" id="right-label" name="phone"
						placeholder="Enter your phone number">
					</div>
					
				</div>
				<div class="large-6 columns">
					<div class="large-4 columns">
						<label for="right-label" class="right inline">Avatar</label>
					</div>
					<div class="large-8 columns">
						<input type="file" id="right-label" name="avatar">
					</div>
					<div class="large-12 columns">
						<input type="submit" value="Sign Up" class="button signin-btn success" />
					</div>
					<div class="large-12 columns">
						<a href="signin" class="button signin-btn">Sign In</a>
					</div>
				</div>
	
		</form>
		</div>
		</center>
</div>

</body>
</html>