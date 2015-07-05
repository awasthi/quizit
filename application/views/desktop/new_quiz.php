<head>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/basic.js"></script>
</head>
<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('quiz');?>"  class="button-error pure-button">Back </a>
<?php 
if($resultstatus){ echo "<div id='result'>".$resultstatus."</div>"; }
 ?>
<form method="post" action="<?php echo site_url('quiz/add_new');?>">
  <div class="formbox" style="max-width:800px;">

 <input type='text' name='quiz_name' placeholder="Quiz Name"><br>
 Quiz Description<br>
	<textarea name="description"  placeholder=""></textarea> <br>
	 <input type='text' name='quiz_time_duration'  placeholder="Quiz Duration in minutes"> 
	 <input type='text' name='test_start_time'  placeholder="Start Time ( YYYY/MM/DD HH:MM:SS  )">  
	 <input type='text' name='test_end_time'  placeholder="End Time ( eg. 2014/10/31 23:59:59 )">
	<br><br>
	<select name="pass_percentage">
			<?php for($i = 0;$i <= 100;$i++){ ?>
				<option value="<?php echo $i;  ?>">Percentage required to pass: <?php echo $i;  ?>%</option>
			<?php } ?>
		</select>
		<br><br>Assign to Groups: 
		<?php
		$group_counter = 1; 
		foreach($groups as $key => $group){ ?>
			<?php echo $group['group_name']; ?><input type="checkbox" name="assigned_groups[]" value="<?php echo $group['gid']; ?>"> &nbsp;&nbsp;
		<?php if($group_counter%5 == 0){ echo "</br>"; } $group_counter++; }  ?>
<br><br>
Test type 
		<input type='radio' name='test_type' value='0' checked="checked" >Free
		( Credit <input type="text" name="test_charges" value="0" readonly > )
	<br><br>
	Allow to View Answer 
		<input type='radio' name='view_answer' value='1' >Yes
		<input type='radio' name='view_answer' value='0' >No 
	<br><br>
	Maximum Attempts 
	 <select name="max_attemp">
			<?php for($i = 1;$i <= 1000;$i++){ ?>
				<option value="<?php echo $i;  ?>"><?php echo $i;  ?></option>
			<?php } ?>
		</select>
		<br><br>Quiz Type <select name="qiz_type">
			
				<option value="0">Exam</option>
				<option value="1">Practice</option>
			
		</select><br><br>
 <input type='text' name='correct_answer_score' value="1"  placeholder="Correct answer score"> 
  <input type='text' name='incorrect_answer_score' value="0" placeholder="Incorrect answer score">
  <br><br>
<input type='text' name='ip_address' value=""  placeholder="Accessible to IPs (comma separated)">

		<?php 
		if($this->config->item('webcam_plugin') == false){
		?><input type="hidden" name="camera_req" value="0"> <?php
		}
		?>
	 	<br><br>
<?php
if($this->config->item('webcam_plugin')){
?>
 Capture Photo 
		<input type='radio' name='camera_req' value='1' >Yes
		<input type='radio' name='camera_req' value='0' >No 
	 
<?php
}
?>

 
</div>
  <div class="formbox" style="max-width:800px;">

Add questions
<br><br>
<div class="category_box" id="qautobtn" style='background:#2f72b7;color:#ffffff;' onClick="changetabqselection('qauto','qman','1');"><a class="tooltip" href="javascript:changetabqselection('qauto','qman','1');" id="qautobtna" style="color:#ffffff;">Automatically <span> <img class="callout" src="<?php echo base_url();?>images/callout_black.gif" /> <strong> System select questions randomly</strong><br />You just need to define category, level and number of questions you want in the quiz. </span></a></div>
<div class="category_box"  id="qmanbtn" onClick="changetabqselection('qman','qauto','0');"><a class="tooltip" href="javascript:changetabqselection('qman','qauto','0');" id="qmanbtna" style="color:#212121;">Manually <span> <img class="callout" src="<?php echo base_url();?>images/callout_black.gif" /> <strong> Select questions manually</strong><br />You have to select questions one by one from question bank. </span></a></div>
<div style="clear:both;"></div>
<br><br>
<div id="qauto">  
	 <select name="cid" id='cid'>
	<option value="0">Select Category:</option>
	<?php foreach($category as $value){ ?>
	<option value="<?php echo $value->cid; ?>"> <?php echo $value->category_name; ?></option>
	<?php } ?></select>   
 <select name="did" id='did'>
<option value="0">Select Difficult Level:</option>
	<?php foreach($difficult_level as $value){ ?>
<option value="<?php echo $value->did; ?>"> <?php echo $value->level_name; ?></option>
<?php } ?></select><br>  No. of Ques. to add in test <span id="no_of_question">
		
	</span>
 
</div>
<div id="qman" style="display:none;visibility:hidden;">
<h1> Click on 'Submit Quiz' button and you will go to question selection module.</h1>
</div>
<br>
<table id="formdata">
<tr>
<td valign="top"></td>
<td valign="top">
<input type="hidden" value="1" name="qselect" id="qselect">
<input type="submit" value="Submit Quiz" name="submit_quiz"   class="button-warning pure-button"> </td></tr>
 
</table>
</div></form>

</div>

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
