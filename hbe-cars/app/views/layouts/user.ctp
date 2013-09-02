<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"  
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">  
<html> 
<head>  
<?php echo $html->css('search_style'); ?>
<?php echo $html->css( 'global' ); ?>
<?php echo $html->css( 'site' ); ?>
<?php echo $html->css( 'nivo-slider' ); ?>
<?php echo $html->css( 'pascal' ); ?>	 
<?php echo $javascript->link('jquery.min'); ?>
<title><?php echo $title_for_layout ?></title>
<?php echo $html->meta('icon', 'favicon.ico'); ?>
<link href="http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet" type="text/css">
<script type="text/javascript">

$(document).ready(function(){	
	$('.alpha-home-content').fadeIn(2000);
	$('.beta-content').fadeIn(2000);
	$('.alpha-content').fadeIn(2000);
	$('.alpha-content-full').fadeIn(2000);
	
	// hide #back-top first
		$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
});

$(document).load(function() {
		
var total = $('#slider img').length;
var rand = Math.floor(Math.random()*total);
	
    $('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 1000, // Slide transition speed
        pauseTime: 10000, // How long each slide will show
     		startSlide:rand,
	         pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        captionOpacity: 0.8, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: true, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>
<style type="text/css">
a.toplinking:link {color:white;}
a.toplinking:visited {color:white;}
a.toplinking:hover {color:#f0fe89;}
</style>
</head>  

<body>    
	<div class="header">
		<div class="wrapper"> 
        <div class="alpha">
        <?php echo $html->image("logo.png", array(
			"alt" => "SUMYKIDS",
			'url' => "/",
			'class' => 'logo',
			'style' => 'border:0px;'
			)); ?>
           <!-- <h4>Home&nbsp;&nbsp;&nbsp;&nbsp;
            About Us&nbsp;&nbsp;&nbsp;&nbsp;
            Contact Us</h4> -->
        </div>
        <div class="beta">
        <div class="loginTop">
            <ul>
            <li style="font-size:14px;
	font-family:'Maven Pro', sans-serif;
	color:#FFF;
	line-height:3em;">Welcome, 
    
    <?php if($logged_in) { echo ucfirst($users_username); ?>
	<?php echo $html->link('( Log out )', array('admin'=> false,'controller'=>'customers','action'=>'logout'), array('class' => 'toplinking')); ?> <?php echo $html->link(' My Account', array('admin'=> false,'controller'=>'customers','action'=>'account'), array('class' => 'toplinking')); 
	
	if($admin) { 
	    echo " |";  echo $html->link(' Admin Panel', array('admin'=> true,'controller'=>'products','action'=>'index'), array('class' => 'toplinking'));
	}
	
	 ?>
	<?php } else { ?>
    <?php echo $html->link('( Log in )', array('admin'=> false,'controller'=>'customers','action'=>'login'), array('class' => 'toplinking')); ?> <?php echo $html->link('( Register )', array('admin'=> false,'controller'=>'customers','action'=>'registration'), array('class' => 'toplinking')); ?> <?php echo $html->link(' My Account', array('admin'=> false,'controller'=>'customers','action'=>'account'), array('class' => 'toplinking')); } ?>
    </li>
                <li class="shoppingCart">
  <?php echo
    $this->element('cartnum');
    ?>
                </li>
            </ul>
        </div> 
		
       <div class="search">
			
        	<!-- <form id="searchbox" action="" method="get">-->
			
          <div class="search_query">
		   <!--<input id="search_query_top" class="search_query" type="text" value="" name="search_query"> -->
			<?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'products', 'action' => 'search'),'class'=>'genform','id'=>'searchbox2')); ?>
			<a href="javascript:document.getElementById('searchbox2').submit();">Go!</a>
<?php echo $form->input('search_text', array('id' =>'g','placeholder'=>'Search','label' => false)); ?>
            <!--<input type="hidden" value="position" name="orderby">
            <input type="hidden" value="desc" name="orderway"> 
            </form> -->
			</div>
        </div>
			
        </div>
<!-- cart -->
		</div>
        <br clear="all" />
		<div class="navigation">
			<div id="tmcategories">
           
       		<?php  echo $this->element('menu') ;?>

			</div>
		</div>
	</div>
    
	<!-- CONTENT -->
	<div class="content">
   <?php
   echo $session->flash();
   ?>
<?php  echo $content_for_layout  ?>
<div style="clear:both;"></div>
<p id="back-top">
		<a href="#top"><span></span>TOP</a>
	</p>
</div>
   
	<!-- END OF CONTENT -->
	<!-- FOOTER --->
		<div class="footer">
	<div>
	<h4>Information</h4>
        <ul>
            <li><?php echo $html->link(__('About Us', true), array('admin'=>false,'controller' => 'pages', 'action' => 'about_us')); ?></li>
            <li><?php echo $html->link(__('Contact', true), array('admin'=>false,'controller' => 'pages', 'action' => 'contact_us')); ?></li>
            <li><?php echo $html->link(__('Use Voucher', true), array('admin'=>false,'controller' => 'pages', 'action' => 'use_voucher')); ?></li>
            <!-- <li>Terms and Conditions</li> -->
        </ul>
	</div>
	<div>
	<h4>Our Offers</h4>
        <ul>
	         <li><?php echo $html->link(__('Latest Offers', true), array('admin'=>false,'controller' => 'products', 'action' => 'latest')); ?>	</li>            <li><?php echo $html->link(__('Featured Offers', true), array('admin'=>false,'controller' => 'products', 'action' => 'featured')); ?></li>
        </ul>
	</div>
	<div>
	<h4>Your Accounts</h4>
        <ul>
            <li><?php echo $html->link(__('Personal Information', true), array('admin'=>false,'controller' => 'customers', 'action' => 'account')); ?>	</li>
            <li><?php echo $html->link(__('Order History', true), array('admin'=>false,'controller' => 'orders', 'action' => 'status')); ?></li>
        </ul>
	</div>
	<br clear="all">
	</div>
	<div class="base">
    <br /><br />
	<p>&copy; Copyright 2012 SumyKids. All Rights Reserved.</p>
    <br />
	</div>
    
        <?php echo $javascript->link('jquery.min'); ?>
        <?php echo $javascript->link('jquery.nivo.slider.pack'); ?>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    	<!-- END OF FOOTER -->
</body>  
</html>  