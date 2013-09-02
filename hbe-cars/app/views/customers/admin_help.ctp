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
<h4 class="alert_info">Help Desk</h4>

<article class="module width_full">

<header><h6>CARS and STARS Online Support</h6></header>
            
	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:100%;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td>
   <p> CARS &amp; STARS Online Support Team is structured to ensure rapid resolution of customer issues. All incoming inquiries, including both technical support cases and non-technical administrative issues, are handled directly by CARS &amp; STARS Online's technical personnel and are either handled immediately or escalated appropriately.
   <br/> <br/>
   This part of the Website provides answers to frequently asked questions about CARS &amp; STARS Online. If you have a problem that isn't covered here, please email the screenshot(s) and a description of the problem to <a href="mailto:hbe@carsandstars.com.au">hbe@carsandstars.com.au</a>
   </p>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>

<br clear="all" />
     
<div id="accord">
    <div id="accordion">
    
    	<div class="group">
        <h3><span style="font-weight:bold;">What is the Assessment section?</span></h3>
            <div style="padding-left:10px;">
            	<p>
                Cars &amp; Stars Online allows you to group students into the different reading levels that you are teaching to in the classroom. This is done in the "Begin New Level" section. Here you record individual results and monitor overall class performance on a per reading level basis (i.e. CARS level B).
                </p>
            </div>
        </div>
        
        <div class="group">
        <h3><span style="font-weight:bold;">How do I add results?</span></h3>
            <div style="padding-left:10px;">
            	<p>
              To add your student’s results into the system, group the results by reading level and select "Begin New Level". Add all your students' results for that level (i.e. CARS level C).
                </p>
            </div>
        </div>
        
        <div class="group">
        <h3><span style="font-weight:bold;">How do I resume entering data into a level?</span></h3>
            <div style="padding-left:10px;">
            	<p>
              If you do not complete a level in a session, select "Continue level", to complete the data entry for that reading level.
                </p>
            </div>
        </div>
        
        <div class="group">
        <h3><span style="font-weight:bold;">How do I enter a new reading level?</span></h3>
            <div style="padding-left:10px;">
            	<p>
               If you have completed all the student data from a level ( i.e. CARS level B), and wish to begin entering data for a new reading level (i.e. CARS level C) select "Begin New Level" and record all the individual student data for that reading level.
                </p>
            </div>
        </div>
        
        <div class="group">
        <h3><span style="font-weight:bold;">How do I access past Assessments?</span></h3>
            <div style="padding-left:10px;">
            	<p>
              You can revisit your level assessment records at anytime by selecting "Assessment Listing" and choosing the appropriate record.
 <br/><br/>
The Assessment Listing shows a record of previously reading levels assessments and the date that the assessment was entered. Here you can edit, or view individual student results
 <br/><br/>
Why do I have more than one Assessment Listing for a particular reading level?
You may have inadvertently selected "Begin New Level" upon resuming a session mid way through adding data to a reading level instead of selecting "Continue Level"
 <br/><br/>
To generate a thorough analysis of your class, we recommend you to create one Assessment for each reading level per class. This ensures each reading level record will contain all the students who are currently on that level. (i.e CARS level C).
 <br/><br/>
If this happens you will need to re-enter the individual student data for that level into one Assessment record and delete the duplicates.
                </p>
            </div>
        </div>
    
    	<div class="group">
        <h3><span style="font-weight:bold;">How do I view my class report?</span></h3>
            <div style="padding-left:10px;">
            	<p>To view your class reports, you will need to click the <span class="bold"><a href="http://carsandstars.com.au/admin/tests/report">Report Listing</a></span> in the left corner of your page.
                <br/><br/>
                Once you're in the Report Listing page, select your report and click the <?php echo $html->image('viewreport.png', array('alt' => 'View Report'))?>
                </p>
            </div>
        </div>
        
         <div class="group">
        <h3><span style="font-weight:bold;">Why is my browser shows "This page cannot be found"?</span></h3>
            <div style="padding-left:10px; overflow:visible;">
            	<p>
                You will need to check with your school network administrator that you have an active Internet connection.
                <br/><br/>
                You will also need to inform your school network administrator to grant you full access and permission to Website (http://www.carsandstars.com.au).
                </p>
            </div>
        </div>
        
    </div>
</div>

<div class="spacer"></div>