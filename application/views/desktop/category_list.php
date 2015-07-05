<div id="content" class="testd"> 
<h1><?php if($title){ echo $title; } ?></h1><br>
<a href="<?php echo site_url('category_controller/add_new');?>"  class="button-success pure-button">Add new</a>
 <br><br>
 <table class="rwd-table" >
<tr><th>Id</th><th>Category</th><th>Action</th></tr>
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
<td data-th="Id"><?php echo $row->cid;?></td>
<td data-th="Category Name"><?php echo $row->category_name;?></td>
<td data-th="Action"><a href="javascript: if(confirm('Do you really want to remove this category?')){ window.location='<?php echo site_url('category_controller/remove_category/'.$row->cid );?>'; }"  class="button-error pure-button">Remove</a> <a href="<?php echo site_url('category_controller/edit_category/'.$row->cid );?>"  class="button-success pure-button">Edit</a></td>
</tr>
<?php
}
}
?>


</table> 
<br>

<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('category_controller/index/'.$back);?>"   class="button-success pure-button">Back</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('category_controller/index/'.$next);?>"   class="button-success pure-button">Next</a>
 
</div>
