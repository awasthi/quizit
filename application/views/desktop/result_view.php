<style>
@media print {
   
   .clearfix{
   display:none;
   }
   #footer{
   display:none;
   }
   .hide_btn_while_print{
   display:none;
   }
   .show_btn_while_print{
   display:block;
   float:right;
   }
   
}

@media screen {
 .show_btn_while_print{
   display:none;
   }
}

.result_card tr td{

border-bottom:1px solid #dddddd;
}

</style>
<div id="content" class="testd"><br>
<div class="hide_btn_while_print"><h1><?php if($title){ echo $title; } ?></h1><br>
<?php
$logged_in=$this->session->userdata('logged_in');

if($logged_in['su']=="1"){
?><a href="<?php echo site_url('result');?>"  class="button-error pure-button">Back</a>
<?php
}else{
?>
<a href="<?php echo site_url('result/user');?>" class="button-error pure-button">Back</a>
<?php
}
?>&nbsp;&nbsp;
<a href="javascript:print();" class="button-success pure-button">Print</a>
</div>
<div  class="show_btn_while_print" >
<img src="<?php echo base_url();?>logo/logo.png" title="Logo">
</div>
<br>
   <div class="formbox" style="max-width:800px;">
<table class="rwd-table">
<?php
if($this->config->item('webcam_plugin')){
?><tr><td></td><td><?php
$photo=$result->photo;

if($photo!=""){ ?><img src="<?php echo base_url('photo/'.$photo);?>" style="width:<?php echo $this->config->item('photo_width');?>;height:<?php echo $this->config->item('photo_height');?>;"><?php }else{ echo "Camera was not detected!";} ?></td></tr>
<?php
}
?>

<tr><th >Result ID</th><td><?php echo $result->rid;?></td></tr>
<tr><th >User Name</th><td><?php echo $result->username;?></td></tr>
<tr><th >Email</th><td><?php echo $result->email;?></td></tr>
<tr><th >First Name</th><td><?php echo $result->first_name;?></td></tr>
<tr><th >Last Name</th><td><?php echo $result->last_name;?></td></tr>
<tr><th >Quiz Name</th><td><?php echo $result->quiz_name;?></td></tr>
<tr><th >Score obtained</th><td><?php 
$correct_score=explode(",",$result->correct_score);
if(count($correct_score) >= "2"){ echo $result->score."/".(array_sum($correct_score)); }else{ 
echo $result->score."/".(count(explode(',',$result->qids)) * $correct_score['0'] );
}
if($result2==true){ echo "<span style='color:red'>(Essay Evaluation Pending)</span>";}?></td></tr>
<tr><th >Percentage obtained</th><td><?php echo substr($result->percentage , 0, 5 );?>%</td></tr>
<tr><th >Percentile obtained</th><td><?php echo substr(((($percentile[1]+1)/$percentile[0])*100),0,5);   ?>%</td></tr>
<tr><th  valign="top">Percentage obtained by Category</th><td><table><?php foreach($cct_per_total as $vk => $vval){ 
?>
<tr><td>
<?php echo $vk ; ?>: 
</td><td>
<?php $sper=(($cct_per[$vk]/$cct_per_total[$vk])*100);  echo number_format((float)$sper, 2, '.', '');?>%  (<?php echo $cct_per[$vk]."/".$cct_per_total[$vk]; ?>)
</td></tr>
<?php
} ?></table></td></tr>
<tr><th >Result</th><td><?php if($result->q_result == "1"){  echo "Pass"; }else if($row->q_result == "0"){ echo "Fail"; }else{ echo "Pending"; } ?></td></tr>
<tr><th >Total Time Spent</th><td><?php if($result->time_spent <= ($result->duration * 60 ) ){  echo gmdate("H:i:s", $result->time_spent); }else{ echo gmdate("H:i:s", ($result->duration * 60)); } ?></td></tr>


</table>
<?php if($result->view_answer =="1"){
?><div class="hide_btn_while_print">
<table id="detail">
<tr><td ><a href="<?php echo site_url('result/view_answer/'.$result->rid );?>" class="button-success pure-button">View Answers</a></td></tr>
</table></div>
<?php
}
?> 

<!-- google chart starts -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

        var options = {
          title: 'Top 10 results for Quiz:<?php echo $result->quiz_name;?>',
          hAxis: {title: 'Quiz(User)', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div" style="width: 800px; height: 500px;"></div>
<!-- google chart ends -->



<!-- google chart starts -->

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: 'Time spent on individual question (in seconds)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div2" style="width:800px; height: 500px;"></div>
<!-- google chart ends -->


<!-- google chart starts -->

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $ctime;?>);

        var options = {
          title: 'Time spent on categories (in seconds)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div3" style="width: 800px; height: 500px;"></div>
<!-- google chart ends -->

</div>
</div>
