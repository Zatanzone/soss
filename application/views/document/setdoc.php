<div class="row">
	<div class="large-8 columns">
		<h4><?php echo $name;?> ( <?php echo $role;?> )</h4><hr />
		<?php
			echo form_open('document/setMemberToDoc');
				foreach ( $product as $pw) { ?>
		<div class="row">
		<div class="large-7 columns">
	
					<?php 
					echo "<input type='hidden' name='did[]' value=".$pw['DID']." />";
					echo  $pw['DOCUMENT'];
					?>
		</div>
		<div class="large-5 columns">
					<select name='tid[]'>
									<option value ="" selected>Choose (1st)</option>
									<?php 
									foreach ( $member as $mb){
									echo "<option value =".$mb['TID'].">".$mb['NAME']."</option>";
									}
									?>
					</select>
		</div>
		</div>
				<?php } ?>		
				<hr />
				<input type="hidden" name="pid" value="<?php echo $pid?>" />
				<center><p><input type="submit" value="Save" class="button" /></p></center>
	<?php echo form_close();?>
	</div>	
	
	
	

				