<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"  
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">  
<html>  
<head>
<title><?php echo $title_for_layout ?></title>

<?php echo $html->meta('icon', $html->url('/img/mac-icon.png')); ?>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
<?php echo $html->css( 'queryLoader' ); ?>
<?php echo $html->css( 'bootstrap' ); ?>
<?php echo $html->css( 'atooltip' ); ?>
<?php echo $html->css( 'jquery-ui-1.8.20.custom.css' ); ?>
<?php echo $javascript->link('script'); ?>
<?php echo $html->css( 'queryLoader' ); ?>
<?php echo $html->css( 'bootstrap' ); ?>
<?php echo $html->css( 'style' ); ?>
<?php echo $html->css( 'login' ); ?>

<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
-->		
<?php echo $javascript->link('jquery.min'); ?>
<script type="text/javascript">
$(window).resize(function(){

	$('.main-wrapper').css({
		position:'absolute',
		left: ($(window).width() - $('.main-wrapper').outerWidth())/2,
		top: ($(window).height() - $('.main-wrapper').outerHeight())/2
	});

});

$().ready(function() {
// To initially run the function:
$(window).resize();
});
</script>
<?php echo $javascript->link('jquery.metadata'); ?>
<?php echo $javascript->link('jquery.validate'); ?>
<?php echo $javascript->link('jqueryUi.js'); ?>
<?php echo $javascript->link('hoveraccordion.js'); ?>
<?php echo $javascript->link('jquery.atooltip'); ?>
<script type="text/javascript">
	
	$.metadata.setType("attr", "validate");
			
	jQuery.validator.addMethod("maxLen", function (value, element, param) {

    if ($(element).val().length > param) {
        return false;
    } else {
        return true;
    }
}, "You have reached the maximum number of characters allowed for this field.");
		
$().ready(function() {
		
	$('.main-wrapper')
  .css('opacity', 0)
  .slideDown('slow')
  .animate(
    { opacity: 1 },
    { queue: false, duration: 2000 }
  );
				
	var container = $('div.container');
		$("#form2").validate();
}); 
</script>
</head> 
 <body>
	<?php echo $content_for_layout ?>

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