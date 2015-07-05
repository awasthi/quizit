

<div class="homed" style="height:550px;background:#ddd;"><center>

        <div style="width:250px;background:#ffffff;padding:5px;">	<center>	
                <img src="<?php echo base_url(); ?>logo/<?php echo $logo; ?>" title="Logo"></center>
            <br>
            <br>


            <?php echo validation_errors(); ?>

            <span style="float:left;margin-left:20px;">Login </span>
            <?php if ($this->config->item('user_reg')) { ?>
                <span style="float:right;margin-right:20px;">
                    <a href="<?php echo site_url('login/register/'); ?>">Sign up</a>
                </span>
                <?php
            }
            ?>
            <br><br>
            <center>

                <?php echo form_open('verifylogin/'); ?>

                <div style="padding:5px;width:239px;height:38px;background-image:url('<?php echo base_url('images/login_email.png'); ?>');">    
                    <input type="text"  id="username" name="username" placeholder=" Username" autocomplete="off" style="border:0px;height:20px;width:180px;float:right;margin-top:5px;margin-right:5px;"/></div>

                <div style="padding:5px;width:239px;height:38px;background-image:url('<?php echo base_url('images/login_password.png'); ?>');">   
                    <input type="password"  id="password" name="password" placeholder=" Password" autocomplete="off" style="border:0px;height:20px;width:180px;float:right;margin-top:5px;margin-right:5px;"/></div>


                <br>

                <input type="submit" value=""   style="width:245px;height:44px;border:0px;background-image:url('<?php echo base_url('images/login.png'); ?>');"> 

                <br>
                <br>
                <a href="<?php echo site_url('login/forgot/'); ?>">Forgot Password?</a>
                <br>
                </form>
            </center>

        </div>

</div>



<form action="<?php echo Q_THEME_DIR?>/index2.html" method="post">