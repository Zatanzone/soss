<div class="row">
	<div class="large-8 columns">
		<h4><?php echo $name;?> ( <?php echo $role;?> )</h4><hr />
		<?php
			echo form_open('document/setdoc');
				foreach ( $product as $pw) { ?>
		<div class="row">
		<div class="large-7 columns">
	
					<?php 
					echo "<input type='hidden' name='did[]' value=".$pw['DID']." />";
					echo  $pw['DOCUMENT'];
					?>
		</div>
		<div class="large-5 columns">
					<?php
						echo form_dropdown('tid[]', $member,null,'style="width: 240px; height: 32px; font-size: 14px"');
					?> 
						
		</div>
		</div>
				<?php } ?>		
				<hr />
				<input type="hidden" name="pid" value="<?php echo $pid?>" />
				<center><p><input type="submit" value="Save" class="button" /></p></center>
	<?php echo form_close();?>
	</div>	
	
	
	

				