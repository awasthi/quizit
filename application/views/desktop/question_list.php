<script>
function removeqids(){
document.getElementById('removeqids').submit();
}
var selstatus="0";
function selectall(noq){

for(var i=1; i <= noq; i++){
var che="checkbox"+i;
if(selstatus=="0"){
document.getElementById(che).checked=true;
}else{
document.getElementById(che).checked=false;
}
}

	if(selstatus=="0"){
	selstatus="1";
	}else if(selstatus=="1"){
	selstatus="0";
	}
}


function sortby(limi,cid){
window.location="<?php echo site_url();?>/qbank/index/0/"+cid;
}
</script>
<div id="content" class="testd">
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('qbank/add_new');?>" class="button-success pure-button">Add new</a>
<a href="javascript:showhiddendiv('searchbox');" class="button-success pure-button">Search</a>
<?php 
if($resultstatus){ echo "<div id='result'>".$resultstatus."</div>"; }
 ?>
 <div class="searchbox" id="searchbox">
<form method="post" action="<?php echo site_url('qbank');?>">
<select name="search_type">
<option value="qbank.qid">ID</option>
<option value="qbank.question">Question</option>
<option value="question_category.category_name">Category</option>
<option value="difficult_level.level_name">Level</option>
</select>

<input type="text" name="search" value=""> 
<input type="submit" value="Search" class="button-warning pure-button">


<select name="cid"  onChange="sortby('<?php echo $limit;?>',this.value);">
 <option value="0">Sorty by: All Categories</option>
<?php foreach($category as $value){ ?>
<option value="<?php echo $value->cid; ?>" <?php if($fcid==$value->cid){ echo 'selected';}?> ><?php echo $value->category_name; ?></option>
<?php } ?></select>
 </form>
 </div>

<form method="post" action="<?php echo site_url('qbank/remove_qids/'.$limit);?>" id="removeqids">
<table  class="rwd-table">

<tr><th><input type="checkbox" name=""  onClick="selectall('<?php echo count($result);?>');"></th><th>Id</th><th>Question</th><th>Category</th><th>Level</th><th>Question Type</th><th>Action</th></tr>

<?php
if($result==false){
?>
<tr>
<td colspan="7">
No record foud!
</td>
</tr>
<?php

}else{
$j=0;
foreach($result as $row){
$j+=1;
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
<td data-th="Select"><input type="checkbox" name="qid[]" value="<?php echo $row->qid;?>" id="checkbox<?php echo $j;?>"></td>
<td data-th="ID"><?php echo $row->qid;?></td>
<td data-th="Question"><?php echo substr(strip_tags($row->question),"0","20");?></td>
<td data-th="Category"><?php echo $row->category_name;?></td>
<td data-th="Level"><?php echo $row->level_name;?></td>
<td data-th="Type"><?php echo $type;?></td>
<td data-th="Action"><a href="javascript: if(confirm('Do you really want to remove this question?')){ window.location='<?php echo site_url('qbank/remove_question/'.$row->qid );?>'; }" class="button-error pure-button">Remove</a>  <a href="<?php echo site_url('qbank/edit_question/'.$row->qid.'/'.$row->q_type );?>" class="button-success pure-button">Edit</a></td>
</tr>
<?php
}
}
?>


</table></form>

<br>
<a href="javascript:removeqids();" class="button-error pure-button">Remove</a> 
&nbsp;&nbsp;
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('qbank/index/'.$back.'/'.$fcid);?>" class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('qbank/index/'.$next.'/'.$fcid);?>" class="button-success pure-button">Next</a>
&nbsp;&nbsp;
<a href="javascript:showhiddendiv('importbox');" class="button-success pure-button">Import</a>
<br><br><div class="searchbox" id="importbox">
<?php echo form_open('qbank/import',array('enctype'=>'multipart/form-data')); ?>
 <h1>Import Question</h1> <select name="cid">
 <option value="0">Select Category</option>
<?php foreach($category as $value){ ?>
<option value="<?php echo $value->cid; ?>"><?php echo $value->category_name; ?></option>
<?php } ?></select>
 <select name="did">
 <option value="0">Select level</option>
<?php foreach($difficult_level as $value){ ?>
<option value="<?php echo $value->did; ?>"><?php echo $value->level_name; ?></option>
<?php } ?></select> 

Upload Excel file ( .xls only )
	<input type="hidden" name="size" value="3500000">
	<input type="file" name="xlsfile" >
	<input type="submit" value="Import" class="button-warning pure-button"></form><br>
	
<a href="<?php echo base_url();?>xls/sample.xls" target="new">Click here</a> to download sample file to know file format.
</div><br><br>


</div>
