<center>
	<div class="signup-box">
		<h1>Sign Up</h1>
<?php echo form_open('form/signup'); ?>

<div class="left">
			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right inline">Email *</label>
				</div>
				<div class="small-9 columns">
					<input type="text" id="right-label" name="email"placeholder="Enter your email">
				</div>
				<?php echo form_error('email','<font color="error">');?>
			</div>

			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right inline">Password *</label>
				</div>
				<div class="small-9 columns">
					<input type="password" id="right-label" name="password"placeholder="Enter your password">
				</div>
				<?php echo form_error('password','<font color="error">');?>
			</div>

			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right inline">Name *</label>
				</div>
				<div class="small-9 columns">
					<input type="text" id="right-label" name="name"placeholder="Enter your name">
				</div>
				<?php echo form_error('name','<font color="error">');?>
			</div>
		</div>
		<div class="right">
			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right inline">Phone</label>
				</div>
				<div class="small-9 columns">
					<input type="text" id="right-label" name="phone"
						placeholder="Enter your phone number">
				</div>
			</div>

			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right inline">Avatar</label>
				</div>
				<div class="small-9 columns">
					<input type="file" id="right-label" name="avatar">
				</div>
			</div>

			<div>
				<input type="submit" value="Sign Up" class="button signin-btn" />
			</div>
		</div>
		</form>
	</div>
</center>
</body>
</html>