<!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                   <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol> 
            <div>.</div>
            <!--AWA-->
            <?php $logged_in=$this->session->userdata('logged_in');?>
            <h1><?php if($title){ echo $title; } ?></h1><br>
            
            <?php if($logged_in['su'] =="1"){ ?>
                    <a href="<?php echo site_url('user_data');?>" class="button-error pure-button">Back</a>
            <?php } ?>




    
    <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Change required field and save.</h3>
                  <h4>
                      <?php 
                        //if($resultstatus){ echo "<div id='result' style='text-align:center ;> <font color='#fff' size='4'>".$resultstatus."</font></div>"; }
                        
                        ?>
                  </h4>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo site_url('user_data/insert_user');?>">

         	 <?php echo validation_errors(); ?>
                <form role="form">
                  <div class="box-body">
                      <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="username is your identity."  >
                      </div>
                      
                      <div class="form-group">
                      <label for="First_Name">First Name</label>
                      <input type="text" class="form-control" name="first_name" id="inputFirstName" placeholder="User's First Name">
                      
                      <label for="Last_Name">Last Name</label>
                      <input type="text" class="form-control" name="last_name" id="inputLastName" placeholder="User's Last Name" >
                      </div>
                    
                      <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Enter email" >
                      </div>
                    
                      <div class="form-group">
                      <label for="user_password">Password</label>
                      <input type="password" class="form-control" id="user_password" name="user_password"  placeholder="Password (Optional)" autocomplete="off">
                      
                      <label for="confirm_password">Confirm Password</label>                      
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password (Optional)" autocomplete="off">
                      </div>
                    
                      <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Image in jpeg format and of size 160 x 160.</p>
                    </div>
                    
                      <!--<div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                      -->
                  <select name="user_group">
					<?php foreach($allgroups as $key => $group){ ?>
						<option value="<?php echo $group['gid']; ?>">Group: <?php echo $group['group_name']; ?></option>
					<?php } ?>
				</select>
				<select name="account_type">
					<option value="0">Account type: User</option>
					<option value="1">Account type: Administrator</option>
				</select>
				
                    </div>
                    
                      <input type="hidden" name="user_credit" value="0" placeholder="Credit">

		
                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <!--<input type="submit" value="Submit" class="button-warning pure-button"> -->
                  </div>
                </form>
              </div>
        </div>














<div id="show_payu_div" style="background:#ffffff;position:fixed;display:none;visibility:hidden;top:70px;right:40%;border:5px solid #666666; padding:20px;width:200px;height:280px;">
<a href="javascript:hidebox();" style="float:right;font-size:10px;">Close</a>
<div><b>Buy Credit</b><br> Amount equal to credit<br><br>Mandatory Fields<br><br>

<form method="post" action="<?php echo site_url('payment_gateway/index/PayU/'.$user['id']);?>"  onSubmit="return checkfields();">
Amount <br> <input type="text" value="50" name="credit" >
<br><br>
Mobile number<br><input type="text" name="phone" id="phone" style="width:120px;" value="">  <br><br>
<input type="submit" value="Next">

</form>
</div>
</div>





<script>
function showbox(){
document.getElementById('show_payu_div').style.display="block";
document.getElementById('show_payu_div').style.visibility="visible";
}

function hidebox(){
document.getElementById('show_payu_div').style.display="none";
document.getElementById('show_payu_div').style.visibility="hidden";
}

<?php
 if($this->session->userdata('package')){
 $this->session->unset_userdata('package');
 ?>
 showbox();
 <?php
 }
 ?>
 
</script>
<script>



</script>









          
        </section>
</div><!-- /.content-wrapper -->