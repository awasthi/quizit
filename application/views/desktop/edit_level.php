<div id="content" class="testd"><br>
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('difficultlevel');?>"  class="button-error pure-button">Back</a>
<?php 
if($resultstatus){ echo "<div id='result' style='text-align:center ;><font color='#fff' size='4'>".$resultstatus."</font></div>"; }
 ?>
<div class="formbox">
<form method="post" action="<?php echo site_url('difficultlevel/update_level/'.$did);?>">
	<table id="formdata">
		<tr>
			<td valign="top" colspan="2"><!-- form validation errors -->
			 <?php echo validation_errors(); ?>
			 </td>
		</tr>
		<tr>
			<td valign="top">Level Name</td>
			<td valign="top"><input type="text" name="levelname" value="<?php echo $level['level_name']; ?>"> </td>
		</tr>
	
		
		<tr>
			<td valign="top"></td><td valign="top"><input type="submit" value="Submit" class="button-warning pure-button"> </td>
		</tr>
	</table>
</form></div>
<br>



</div>















