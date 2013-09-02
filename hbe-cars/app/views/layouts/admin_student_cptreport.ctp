<!doctype html>
<head>
  <title><?php echo $title_for_layout ?></title>
  	<?php echo $html->css('reset'); ?>
    <?php echo $html->css('layout'); ?>
    <?php echo $html->meta('icon', $html->url('/img/mac-icon.png')); ?>
    <?php echo $html->css('print', null, array('media' => 'print')); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <style>
	.demo2 { display:none;
	}
	</style>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>  
    <?php echo $javascript->link('jquery.tablesorter.min'); ?>
     <script type="text/javascript">
	 $(document).ready(function() {
    $('.print').printPage();
	$('.demo2').hide();
	 setTimeout(function(){
		$('.demo2').fadeIn();
		$('.demo2').easyTicker({
			direction: 'down'
	})
		
    }, 2000);
	
	});
		 
	$(document).ready(function() { 
		 $(".tablesorter").tablesorter();
			
	});
	
	$(document).ready(function() { 
		if ($(window).width() <= 1000) {
			 $('#main-right').height("1400px"); 
			 $('#main-left').height("1400px"); 
		 }
	});

    </script>
    <?php echo $javascript->link('jquery.equalHeight'); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <?php echo $javascript->link('jellymin'); ?>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <?php echo $javascript->link('jquery.metadata'); ?>
    <?php echo $javascript->link('jquery.printpage'); ?>
    <?php echo $javascript->link('jquery.easy-ticker'); ?>
    <script type="text/javascript">
	
	 $(function() {
	 $( document ).tooltip();
	 });
	</script>
    
    <?php // echo $javascript->link('file-upload'); ?>
    <script type="text/javascript">
    $(function(){
        $('.col').equalHeight();
    });
	</script>
    
    <script type="text/javascript">	
	$(document).ready(function() { 
		$(".tablesorter").tablesorter(); 	
	});
    </script>
    <?php echo $javascript->link('hideshow'); ?>
</head>
<body>
<div style="clear: both; height:100%;">
    
    <div class="compactreport"> <!-- main color - main decision -->
    
        <div id="dashboard">
            <div id="sub-header">
              <?php echo $html->image('icon-dashboard.png', array('alt' => 'Assessment and Reports','style' => 'vertical-align:text-bottom;'))?> Assessment and Reports &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
            </div>
        </div>
    	
        <div id="breadcrumbs">
            <div id="breadcrumb-trail">
            
			 <article class="breadcrumbs">
				<?php echo $breadcrumbs; ?>           
             </article>
             <?php
			 if ($admin != 'superadmin') {
				 
			 $schoolexpirdate = $this->requestAction('/schools/schoolexpirydate/'.$users_school);
			 
			 //$schoolexpirdate = "2013-05-14";
			
			 $exp = round ((strtotime($schoolexpirdate)-time())/(60*60*24));
			 
			 if ($exp < 8) {
			 	 
				 if ($exp <= 0)  {
				
				if ($_SERVER['HTTP_HOST'] == "localhost:8888") {
				
				header("Location: http://localhost:8888/hbe-cars/customers/logout");
				
				} else {
					
					header("Location: http://carsandstars.com.au/customers/logout");
					
				}
				
				 
			 	} else if ($exp > 1) {
					 echo '<article class="breadcrumbs" style="float:right;">';
					 echo "<a href='/admin/customers/expiry' style=\"color:#E42217;\">Your subscription will going to expire in ".$exp." days</a>";
					 echo '</article>';
				 } else {
					 echo '<article class="breadcrumbs" style="float:right;">'; 
					 echo "<a href='/admin/customers/expiry' style=\"color:#E42217;\">Your subscription will going to expire in ".$exp." day</a>";
					 echo '</article>';	 
				 }
			 
			 }
			 
			 }
			
			 ?>
            </div>
        </div>
        
    	<?php  echo $content_for_layout  ?>
    
     </div>

</div>

<script type="text/javascript">
var sc_project=7442065; 
var sc_invisible=1; 
var sc_security="1c34f61d"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29762047-3', 'carsandstars.com.au');
  ga('send', 'pageview');

</script>
</body>
</html>