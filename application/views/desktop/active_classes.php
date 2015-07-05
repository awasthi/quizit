
<div id="content" class="testd">

<h1><?php if($title){ echo $title; } ?></h1>

<?php
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']=="1"){
?>
Live Classroom is a place where you can post live content  (text, image or any other attachments) to users of selected groups.<br>
Users can ask any question by posting comments and you (Admin) have power to publish, delete and answer that comments.
Closing any class will disable new content or comments.

<?php
}
?>
<br>
<br>

<?php
if($logged_in['su']=="1"){
?>
<a href="<?php echo site_url('liveclass/add_new');?>"  class="button-success pure-button">Initiate new class</a>
<?php
}
?>
<a href="<?php echo site_url('liveclass/closed_classes/');?>"  class="button-success pure-button">Closed classes</a>
<br><br>


 <table class="rwd-table">
<tr><th>Id</th>
<th>Class name</th>
<th>Start time</th>
<th>Action</th></tr>
<?php
if($result==false){
?>
<tr>
<td colspan="5">
No active or upcoming class!
</td>
</tr>
<?php

}else{
foreach($result as $row){
?>
<tr>
<td  data-th="Id"><?php echo $row['class_id'];?></td>
<td data-th="Class Name"><?php echo $row['class_name'];?></td>
<td data-th="Start Time"><?php echo date('Y/m/d H:i:s',$row['initiated_time']);?></td>
<td>
<?php
if($logged_in['su']=="1"){
?>
<a href="<?php echo site_url('liveclass/attempt/'.$row['class_id']);?>"  class="button-error pure-button">Post Content</a>
&nbsp;&nbsp;
<a href="<?php echo site_url('liveclass/close_class/'.$row['class_id']);?>"  class="button-error pure-button">Close Class</a>
&nbsp;&nbsp;

<?php 
}else{
?>
<a href="<?php echo site_url('liveclass/attempt/'.$row['class_id']);?>"  class="button-error pure-button">Attend</a>
&nbsp;&nbsp;

<?php
}
?>
<?php
if($logged_in['su']=="1"){
?>

<a href="javascript: if(confirm('Do you really want to remove this class?')){ window.location='<?php echo site_url('liveclass/remove_class/'.$row['class_id'] );?>'; }" class="button-error pure-button">Remove</a>
 <a href="<?php echo site_url('liveclass/edit_class/'.$row['class_id'] );?>"  class="button-success pure-button">Edit</a>
<?php
}
?>
</td>
</tr>
<?php
}
}
?>


</table> 
<br>
<?php
if($logged_in['su']=="1"){
?>

<?php
}
?>
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('liveclass/index/'.$back);?>" class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('liveclass/index/'.$next);?>" class="button-success pure-button">Next</a>

</div>
