<head>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/basic.js"></script>
</head>
<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('liveclass');?>"  class="button-error pure-button">Back </a>
<?php 
if($resultstatus){ echo "<div id='result'>".$resultstatus."</div>"; }
 ?>
<form method="post" action="<?php echo site_url('liveclass/edit_class'.$class_id);?>">
<div class="formbox">
 <input type='text' name='class_name' value="<?php echo $result['class_name'];?>" placeholder="Class Name">
 
 
 <input type='text' name='start_time'  value="<?php echo date("Y/m/d H:i:s",$result['initiated_time']);?>" placeholder="Start Time ( YYYY/MM/DD HH:MM:SS  )">  
 <br><br>
 Assign to Groups: 
		<?php
		$group_counter = 1; 
		foreach($groups as $key => $group){ ?>
			<?php echo $group['group_name']; ?><input type="checkbox" name="assigned_groups[]" value="<?php echo $group['gid']; ?>" <?php if(in_array($group['gid'],$assigned_gids)){ echo "checked";} ?> > &nbsp;&nbsp;
		<?php if($group_counter%5 == 0){ echo "</br>"; } $group_counter++; }  ?>
	

 
<input type="submit" value="Submit" name="submit_class"   class="button-warning pure-button"> 

</div>
</form>
</div>

<script type="text/javascript">
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
</script>
