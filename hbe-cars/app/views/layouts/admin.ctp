<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title><?php echo $title_for_layout ?></title>

    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
    <?php echo $html->css('layout'); ?>
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <?php echo $javascript->link('jquery.min'); ?>
    
    <?php echo $javascript->link('hideshow'); ?>
    <?php echo $javascript->link('jquery.tablesorter.min'); ?>
    <?php echo $javascript->link('jquery.equalHeight'); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Students', 'Tests'],
          ['2008',  1000,      400],
          ['2009',  1170,      460],
          ['2010',  660,       1120],
          ['2011',  1030,      540]
        ]);

        var options = {
          title: '',
		  legend:{position: 'none'},
		  colors: ['#9bba1f','#ffa200']
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="dashboard.php">Cars and Stars Portal</a></h1>
			<h2 class="section_title">
            
    <?php echo $html->image('icon-dashboard.png', array('alt' => 'Dashboard','style' => 'vertical-align:text-bottom;'))?>&nbsp;Dashboard</h2><div class="btn_view_site"><a href="index.php">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Teacher <!-- (<a href="#">3 Messages</a>) --></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<!-- <article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article> -->
            <article class="breadcrumbs"><a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
        <h3>Home</h3>
		<ul class="toggle">
			<li class="icn_dashboard"><a href="#">Dashboard</a></li>
		</ul>
		<h3>Student</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New Student</a></li>
			<li class="icn_view_users"><a href="#">View Student</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Test</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">New Test</a></li>
			<li class="icn_edit_article"><a href="#">Edit Test</a></li>
			<li class="icn_categories"><a href="#">View Tests</a></li>
		</ul>
        <h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout')); ?></li>
		</ul>          

		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Cars and Stars Portal</strong></p>
		</footer> 
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
    	<?php  echo $content_for_layout  ?>
   	</section>


</body>

</html>