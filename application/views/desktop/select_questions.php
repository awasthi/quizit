<a href="javascript:closeqselection('<?php echo $quid;?>');"><img src="<?php echo base_url();?>images/close.png" style="float:right;padding:20px;" title="Close"></a>
<div id="content" class="testd">
<h1>Add question into quiz: '<?php echo urldecode($quiz_name); ?>'</h1><br>
<?php 

$assignedids=array();
foreach($assigned_questions as $key => $aqid){
$assignedids[]=$aqid->qid;
}
 ?>
 <div class="wite">
<table id="detail">
<tr><td >
<div class="styled-select black semi-square">
<select name="search_type" id="search_type">
<option value="qbank.qid">ID</option>
<option value="qbank.question">Question</option>
<option value="question_category.category_name">Category</option>
<option value="difficult_level.level_name">Level</option>
</select>
</div>
<input type="text" name="search" id="search" value=""> 
<input type="button" value="Search" class="button-warning pure-button" onClick="questionselection_search('<?php echo $quid;?>','<?php echo $quiz_name;?>','0');">
</form></td></tr>
<tr>
<td>
<div class="styled-select black semi-square"><select name="cid"  onChange="questionselection('<?php echo $quid;?>','<?php echo $quiz_name;?>','0',this.value);">
 <option value="0">Sorty by: All Categories</option>
<?php foreach($category as $value){ ?>
<option value="<?php echo $value->cid; ?>" <?php if($fcid==$value->cid){ echo 'selected';}?> ><?php echo $value->category_name; ?></option>
<?php } ?></select>
 </div>
 </td>
 </tr>
</table>
<table   class="rwd-table">
<tr><th>Id</th><th>Question</th><th>Category</th><th>Level</th><th>Question Type</th><th>Action</th></tr>
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
foreach($result as $key=> $row){
if($row->q_type=="0"){
$type="Multiple Choice - single answers";
}
if($row->q_type=="1"){
$type="Multiple Choice - multiple answers";
}
if($row->q_type=="2"){
$type="Fill in the Blank";
}
if($row->q_type=="3"){
$type="Short Answer";
}
if($row->q_type=="4"){
$type="Essay";
}
if($row->q_type=="5"){
$type="Matching";
}
?>

<tr>
<td><?php echo $row->qid;?></td><td><?php echo substr(strip_tags($row->question),"0","50");?></td><td><?php echo $row->category_name;?></td><td><?php echo $row->level_name;?></td><td><?php echo $type;?></td><td><a href="<?php echo site_url('qbank/edit_question/'.$row->qid.'/'.$row->q_type );?>" target="edit_question" class="button-success pure-button">Edit</a>
<a href="javascript:addquestion('<?php echo $quid;?>','<?php echo $row->qid;?>');qadded('add<?php echo $key;?>');"  id="add<?php echo $key;?>" class="button-error pure-button"><?php if(in_array($row->qid,$assignedids)){ echo "Added"; }else{ echo "Add"; } ?></a>

</td>
</tr>
<?php
}
}
?>


</table>
 
<br>

&nbsp;&nbsp;
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="javascript:questionselection('<?php echo $quid;?>','<?php echo $quiz_name;?>','<?php echo $back;?>','<?php echo $fcid;?>');" class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="javascript:questionselection('<?php echo $quid;?>','<?php echo $quiz_name;?>','<?php echo $next;?>','<?php echo $fcid;?>');" class="button-success pure-button">Next</a>&nbsp;&nbsp;
<a href="javascript:closeqselection('<?php echo $quid;?>');" class="button-success pure-button">Close & Go to quiz</a>
<br><br>
</div></div>
