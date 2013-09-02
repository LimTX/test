<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $title_for_layout ?></title>

    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

    <?php echo $html->css('layout'); ?>

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <?php echo $javascript->link('hideshow'); ?>
    <?php echo $javascript->link('jquery.equalHeight'); ?>
    <?php echo $javascript->link('jquery.metadata'); ?>
	<?php echo $javascript->link('jquery.validate'); ?>
    
	<script type="text/javascript">
    $(document).ready(function() {
        var s = $("#sticker");
        var pos = s.position();					   
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
            if (windowpos >= pos.top) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");	
            }
        });
    });
    </script>
    
	<script type="text/javascript">		
        $.metadata.setType("attr", "validate");
                
        jQuery.validator.addMethod("maxLen", function (value, element, param) {
        //console.log('element= ' + $(element).attr('name') + ' param= ' + param )
        if ($(element).val().length > param) {
            return false;
        } else {
            return true;
        }
    }, "You have reached the maximum number of characters allowed for this field.");
    
                
        $().ready(function() {
                        
            var container = $('div.container');
            $("#form2").validate();
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
			<h1 class="site_title"><a href="#">Cars and Stars Portal</a></h1>
			<h2 class="section_title">
            
    <?php echo $html->image('icon-dashboard.png', array('alt' => 'Dashboard','style' => 'vertical-align:text-bottom;'))?>&nbsp;Dashboard</h2><div class="btn_view_site"><a href="index.php">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo ucfirst($users_username); ?>
            
             <span style="font-weight:normal;"><?php 
$date = date('d-m-Y', strtotime($users_lastlogin));
$time = date('h:i:s A', strtotime($users_lastlogin));

echo "(Last Login ".$date.")";
 ?></span> 
            
            </p>
           <?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout'), array('class'=>'logout_user','title'=>'Logout')); ?>
		</div>
		<div class="breadcrumbs_container">
			 <article class="breadcrumbs">
				<?php echo $breadcrumbs; ?>
		</div>
        
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<!-- <form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form> 
		<hr/> -->
        <br />
        <h3>Home</h3>
		<ul class="toggle">
			<li class="icn_dashboard"><a href="#">Dashboard</a></li>
		</ul>
        <h3>School</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add School', array('controller' => 'schools','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View School Lists', array('controller' => 'schools','action' => 'index'));  ?></li>
			<!-- <li class="icn_profile"><a href="#">Your Profile</a></li> -->
		</ul>
         <h3>Class</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Class', array('controller' => 'classrooms','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Class Lists', array('controller' => 'classrooms','action' => 'index'));  ?></li>
			<!-- <li class="icn_profile"><a href="#">Your Profile</a></li> -->
		</ul>
        <h3>Teacher</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Teacher', array('controller' => 'customers','action' => 'add_teachers'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Teacher Lists', array('controller' => 'customers','action' => 'teachers'));  ?></li>
			<!-- <li class="icn_profile"><a href="#">Your Profile</a></li> -->
		</ul>
		<h3>Student</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Student', array('controller' => 'customers','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Student Lists', array('controller' => 'customers','action' => 'index'));  ?></li>
			<!-- <li class="icn_profile"><a href="#">Your Profile</a></li> -->
		</ul>
		<h3>Test</h3>
		<ul class="toggle">
			<li class="icn_new_article"> <?php echo $html->link('New Test', array('controller' => 'tests','action' => 'add'));  ?></li>
			<!--<li class="icn_edit_article"><a href="#">Edit Test</a></li> -->
			<li class="icn_categories"><a href="#">View Test Listing</a></li>
		</ul>
        <h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout')); ?></li>
		</ul>          

		<footer>
			<hr />
			<p>
            
            <strong>Copyright &copy; 2012 Cars and Stars Portal</strong></p>
		</footer> 
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
    	<?php  echo $content_for_layout  ?>
   	</section>


</body>

</html>