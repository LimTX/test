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
	
	$(function() {  $( "#accordion" ).accordion({
		collapsible: true,
		//active: 2 ,
		header: "> div > h3"
	})
	.sortable({
		axis: "y",
		handle: "h3",
		stop: function( event, ui ) {
		// IE doesn't register the blur when sorting
		// so trigger focusout handlers to remove .ui-state-focus
		ui.item.children( "h3" ).triggerHandler( "focusout" );
	}
		});
	});

    </script>
    <?php echo $javascript->link('jquery.equalHeight'); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <?php echo $javascript->link('jellymin'); ?>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <?php echo $javascript->link('jquery.metadata'); ?>
    <?php echo $javascript->link('jquery.validate'); ?>
    <?php echo $javascript->link('jquery.printpage'); ?>
    <?php echo $javascript->link('jquery.easy-ticker'); ?>
    <script type="text/javascript">
	
	 $(function() {
	 $( document ).tooltip();
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
	 function getFile(){
	   document.getElementById("ImageName1").click();
	 }
	 
	 function getFileName(){
	    document.getElementById("ImageName10").innerHTML = document.getElementById("ImageName1").value;
		document.getElementById("ImageName1").value = document.getElementById("ImageName1").value;
	 }
	 
	 function sub(obj){
		var file = obj.value;
		var fileName = file.split("\\");
		document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
		document.myForm.submit();
		event.preventDefault();
	  }
	</script>
      
	<script type="text/javascript">
	
        $(function() {
           // $( "#datepicker" ).datepicker({dateFormat: 'dd mm, yy', altField: '#datepicker', altFormat: 'dd-mm-yy'});
		   $("#datepicker").datepicker({dateFormat: 'dd-mm-yy'});
        });
    </script>
    
    <?php // echo $javascript->link('file-upload'); ?>
    <script type="text/javascript">
    $(function(){
        $('.col').equalHeight();
    });
	
	
	</script>
    
    <script type="text/javascript">

	
	$(document).ready(function() 
    	{ 
				
		$(".tablesorter").tablesorter(); 
		
		if ((screen.width==1024) && (screen.height==768)) {
		
		$('#main-left').width("26%");
		$('#main-right').width("74%");
		$('.formfield input').width("13em");
		$('.formfield select').width("184px");
		$('#datepicker').width("13em");
		$('#datepicker').css({background: 'url(\'/img/datepicker_icon.png\') no-repeat scroll 170px 8px #F6FAFA;'});
		$('#ImageName10').width("184px");
		$('#container_graphclass').css({marginLeft: '0'})	
		$('.formfield textarea').width("182px");
		$('#copyright p').css({paddingLeft: '5px'})	
	 };
		 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_area").hide(); //Hide all content
	$("ul.tabber li:eq(1)").addClass("active").show(); //Activate first tab
	$(".tab_area:eq(0)").show(); //Show first tab content
	
	//When page loads...
	$(".apple-tab_area").hide(); //Hide all content
	$("ul.apple-tabber li:eq(1)").addClass("active").show(); //Activate first tab
	$(".apple-tab_area:eq(1)").show(); //Show first tab content


	//On Click Event
	$("ul.tabber li").click(function() {

		$("ul.tabber li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_area").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	//
	// FOR APPLE TAB BELOW
	//

	//On Click Event
	$("ul.apple-tabber li").click(function() {

		$("ul.apple-tabber li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".apple-tab_area").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <?php echo $javascript->link('hideshow'); ?>
</head>
<body>
<div style="clear: both; height:100%;">
    <div id="main-left"> <!-- main color - main decision -->
    
    <div class="col" id="section-left"> <!-- follow right col -->
        <div id="logo">
        <div class="sixpercent">
        <?php echo $html->link(__('CARS & STARS Online', true), array('admin'=>true,'controller' => 'customers', 'action' => 'dashboard'),array('style' => 'color:white;text-decoration:none;')); ?>
        </div>
        </div>
        <div id="user-detail">
            <div class="user">
            <p><?php echo ucfirst($users_username); ?><span style="font-weight:normal;">
			
            ( <?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout')); ?> )
			
			<?php //  $date = date('d-m-Y', strtotime($users_lastlogin)); $time = date('h:i:s A', strtotime($users_lastlogin));  echo  " (Last Login ".$date.")"; ?></span></p>
             <?php // echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout'), array('class'=>'logout_user','title'=>'Logout')); ?>
            </div>
        </div>
        
       <div style="clear: both;">
           	<?php if($admin == "superadmin") { ?>
       <aside id="sidebar">
        <h3>Newsfeeds</h3>
        
        <ul class="toggle" style="height:112px; padding-bottom:8px; overflow:hidden;">
      <li style="margin:0px;">  <div class="demo2">
	<div style="position:absolute;">

    <?php

	function fb_datetime($timestamp){
		
	$difference = time() - $timestamp;
	$periods = array("sec", "min", "hour", "day", "week", "month", "years", "decade");
	$lengths = array("60","60","24","7","4.35","12","10");
	
	if ($difference > 0) { // this was in the past time
	$ending = "ago";
	} else { // this was in the future time
	$difference = -$difference;
	$ending = "to go";
	}
	for($j = 0; $difference >= $lengths[$j]; $j++) $difference /= $lengths[$j];
	$difference = round($difference);
	if($difference != 1) $periods[$j].= "s";
	$text = "$difference $periods[$j] $ending";
	return $text;
	}
	
	?>
    <?php
	$newsfeeds = $this->requestAction('/customers/newsfeeds');
	foreach($newsfeeds as $newsfeed) {
	?>
    <div style="height:30px; padding-bottom:55px; padding-left:27px;">
		<p style="padding-right:5px; padding-left:15px;">
        <span style="vertical-align:middle;">
		<?php  echo $html->image('user-newsfeed.png', array('alt' => 'User'))?>
        </span>
        <span style="vertical-align:middle; font-size:11px; height:16px;">
        <?php if($newsfeed['Customer']['customers_roles'] == "student" || $newsfeed['Customer']['customers_roles'] == "teacher") { ?>
        <strong style="font-weight:bold;"><?php echo $newsfeed['Customer']['customers_name'] ?></strong> has been added to <?php echo $newsfeed['School']['name']; ?>.
        <?php } elseif ($newsfeed['Customer']['customers_roles'] == "superadmin") { ?>
        
         <strong style="font-weight:bold;"><?php echo $newsfeed['Customer']['customers_name'] ?></strong> has been assigned as a HBE Administrator.        
        <?php } elseif  ($newsfeed['Customer']['customers_roles'] == "schooladmin"){ ?>
        <strong style="font-weight:bold;"><?php echo $newsfeed['Customer']['customers_name'] ?></strong> has been assigned as a School Administrator at <?php echo $newsfeed['School']['name']; ?>.
        <?php } ?>
        </span> 
        </p>
        <div style="float:right;">
		<div style="vertical-align:middle; width:11px; padding:0px 5px 0px 0px; display:table-cell; text-align:right; color:#828282; font-size:10px;">
		<?php echo $html->image('time.png', array('alt' => 'Time'))?> 
        </div>
       	<div style="vertical-align:middle; padding:0px; display:table-cell; text-align:left; color:#828282; font-size:10px;">
         <?php $datey = strtotime($newsfeed['Customer']['created']);
		echo fb_datetime($datey); ?> 
        </div>
        </div>
	</div>
    <?php 
	} ?>
     <?php
	
	$newsfeeds = $this->requestAction('/tests/newsfeeds');	
	
	foreach($newsfeeds as $newsfeed) {
	
	?>
    <div style="height:30px; padding-bottom:55px; padding-left:27px;">
		<p style="padding-right:5px; padding-left:15px;">
        <span style="vertical-align:middle;">
		<?php  echo $html->image('user-newsfeed.png', array('alt' => 'User'))?>
        </span>
        <span style="vertical-align:middle; text-align:center; font-size:11px; height:16px;">
        <strong style="font-weight:bold;"><?php echo $newsfeed['Customer']['customers_name'] ?></strong>  from <?php echo $newsfeed['School']['name']; ?> did an assessment for Book <?php echo $newsfeed['Test']['book_type'] ?>.
        </span>
        </p>
         <div style="float:right;">
		<div style="vertical-align:middle; width:11px; padding:0px 5px 0px 0px; display:table-cell; text-align:right; color:#828282; font-size:10px;">
		<?php echo $html->image('time.png', array('alt' => 'Time'))?> 
        </div>
       	<div style="vertical-align:middle; padding:0px; display:table-cell; text-align:left; color:#828282; font-size:10px;">
         <?php $datey = strtotime($newsfeed['Test']['created']);
		echo fb_datetime($datey); ?> 
        </div>
        </div>
	</div>
    <?php } ?>
        </li>
        </ul>
               <hr style="padding-bottom:11px; margin:0px;" />

       </aside> 
       <?php } ?>
       <aside>
       <br />
		<ul class="tabber">
   			<li><a href="#tab1">Main Menu</a></li>
    		<li><a href="#tab2">Class List</a></li>
		</ul>
        <br />
       </aside>
       <div id="tab2"  class="tab_area">
       <aside id="sidebar">
        <?php 
		
	    /** $url = $this->here;
		$removehbecars = str_replace("hbe-cars/", "", $url);
		$parsed_url = parse_url($removehbecars);
		$path_parts= explode('/',$parsed_url['path']);
		$scoresheetpath = $path_parts[3];
		**/
		
		$removeadmin = str_replace("admin_", "", $this->action);
		$scoresheetpath = $removeadmin;
		
		$noofteststudents = $this->requestAction('/customers/noofteststudents/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);
		
		$studenttestNames = $this->requestAction('/customers/listofteststudents/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);
		
		$noofstudents = $this->requestAction('/customers/noofstudents/'.$this->params['pass'][0]);		
		$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
		
		?>
       	<h3>
        
        <?php
		
		if ($studenttestNames) {
		
		$classtestNames = $this->requestAction('/classrooms/classtestnames/'.$this->params['pass'][1]);	
		foreach($classtestNames as $classtestName) {
			echo "Class Report (".$classtestName['Classroom']['name'].")";
			}
		
		} else {
	   
		$classNames = $this->requestAction('/classrooms/classnames/'.$this->params['pass'][0]);
		foreach($classNames as $className) {
			echo "Class Report (".$className['Classroom']['name'].")";
			}
		}
		
		?>
        
        </h3>
		<ul class="toggle">
			<li class="icn_report_user">
            <!--------------------------------------------------------->
            <!--	FILTERING THE DIFFERENT TYPES OF REPORTS. 		 -->
            <!--------------------------------------------------------->
            <?php 
					$student_id = $this->params['pass'][0];
					$access_token = $this->params['pass'][1];
					$test_id = $this->params['pass'][2];
		    ?>
            <?php echo $html->link('View Class Report', array('admin'=> true, 'controller' => 'scores', 'action' => 'reportfilter',$student_id, $access_token, $test_id, $scoresheetpath),array('target' => '_blank')); ?> &nbsp;<?php echo $html->image('newfunction.png', array('alt' => 'New','style' => 'vertical-align:text-top;'))?></li>
            <!--------------------------------------------------------->
            <!--	END OF FILTERING THE DIFFERENT TYPES OF REPORTS. -->
            <!--------------------------------------------------------->
		</ul>
        <h3>
       <?php
	   
		if ($studenttestNames) {
		
		$classtestNames = $this->requestAction('/classrooms/classtestnames/'.$this->params['pass'][1]);	
		foreach($classtestNames as $classtestName) {
			echo "Student Of ".$classtestName['Classroom']['name']." Class "."(".$noofteststudents.")";
			}
		
		} else {
	   
		$classNames = $this->requestAction('/classrooms/classnames/'.$this->params['pass'][0]);
		foreach($classNames as $className) {
			$cNames = $className['Classroom']['name'];
			echo "Student Of ".$className['Classroom']['name']." Class "."(".$noofstudents.")";
			}
		}
		
   	   ?>
        </h3>
		<ul class="toggle">
        <?php
		
		$parsed = parse_url($scoresheetpath);
		$path_p= explode('_',$parsed['path']);
		$vaild = $path_p[0];
		$bk_type = $path_p[1];
				
		$range = "";
		if(empty($this->params['pass'][3])) {
			$range = "";
		} else {
			$range = $this->params['pass'][3];
		}
			
				
		//CHECK THE DIFFERENT TYPE OF REPORT		
		if($vaild == "edit") {
				
				//IF DONE THE TEST BEGIN ATTEMPTED BEFORE APPROVE BELOW
				if ($studenttestNames) { 
				
				foreach ($studenttestNames as $studenttestName) {
				
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);	
				
				///CHECK IF LESSON IS COMPLETED///
				$lessonno = $path_p[3];
				$checkcompletedlesson = $this->requestAction('/scores/checkcompletedlesson/'.$studenttestName['Customer']['id']."/".$access_token."/".$studenttestid['Test']['id']."/".$lessonno);
				/////////////////////////////////
								
				echo "<li class='icn_list_users'>".$html->link($studenttestName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => $scoresheetpath, $studenttestName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."&nbsp;&nbsp;";
				
				if (empty($checkcompletedlesson)) {
						
				echo "</li>";
						
				} else {
						
				echo $html->image('tick_completed.png', array('alt' => 'Completed'))."</li>";
						
				}
				
				}
				
				//DISPLAY THE NEW TEST THAT HASN'T BEEN RECORDED IN THE TEST TABLE USING THE CUSTOMER TABLE. 
				} else {
					
				////////////////////////////////////////////
				///////////////////////////////////////////
				
				$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
		
				foreach($studentNames as $studentName) {
			
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);
			
				echo "<li class='icn_list_users'>".$html->link($studentName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => $scoresheetpath, $studentName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."</li>";
		
		}
				
				};
				
		//////////////////////////////////////////
		//////////////////////////////////////////
				
		//CHECK THE DIFFERENT TYPE OF REPORT 		
		} elseif ($vaild == "reports" || $vaild == "classreports") {
								 
		 if ($studenttestNames) { 
				
				foreach ($studenttestNames as $studenttestName) {
				
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);	
					
				echo "<li class='icn_list_users'>".$html->link($studenttestName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reports"."_".$bk_type, $studenttestName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."</li>";
				} 
				
		} else {
					
		$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
				
		foreach($studentNames as $studentName) {
			
		$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);
			
		echo "<li class='icn_list_users'>".$html->link($studentName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reports"."_".$bk_type, $studentName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."</li>";
		}
					
				};
		//END OF CHECK THE DIFFERENT TYPE OF REPORT
		} else if ($vaild == "reportsplus" || $vaild == "classreportsplus") {
		
		 if ($studenttestNames) { 
				
				foreach ($studenttestNames as $studenttestName) {
				
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);	
					
				echo "<li class='icn_list_users'>".$html->link($studenttestName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reportsplus"."_".$bk_type, $studenttestName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."</li>";
				} 
				
		} else {
					
		$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
				
		foreach($studentNames as $studentName) {
			
		$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);
			
		echo "<li class='icn_list_users'>".$html->link($studentName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reportsplus"."_".$bk_type, $studentName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."</li>";
		}
					
				};
		
		}
		
   	   ?>
        </ul>
        </aside>
       </div>
       <div id="tab1" class="tab_area">
       <aside id="sidebar">
        <h3>Home</h3>
		<ul class="toggle">
			<li class="icn_dashboard"><?php echo $html->link('Dashboard', array('admin'=> true, 'controller' => 'customers','action' => 'dashboard'));  ?></li>
		</ul>
        <?php if ($admin == "superadmin") { ?>
        <h3>School</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add School', array('admin'=> true, 'controller' => 'schools','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View School Lists', array('admin'=> true, 'controller' => 'schools','action' => 'index'));  ?></li>
		</ul>
        <?php }?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin") { ?>
         <h3>Class</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Class', array('admin'=> true, 'controller' => 'classrooms','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Class Lists', array('admin'=> true, 'controller' => 'classrooms','action' => 'index'));  ?></li>
		</ul>
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin") { ?>
        <h3>Teacher</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Teacher', array('admin'=> true, 'controller' => 'customers','action' => 'add_teachers'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Teacher Lists', array('admin'=> true, 'controller' => 'customers','action' => 'teachers'));  ?></li>
		</ul>
        <?php } ?>
		<?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
		<h3>Student</h3>
		<ul class="toggle">
			<li class="icn_add_user">
            <?php echo $html->link('Add Student', array('admin'=> true, 'controller' => 'customers','action' => 'add'));  ?></li>
			<li class="icn_view_users"> <?php echo $html->link('View Student Lists', array('admin'=> true, 'controller' => 'customers','action' => 'index'));  ?></li>
		</ul>
        <?php } ?>
		<h3>Assessment</h3>
		<ul class="toggle">
			<li class="icn_new_article"> <?php echo $html->link('Begin New Assessment', array('admin'=> true, 'controller' => 'tests','action' => 'add'));  ?></li>
            <?php	
			$resumetest = $this->requestAction('/customers/resumetest/'.$users_userID);
			
			if ($resumetest == "" || $resumetest == NULL) { ?>
            <?php echo ""; ?>
            <?php } else { ?>
          <li class="icn_resume_article"><?php echo $html->link('Continue Level', $resumetest); ?></li>
            <?php } ?>
               <?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
<li class="icn_resume_article"><?php echo $html->link('Assessment Listing', array('admin'=> true,'controller'=>'tests','action'=>'report')); ?>&nbsp;<?php echo $html->image('newfunction.png', array('alt' => 'New','style' => 'vertical-align:text-bottom;'))?></li>
<?php } ?>
            
			<!-- <li class="icn_categories"><a href="#">View Test Listing</a></li> -->
		</ul>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
        <h3>Reports</h3>
		<ul class="toggle">
          <li class="icn_resume_article"><?php echo $html->link('Report Listing', array('admin'=> true,'controller'=>'tests','action'=>'report')); ?>&nbsp;<?php echo $html->image('newfunction.png', array('alt' => 'New','style' => 'vertical-align:text-bottom;'))?></li>
		</ul>
        <?php } ?>
        <h3>Admin</h3>
		<ul class="toggle">
        	<?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
            <li class="icn_jump_back"><?php echo $html->link('My Account', array('admin'=> true,'controller'=>'customers','action'=>'edit_teachers', $users_userID)); ?></li>
         	<?php } else { ?>
			<li class="icn_jump_back"><?php echo $html->link('My Account', array('admin'=> true,'controller'=>'customers','action'=>'edit', $users_userID)); ?></li>
            <?php } ?>
             <?php if ($admin == "superadmin") { ?>
            <li class="icn_jump_back"><?php echo $html->link('Settings', array('admin'=> true,'controller'=>'customers','action'=>'settings')); ?></li>
            <?php } ?>
            <li class="icn_jump_back"><?php echo $html->link('Help', array('admin'=> true,'controller'=>'customers','action'=>'help')); ?></li>
            <li class="icn_jump_back"><?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout')); ?></li>
		</ul> 
        </aside><!-- end of sidebar -->
        </div>
        <aside id="copyright" class="extrabtm">
        <ul>
        <hr />
			<p>
            Copyright &copy; 2013 Hawker Brownlow Education <br />
            <?php echo $html->link($html->image('copyrightlogo.png',array()),'http://www.hbe.com.au', array('target'=>'_blank','escape'=>false)); ?>
              </p>
            <!-- <p style="font-size:11px;">Developed by <a style="color:#333;" href="http://hbe.com.au">Hawker Brownlow Education</a></p> -->
          
            </ul>
		</aside><!-- end of sidebar -->
        
        
        
		</div>
       
    </div>
    
    </div>
    
    <div id="apple-mainframe">
    <div id="apple-device">
    	<div id="apple-logo">
        <?php echo $html->link(__('CARS & STARS Online', true), array('admin'=>true,'controller' => 'customers', 'action' => 'dashboard'),array('style' => 'color:white;text-decoration:none;')); ?>
    	</div>
        
        <!-- -->
        <div class="apple-nav">

        <ul class="apple-tabber" style="width:450px;">
   			<li style="width:50%;"><a href="#ttab1">Main Menu</a></li>
    		<li style="width:50%;"><a href="#ttab2">Class List</a></li>
		</ul>
        </div>
        <!-- -->
        
        <div id="ttab1" class="apple-tab_area">
        <div class="apple-nav">
    	<?php echo $html->link('Dashboard', array('admin'=> true,'controller'=>'customers','action'=>'dashboard')); ?> <div class="apple-arrow"></div>
    	</div>
        <?php if ($admin == "superadmin") { ?>
        <div class="apple-nav">
    	<?php echo $html->link('School', array('admin'=> true,'controller'=>'schools','action'=>'index')); ?> <div class="apple-arrow"></div>
    	</div>
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin") { ?>
        <div class="apple-nav">
    	<?php echo $html->link('Class', array('admin'=> true,'controller'=>'classrooms','action'=>'index')); ?> <div class="apple-arrow"></div>
    	</div>
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin") { ?>
        <div class="apple-nav">
    	<?php echo $html->link('Teacher', array('admin'=> true,'controller'=>'customers','action'=>'teachers')); ?> <div class="apple-arrow"></div>
    	</div>
        <?php } ?>
        <?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
        <div class="apple-nav">
    	<?php echo $html->link('Student', array('admin'=> true,'controller'=>'customers','action'=>'index')); ?> <div class="apple-arrow"></div>
    	</div>
        <div class="apple-nav">
    	<?php echo $html->link('Assessment', array('admin'=> true,'controller'=>'tests','action'=>'report')); ?> <div class="apple-arrow"></div>
    	</div>
        <div class="apple-nav">
    	<?php echo $html->link('Report', array('admin'=> true,'controller'=>'tests','action'=>'report')); ?> <div class="apple-arrow"></div>
    	</div>
        <?php } ?>
         <div class="apple-nav">
    	<?php if ($admin == "superadmin" || $admin == "schooladmin" || $admin == "teacher") { ?>
            <?php echo $html->link('My Account', array('admin'=> true,'controller'=>'customers','action'=>'edit_teachers', $users_userID)); ?>
         	<?php } else { ?>
			<?php echo $html->link('My Account', array('admin'=> true,'controller'=>'customers','action'=>'edit', $users_userID)); ?>
            <?php } ?> <div class="apple-arrow"></div>
    	</div>
        <div class="apple-nav">
        <?php echo $html->link('Help', array('admin'=> true,'controller'=>'customers','action'=>'help')); ?><div class="apple-arrow"></div>
        </div>
        <div class="apple-nav">
    	<?php echo $html->link('Log out', array('admin'=> false,'controller'=>'customers','action'=>'logout')); ?> <div class="apple-arrow"></div>
    	</div>
    </div>
    
    <div id="ttab2" class="apple-tab_area">
    <div class="apple-nav">
    	 <?php 
					$student_id = $this->params['pass'][0];
					$access_token = $this->params['pass'][1];
					$test_id = $this->params['pass'][2];
		    ?>
            <span style="font-weight:bold;"><?php echo $html->link('Class Report', array('admin'=> true, 'controller' => 'scores', 'action' => 'reportfilter',$student_id, $access_token, $test_id, $scoresheetpath),array('target' => '_blank')); ?></span> <div class="apple-arrow"></div>
    	</div>
        
        <!-- APPLE - THE LIST OF STUDENT -->
         <?php
		//CHECK THE DIFFERENT TYPE OF REPORT		
		if($vaild == "edit") {
				
				if ($studenttestNames) { 
				
				foreach ($studenttestNames as $studenttestName) {
				
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);	
					
				echo "<div class='apple-nav'>".$html->link($studenttestName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => $scoresheetpath, $studenttestName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."<div class=\"apple-arrow\"></div>"."</div>";
				}
				
				} else {
					
		$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
		
		foreach($studentNames as $studentName) {
			
		$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);
			
		echo "<div class='apple-nav'>".$html->link($studentName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => $scoresheetpath, $studentName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."<div class=\"apple-arrow\"></div>"."</div>";
		}
					
				};
		//CHECK THE DIFFERENT TYPE OF REPORT 		
		} elseif ($vaild != "report") {
		 
		 if ($studenttestNames) { 
				
				foreach ($studenttestNames as $studenttestName) {
				
				$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);	
					
				echo "<div class='apple-nav'>".$html->link($studenttestName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reports"."_".$bk_type, $studenttestName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."<div class=\"apple-arrow\"></div>"."</div>";
				}
				
				} else {
					
		$studentNames = $this->requestAction('/customers/listofstudents/'.$this->params['pass'][0]);		
				
		foreach($studentNames as $studentName) {
			
		$studenttestid = $this->requestAction('/tests/getthefirsttestid/'.$studenttestName['Customer']['id']."/".$access_token);
			
		echo "<div class='apple-nav'>".$html->link($studentName['Customer']['customers_name'], array('admin'=> true, 'controller' => 'scores','action' => "reports"."_".$bk_type, $studentName['Customer']['id'], $this->params['pass'][1], $studenttestid['Test']['id'],$range))."<div class=\"apple-arrow\"></div>"."</div>";
		}
					
				};
		//END OF CHECK THE DIFFERENT TYPE OF REPORT
		}
		?>
        
    </div>
    
    </div>
    
    
    <div id="main-right"> <!-- main color - main decision -->
    
    <div class="col" id="section-right">
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