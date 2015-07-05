<script type="text/javascript" src="<?php echo base_url();?>/js/basic.js"></script>
<div id="content" class="testd"><br>
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('qbank');?>"  class="button-error pure-button">Back </a>
<?php 
if($resultstatus){ echo "<div id='result'>".$resultstatus."</div>"; }
 ?>
<div class="formbox" style="max-width:800px;">
<form method="post" action="<?php echo site_url('qbank/add_new/4');?>">
<table id="formdata">

<tr><td valign="top">Question Type</td><td valign="top">
<div class="styled-select black semi-square">
<select name="qus_type" OnChange="get_ques_type(this.value)">
<option value="0"> Multiple Choice -single answers</option>
<option value="1"> Multiple Choice -multiple answers</option>
<option value="2">Fill in the Blank</option>
<option value="3">Short Answer</option>
<option value="4" selected >Essay</option>
<option value="5">Matching</option>
</select>
</div>
 </td></tr>
<tr><td valign="top">Select Category</td><td valign="top">
<div class="styled-select black semi-square">
<select name="cid">
<?php foreach($category as $value){ ?>
<option value="<?php echo $value->cid; ?>"><?php echo $value->category_name; ?></option>
<?php } ?></select>
</div>
 </td></tr>
<tr><td valign="top">Select Difficult Level</td><td valign="top">
<div class="styled-select black semi-square">
<select name="did">
<?php foreach($difficult_level as $value){ ?>
<option value="<?php echo $value->did; ?>"><?php echo $value->level_name; ?></option>
<?php } ?></select> </div> </td></tr>
<tr><td valign="top">Question</td><td valign="top">
<textarea name="question"></textarea> </td></tr>
<tr><td valign="top">Description (Optional)<br>
Describe how question can be solved. <br>
User can see description after submitting quiz in view answer section.
</td><td valign="top">
<textarea name="description"></textarea> </td></tr>

<tr><td valign="top"></td><td valign="top">
<input type="submit" value="Submit"  class="button-warning pure-button"> </td></tr>
</table>
</form>
<br>


</div>
</div>

<script type="text/javascript">
			if($('#content').width() >= 350 ){
tinyMCE.init({
	
    mode : "textareas",
		theme : "advanced",
		relative_urls:false,
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
