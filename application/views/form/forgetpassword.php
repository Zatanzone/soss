<div class="row">
		<center>
		<div class="large-8 columns signup-box">
			<h1>Forget Password</h1>
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
					<div class="large-4 columns">
						<label for="right-label" class="right inline">Re-type Password*</label>
					</div>
					<div class="large-8 columns">
						<input type="password" id="right-label" name="passworded"placeholder="Enter your password">
					</div>
	
					
				</div>
				<div class="large-6 columns">
					<div class="large-2 columns">
						<label for="right-label" class="right inline">Key:</label>
					</div>
					<div class="large-9 columns">
						<input type="text" id="right-label" name="keynumber"placeholder="Enter your key from e-mail">
					</div>
					<div class="large-12 columns">
						&nbsp
						&nbsp
						<input type="hidden" id="right-label" name="">
					</div>
					<div class="large-12 columns">
						<a href="signin" class="button signin-btn">Submit new password</a>
					</div>
				</div>
	
		</form>
		</div>
		</center>
</div>

</body>
</html>