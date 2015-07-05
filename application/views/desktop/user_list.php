<div id="content" class="testd">
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('user_data/add_new');?>" class="button-success pure-button">Add new</a>
 <a href="javascript:showhiddendiv('searchbox');" class="button-success pure-button">Search</a>
 <div class="searchbox" id="searchbox">
 <form method="post" action="<?php echo site_url('user_data');?>">
  <select name="search_type">
<option value="users.id">ID</option>
<option value="users.username">Username</option>
<option value="users.first_name">First Name</option>
<option value="users.last_name">Last Name</option>
<option value="users.email">Email</option>
</select> 
<input type="text" name="search" value=""> 
<input type="submit" value="Search"  class="button-warning pure-button"></form></td></tr>
</div>
<table   class="rwd-table">
<tr><th>Id</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Action</th></tr>
<?php
if($result==false){
?>
<tr>
<td colspan="5">
No record foud!
</td>
</tr>
<?php

}else{
foreach($result as $row){
?>
<tr>
<td  data-th="ID"><?php echo $row->id;?></td>
<td  data-th="Username"><?php echo $row->username;?></td>
<td data-th="First Name"><?php echo $row->first_name;?></td>
<td  data-th="Last Name"><?php echo $row->last_name;?></td>
<td  data-th="Email"><?php echo $row->email;?></td>
<td  data-th="Action"><a href="javascript: if(confirm('Do you really want to remove this user?')){ window.location='<?php echo site_url('user_data/remove_user/'.$row->id );?>'; }" class="button-error pure-button">Remove</a> 
<a href="<?php echo site_url('user_data/edit_user/'.$row->id );?>" class="button-success pure-button">Edit</a>
<a href="<?php echo site_url('user_data/login_user_by_admin/'.$row->id );?>" class="button-success pure-button">Login</a></td>
</tr>
<?php
}
}
?>


</table>
<br>

<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('user_data/index/'.$back);?>"  class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('user_data/index/'.$next);?>"  class="button-success pure-button">Next</a>

</div>
