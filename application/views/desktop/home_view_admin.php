<div id="content" class="copy"  >
<h1> </h1><br>

<div  style="color: #212121;
  background-color: #F9E1A2;
  min-width: 300px;
  font-family: arial;
  font-size: 13px;
  padding: 4px 4px 4px 4px;
  border: 1px solid #F5786C;
  line-height:20px;
  margin-bottom: 10px;">
  Great! You have installed Savsoft Quiz Successfully. You can <a href="http://savsoftquiz.com/" ><u>Contact us</u></a> for customization service.  <br>
  Please like our <a href="https://www.facebook.com/savsoftquiz" target="fb_page"><u>facebook page</u></a>, it will help us to keep it free and open source.
  </div>

<div id="stat_box">
	<div id="stat_head">Number of User Registered </div>
	<div id="stat_val"><?php echo $num_users;?></div>
</div>



<div id="stat_box">
	<div id="stat_head"> Questions  in Q-Bank</div>
	<div id="stat_val"><?php echo $num_qbank;?></div>
</div>



<div id="stat_box">
	<div id="stat_head">Quiz Attempted </div>
	<div id="stat_val"><?php echo $num_result;?></div>
</div>

<div style="clear:both;"></div><br><br>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($user_group);?>);

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, is3D: true, title: 'Users registered in groups'});
      }
    </script>
	
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["columnchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 400, height: 240, is3D: true, colors:[{color:'#e3301d', darker:'#b01808'}],axisFontSize:12,title: 'Last 10 Results'});
      }
    </script>
	<div id="chart_div2" style="float:left;width:700px;height:300px;margin-right:20px;">

	</div>
	
	<div id="chart_div" style="float:left;"></div>
	
		 
<div style="clear:both;"></div><br><br>
		 <br>
<h2 style="color:#666666">Steps for Quick Start</h2>

1) Go to Settings -> Create User Groups, Question Categories and Difficulty level.<br>
2) Add user -> User can register directly from link provided at login page or you can add user manually.<br>
3) Go to question Bank and add questions<br>
4) Go to Quiz and create new quiz, add question from question bank. <br> 

</div>
