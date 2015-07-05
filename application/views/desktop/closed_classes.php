<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<?php
$logged_in=$this->session->userdata('logged_in');
?>

<table class="rwd-table" >
<tr><th>Id</th>
<th>Class name</th>
<th>Start time</th>
<th>Closed time</th>
<th>Action</th></tr>
<?php
if($result==false){
?>
<tr>
<td colspan="5">
No clossed class!
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
<td data-th="Closed Time"><?php echo date('Y/m/d H:i:s',$row['closed_time']);?></td>
<td>

<a href="<?php echo site_url('liveclass/view/'.$row['class_id']);?>"  class="button-success pure-button">View</a>
&nbsp;&nbsp;

<?php
if($logged_in['su']=="1"){
?>

<a href="javascript: if(confirm('Do you really want to remove this class?')){ window.location='<?php echo site_url('liveclass/remove_class/'.$row['class_id'] );?>'; }" class="button-error pure-button">Remove</a>
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

<a href="<?php echo site_url('liveclass/closed_classes/'.$back);?>" class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('liveclass/closed_classes/'.$next);?>" class="button-success pure-button">Next</a>

</div>
