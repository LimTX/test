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
            categories: ['Finding Big Idea', 'Finding Details', 'Putting Things in Order', 'Understanding What Happens and Why', 'Making a Guess', 'Figuring Things Out'],
         },
         yAxis: {
			 min: 0, max: 10,
            title: {
               text: 'Correct Response'
            },
			allowDecimals: false,
         },
         series: [{
            name: 'Strategy',
            data: [<?php echo $BI_pts ?>, <?php echo $FD_pts ?>, <?php echo $PO_pts ?>, <?php echo $WW_pts ?>, <?php echo $MG_pts ?>, <?php echo $FO_pts ?>],
			threshold: 0,
         }]
      });});
});
</script>
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
<h4 class="alert_info">Book K &nbsp;&nbsp; CARS &reg; Series</h4>

<article class="module width_3_quarter_report mainidea_a_raa">

<header><h6>STUDENT REPORTS - ACCESSING THE STRATEGIES LESSONS 1-10</h6></header>
    

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
                <p><strong>Finding Big Idea</strong></p>
                </td>
                <td>
                <p><?php if ($BI_pts < 5)
						 echo "<span style='color:red'>".$BI_pts."</span>";
						 else
						 echo "<span style='color:green'>".$BI_pts."</span>";
						  ?> out of 10</p>
                </td>
                <td>
                <p><?php 
						 $BI = $BI_pts * 10;
						 if ($BI_pts < 5)
						 echo "<span style='color:red'>".$BI."%</span>";
						 else
						 echo "<span style='color:green'>".$BI."%</span>";
	
				
				 ?></p>
                </td>
            </tr>    
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Finding Details</strong></p>
                </td>
                <td>
                <p><?php if ($FD_pts < 5)
						 echo "<span style='color:red'>".$FD_pts."</span>";
						 else
						 echo "<span style='color:green'>".$FD_pts."</span>";
						  ?> out of 10</p>
                </td>
                <td>
                <p><?php 
						 $FD = $FD_pts * 10;
						 if ($FD_pts < 5)
						 echo "<span style='color:red'>".$FD."%</span>";
						 else
						 echo "<span style='color:green'>".$FD."%</span>";
	
				
				 ?></p>
                </td>
            </tr>    
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Putting Things in Order</strong></p>
                </td>
                <td>
                <p><?php if ($PO_pts < 5)
						 echo "<span style='color:red'>".$PO_pts."</span>";
						 else
						 echo "<span style='color:green'>".$PO_pts."</span>";
						  ?> out of 10</p>
                </td>
                <td>
                <p><?php 
						 $PO = $PO_pts * 10;
						 if ($PO_pts < 5)
						 echo "<span style='color:red'>".$PO."%</span>";
						 else
						 echo "<span style='color:green'>".$PO."%</span>";
	
				
				 ?></p>
                </td>
            </tr> 
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Understanding What Happens and Why</strong></p>
                </td>
                <td>
                <p><?php if ($WW_pts < 5)
						 echo "<span style='color:red'>".$WW_pts."</span>";
						 else
						 echo "<span style='color:green'>".$WW_pts."</span>";
						  ?> out of 10</p>
                </td>
                <td>
                <p><?php 
						 $WW = $WW_pts * 10;
						 if ($WW_pts < 5)
						 echo "<span style='color:red'>".$WW."%</span>";
						 else
						 echo "<span style='color:green'>".$WW."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Making a Guess</strong></p>
                </td>
                <td>
                <p><?php if ($MG_pts < 5)
						 echo "<span style='color:red'>".$MG_pts."</span>";
						 else
						 echo "<span style='color:green'>".$MG_pts."</span>";
						  ?> out of 10</p>
                </td>
                <td>
                <p><?php 
						 $MG = $MG_pts * 10;
						 if ($MG_pts < 5)
						 echo "<span style='color:red'>".$MG."%</span>";
						 else
						 echo "<span style='color:green'>".$MG."%</span>";
	
				
				 ?></p>
                </td>
            </tr>
            <tr>                     
            	<td style="padding:23px;">
                <p><strong>Figuring Things Out</strong></p>
                </td>
                <td>
                <p><?php if ($FO_pts < 5)
						 echo "<span style='color:red'>".$FO_pts."</span>";
						 else
						 echo "<span style='color:green'>".$FO_pts."</span>";
						  ?>  out of 10</p>
                </td>
                <td>
                <p><?php 
						 $FO = $FO_pts * 10;
						 if ($FO_pts < 5)
						 echo "<span style='color:red'>".$FO."%</span>";
						 else
						 echo "<span style='color:green'>".$FO."%</span>";
	
				
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
    <?php echo $html->link('Edit Score Sheets', array('controller' => 'scores', 'action' => 'edit_carseries_k_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2])); ?>
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

<article class="module width_3_quarter_report secidea_a_raa">
<header><h6>STUDENT REPORTS - COMPARING LEVELS OF MASTERY: 1-10</h6></header>
<div id="container_graph"></div>
<br clear="all" /> 
</article>

	<?php
	
	if($browser == "firefox"){
	
	?>

	<div style="page-break-before:always;"></div>

	<?php } else { ?>

	<div style="page-break-before:always;"><br clear="all"/></div>

	<? } ?>

<article class="module width_3_quarter_report thirdidea_a_raa">
<header><h6>STUDENT REPORTS - ANALYSIS OF READING STRATEGIES: 1-10</h6></header>
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
<p><?php if ($BI_pts >= 5)
	echo "Finding Big Idea"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FD_pts >= 5)
	echo "Finding Details"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($PO_pts >= 5)
	echo "Putting Things in Order"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($WW_pts >= 5)
	echo "Understanding What Happens and Why"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($MG_pts >= 5)
	echo "Making a Guess"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FO_pts >= 5)
	echo "Figuring Things Out"."<br/><br/>";
	else
	echo "";
	?></p>
</td>
<td width="50%" style="text-align:center;">
<p><?php if ($BI_pts < 5)
	echo "Finding Big Idea"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FD_pts < 5)
	echo "Finding Details"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($PO_pts < 5)
	echo "Putting Things in Order"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($WW_pts < 5)
	echo "Understanding What Happens and Why"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($MG_pts < 5)
	echo "Making a Guess"."<br/><br/>";
	else
	echo "";
	?></p>
    <p><?php if ($FO_pts < 5)
	echo "Figuring Things Out"."<br/><br/>";
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
    <?php echo $html->link('Edit Score Sheets', array('controller' => 'scores', 'action' => 'edit_carseries_h_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2])); ?>
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