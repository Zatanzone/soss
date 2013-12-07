<center>
<div class = "signin-box">
<h1>Sign Up</h1>
<?php echo form_open('form/signup'); ?>
<?php echo form_error('email','<font color="error">');?>
<div >
<div class="row">
        <div class="small-3 columns">
          <label for="right-label" class="right inline">Email</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="right-label" name="email" placeholder="Enter your email">
        </div>
  </div>
  
  <div class="row">
        <div class="small-3 columns">
          <label for="right-label" class="right inline">Password</label>
        </div>
        <div class="small-9 columns">
          <input type="password" id="right-label" name="password" placeholder="Enter your email">
        </div>
  </div>
  
  <div class="row">
        <div class="small-3 columns">
          <label for="right-label" class="right inline">Name</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="right-label" name="name" placeholder="Enter your email">
        </div>
  </div>
  
  <div class="row">
        <div class="small-3 columns">
          <label for="right-label" class="right inline">Phone</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="right-label" name="phone" placeholder="Enter your email">
        </div>
  </div>
  
  <div class="row">
        <div class="small-3 columns">
          <label for="right-label" class="right inline">Avatar</label>
        </div>
        <div class="small-9 columns">
          <input type="file" id="right-label" name="phone" placeholder="Enter your email">
        </div>
  </div>
  
  

<div><input type="submit" value="Sign Up" class="button signin-btn"/></div>

</form>
</div>
</center>
</body>
</html>