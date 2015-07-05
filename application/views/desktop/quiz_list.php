<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<?php
$logged_in=$this->session->userdata('logged_in');
?>
<?php
if($logged_in['su']=="1"){
?>
<a href="<?php echo site_url('quiz/add_new');?>"  class="button-success pure-button">Add new</a>
<?php
}
?> 
<a href="javascript:showhiddendiv('searchbox');" class="button-success pure-button">Search</a>
 <div class="searchbox" id="searchbox">
 <form method="post" action="<?php echo site_url('quiz');?>">
 <select name="search_type">
<option value="quiz.quid">ID</option>
<option value="quiz.quiz_name">Quiz Name</option>
<option value="quiz.start_time">Start time</option>
<option value="quiz.end_time">End time</option>
<option value="quiz.duration">Duration</option>
</select> 
<input type="text" name="search" value=""> 
<input type="submit" value="Search" class="button-warning pure-button"></form> 
 
</div>
 <table class="rwd-table" >
<tr><th>Id</th><th>Quiz name</th><th>Start time</th><th>End time</th><th>Duration</th><th>Action</th></tr>
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
<td  data-th="Id"><?php echo $row->quid;?></td><td  data-th="Quiz Name"><?php echo $row->quiz_name;?></td>
<td data-th="Start Time"><?php echo date('Y/m/d',$row->start_time);?></td>
<td  data-th="End Time"><?php echo date('Y/m/d',$row->end_time);?></td>
<td  data-th="Duration"><?php echo $row->duration;?> Min. </td>
<td data-th="Action">
<a href="<?php echo site_url('quiz/attempt/'.$row->quid);?>"  class="button-error pure-button">Attempt</a>
&nbsp;&nbsp;
<?php
if($logged_in['su']=="1"){
?>
<a href="javascript: if(confirm('Do you really want to remove this quiz?')){ window.location='<?php echo site_url('quiz/remove_quiz/'.$row->quid );?>'; }" class="button-error pure-button">Remove</a> <a href="<?php echo site_url('quiz/edit_quiz/'.$row->quid );?>"  class="button-success pure-button">Edit</a>
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

<a href="<?php echo site_url('quiz/index/'.$back);?>" class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('quiz/index/'.$next);?>" class="button-success pure-button">Next</a>


