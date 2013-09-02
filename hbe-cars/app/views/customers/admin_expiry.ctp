<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
	  $(".alert_warning").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})

$(function() {  $( "#accordion" ).accordion({
		collapsible: true,
		active: false ,
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
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">Subscription</h4>

<article class="module width_full">

<header><h6>CARS &amp; STARS Online</h6></header>
            
	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:100%;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td>
   <p>
   <span style="font-weight:bold;">Pricing</span><br/>
   For schools of all shapes and sizes!<br/><br/>
   <span style="color:#EA6402; font-weight:bold;">Individual Class</span><br/>
   $20 per class / year <br/><br/>
   <span style="color:#EA6402; font-weight:bold;">Whole School</span><br/>
   $200 per school / year <br/><br/>
   
   Notice: Please inform your staff in-charge to make an online purchase at <a href="http://hbe.com.au">http://www.hbe.com.au</a>. To save keep your existing school data, please only use this email ( <span style="color:red; font-weight:bold;"><?php echo $email; ?></span> ) when making a purchase.<br/><br/>For any subscription inquries, please contact us at <a href="hbe@carsandstars.com.au">hbe@carsandstars.com.au</a>.
   </p>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>

<br clear="all" />

<div class="spacer"></div>