<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
 <?php
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']=="1"){

?>
<a href="javascript:showhiddendiv('searchbox');" class="button-success pure-button">Search</a>
<a href="javascript:showhiddendiv('reportbox');" class="button-success pure-button">Report</a>
<div class="searchbox" id="reportbox">
 
<form method="post" action="<?php echo site_url('result/get_report');?>">
Generate report 
 <select name="file_format">
<option value="pdf">PDF</option>
<option value="csv">CSV</option>
</select> <select name="gid">
<option value="0">Select Group</option>
<?php foreach($group_list as $value){ ?>
<option value="<?php echo $value['gid'];?>"><?php echo $value['group_name'];?></option>
<?php } ?>
</select>  &nbsp;
 <select name="quid">
<option value="0">Select Quiz</option>
<?php foreach($quiz_list as $value){ ?>
<option value="<?php echo $value['quid'];?>"><?php echo $value['quiz_name'];?></option>
<?php } ?>
</select> 
<input type="submit" name="generate" value="Generate"  class="button-warning pure-button">

</form>
 
</div>
<?php
}
?>
<div class="searchbox" id="searchbox">
 <form method="post" action="<?php echo site_url('result');?>">
 <select name="search_type">
<option value="quiz_result.rid">ID</option>
<option value="users.username">Username</option>
<option value="users.first_name">First Name</option>
<option value="users.last_name">Last Name</option>
<option value="quiz.quiz_name">Quiz Name</option>
<option value="quiz_result.score">Score</option>
<option value="quiz_result.percentage">Percentage</option>
</select> 
<input type="text" name="search" value=""> 
<input type="submit" value="Search" class="button-warning pure-button"></form> 
</div>
 <table class="rwd-table">
<tr><th >Id</th>
<th>Username</th>
<th>First name</th>
<th>Last name</th>
<th>Quiz name</th>
<th>Score</th>
<th>Percentage</th>
<th>Result</th>
<th>Action</th></tr>
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
<td data-th="ID"><?php echo $row->rid;?></td>
<td data-th="Username"><?php echo $row->username;?></td>
<td data-th="First Name"><?php echo $row->first_name;?></td>
<td data-th="Last Name"><?php echo $row->last_name;?></td>
<td data-th="Quiz Name"><?php echo $row->quiz_name;?></td>
<td data-th="Score"><?php echo $row->score;?></td>
<td data-th="Percentage"><?php echo substr($row->percentage , 0, 5 );?>%</td>
<td data-th="Result"><?php if($row->q_result == "1"){  echo "Pass"; }else if($row->q_result == "0"){ echo "Fail"; }else{ echo "Pending"; } ?> </td>
<td data-th="Action"><a href="<?php echo site_url('result/view/'.$row->rid.'/'.$row->quid);?>" class="button-success pure-button">View</a>
<?php
if($logged_in['su']=="1" && $logged_in['id']=="1"){
?>
<a href="<?php echo site_url('result/remove_result/'.$row->rid);?>" class="button-error pure-button">Remove</a>
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
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<?php
if($logged_in['su']=="1"){
?>
<a href="<?php echo site_url('result/index/'.$back);?>"  class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('result/index/'.$next);?>"  class="button-success pure-button">Next</a>
<?php
}else{
?>
<a href="<?php echo site_url('result/user/'.$back);?>"  class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('result/user/'.$next);?>" class="button-success pure-button">Next</a>
<?php
}
?> 
</div>
