<center>
<div class = "signin-box">
<h1>Sign in</h1>
<?php echo form_open('form/signin'); ?>
<?php echo form_error('email','<font color="error">');?>
<input type="text" name="email" value="" size="50" placeholder="Email Address" style="width: 230px;"/><br>
<?php echo form_error('password','<font color="error">');?>

<input type="password" name="password" value="" size="20" placeholder="Password" style="width: 230px;"/><br>

<div><input type="submit" value="Sign In" class="button signin-btn"/></div>

<div class="forgot"><a href="#">Forgot your password?</a></div>

</form>
</div>
</center>
</body>
</html>