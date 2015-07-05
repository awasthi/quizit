<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php if ($title) {  echo $title;} ?></h1>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol> 
        <div>.</div>
        <!--AWA-->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail"/>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div><!-- /.btn-group -->
                        <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-40/200
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div><!-- /.btn-group -->
                        </div><!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr><th>Id</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Action</th></tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($result == false) {
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            No record foud!
                                        </td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td  data-th="ID"><?php echo $row->id; ?></td>
                                            <td  data-th="Username"><?php echo $row->username; ?></td>
                                            <td data-th="First Name"><?php echo $row->first_name; ?></td>
                                            <td  data-th="Last Name"><?php echo $row->last_name; ?></td>
                                            <td  data-th="Email"><?php echo $row->email; ?></td>
                                            <td  data-th="Action"><a href="javascript: if(confirm('Do you really want to remove this user?')){ window.location='<?php echo site_url('user_data/remove_user/' . $row->id); ?>'; }" class="button-error pure-button">Remove</a> 
                                                <a href="<?php echo site_url('user_data/edit_user/' . $row->id); ?>" class="button-success pure-button">Edit</a>
                                                <a href="<?php echo site_url('user_data/login_user_by_admin/' . $row->id); ?>" class="button-success pure-button">Login</a></td>
                                            <!--
                                                <tr>
                                                    <td><input type="checkbox" /></td>
                                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                                        <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                                                        <td class="mailbox-attachment"></td>
                                                        <td class="mailbox-date">5 mins ago</td>
                                                </tr>
                                            -->
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>





                            </tbody>
                        </table><!-- /.table -->
                    </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>                    
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm"><a href="<?php echo site_url('user_data/add_new'); ?>"><i class="fa fa-plus"></i></a></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div><!-- /.btn-group -->
                        <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div><!-- /.btn-group -->
                        </div><!-- /.pull-right -->
                    </div>
                </div>
            </div><!-- /. box -->
        </div><!-- /.col -->


    </section>
</div><!-- /.content-wrapper -->