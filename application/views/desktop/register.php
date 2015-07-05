<div id="content" class="testd"><br>
<h1><?php if($title){ echo $title; } ?></h1><br>
<?php 
if($this->session->flashdata('result')){ $result_r=$this->session->flashdata('result'); echo "<div id='result'>".$result_r."</div>"; }
 ?>
<div class="wite">
<form method="post" action="<?php echo site_url('login/register_user');?>">
	<table id="formdata">
		
		<tr>
			<td valign="top">Username</td>
			<td valign="top"><input type="text" name="username" autocomplete="off"> </td>
		</tr>
	
		<tr>
			<td valign="top">First Name</td>
			<td valign="top"><input type="text" name="first_name"> </td>
		</tr>
		<tr>
			<td valign="top">Last Name</td>
			<td valign="top"><input type="text" name="last_name"> </td>
		</tr>
		<tr>
			<td valign="top">Email</td>
			<td valign="top"><input type="text" name="user_email" autocomplete="off"> </td>
		</tr>
		<tr>
			<td valign="top">Password</td>
			<td valign="top"><input type="password" name="user_password" autocomplete="off"> </td>
		</tr>
		<tr>
			<td valign="top">Confirm Password</td>
			<td valign="top"><input type="password" name="confirm_password" autocomplete="off"> </td>
		</tr>
			<tr>
			<td valign="top">Group </td>
			<td valign="top">
			 <div class="styled-select black semi-square">	<select name="user_group">
					<?php foreach($allgroups as $key => $group){ ?>
						<option value="<?php echo $group['gid']; ?>"><?php echo $group['group_name']; ?></option>
					<?php } ?>
				</select>
				</div>
			</td>
		</tr>
		
			<td valign="top"></td><td valign="top"><input type="submit" value="Register" class="button-warning pure-button"> &nbsp; <a href="<?php echo site_url('login');?>"  >Already registered? Login now  </a>
 </td>
		</tr>
	</table>
</form>
<br>


</div>
</div>















