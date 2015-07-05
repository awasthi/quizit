<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<?php if($logged_in['su'] =="1"){ ?>
<a href="<?php echo site_url('user_data');?>" class="button-error pure-button">Back</a>
<?php } ?>
<?php 
if($resultstatus){ echo "<div id='result' style='text-align:center ;> <font color='#fff' size='4'>".$resultstatus."</font></div>"; }
 ?>
<div class="formbox">
<form method="post" action="<?php echo site_url('user_data/update_user/'.$user_id);?>">
<!-- form validation errors -->
			 <?php echo validation_errors(); ?>
<input type="text" name="username" placeholder="Username" value="<?php echo $user['username']; ?>" <?php	if($su=="0"){ echo "readonly='readonly'"; }?> > </td>
<input type="text" name="first_name" placeholder="First Name" value="<?php echo $user['first_name']; ?>"> </td>
	<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $user['last_name']; ?>"> </td>

		<input type="text" name="user_email" placeholder="Email" value="<?php echo $user['email']; ?>"  <?php	if($su=="0"){ echo "readonly='readonly'"; }?> > 
	<input type="password" name="user_password" placeholder="Password (Optional)" autocomplete="off" > 
			<input type="password" name="confirm_password" placeholder="Confirm Password (Optional)" autocomplete="off">
			
	<input type="hidden" name="user_credit"  placeholder="Credit" value="0"  <?php	if($su=="0"){ echo "readonly='readonly'"; }?> >

		<select name="user_group">
					<?php foreach($allgroups as $key => $group){ ?>
						<?php if($su=="1"){ ?>						
						<option <?php if($user['gid'] == $group['gid']){ echo "selected"; } ?> value="<?php echo $group['gid']; ?>">Group: <?php echo $group['group_name']; ?></option>
						<?php }else{ 
						if($user['gid'] == $group['gid']){
						?>
						<option value="<?php echo $group['gid']; ?>">Group: <?php echo $group['group_name']; ?></option>
						<?php 
							}
						 } 
						 ?>
						
					<?php } ?>
				</select>
		<?php
		if($su=="1"){
		?>
			<select name="account_type">
					<option <?php if($user['su'] == "0"){ echo "selected"; } ?> value="0">Account type: User</option>
					<option <?php if($user['su'] == "1"){ echo "selected"; } ?> value="1">Account type: Administrator</option>
				</select>
		<?php
		}
		?>
	<input type="submit" value="Submit" class="button-warning pure-button"> 
		<br><br>
			

</form>
</div>





</div>













<div id="show_payu_div" style="background:#ffffff;position:fixed;display:none;visibility:hidden;top:70px;right:40%;border:5px solid #666666; padding:20px;width:200px;height:280px;">
<a href="javascript:hidebox();" style="float:right;font-size:10px;">Close</a>
<div><b>Buy Credit</b><br> Amount equal to credit<br><br>Mandatory Fields<br><br>

<form method="post" action="<?php echo site_url('payment_gateway/index/PayU/'.$user['id']);?>"  onSubmit="return checkfields();">
Amount <br> <input type="text" value="50" name="credit" >
<br><br>
Mobile number<br><input type="text" name="phone" id="phone" style="width:120px;" value="">  <br><br>
<input type="submit" value="Next">

</form>
</div>
</div>





<script>
function showbox(){
document.getElementById('show_payu_div').style.display="block";
document.getElementById('show_payu_div').style.visibility="visible";
}

function hidebox(){
document.getElementById('show_payu_div').style.display="none";
document.getElementById('show_payu_div').style.visibility="hidden";
}

<?php
 if($this->session->userdata('package')){
 $this->session->unset_userdata('package');
 ?>
 showbox();
 <?php
 }
 ?>
 
</script>
<script>



</script>







