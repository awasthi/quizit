<head>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/basic.js"></script>
	<script>
	function sortby(limi,cid){
window.location="<?php echo site_url();?>/qbank/index/0/"+cid;
}
	</script>
</head>
<div id="content" class="testd"><br>
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('quiz');?>"  class="button-error pure-button">Back </a>
<?php 
if($resultstatus){ echo "<div id='result' >".$resultstatus."</font></div>"; }
 ?>

<form method="post" action="<?php echo site_url('quiz/edit_quiz/'.$result->quid);?>">
  <div class="formbox" style="max-width:800px;">
 <input type='text' name='quiz_name' placeholder="Quiz Name" value="<?php echo $result->quiz_name;?>"> <br>
 <br>Quiz Description<br>
	<textarea name="description"><?php echo $result->description;?></textarea> 
	<br><br><input type='text' name='quiz_time_duration' placeholder="Quiz Duration in minutes" value="<?php echo $result->duration;?>"> <input type='text' name='test_start_time'  placeholder="Start Time ( YYYY/MM/DD HH:MM:SS  )" value="<?php echo date('Y/m/d',$result->start_time);?>">
	<input type='text' name='test_end_time'  placeholder="End Time ( eg. 2014/10/31 23:59:59 )" value="<?php echo date('Y/m/d',$result->end_time);?>"> 
	<br><br><select name="pass_percentage">
			<?php for($i = 0;$i <= 100;$i++){ ?>
				<option value="<?php echo $i;  ?>" <?php if($result->pass_percentage == $i){ echo "selected";}?> >Percentage required to pass: <?php echo $i;  ?>%</option>
			<?php } ?>
		</select><br><br>
		Assign to Groups: <?php
		$group_counter = 1; 
		foreach($groups as $key => $group){ ?>
			<?php echo $group['group_name']; ?><input type="checkbox" name="assigned_groups[]" value="<?php echo $group['gid']; ?>" <?php if(in_array($group['gid'],$assigned_gids)){ echo "checked";} ?> > &nbsp;&nbsp;
		<?php if($group_counter%5 == 0){ echo "</br>"; } $group_counter++; }  ?>
	<br><br>
		Test type: <input type='radio' name='test_type' value='0' <?php if($result->test_type == "0"){ echo "checked";}?> >Free
		( Credit <input type="text" name="test_charges" value="<?php echo $result->credit;?>" readonly > )
	<br><br>
		Allow to View Answer: <input type='radio' name='view_answer' value='1'  <?php if($result->view_answer == "1"){ echo "checked";}?> >Yes
		<input type='radio' name='view_answer' value='0'  <?php if($result->view_answer == "0"){ echo "checked";}?>>No 
	<br><br>
	Maximum Attempts: 	 <select name="max_attemp">
			<?php for($i = 1;$i <= 1000;$i++){ ?>
				<option value="<?php echo $i;  ?>" <?php if($result->max_attempts == $i){ echo "selected";}?>><?php echo $i;  ?></option>
			<?php } ?>
		</select><br><br>
		Quiz Type:  <select name="qiz_type">
			
				<option value="0" <?php if($result->pract_test == "0"){ echo "selected";}?>>Exam</option>
				<option value="1" <?php if($result->pract_test == "1"){ echo "selected";}?>>Practice</option>
			
		</select> 
	<br><br>
<input type='text' name='correct_answer_score'   placeholder="Correct answer score" value="<?php echo $result->correct_score;?>"> 
 <input type='text' name='incorrect_answer_score'   placeholder="Incorrect answer score" value="<?php echo $result->incorrect_score;?>"> 
 
		<input type='text' name='ip_address' value="<?php echo $result->ip_address;?>"  placeholder="Comma separated,  Leave empty for all IPs">  
		<?php 
		if($this->config->item('webcam_plugin') == false){
		?><input type="hidden" name="camera_req" value="0"> <?php
		}
		?>
	 
<?php
if($this->config->item('webcam_plugin')){
?>
<br><br>Capture Photo: 
		<input type='radio' name='camera_req' value='1' <?php if($result->camera_req == "1"){ echo "checked"; } ;?> >Yes
		<input type='radio' name='camera_req' value='0' <?php if($result->camera_req == "0"){ echo "checked"; } ;?>  >No 
	 
<?php
}
?>
 

 
<?php
if($result->qselect == "1"){
?><hr><br>Add questions<br><br>
 
<?php
foreach($assigned_questions as $key => $val){
?>
 Category: </td><td valign="top">
	 <select name="cid[]" >
	 
	<?php foreach($category as $value){ ?>
	<option value="<?php echo $value->cid; ?>" <?php if($val['cid']==$value->cid ){ echo "selected"; } ?> ><?php echo $value->category_name; ?></option>
	<?php } ?></select>  
 Level: 
 <select name="did[]" >
 
	<?php foreach($difficult_level as $value){ ?>
<option value="<?php echo $value->did; ?>"  <?php if($val['did']==$value->did ){ echo "selected"; } ?> ><?php echo $value->level_name; ?></option>
<?php } ?></select> 
	 No. of Question added: <select name="no_of_questions[]" style="width:60px;">
	<option value="0" >0</option>
	<option value="<?php echo $val['no_of_questions']; ?>" selected ><?php echo $val['no_of_questions']; ?></option>
	</select> 
<?php
}
?>
<br><br>
 <select name="cid[]" id='cid'>
	<option value="0">Select Category</option>
	<?php foreach($category as $value){ ?>
	<option value="<?php echo $value->cid; ?>"><?php echo $value->category_name; ?></option>
	<?php } ?></select>  
	<select name="did[]" id='did'>
<option value="0">Select Difficult Level</option>
	<?php foreach($difficult_level as $value){ ?>
<option value="<?php echo $value->did; ?>"><?php echo $value->level_name; ?></option>
<?php } ?></select>  No. of Ques to add in test <span id="no_of_question">
		
	</span>

<?php
}
?>
<br><br>
<table id="formdata">
<tr>
<td valign="top"></td>
<td valign="top">
<input type="hidden" value="<?php echo $result->qselect;?>" name="qselect" id="qselect">
<input type="submit" value="Submit Quiz" name="submit_quiz" class="button-warning pure-button"> </td></tr>

</table>
</div></form>
  <div class="formbox" style="max-width:900px;">

<?php
if($result->qselect == "0"){
?><br> <br> 
<a href="javascript:questionselection('<?php echo $result->quid;?>','<?php echo $result->quiz_name;?>','0','0');"  class="button-success pure-button">Add Questions Manually </a><br> <br> 
<?php

if($assigned_questions ==false){
?>

<?php

}else{
?>

 <table  class="rwd-table">
<tr><th>Id</th>
<th>Question</th>
<th>Category</th>
<th>Level</th>
<th>Question Type</th>
<th>Action</th>
</tr>

<?php
foreach($assigned_questions as $key=> $row){
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
<td  data-th="ID"><?php echo $key+1;?></td>
<td data-th="Question"><?php echo substr(strip_tags($row->question),"0","50");?></td>
<td data-th="Category"><?php echo $row->category_name;?></td>
<td data-th="Level"><?php echo $row->level_name;?></td>
<td data-th="Type"><?php echo $type;?></td>
<td data-th="Action"><a href="<?php echo site_url('qbank/edit_question/'.$row->qid.'/'.$row->q_type );?>" class="button-success pure-button"  target="edit_question">Edit</a>
<a href="<?php echo site_url('quiz/remove_question_quiz/'.$result->quid.'/'.$row->qid );?>"  class="button-success pure-button">Remove from Quiz</a>
<?php if($key!="0"){ ?>
<a href="javascript:cancelmove('Up','<?php echo $result->quid;?>','<?php echo $row->qid;?>','<?php echo $key+1;?>');"><img src="<?php echo base_url();?>images/up.png" title="Up"></a>
<?php }else{ ?>
<img src="<?php echo base_url();?>images/empty.png" >
<?php } 
if($key==(count($assigned_questions)-1)){
?>
<img src="<?php echo base_url();?>images/empty.png" >

<?php
}else{
?>
<a href="javascript:cancelmove('Down','<?php echo $result->quid;?>','<?php echo $row->qid;?>','<?php echo $key+1;?>');"><img src="<?php echo base_url();?>images/down.png" title="Down"></a>
<?php
}
?>

</td>
</tr>
<?php
}
?>
</table> 



<br><br>
Note: Arrange question category wise. you can use up or down icon to arrange it.
<br>
Eg. All questions of category A should be togather then category B etc..<br><br>
<b>Right Method</b><br>
1-5 question from category A then 6-10 questions from category B<br>
<br><b>Wrong Method</b></br>
1-2 questions from category A then 2-6 from category B then 7-10 again category A<br> 
<?php
}
?>

<?php
}
?>
</div>
</div>

<div id="qbank"></div>

<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b>To which position you want to move this question? </b><br><input type="text" style="width:30px" id="qposition" value=""><br><br>
<a href="javascript:cancelmove();"   class="button-success pure-button" style="cursor:pointer;">Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:movequestion();"   class="button-error pure-button" style="cursor:pointer;">Move</a>

</center>
</div>
</div>
<?php

if($qselect=="0"){
?>
<script type="text/javascript">
questionselection('<?php echo $result->quid;?>','<?php echo $result->quiz_name;?>','0','0');

</script>
<?php
}
?>

<script type="text/javascript">
	if($('#content').width() >= 350 ){
			tinyMCE.init({
	
    mode : "textareas",
		theme : "advanced",
		relative_urls:"false",
	 plugins: "jbimages",
	
  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================
	
 
	
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "jbimages,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		
		
	});
	}
</script>



<script language="javascript">
var position_type="Up";
var global_quid="0";
var global_qid="0";
var global_opos="0";

function cancelmove(position_t,quid,qid,opos){

position_type=position_t;
global_quid=quid;
global_qid=qid;
global_opos=opos;

if((document.getElementById('warning_div').style.display)=="block"){
document.getElementById('warning_div').style.display="none";
}else{
document.getElementById('warning_div').style.display="block";
if(position_type=="Up"){
var upos=parseInt(global_opos)-parseInt(1);
}else{
var upos=parseInt(global_opos)+parseInt(1);
}
document.getElementById('qposition').value=upos;

}

}


function movequestion(){

var pos=document.getElementById('qposition').value;

if(position_type=="Up"){
var npos=parseInt(global_opos)-parseInt(pos);
window.location="<?php echo site_url('quiz/up_question');?>/"+global_quid+"/"+global_qid+"/"+npos;
}else{
var npos=parseInt(pos)-parseInt(global_opos);
window.location="<?php echo site_url('quiz/down_question');?>/"+global_quid+"/"+global_qid+"/"+npos;
}
}
</script>
