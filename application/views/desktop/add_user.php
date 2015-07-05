<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('user_data');?>"  class="button-error pure-button">Back </a>
<?php 
if($resultstatus){ echo "<div id='result'>".$resultstatus."</div>"; }
 ?>
<div class="formbox">
<form method="post" action="<?php echo site_url('user_data/insert_user');?>">
	<?php echo validation_errors(); ?>
			<input type="text" name="username" placeholder="Username" autocomplete="off">
		
			<input type="text" name="first_name" placeholder="First Name"> 
			<input type="text" name="last_name" placeholder="Last Name">
			
			<input type="text" name="user_email" autocomplete="off" placeholder="Email"> 
			<input type="password" name="user_password" autocomplete="off" placeholder="Password"> 
			<input type="password" name="confirm_password" autocomplete="off" placeholder="Confirm Password"> 
			<input type="hidden" name="user_credit" value="0" placeholder="Credit">
			<select name="user_group">
					<?php foreach($allgroups as $key => $group){ ?>
						<option value="<?php echo $group['gid']; ?>">Group: <?php echo $group['group_name']; ?></option>
					<?php } ?>
				</select>
				<select name="account_type">
					<option value="0">Account type: User</option>
					<option value="1">Account type: Administrator</option>
				</select>
				<input type="submit" value="Submit" class="button-warning pure-button">
</form>
</div>



</div>















