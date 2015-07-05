<div class="homed" style="height:550px;background:#ddd;"><center>

<div style="width:250px;background:#ffffff;padding:5px;">	<center>	<img src="<?php echo base_url();?>logo/logo.png" title="Logo"></center>
<br>
<br>


 <?php 
if($this->session->flashdata('result')){ $result_r=$this->session->flashdata('result'); echo "<div id='result' style='width:200px;'>".$result_r."</div>"; }
 ?>

<span style="float:left;margin-left:20px;"><a href="<?php echo site_url('login/');?>">Login</a> </span><?php
if($this->config->item('user_reg')){

?>
<span style="float:right;margin-right:20px;"><a href="<?php echo site_url('login/register/');?>">Sign up</a></span>
<?php
}
?>
<br><br>
<center>

   <?php echo form_open('login/forgot/'); ?>

 <div style="padding:5px;width:239px;height:38px;background-image:url('<?php echo  base_url('images/login_email.png');?>');">    <input type="text"  id="user_email" name="user_email" placeholder=" Registered Email ID" autocomplete="off" style="border:0px;height:20px;width:180px;float:right;margin-top:5px;margin-right:5px;"/></div>


<br>

     <input type="submit" value="Reset"  > 

<br>
<br>
   </form>
   </center>

</div>

</div>



