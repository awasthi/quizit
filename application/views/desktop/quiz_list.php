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
       <div class="searchbox" id="searchbox">
            <form method="post" action="<?php echo site_url('quiz'); ?>">
                <select name="search_type">
                    <option value="quiz.quid">ID</option>
                    <option value="quiz.quiz_name">Quiz Name</option>
                    <option value="quiz.start_time">Start time</option>
                    <option value="quiz.end_time">End time</option>
                    <option value="quiz.duration">Duration</option>
                </select> 
                <input type="text" name="search" value=""> 
                <input type="submit" value="Search" class="button-warning pure-button"></form> 
        </div>
        <!--AWA-->
        <div class="col-md-11">
            <div class="box box-primary">
                <a href="<?php echo site_url('quiz/add_new'); ?>"  class="button-success pure-button">Add new</a>
                 <a href="javascript:showhiddendiv('searchbox');" class="button-success pure-button">Search</a>
        
                <div class="box-header with-border">
                    <h3 class="box-title">Choose Your Quiz.</h3>
                        
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
                <tr><th>Id</th><th>Quiz name</th><th>Start time</th><th>End time</th><th>Duration</th><th>Action</th></tr>
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
                            <td  data-th="Id"></td>
                            <td  data-th="Quiz Name"><?php echo $row->quiz_name; ?></td>
                            <td data-th="Start Time"><?php echo date('Y/m/d', $row->start_time); ?></td>
                            <td  data-th="End Time"><?php echo date('Y/m/d', $row->end_time); ?></td>
                            <td  data-th="Duration"><?php echo $row->duration; ?> Min. </td>

                            <td data-th="Action">
                                <a href="<?php echo site_url('quiz/attempt/' . $row->quid); ?>"  class="button-error pure-button">Attempt</a>
                                &nbsp;
                                <?php
                                $logged_in = $this->session->userdata('logged_in');
                                ?>
                                <?php
                                if ($logged_in['su'] == "1") {
                                    ?>
                                    <a href="javascript: if(confirm('Do you really want to remove this quiz?')){ window.location='<?php echo site_url('quiz/remove_quiz/' . $row->quid); ?>'; }" class="button-error pure-button">Remove</a> <a href="<?php echo site_url('quiz/edit_quiz/' . $row->quid); ?>"  class="button-success pure-button">Edit</a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>	<!-- /.table -->
        </div>
        <br>
        <?php
        if ($logged_in['su'] == "1") {
            ?>

            <?php
        }
        ?>
        <?php if (($limit - ($this->config->item('number_of_rows'))) >= 0) {
            $back = $limit - ($this->config->item('number_of_rows'));
        } else {
            $back = '0';
        } ?>

        <a href="<?php echo site_url('quiz/index/' . $back); ?>" class="button-success pure-button">Back</a>
        &nbsp;&nbsp;
<?php $next = $limit + ($this->config->item('number_of_rows')); ?>

        <a href="<?php echo site_url('quiz/index/' . $next); ?>" class="button-success pure-button">Next</a>

</div>  
</div>


</section>
</div><!-- /.content-wrapper -->




