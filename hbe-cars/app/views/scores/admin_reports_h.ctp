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


<br /><br/><br /><br/><br /><br/><br /><br/><br />
<h4 class="printer">


<span style="display:inline-block; vertical-align:middle; text-indent:0px; text-align:right;
">

<?php 
	echo $html->image('printreport.png', array(
'class'=>'borderzero print', 'url' => '#', 'onclick' => 'window.print(); return false;'));
	
 ?>

</span>


<span style="display:inline-block; vertical-align:middle; text-indent:5px; padding-right:10px; text-align:right;
">

 
 <?php 
	echo $html->image('student_report.png', array(
'class'=>'borderzero print', 'url' => '#', 'onclick' => 'window.print(); return false;'));
	
 ?>

</span></h4>
<h4 class="alert_info">Book H &nbsp;&nbsp; CARS &reg; Series</h4>

<br/><br/>

<div class="class_status">
<?php 
 if (empty($this->params['pass'][3])) {
	$setting = "out of 5";
	$l15 = 'color:#EA6402';
	$l610 = '';
	$l110 = '';
	$avg = 3;
	$graph = 5;
 }
?>
<?php if (!empty($this->params['pass'][3])) {
	if ($this->params['pass'][3] == '1-5') {
	$setting = "out of 5";
	$l15 = 'color:#EA6402';
	$l610 = '';
	$l110 = '';
	$avg = 3;
	$graph = 5;
	} else if ($this->params['pass'][3] == '6-10') {
	$setting = "out of 5";
	$l15 = '';
	$l610 = 'color:#EA6402';
	$l110 = '';
	$avg = 3;
	$graph = 5;
	} else if ($this->params['pass'][3] == '1-10') {
	$setting = "out of 10";
	$l15 = '';
	$l610 = '';
	$l110 = 'color:#EA6402';
	$avg = 5;
	$graph = 10;
	}
 }
?>

<?php echo $html->link('Lesson 1 - 5', array('controller' => 'scores', 'action' => 'reports_h', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2],'1-5'),array('style'=>$l15)); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $html->link('Lesson 6 - 10', array('controller' => 'scores', 'action' => 'reports_h', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2],'6-10'),array('style'=>$l610)); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $html->link('Lesson 1 - 10', array('controller' => 'scores', 'action' => 'reports_h', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2],'1-10'),array('style'=>$l110)); ?>
</div>

<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
       chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container_graph',
            type: 'column'
         },
         title: {
            text: ' '
         },
         xAxis: {
            categories: ['MI', 'FD', 'US', 'CE', 'CC', 'MP', 'WM', 'CI', 'FO','AP', 'FL', 'SM'],
         },
         yAxis: {
			 min: 0, max: <?php echo $graph; ?>,
            title: {
               text: 'Correct Response'
            },
			allowDecimals: false,
         },
         series: [{
            name: 'Strategy',
            data: [<?php echo $MI_pts ?>, <?php echo $FD_pts ?>, <?php echo $US_pts ?>, <?php echo $CE_pts ?>, <?php echo $CC_pts ?>, <?php echo $MP_pts ?>, <?php echo $WM_pts ?>, <?php echo $CI_pts ?> , <?php echo $FO_pts ?> , <?php echo $AP_pts ?> , <?php echo $FL_pts ?>  , <?php echo $SM_pts ?>],
			threshold: 0,
         }]
      });});
});
</script>

<article class="module width_3_quarter_report mainidea">

<header><h6>STUDENT REPORTS - ACCESSING THE STRATEGIES</h6></header>
    

<div style="height:auto">

<table class="tablesorter" cellspacing="0"> 
            <thead> 
				<tr> 
    				<th>Strategy</th> 
    				<th>Number of Correct Response</th> 
					<th>Per cent Correct</th>
				</tr> 
			</thead>  
			<tbody> 
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Finding Main Idea</strong></p>
                </td>
                <td>
                <p><?php if ($MI_pts < $avg)
						 echo "<span style='color:red'>".$MI_pts."</span>";
						 else
						 echo "<span style='color:green'>".$MI_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $MI = $MI_pts / $graph * 100;
						 if ($MI_pts < $avg)
						 echo "<span style='color:red'>".$MI."%</span>";
						 else
						 echo "<span style='color:green'>".$MI."%</span>";
	
				
				 ?></p>
                </td>
            </tr>    
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Recalling Facts and Details</strong></p>
                </td>
                <td>
                <p><?php if ($FD_pts < $avg)
						 echo "<span style='color:red'>".$FD_pts."</span>";
						 else
						 echo "<span style='color:green'>".$FD_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $FD = $FD_pts / $graph * 100;
						 if ($FD_pts < $avg)
						 echo "<span style='color:red'>".$FD."%</span>";
						 else
						 echo "<span style='color:green'>".$FD."%</span>";
	
				
				 ?></p>
                </td>
            </tr>    
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Understanding Sequence</strong></p>
                </td>
                <td>
                <p><?php if ($US_pts < $avg)
						 echo "<span style='color:red'>".$US_pts."</span>";
						 else
						 echo "<span style='color:green'>".$US_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $US = $US_pts / $graph * 100;
						 if ($US_pts < $avg)
						 echo "<span style='color:red'>".$US."%</span>";
						 else
						 echo "<span style='color:green'>".$US."%</span>";
	
				
				 ?></p>
                </td>
            </tr> 
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Recognising Cause and Effect</strong></p>
                </td>
                <td>
                <p><?php if ($CE_pts < $avg)
						 echo "<span style='color:red'>".$CE_pts."</span>";
						 else
						 echo "<span style='color:green'>".$CE_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $CE = $CE_pts / $graph * 100;
						 if ($CE_pts < $avg)
						 echo "<span style='color:red'>".$CE."%</span>";
						 else
						 echo "<span style='color:green'>".$CE."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Comparing and Constrasting</strong></p>
                </td>
                <td>
                <p><?php if ($CC_pts < $avg)
						 echo "<span style='color:red'>".$CC_pts."</span>";
						 else
						 echo "<span style='color:green'>".$CC_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $CC = $CC_pts / $graph * 100;
						 if ($CC_pts < $avg)
						 echo "<span style='color:red'>".$CC."%</span>";
						 else
						 echo "<span style='color:green'>".$CC."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Making Predictions</strong></p>
                </td>
                <td>
                <p><?php if ($MP_pts < $avg)
						 echo "<span style='color:red'>".$MP_pts."</span>";
						 else
						 echo "<span style='color:green'>".$MP_pts."</span>";
						  ?> <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $MP = $MP_pts / $graph * 100;
						 if ($MP_pts < $avg)
						 echo "<span style='color:red'>".$MP."%</span>";
						 else
						 echo "<span style='color:green'>".$MP."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Finding Word Meaning in Context</strong></p>
                </td>
                <td>
                <p><?php if ($WM_pts < $avg)
						 echo "<span style='color:red'>".$WM_pts."</span>";
						 else
						 echo "<span style='color:green'>".$WM_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $WM = $WM_pts / $graph * 100;
						 if ($WM_pts < $avg)
						 echo "<span style='color:red'>".$WM."%</span>";
						 else
						 echo "<span style='color:green'>".$WM."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Drawing Conclusions and Making Inferences</strong></p>
                </td>
                <td>
                <p><?php if ($CI_pts < $avg)
						 echo "<span style='color:red'>".$CI_pts."</span>";
						 else
						 echo "<span style='color:green'>".$CI_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $CI = $CI_pts / $graph * 100;
						 if ($CI_pts < $avg)
						 echo "<span style='color:red'>".$CI."%</span>";
						 else
						 echo "<span style='color:green'>".$CI."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Distinguishing Between Fact and Opinion</strong></p>
                </td>
                <td>
                <p><?php if ($FO_pts < $avg)
						 echo "<span style='color:red'>".$FO_pts."</span>";
						 else
						 echo "<span style='color:green'>".$FO_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $FO = $FO_pts / $graph * 100;
						 if ($FO_pts < $avg)
						 echo "<span style='color:red'>".$FO."%</span>";
						 else
						 echo "<span style='color:green'>".$FO."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Identifying Author's Purpose</strong></p>
                </td>
                <td>
                <p><?php if ($AP_pts < $avg)
						 echo "<span style='color:red'>".$AP_pts."</span>";
						 else
						 echo "<span style='color:green'>".$AP_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $AP = $AP_pts / $graph * 100;
						 if ($AP_pts < $avg)
						 echo "<span style='color:red'>".$AP."%</span>";
						 else
						 echo "<span style='color:green'>".$AP."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Interpreting Figurative Language </strong></p>
                </td>
                <td>
                <p><?php if ($FL_pts < $avg)
						 echo "<span style='color:red'>".$FL_pts."</span>";
						 else
						 echo "<span style='color:green'>".$FL_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $FL = $FL_pts / $graph * 100;
						 if ($FL_pts < $avg)
						 echo "<span style='color:red'>".$FL."%</span>";
						 else
						 echo "<span style='color:green'>".$FL."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Summarising </strong></p>
                </td>
                <td>
                <p><?php if ($SM_pts < $avg)
						 echo "<span style='color:red'>".$SM_pts."</span>";
						 else
						 echo "<span style='color:green'>".$SM_pts."</span>";
						  ?>  <?php echo $setting; ?></p>
                </td>
                <td>
                <p><?php 
						 $SM = $SM_pts / $graph * 100;
						 if ($SM_pts < $avg)
						 echo "<span style='color:red'>".$SM."%</span>";
						 else
						 echo "<span style='color:green'>".$SM."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            </tbody>
            </table>
          
</div>
    


    <br clear="all" /> 
</article>

<article id="studentprofile" class="module width_quarter_report">
			<header><h6>Student Details</h6></header>
            <div style="text-align:center; padding-top:40px;">
   <?php if(!empty($studentPhoto)) { ?>

      <?php echo $html->image('sets/small/'.$studentPhoto, array('class' => 'drop-shadow','width'=>'120px'))?>
      
      <?php } else { ?>
    <?php
    
	if ($studentGender == "M") {
	echo $html->image('no-user-m.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	} else {
	echo $html->image('no-user-f.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	}
	
	?>
  <?php }  ?>
    	</div>
        
        <div style="text-align:center; padding-top:40px;">
   <!-- <p class="test_label">Student ID: </p> -->
   <!-- <p class="test_label bold"><strong><?php // echo $studentID ?></strong></p> -->
    <!-- <br /><br /> -->
    <p class="test_label">Name: </p>
    <p class="test_label bold"><strong><?php echo $studentName ?></strong></p>
    <br /><br />
    <p class="test_label">Teacher: </p>
    <p class="test_label bold"><strong><?php
	
	$getteacher = $this->requestAction('/customers/getteacher/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);
	
	if ($getteacher) { 
				
				echo $getteacher['Customer']['customers_name'];
				
	} else {
					
	$getactualteacher = $this->requestAction('/customers/getactualteacher/'.$this->params['pass'][0]);		
							
	echo $getactualteacher['Customer']['customers_name'];
									
	};
	
	
	?></strong></p>
    <br /><br />
    <p class="test_label">Tested On: </p>
    <p class="test_label bold"><strong><?php echo date('d/m/Y', strtotime($studentTestedOn)); ?> </strong></p>
    <br /><br />
    <p class="test_label bold">
    
    <?php // echo  $html->link('Score Sheets', array('controller' => 'scores','action' => 'reports', $this->params['pass'][0],$this->params['pass'][1]),array('target' => '_blank')); ?>
    <?php echo $html->link('Edit Score Sheets', array('controller' => 'scores', 'action' => 'edit_carseries_d_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2])); ?>
    </p>
    </div>

	
   
       

		</article><!-- end of messages article -->


<?php 

	function get_user_browser()
	{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent))
    {
        $ub = "ie";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $ub = "firefox";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $ub = "safari";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $ub = "chrome";
    }
    elseif(preg_match('/Flock/i',$u_agent))
    {
        $ub = "flock";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $ub = "opera";
    }

    return $ub;
	}
	
	?>
    
    <?php
	
	$browser = get_user_browser();
	if($browser == "firefox"){
	
	?>

	<div style="page-break-before:always;"></div>

	<?php } else { ?>

	<div style="page-break-before:always;"><br clear="all"/></div>

	<? } ?>


<article class="module width_3_quarter_report secidea">
<header><h6>STUDENT REPORTS - COMPARING LEVELS OF MASTERY</h6></header>
<div id="container_graph"></div>
<br clear="all" /> 
</article>

  <?php
	
	$browser = get_user_browser();
	if($browser == "firefox"){
	
	?>

	<div style="page-break-before:always;"></div>

	<?php } else { ?>

	<div style="page-break-before:always;"><br clear="all"/></div>

	<? } ?>


<article class="module width_3_quarter_report thirdidea">
<header><h6>STUDENT REPORTS - ANALYSIS OF READING STRATEGIES</h6></header>
<div style="height:288px;">
<table cellpadding="10" width="100%" cellspacing="10" border="0">
<tr>
<td width="50%" style="text-align:center;">
<p style="color:green; font-weight:bold;"><strong>Strengths</strong></p><br/><br/>
</td>
<td width="50%" style="text-align:center;">
<p style="color:red; font-weight:bold;"><strong>Needs Improvements</strong></p><br/><br/>
</td>
</tr>
<tr>
<td width="50%" style="text-align:center;">
	<p><?php if ($MI_pts >= $avg)
	echo "Finding Main Idea"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FD_pts >= $avg)
	echo "Recalling Facts and Details"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($US_pts >= $avg)
	echo "Understanding Sequence"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CE_pts >= $avg)
	echo "Recognising Cause and Effect"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CC_pts >= $avg)
	echo "Comparing and Constrasting"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($MP_pts >= $avg)
	echo "Making Predictions"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($WM_pts >= $avg)
	echo "Finding Word Meaning in Context"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CI_pts >= $avg)
	echo "Drawing Conclusions and Making Inferences"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FO_pts >= $avg)
	echo "Distinguishing Between Fact and Opinion"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($AP_pts >= $avg)
	echo "Identifying Author's Purpose"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FL_pts >= $avg)
	echo "Interpreting Figurative Language"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($SM_pts >= $avg)
	echo "Summarising"."<br/><br/>";
	else
	echo "";
	?></p>
</td>
<td width="50%" style="text-align:center;">
	<p><?php if ($MI_pts < $avg)
	echo "Finding Main Idea"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FD_pts < $avg)
	echo "Recalling Facts and Details"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($US_pts < $avg)
	echo "Understanding Sequence"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CE_pts < $avg)
	echo "Recognising Cause and Effect"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CC_pts < $avg)
	echo "Comparing and Constrasting"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($MP_pts < $avg)
	echo "Making Predictions"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($WM_pts < $avg)
	echo "Finding Word Meaning in Context"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($CI_pts < $avg)
	echo "Drawing Conclusions and Making Inferences"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FO_pts < $avg)
	echo "Distinguishing Between Fact and Opinion"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($AP_pts < $avg)
	echo "Identifying Author's Purpose"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FL_pts < $avg)
	echo "Interpreting Figurative Language"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($SM_pts < $avg)
	echo "Summarising"."<br/><br/>";
	else
	echo "";
	?></p>
</td>
</tr>
</table>
</div>
<br clear="all" /> 
</article>

  <?php
	
	$browser = get_user_browser();
	if($browser == "firefox"){
	
	?>

	<div style="page-break-before:always;"></div>

	<?php } else { ?>

	<div style="page-break-before:always;"><br clear="all"/></div>

	<? } ?>


<article id="studentprofilelayout" class="module width_quarter_report">
			<header><h6>Student Details</h6></header>
            <div style="text-align:center; padding-top:40px;">
   <?php if(!empty($studentPhoto)) { ?>

      <?php echo $html->image('sets/small/'.$studentPhoto, array('class' => 'drop-shadow','width'=>'120px'))?>
      
      <?php } else { ?>
    <?php
    
	if ($studentGender == "M") {
	echo $html->image('no-user-m.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	} else {
	echo $html->image('no-user-f.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	}
	
	?>
  <?php }  ?>
    	</div>
        
        <div style="text-align:center; padding-top:40px;">
   <!-- <p class="test_label">Student ID: </p> -->
   <!-- <p class="test_label bold"><strong><?php // echo $studentID ?></strong></p> -->
    <!-- <br /><br /> -->
    <p class="test_label">Name: </p>
    <p class="test_label bold"><strong><?php echo $studentName ?></strong></p>
    <br /><br />
    <p class="test_label">Teacher: </p>
    <p class="test_label bold"><strong><?php
	
	$getteacher = $this->requestAction('/customers/getteacher/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);
	
	if ($getteacher) { 
				
				echo $getteacher['Customer']['customers_name'];
				
	} else {
					
	$getactualteacher = $this->requestAction('/customers/getactualteacher/'.$this->params['pass'][0]);		
							
	echo $getactualteacher['Customer']['customers_name'];
									
	};
	
	
	?></strong></p>
    <br /><br />
    <p class="test_label">Tested On: </p>
    <p class="test_label bold"><strong><?php echo date('d/m/Y', strtotime($studentTestedOn)); ?> </strong></p>
    <br /><br />
    <p class="test_label bold">
    
    <?php // echo  $html->link('Score Sheets', array('controller' => 'scores','action' => 'reports', $this->params['pass'][0],$this->params['pass'][1]),array('target' => '_blank')); ?>
    <?php echo $html->link('Edit Score Sheets', array('controller' => 'scores', 'action' => 'edit_carseries_d_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2])); ?>
    </p>
    </div>

	
   
       

		</article><!-- end of messages article -->


<div class="clear"></div>



 <br /><br />   <br /><br /> 
<?php echo $javascript->link('tinyreport'); ?>
<script type="text/javascript">
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","h5",0);
parentAccordion.pr(1);
</script>