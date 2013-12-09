<center>
<div class = "createproject-box">
<h1>Create project</h1>
<?php echo form_open('form/createproject'); ?>

<input type="text" name="projectname" value="" size="50" placeholder="Project Name" style="width: 230px;"/><br>

<input type="text" name="detail" value="" size="50" placeholder="Enter project detail : " style="width: 230px;"/><br>

<input type="number" name="member" value="" min="1" max="100">

<input type="date" name="projectdate">

<div><input type="submit" value="Create" class="button success small"/></div>



</form>
</div>
</center>
</body>
</html>