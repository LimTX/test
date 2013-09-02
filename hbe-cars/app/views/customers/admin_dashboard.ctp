<style type="text/css">
	h5 {
		font-family:Verdana, Geneva, sans-serif;
		font-size:16px;
		margin: 20px 3% 0;
    	padding: 10px 0;
	}
</style>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<?php

$days_1 = date('d-m-Y', strtotime('-1 days', strtotime(date(DATE_ATOM))));
$days_2 = date('d-m-Y', strtotime('-2 days', strtotime(date(DATE_ATOM))));
$days_3 = date('d-m-Y', strtotime('-3 days', strtotime(date(DATE_ATOM))));
$days_4 = date('d-m-Y', strtotime('-4 days', strtotime(date(DATE_ATOM))));
$days_5 = date('d-m-Y', strtotime('-5 days', strtotime(date(DATE_ATOM))));
$days_6 = date('d-m-Y', strtotime('-6 days', strtotime(date(DATE_ATOM))));
$days_0 = date('d-m-Y', strtotime('0 days', strtotime(date(DATE_ATOM))));

?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
       chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'line'
         },
         title: {
            text: 'Daily Statistics'
         },
         xAxis: {
            categories: ['<?php echo $days_0; ?>', '<?php echo $days_1; ?>', '<?php echo $days_2; ?>', '<?php echo $days_3; ?>', '<?php echo $days_4; ?>', '<?php echo $days_5; ?>', '<?php echo $days_6; ?>'],
         },
         yAxis: {
            title: {
               text: 'No. of Students'
            },
			allowDecimals: false,
			
         },
         series: [{
            name: 'Student',
            data: [<?php echo $nousers_7; ?>, <?php echo $nousers_1; ?> ,<?php echo $nousers_2; ?>, <?php echo $nousers_3; ?>, <?php echo $nousers_4; ?>, <?php echo $nousers_5; ?>, <?php echo $nousers_6; ?>],
			threshold: 0
         }, {
            name: 'Assessment',
            data: [<?php echo $notests_7; ?>, <?php echo $notests_1; ?>, <?php echo $notests_2; ?>, <?php echo $notests_3; ?>, <?php echo $notests_4; ?>, <?php echo $notests_5; ?>, <?php echo $notests_6; ?>]
         }]
      });});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    
$('.top-nav').animate({
		padding: '10px 0;'
}, 1000, function() {

});
	
});

$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
   };
   window.setTimeout( show_popup, 3000 ); // 5 seconds
})
</script>
<style type="text/css">
.styled-select select {
   background: transparent;
   width: 100px;
   padding-left: 0px;
   padding-top: 9px;
   border: 0px solid #ccc;
   height: 34px;
   overflow:hidden;
}

.webkit .styled-select select {
   background: transparent;
   width: 100px;
   padding-left: 0px;
   padding-top: 0px;
   border: 0px solid #ccc;
   height: 34px;
   overflow:hidden;
}
.dialogoc {
	display:none;
}
</style>

<?php if ($admin != "superadmin") { ?>

<?php echo $javascript->link('jquery.cookie'); ?>  
<script>
$(document).ready(function() {
	
$.cookie('db');

if ($.cookie('db') == null) {
$.cookie('db',1)
$("#dialog").dialog();
}
	  	  

});
</script>

<?php } ?>

<?php if ($admin == "schooladmin") { ?>

  <div id="dialog" class="dialogoc" title="Did You Know?" style="line-height:1.4em; font-size:12px; font-family:Arial, Helvetica, sans-serif;">
  1. You can first start creating a class by clicking on the 'Add Class' link.
  <br/><br/>
  2. You can assign yourself in a Class by clicking on the 'My Account' link.
  <br/><br/>
  3. You can create a new teacher account (with a different email) by clicking on the 'Add Teacher' link.
  <br/><br/>
  4. You can add student in their allocated class by clicking on the 'Add Student' link.
  <br/><br/>
  5. You can find all the students by clicking on the 'View Student Lists' link.
  <br/><br/>
  6. You can retrieve and edit all your previous assessment by clicking on the 'Assessment Listing' link.
  <br/><br/>
  7. If you are not sure where you stopped recording, click on the 'Continue Level' link.</div>
<?php } else if ($admin == "teacher") { ?>


    <div id="dialog" class="dialogoc" title="Did You Know?" style="line-height:1.4em; font-size:12px; font-family:Arial, Helvetica, sans-serif;">
        1. You can first start adding student into your allocated class by clicking on the 'Add Student' link.
        <br/><br/>
        2. You can find all your students by clicking on the 'View Student Lists' link.
        <br/><br/>
        3. You can retrieve and edit all your previous Assessment by clicking on the 'Assessment Listing' link.
        <br/><br/>
        4. If you are not sure where you stopped recording, click on the 'Continue Level' link.
    </div>

<?php } ?>  
  
<div style="height:1000px;">
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">Welcome to the CARS & STARS Online. <span style="float:right; padding-right:10px; display:inline-block;"><?php $date = date('d-m-Y', strtotime($users_lastlogin)); $time = date('h:i:s A', strtotime($users_lastlogin)); if($date != "01-01-1970") {   echo  "Last Login ".$date." ".$time.""; } ?></span></h4>
     	
        <div class="top-nav" style="text-align:center;">
       	<?php if ($admin == "superadmin") { ?>
       	<a class="zeroborder" href="../schools">
        <div class="dashboard-widget">
        <span class="dashboard-icons home_2_blk"></span>
        <div style="padding-top:8px;">School</div>
        </div>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" ) { ?>
        <a class="zeroborder" href="../classrooms">
        <div class="dashboard-widget">
        <span class="dashboard-icons book_blk"></span>
        <div style="padding-top:8px;">Class</div>
        </div>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" ) { ?>
        <a class="zeroborder" href="../customers/teachers">
        <div class="dashboard-widget">
        <span class="dashboard-icons users_2_blk"></span>
        <div style="padding-top:8px;">Teacher</div>
        </div>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" ||  $admin == "teacher") { ?>
        <a class="zeroborder" href="../customers">
        <div class="dashboard-widget">
        <span class="dashboard-icons users_blk"></span>
        <div style="padding-top:8px;">Student</div>
        </div>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
        <a class="zeroborder" href="../tests/report">
        <div class="dashboard-widget">
        <span class="dashboard-icons report_blk"></span>
        <div style="padding-top:8px;">Reports</div>
        </div>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <a class="zeroborder" href="../tests/report">
        <div class="dashboard-widget">
        <span class="dashboard-icons create_write_blk"></span>
        <div style="padding-top:8px;">Assessment</div>
        </div>
        </a>
        
        </div>
<article class="module width_3_quarter" style="height:420px;">

<header><h6>Cars And Stars Online Statistics
<?php if ($admin == "schooladmin") { 
		
		//&& empty($users_class);

	echo " - ".$eachSchoolName['School']['name']; 
} else if (($admin == "teacher" || $admin == "schooladmin") && $users_class != 0) {
	echo " - ".$eachSchoolName['School']['name']." - ";
	
	foreach ($eachClassroomNames as $eachClassroomName) {
	
	echo $eachClassroomName['Classroom']['name']." ";
	
	}
	
	 
} else if (($admin == "teacher" || $admin == "schooladmin") && $users_class == 0) {
	echo " - ".$eachSchoolName['School']['name']; 
} ?>
</h6></header>

<div class="module_content">
				<article class="stats_graph">
			

<div id="container" style="width:100%; height:320px; margin: 0 auto"></div>
				</article>
				
				<article class="stats_overview">
						<p class="overview_day" style="text-align:center;">Total</p>
						<p class="overview_count"><?php echo $totalUsers; ?></p>
						<p class="overview_type">Students</p>
						<p class="overview_count"><?php if (empty($totalTests)) { echo 0; } else { echo $totalTests; } ?></p>
						<p class="overview_type">Assessments</p>
                    <!--
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count"><?php //  echo $totalUsersYest; ?></p>
						<p class="overview_type">Students</p>
						<p class="overview_count"><?php // echo $totalTestsYest; ?></p>
						<p class="overview_type">Tests</p>
					</div>
                    -->
				</article>

			</div>
 <br clear="all" />
</article>      
</div>

<br clear="both" />