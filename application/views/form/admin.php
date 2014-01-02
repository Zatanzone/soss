<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>SOSsystem Administration</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/foundation.css">
<link rel="shortcut icon" href="<?php echo base_url()?>images/soss.ico" />
<link rel="stylesheet" href="<?php echo base_url();?>css/admincss.css">
<link rel="shortcut icon" href="images/soss.ico" />

</head>
<body>

<center>
<div class = "signin-box">
<h1>Administration</h1>
<h6 style="color: red;"><?php echo $this->session->flashdata('signin'); ?></h6>
<?php echo form_open('form/admin'); ?>

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