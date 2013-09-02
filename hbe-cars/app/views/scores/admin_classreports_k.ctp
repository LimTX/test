<?php echo $html->css('classreport'); ?>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {	   				
       chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container_graphclass2',
            type: 'column',
			width: '600'
         },
         title: {
            text: 'Average % of Correct Answers'
         },
         xAxis: {
			 labels: {
         style: {
            font: '10px Arial'
         }
      },
            categories: ['Lesson 1', 'Lesson 2', 'Lesson 3', 'Lesson 4', 'Lesson 5', 'Lesson 6', 'Lesson 7', 'Lesson 8', 'Lesson 9', 'Lesson 10', 'Average']
         },
         yAxis: {
			 min: 0, max: 100,
            title: {
               text: ''
            },
			allowDecimals: false
         },tooltip: {
            formatter: function() {
                return this.point.y+"%" ;
            }
        },
         series: [{
            name: "Lesson",
			<?php $glessontotal = $noofstud * 6; ?>
            data: [<?php $glesson1 = $BIGraphResp1 + $FDGraphResp1 + $POGraphResp1 + $WWGraphResp1 + $MGGraphResp1 + $FOGraphResp1; echo $glesson1total = round($glesson1 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson2 = $BIGraphResp2 + $FDGraphResp2 + $POGraphResp2 + $WWGraphResp2 + $MGGraphResp2 + $FOGraphResp2; echo $glesson2total = round($glesson2 / $glessontotal, 2) / 0.01 ?>, 
			<?php $glesson3 = $BIGraphResp3 + $FDGraphResp3 + $POGraphResp3 + $WWGraphResp3 + $MGGraphResp3 + $FOGraphResp3; echo $glesson3total = round($glesson3 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson4 = $BIGraphResp4 + $FDGraphResp4 + $POGraphResp4 + $WWGraphResp4 + $MGGraphResp4 + $FOGraphResp4; echo $glesson4total = round($glesson4 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson5 = $BIGraphResp5 + $FDGraphResp5 + $POGraphResp5 + $WWGraphResp5 + $MGGraphResp5 + $FOGraphResp5; echo $glesson5total = round($glesson5 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson6 = $BIGraphResp6 + $FDGraphResp6 + $POGraphResp6 + $WWGraphResp6 + $MGGraphResp6 + $FOGraphResp6; echo $glesson6total = round($glesson6 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson7 = $BIGraphResp7 + $FDGraphResp7 + $POGraphResp7 + $WWGraphResp7 + $MGGraphResp7 + $FOGraphResp7; echo $glesson7total = round($glesson7 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson8 = $BIGraphResp8 + $FDGraphResp8 + $POGraphResp8 + $WWGraphResp8 + $MGGraphResp8 + $FOGraphResp8; echo $glesson8total = round($glesson8 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson9 = $BIGraphResp9 + $FDGraphResp9 + $POGraphResp9 + $WWGraphResp9 + $MGGraphResp9 + $FOGraphResp9; echo $glesson9total = round($glesson9 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson10 = $BIGraphResp10 + $FDGraphResp10 + $POGraphResp10 + $WWGraphResp10 + $MGGraphResp10 + $FOGraphResp10; echo $glesson10total = round($glesson10 / $glessontotal, 2) / 0.01 ?>,
			<?php echo (($glesson1total + $glesson2total + $glesson3total + $glesson4total + $glesson5total + $glesson6total + $glesson7total + $glesson8total + $glesson9total + $glesson10total) / 10) * 1.0 ?>
			],
			threshold: 0,
			dataLabels: {
            enabled: true,
            formatter: function() {
               return this.y+"%";
            }
         },
         }]
		 
      });});	  
});

$(function () {
    var chart2;
    $(document).ready(function() {	   				
       chart2 = new Highcharts.Chart({
         chart: {
            renderTo: 'container_graphclass',
            type: 'column'
         },
         title: {
            text: 'Average % of Correct Answers'
         },
         xAxis: {
            categories: ['Lesson 1', 'Lesson 2', 'Lesson 3', 'Lesson 4', 'Lesson 5', 'Lesson 6', 'Lesson 7', 'Lesson 8', 'Lesson 9', 'Lesson 10', 'Average'],
         },
         yAxis: {
			 min: 0, max: 100,
            title: {
               text: ''
            },
			allowDecimals: false
         },tooltip: {
            formatter: function() {
                return this.point.y+"%" ;
            }
        },
         series: [{
            name: "Lesson",
			<?php $glessontotal = $noofstud * 6; ?>
            data: [<?php $glesson1 = $BIGraphResp1 + $FDGraphResp1 + $POGraphResp1 + $WWGraphResp1 + $MGGraphResp1 + $FOGraphResp1; echo $glesson1total = round($glesson1 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson2 = $BIGraphResp2 + $FDGraphResp2 + $POGraphResp2 + $WWGraphResp2 + $MGGraphResp2 + $FOGraphResp2; echo $glesson2total = round($glesson2 / $glessontotal, 2) / 0.01 ?>, 
			<?php $glesson3 = $BIGraphResp3 + $FDGraphResp3 + $POGraphResp3 + $WWGraphResp3 + $MGGraphResp3 + $FOGraphResp3; echo $glesson3total = round($glesson3 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson4 = $BIGraphResp4 + $FDGraphResp4 + $POGraphResp4 + $WWGraphResp4 + $MGGraphResp4 + $FOGraphResp4; echo $glesson4total = round($glesson4 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson5 = $BIGraphResp5 + $FDGraphResp5 + $POGraphResp5 + $WWGraphResp5 + $MGGraphResp5 + $FOGraphResp5; echo $glesson5total = round($glesson5 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson6 = $BIGraphResp6 + $FDGraphResp6 + $POGraphResp6 + $WWGraphResp6 + $MGGraphResp6 + $FOGraphResp6; echo $glesson6total = round($glesson6 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson7 = $BIGraphResp7 + $FDGraphResp7 + $POGraphResp7 + $WWGraphResp7 + $MGGraphResp7 + $FOGraphResp7; echo $glesson7total = round($glesson7 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson8 = $BIGraphResp8 + $FDGraphResp8 + $POGraphResp8 + $WWGraphResp8 + $MGGraphResp8 + $FOGraphResp8; echo $glesson8total = round($glesson8 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson9 = $BIGraphResp9 + $FDGraphResp9 + $POGraphResp9 + $WWGraphResp9 + $MGGraphResp9 + $FOGraphResp9; echo $glesson9total = round($glesson9 / $glessontotal, 2) / 0.01 ?>,
			<?php $glesson10 = $BIGraphResp10 + $FDGraphResp10 + $POGraphResp10 + $WWGraphResp10 + $MGGraphResp10 + $FOGraphResp10; echo $glesson10total = round($glesson10 / $glessontotal, 2) / 0.01 ?>,
			<?php echo (($glesson1total + $glesson2total + $glesson3total + $glesson4total + $glesson5total + $glesson6total + $glesson7total + $glesson8total + $glesson9total + $glesson10total) / 10) * 1.0 ?>
			],
			threshold: 0,
			dataLabels: {
            enabled: true,
            formatter: function() {
               return this.y+"%";
            }
         },
         }]
		 
      });});	  
});



</script>
<br /><br/><br /><br/><br /><br/><br /><br/><br />
<h4 class="printer">

<span style="display:inline-block; vertical-align:middle; text-indent:0px; text-align:right;">

<?php 
	echo $html->image('printreport.png', array('class'=>'borderzero print', 'url' => '#', 'onclick' => 'window.print(); return false;'));
 ?>

</span>


<span style="display:inline-block; vertical-align:middle; text-indent:5px; padding-right:10px; text-align:right;
">

 <?php 
	echo $html->image('class_report.png', array('class'=>'borderzero print', 'url' => '#', 'onclick' => 'window.print(); return false;'));
	
 ?>

</span></h4>
<h4 class="alert_info">Book K &nbsp;&nbsp; CARS &reg; Series</h4>
<br/><br/>

<div class="class_status">
<?php
$studenttestNames = $this->requestAction('/customers/listofteststudents/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);

$noofteststudents = $this->requestAction('/customers/noofteststudents/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);

$noofstudents = $this->requestAction('/customers/noofstudents/'.$this->params['pass'][0]);		

if ($studenttestNames) {
		
		$classtestNames = $this->requestAction('/classrooms/classtestnames/'.$this->params['pass'][1]);	
		foreach($classtestNames as $classtestName) {
			echo "Class : <span style='color:#1c6ead;'>".$classtestName['Classroom']['name']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year Level : <span style='color:#1c6ead;'>".$classtestName['Classroom']['year_level']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No of Student : <span style='color:#1c6ead;'>".$noofteststudents."</span>";
			}
		
		} else {
	   
		$classNames = $this->requestAction('/classrooms/classnames/'.$this->params['pass'][0]);
		foreach($classNames as $className) {
			$cNames = $className['Classroom']['name'];
			echo "Class : ".$className['Classroom']['name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year Level : ".$classtestName['Classroom']['year_level']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No of Student : ".$noofstudents;
			}
		}
?>
</div>


<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Class Summary Of Strategies</h3>
        </header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px; border-bottom: 1px #CCCCCC solid;" class="empty"></th> 
    				<th class="header"><?php echo $html->link('BI', '#', array('title' => 'Finding Big Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Finding Details')); ?></th> 
                    <th class="header"><?php echo $html->link('PO', '#', array('title' => 'Putting Things in Order')); ?></th> 
                    <th class="header"><?php echo $html->link('WW', '#', array('title' => 'Understanding What Happens and Why')); ?></th>
                    <th class="header"><?php echo $html->link('MG', '#', array('title' => 'Making a Guess')); ?></th>
                    <th class="header"><?php echo $html->link('FO', '#', array('title' => 'Figuring Things Out')); ?></th>
				</tr>
           </thead>
				<tr> 
                    <td widtd="170" class="bold" align="right">Question</td> 
                    <td class="nobold">1</td> 
                    <td class="nobold">2</td> 
                    <td class="nobold">3</td> 
                    <td class="nobold">4</td>
                    <td class="nobold">5</td>
                    <td class="nobold">6</td>
				</tr>
                <tr> 
                    <td widtd="170" class="bold">No of Student Reponses</td> 
                    <td class="nobold"><?php echo $noofresponse_BI ?></td> 
                    <td class="nobold"><?php echo $noofresponse_FD; ?></td> 
                    <td class="nobold"><?php echo $noofresponse_PO; ?></td> 
                    <td class="nobold"><?php echo $noofresponse_WW; ?></td>
                    <td class="nobold"><?php echo $noofresponse_MG; ?></td>
                    <td class="nobold"><?php echo $noofresponse_FO; ?></td>
				</tr>
                <tr> 
                    <td width="170" class="bold" align="right">No of Correct Reponses</td> 
                    <td class="nobold"><?php echo $nocorrect_BI; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_FD; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_PO; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_WW; ?></td>
                    <td class="nobold"><?php echo $nocorrect_MG; ?></td>
                    <td class="nobold"><?php echo $nocorrect_FO; ?></td>
				</tr>
                <tr> 
                    <td width="170" class="bold" align="right">% of Correct Reponses</td> 
                    <?php 
					$totalBI = 0;
					if ($nocorrect_BI != 0 && $noofresponse_BI != 0) {
					$totalBI = $nocorrect_BI/$noofresponse_BI*100; } ?>
                    <td class="nobold" style<?php if($totalBI >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalBI, 0)."%"; ?></td> 
                    
                    <?php
					$totalFD = 0;
					if ($nocorrect_FD != 0 && $noofresponse_FD != 0) {
					$totalFD = $nocorrect_FD/$noofresponse_FD*100; } ?>
                    <td class="nobold" style<?php if($totalFD >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalFD, 0)."%"; ?></td> 
                    
                     <?php
					$totalPO = 0;
					if ($nocorrect_PO != 0 && $noofresponse_PO != 0) {
					$totalPO = $nocorrect_PO/$noofresponse_PO*100; } ?>
                    <td class="nobold" style<?php if($totalPO >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalPO, 0)."%"; ?></td> 
                    
                    <?php
					$totalWW = 0;
					if ($nocorrect_WW != 0 && $noofresponse_WW != 0) {
					$totalWW = $nocorrect_WW/$noofresponse_WW*100; } ?>
                    <td class="nobold" style<?php if($totalWW >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalWW, 0)."%"; ?></td>
                    
                    <?php
					$totalMG = 0;
					if ($nocorrect_MG != 0 && $noofresponse_MG != 0) {
					$totalMG = $nocorrect_MG/$noofresponse_MG*100; } ?>
                    <td class="nobold" style<?php if($totalMG >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalMG, 0)."%"; ?></td>
                    
                     <?php
					$totalFO = 0;
					if ($nocorrect_FO != 0 && $noofresponse_FO != 0) {
					$totalFO = $nocorrect_FO/$noofresponse_FO*100; } ?>
                    <td class="nobold" style<?php if($totalFO >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalFO, 0)."%"; ?></td>
				</tr>       
			</tbody> 
            
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->
        
        
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
	
	$browser = get_user_browser();
	if($browser == "firefox"){
		
		echo "<div style='page-break-before:always'></div>
   			  <br clear='all'/>";
		
	?>	
         
	<?php } else {  echo "<div style='page-break-before:always'></div>"; ?>

	<?php } ?>
        
        <div id="classreportprint">	
	<?php for ($i=1; $i<=10; $i++) { ?>
     <article class="module width_3_quarter">
     <?php 	$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$lessonid."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Lesson <?php echo $lessonid ?></h3>
        </header>

		<div class="tab_container">
			<div id="tab1<?php echo $lessonid ?>" class="tab_content">
            <?php if($customers) { ?>
			<table style="font-size:10px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="20%" style="padding-right:5px;" class="empty"></th> 
                    <th width="15%" class="header">No of Correct</th> 
                    <th width="15%" class="header">% of Correct</th> 
    				<th class="header"><?php echo $html->link('BI', '#', array('title' => 'Finding Big Idea','style'=> 'font-size:10px;')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Finding Details','style'=> 'font-size:10px;')); ?></th> 
                    <th class="header"><?php echo $html->link('PO', '#', array('title' => 'Putting Things in Order','style'=> 'font-size:10px;')); ?></th> 
                    <th class="header"><?php echo $html->link('WW', '#', array('title' => 'Understanding What Happens and Why','style'=> 'font-size:10px;')); ?></th>
                    <th class="header"><?php echo $html->link('MG', '#', array('title' => 'Making a Guess','style'=> 'font-size:10px;')); ?></th>
                    <th class="header"><?php echo $html->link('FO', '#', array('title' => 'Figuring Things Out','style'=> 'font-size:10px;')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                    <td class="nobold" <?php $perlesson = $customer['Score']['BI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['PO_pts'] + $customer['Score']['WW_pts'] + $customer['Score']['MG_pts'] + $customer['Score']['FO_pts'];  if ($perlesson < 3) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo $perlesson; ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['BI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['PO_pts'] + $customer['Score']['WW_pts'] + $customer['Score']['MG_pts'] + $customer['Score']['FO_pts']) / 6 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['BI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['BI_pts'] != 0) echo $customer['Score']['BI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['PO_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['PO_pts'] != 0) echo $customer['Score']['PO_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['WW_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WW_pts'] != 0) echo $customer['Score']['WW_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MG_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MG_pts'] != 0) echo $customer['Score']['MG_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['FO_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FO_pts'] != 0) echo $customer['Score']['FO_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for lesson ".$lessonid."."; 
			} ?>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <div style="page-break-before:always"></div>
        <?php if ($i != 10) { echo "<br clear='all'/>"; } else { echo ""; } ?>
		<?php } ?>
        
        <article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Student Summary 1 (Lesson 1 - 10)</h3>
        </header>

		<div class="tab_container">
			<div id="tab100" class="tab_content">
            <table style="font-size:9px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="20%" style="padding-right:5px;" class="empty"></th> 
                    <th width="15%" class="header">No of Correct</th> 
                    <th width="15" class="header">% of Correct</th> 
                    <th width="5%" class="header"> 1</th> 
                    <th width="5%" class="header"> 2</th> 
                    <th width="5%" class="header"> 3</th> 
                    <th width="5%" class="header"> 4</th>
                    <th width="5%" class="header"> 5</th>
                    <th width="5%" class="header"> 6</th>
                    <th width="5%" class="header"> 7</th>
                    <th width="5%" class="header"> 8</th>
                    <th width="5%" class="header"> 9</th>
                    <th width="5%" class="header"> 10</th>
				</tr>
              </thead>
              <tbody>
               <?php 	
			$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/getbasedlesson/'.$sessionkey); ?>
            <?php foreach ($customers as $customer) { ?>
				<tr>
                <td class="bold" align="right">
                <?php echo $customer['Customer']['customers_name']; ?>
                </td>
                <td>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <?php 
				$figureofcorrecttotal = 0;
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php (int)${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts'];
				
				
				 ?>
                <?php } ?>
                <?php $figureofcorrecttotal = (int)$totaleachlesson1 + (int)$totaleachlesson2 + (int)$totaleachlesson3 + $totaleachlesson4 + $totaleachlesson5 + $totaleachlesson6 + $totaleachlesson7 + $totaleachlesson8 + $totaleachlesson9 + $totaleachlesson10;
				if ($figureofcorrecttotal < 30) {
					echo"<span style='color:red'>".$figureofcorrecttotal."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotal."</span>";
				}
				?>
                </td>
                <td>
                <?php $figureofcorrecttotalpercent = round((($figureofcorrecttotal / 60) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
				?>
                </td>
                
				<?php for ($i=1; $i<=10; $i++) { ?>
                <td>
                <?php 
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php echo ${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts']; ?>
                </td>
              	<?php } ?>
                
                </tr>
                <?php } ?>
			</tbody> 
            
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <div style="page-break-before:always; page-break-after:always; display:block;"><br clear="all" /></div>
        <br clear="all" />
        
        <article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Student Summary 2 (Lesson 1 - 10)</h3>
        </header>

		<div class="tab_container">
			<div id="tab111" class="tab_content">
            <table class="tablesorter" style="font-size:9px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" class="header">No of Correct</th> 
                    <th width="120" class="header">% of Correct</th> 
    				<th class="header"> 1</th> 
    				<th class="header"> 2</th> 
                    <th class="header"> 3</th> 
                    <th class="header"> 4</th>
                    <th class="header"> 5</th>
                    <th class="header"> 6</th>
                    <th class="header"> 7</th>
                    <th class="header"> 8</th>
                    <th class="header"> 9</th>
                    <th class="header"> 10</th>
				</tr>
              </thead>
              <tbody>
               <?php 	
			$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/getbasedlesson/'.$sessionkey); ?>
            <?php foreach ($customers as $customer) { ?>
				<tr>
                <td class="bold" align="right" style="line-height:1.2em; vertical-align:middle;">
                <?php echo $customer['Customer']['customers_name']; ?>
                </td>
                <td style="vertical-align:middle;">
                <?php for ($i=1; $i<=10; $i++) { ?>
                <?php 
				$figureofcorrecttotal = 0;
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php (int)${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts'];
				
				
				 ?>
                <?php } ?>
                <?php $figureofcorrecttotal = (int)$totaleachlesson1 + (int)$totaleachlesson2 + (int)$totaleachlesson3 + $totaleachlesson4 + $totaleachlesson5 + $totaleachlesson6 + $totaleachlesson7 + $totaleachlesson8 + $totaleachlesson9 + $totaleachlesson10;
				if ($figureofcorrecttotal < 30) {
					echo"<span style='color:red'>".$figureofcorrecttotal."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotal."</span>";
				}
				?>
                </td>
                <td style="vertical-align:middle;">
                <?php $figureofcorrecttotalpercent = round((($figureofcorrecttotal / 60) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
				?>
                </td>
                
				<?php for ($i=1; $i<=10; $i++) { ?>
                <td style="vertical-align:middle;">
                <?php 
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php $percentagelevel2 = ${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts']; 
				echo round(($percentagelevel2 / 6) * 100, 0)."%";
				?>
                </td>
              	<?php } ?>
                
                </tr>
                <?php } ?>
			</tbody> 
            
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article --> 
        
       <div style="page-break-before:always; page-break-after:always; display:block;"></div>
       <br clear="all" />
        
        <article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Strategy Summary Chart</h3>
        </header>

		<div class="tab_container">
			<div id="tab110" class="tab_content">
             <div id="container_graphclass2"></div>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article --> 
     </div>
     
     <?php ///////////////////////////////////////////////////////////////////////////////// ?>
     <?php ///////////////////////////////////////////////////////////////////////////////// ?>
     <?php ///////////////////////////////////////////////////////////////////////////////// ?>
     <?php ///////////////////////////////////////////////////////////////////////////////// ?>
     
     <br clear="all" />
     
     <div id="accord">
    
            <div id="accordion">
            <div class="group">
<h3>Student Summary Of Strategies</h3>
<div style="padding:20px 0%; margin:0px; overflow:visible;">
 <?php for ($i=1; $i<=10; $i++) { ?>
     <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$lessonid."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Lesson <?php echo $lessonid ?></h3>
        </header>

		<div class="tab_container">
			<div id="tab1<?php echo $lessonid ?>" class="tab_content">
            <?php if($customers) { ?>
			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" class="header">No of Correct</th> 
                    <th width="120" class="header">% of Correct</th> 
    				<th class="header"><?php echo $html->link('BI', '#', array('title' => 'Finding Big Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Finding Details')); ?></th> 
                    <th class="header"><?php echo $html->link('PO', '#', array('title' => 'Putting Things in Order')); ?></th> 
                    <th class="header"><?php echo $html->link('WW', '#', array('title' => 'Understanding What Happens and Why')); ?></th>
                    <th class="header"><?php echo $html->link('MG', '#', array('title' => 'Making a Guess')); ?></th>
                    <th class="header"><?php echo $html->link('FO', '#', array('title' => 'Figuring Things Out')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php $perlesson = $customer['Score']['BI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['PO_pts'] + $customer['Score']['WW_pts'] + $customer['Score']['MG_pts'] + $customer['Score']['FO_pts'];  if ($perlesson < 3) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo $perlesson; ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['BI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['PO_pts'] + $customer['Score']['WW_pts'] + $customer['Score']['MG_pts'] + $customer['Score']['FO_pts']) / 6 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['BI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['BI_pts'] != 0) echo $customer['Score']['BI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['PO_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['PO_pts'] != 0) echo $customer['Score']['PO_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['WW_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WW_pts'] != 0) echo $customer['Score']['WW_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MG_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MG_pts'] != 0) echo $customer['Score']['MG_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['FO_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FO_pts'] != 0) echo $customer['Score']['FO_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for lesson ".$lessonid."."; 
			} ?>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
        <?php // if ($i != 10) { echo "<br clear='all'/>"; } else { echo ""; } ?>
		<?php } ?>
        <div style="clear:both">
        </div>
</div>
</div>
<div class="group">
<h3>Student Summary 1 (Lesson 1 - 10)</h3>
<div class="accordcontent1" style="padding:5px 0px 0px 0px; margin:0px;">

			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" class="header">No of Correct</th> 
                    <th width="120" class="header">% of Correct</th> 
    				<th class="header"> 1</th> 
    				<th class="header"> 2</th> 
                    <th class="header"> 3</th> 
                    <th class="header"> 4</th>
                    <th class="header"> 5</th>
                    <th class="header"> 6</th>
                    <th class="header"> 7</th>
                    <th class="header"> 8</th>
                    <th class="header"> 9</th>
                    <th class="header"> 10</th>
				</tr>
              </thead>
              <tbody>
               <?php 	
			$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/getbasedlesson/'.$sessionkey); ?>
            <?php foreach ($customers as $customer) { ?>
				<tr>
                <td class="bold" align="right">
                <?php echo $customer['Customer']['customers_name']; ?>
                </td>
                <td>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <?php 
				$figureofcorrecttotal = 0;
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php (int)${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts'];
				
				
				 ?>
                <?php } ?>
                <?php $figureofcorrecttotal = (int)$totaleachlesson1 + (int)$totaleachlesson2 + (int)$totaleachlesson3 + $totaleachlesson4 + $totaleachlesson5 + $totaleachlesson6 + $totaleachlesson7 + $totaleachlesson8 + $totaleachlesson9 + $totaleachlesson10;
				if ($figureofcorrecttotal < 30) {
					echo"<span style='color:red'>".$figureofcorrecttotal."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotal."</span>";
				}
				?>
                </td>
                <td>
                <?php $figureofcorrecttotalpercent = round((($figureofcorrecttotal / 60) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
				?>
                </td>
                
				<?php for ($i=1; $i<=10; $i++) { ?>
                <td>
                <?php 
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php echo ${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts']; ?>
                </td>
              	<?php } ?>
                
                </tr>
                <?php } ?>
			</tbody> 
            
			</table>
           
			
</div>
</div>
<div class="group">
<h3>Student Summary 2 (Lesson 1 - 10)</h3>
<div style="padding:5px 0px 0px 0px; margin:0px;">
			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" class="header">No of Correct</th> 
                    <th width="120" class="header">% of Correct</th> 
    				<th class="header"> 1</th> 
    				<th class="header"> 2</th> 
                    <th class="header"> 3</th> 
                    <th class="header"> 4</th>
                    <th class="header"> 5</th>
                    <th class="header"> 6</th>
                    <th class="header"> 7</th>
                    <th class="header"> 8</th>
                    <th class="header"> 9</th>
                    <th class="header"> 10</th>
				</tr>
              </thead>
              <tbody>
               <?php 	
			$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/getbasedlesson/'.$sessionkey); ?>
            <?php foreach ($customers as $customer) { ?>
				<tr>
                <td class="bold" align="right">
                <?php echo $customer['Customer']['customers_name']; ?>
                </td>
                <td>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <?php 
				$figureofcorrecttotal = 0;
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php (int)${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts'];
				
				
				 ?>
                <?php } ?>
                <?php $figureofcorrecttotal = (int)$totaleachlesson1 + (int)$totaleachlesson2 + (int)$totaleachlesson3 + $totaleachlesson4 + $totaleachlesson5 + $totaleachlesson6 + $totaleachlesson7 + $totaleachlesson8 + $totaleachlesson9 + $totaleachlesson10;
				if ($figureofcorrecttotal < 30) {
					echo"<span style='color:red'>".$figureofcorrecttotal."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotal."</span>";
				}
				?>
                </td>
                <td>
                <?php $figureofcorrecttotalpercent = round((($figureofcorrecttotal / 60) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
				?>
                </td>
                
				<?php for ($i=1; $i<=10; $i++) { ?>
                <td>
                <?php 
				$customer_id = $customer['Customer']['id'];
				$lessonid = $i;
				$customers = $this->requestAction('/scores/eachlesson/'.$lessonid."/".$sessionkey."/".$customer_id); ?>
                <?php $percentagelevel2 = ${'totaleachlesson' . $i} = $customers['Score']['BI_pts'] + $customers['Score']['FD_pts'] + $customers['Score']['PO_pts']  + $customers['Score']['WW_pts'] + $customers['Score']['MG_pts'] + $customers['Score']['FO_pts']; 
				echo round(($percentagelevel2 / 6) * 100, 0)."%";
				?>
                </td>
              	<?php } ?>
                
                </tr>
                <?php } ?>
			</tbody> 
            
			</table>
</div>
</div>
  <div class="group">
        <h3>Strategy Summary Chart</h3>
        <div class="accordcontent3">
             <div id="container_graphclass"></div>
        </div>
    </div>
</div>
     
        <br clear="all" /><br clear="all" />
        <div id="basepage">
        </div>