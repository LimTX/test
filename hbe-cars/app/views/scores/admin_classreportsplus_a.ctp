<script>
$(document).ready(function() { 
	$(".summary0pt2").clone().addClass('fonteleven').prependTo(".summary0pt1");
	$(".summary2pt2").clone().addClass('fontnine').prependTo(".summary2pt1");
	$(".summary3pt2").clone().addClass('fontnine').prependTo(".summary3pt1");
});
</script>
<?php echo $html->css('classreportplus'); ?>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {	   	
		
	if ($.browser.webkit) {
		$(".graphPrintWidth").width('64%');
	} else if ($.browser.mozilla || $.browser.msie) {
		$(".graphPrintWidth").width('50%');
	}
				
       chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container_graphclass2',
            type: 'column',
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
            categories: ['PT 1','PT 2','PT 3','PT 4','PT 5','BT 1','BT 2','BT 3','BT 4','BT 5','PT 1','PT 2','PT 3','PT 4','PT 5','Average']
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
			<?php 		
			for ($i=1; $i<=15; $i++) {
				${"glessontotal".$i} = (int)${"noofstud".$i} * 8;
			}	
			?>
            data: [<?php if ($glessontotal1 != 0) { $glesson1 = $MIGraphResp1 + $FDGraphResp1 + $USGraphResp1 + $CEGraphResp1 + $MPGraphResp1 + $WMGraphResp1 + $CIGraphResp1 + $RPGraphResp1; echo $glesson1total = round($glesson1 / $glessontotal1, 2) / 0.01; } else { echo $glesson1total = 0 ; } ?>,
			
			<?php if ($glessontotal2 != 0) { $glesson2 = $MIGraphResp2 + $FDGraphResp2 + $USGraphResp2 + $CEGraphResp2 + $MPGraphResp2 + $WMGraphResp2 + $CIGraphResp2 + $RPGraphResp2; echo $glesson2total = round($glesson2 / $glessontotal2, 2) / 0.01; } else { echo $glesson2total = 0; } ?>, 
			
			<?php if ($glessontotal3 != 0) { $glesson3 = $MIGraphResp3 + $FDGraphResp3 + $USGraphResp3 + $CEGraphResp3 + $MPGraphResp3 + $WMGraphResp3 + $CIGraphResp3 + $RPGraphResp3; echo $glesson3total = round($glesson3 / $glessontotal3, 2) / 0.01; } else { echo $glesson3total = 0; } ?>,
			
			<?php if ($glessontotal4 != 0) { $glesson4 = $MIGraphResp4 + $FDGraphResp4 + $USGraphResp4 + $CEGraphResp4 + $MPGraphResp4 + $WMGraphResp4 + $CIGraphResp4 + $RPGraphResp4; echo $glesson4total = round($glesson4 / $glessontotal4, 2) / 0.01; } else { echo $glesson4total = 0; } ?>,
			
			<?php if ($glessontotal5 != 0) { $glesson5 = $MIGraphResp5 + $FDGraphResp5 + $USGraphResp5 + $CEGraphResp5 + $MPGraphResp5 + $WMGraphResp5 + $CIGraphResp5 + $RPGraphResp5; echo $glesson5total = round($glesson5 / $glessontotal5, 2) / 0.01; } else { echo $glesson5total = 0; } ?>,
			
			<?php if ($glessontotal6 != 0) { $glesson6 = $MIGraphResp6 + $FDGraphResp6 + $USGraphResp6 + $CEGraphResp6 + $MPGraphResp6 + $WMGraphResp6 + $CIGraphResp6 + $RPGraphResp6; echo $glesson6total = round($glesson6 / $glessontotal6, 2) / 0.01; } else { echo $glesson6total = 0; } ?>,
			
			<?php if ($glessontotal7 != 0) { $glesson7 = $MIGraphResp7 + $FDGraphResp7 + $USGraphResp7 + $CEGraphResp7 + $MPGraphResp7 + $WMGraphResp7 + $CIGraphResp7 + $RPGraphResp7; echo $glesson7total = round($glesson7 / $glessontotal7, 2) / 0.01; } else { echo $glesson7total = 0; } ?>,
			
			<?php if ($glessontotal8 != 0) { $glesson8 = $MIGraphResp8 + $FDGraphResp8 + $USGraphResp8 + $CEGraphResp8 + $MPGraphResp8 + $WMGraphResp8 + $CIGraphResp8 + $RPGraphResp8; echo $glesson8total = round($glesson8 / $glessontotal8, 2) / 0.01; } else { echo $glesson8total = 0; } ?>,
			
			<?php if ($glessontotal9 != 0) { $glesson9 = $MIGraphResp9 + $FDGraphResp9 + $USGraphResp9 + $CEGraphResp9 + $MPGraphResp9 + $WMGraphResp9 + $CIGraphResp9 + $RPGraphResp9; echo $glesson9total = round($glesson9 / $glessontotal9, 2) / 0.01; } else { echo $glesson9total = 0; } ?>,
			
			<?php if ($glessontotal10 != 0) { $glesson10 = $MIGraphResp10 + $FDGraphResp10 + $USGraphResp10 + $CEGraphResp10 + $MPGraphResp10 + $WMGraphResp10 + $CIGraphResp10 + $RPGraphResp10; echo $glesson10total = round($glesson10 / $glessontotal10, 2) / 0.01; } else { echo $glesson10total = 0; } ?>,
			
			<?php if ($glessontotal11 != 0) { $glesson11 = $MIGraphResp11 + $FDGraphResp11 + $USGraphResp11 + $CEGraphResp11 + $MPGraphResp11 + $WMGraphResp11 + $CIGraphResp11 + $RPGraphResp11; echo $glesson11total = round($glesson11 / $glessontotal11, 2) / 0.01; } else { echo $glesson11total = 0; } ?>,
			
			<?php if ($glessontotal12 != 0) { $glesson12 = $MIGraphResp12 + $FDGraphResp12 + $USGraphResp12 + $CEGraphResp12 + $MPGraphResp12 + $WMGraphResp12 + $CIGraphResp12 + $RPGraphResp12; echo $glesson12total = round($glesson12 / $glessontotal12, 2) / 0.01; } else { echo $glesson12total = 0; } ?>,
			
			<?php if ($glessontotal13 != 0) { $glesson13 = $MIGraphResp13 + $FDGraphResp13 + $USGraphResp13 + $CEGraphResp13 + $MPGraphResp13 + $WMGraphResp13 + $CIGraphResp13 + $RPGraphResp13; echo $glesson13total = round($glesson13 / $glessontotal13, 2) / 0.01; } else { echo $glesson13total = 0; } ?>,
			
			<?php if ($glessontotal14 != 0) { $glesson14 = $MIGraphResp14 + $FDGraphResp14 + $USGraphResp14 + $CEGraphResp14 + $MPGraphResp14 + $WMGraphResp14 + $CIGraphResp14 + $RPGraphResp14; echo $glesson14total = round($glesson14 / $glessontotal14, 2) / 0.01; } else { echo $glesson14total = 0; } ?>,
			
			<?php if ($glessontotal15 != 0) { $glesson15 = $MIGraphResp15 + $FDGraphResp15 + $USGraphResp15 + $CEGraphResp15 + $MPGraphResp15 + $WMGraphResp15 + $CIGraphResp15 + $RPGraphResp15; echo $glesson15total = round($glesson15 / $glessontotal15, 2) / 0.01; } else { echo $glesson15total = 0; } ?>,
			
			<?php $gaverage = round((($glesson1total + $glesson2total + $glesson3total + $glesson4total + $glesson5total + $glesson6total + $glesson7total + $glesson8total + $glesson9total + $glesson10total + $glesson11total + $glesson12total + $glesson13total + $glesson14total + $glesson15total) / 15) * 1.0, 0); echo $gaverage; ?>
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
            type: 'column',
         },
         title: {
            text: 'Average % of Correct Answers'
         },
         xAxis: {
            categories: ['PT 1','PT 2','PT 3','PT 4','PT 5','BT 1','BT 2','BT 3','BT 4','BT 5','PT 1','PT 2','PT 3','PT 4','PT 5','Average'],
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
            data: [
			<?php echo $glesson1total ?>,<?php echo $glesson2total ?>,<?php echo $glesson3total ?>,<?php echo $glesson4total ?>,<?php echo $glesson5total ?>,<?php echo $glesson6total ?>,<?php echo $glesson7total ?>,<?php echo $glesson8total ?>,<?php echo $glesson9total ?>,<?php echo $glesson10total ?>,<?php echo $glesson11total ?>,<?php echo $glesson12total ?>,<?php echo $glesson13total ?>,<?php echo $glesson14total ?>,<?php echo $glesson15total ?>,<?php echo $gaverage ?>
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

<div id="loading" style="display:inline-block; margin:0 3%">
<img src="http://carsandstars.com.au/img/report-loader.gif" />
</div>

  <script>
 var ld=(document.all);
  var ns4=document.layers;
 var ns6=document.getElementById&&!document.all;
 var ie4=document.all;
  if (ns4)
 	ld=document.loading;
 else if (ns6)
 	ld=document.getElementById("loading").style;
 else if (ie4)
 	ld=document.all.loading.style;
  function init()
 {
 if(ns4){ld.visibility="hidden";}
 else if (ns6||ie4) $("#loading").slideUp();
 }
 
   window.onload=init;
 
</script>

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
<h4 class="alert_info">Book A &nbsp;&nbsp; CARS &reg; Plus</h4>
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

		
        <div id="classreportprint">	 
        
        <!-- 1 -->
        
        <article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Class Summary Of Strategies</h3>
        </header>

		<div class="tab_container">
        
			<div id="tab1" class="tab_content">
                <div class="summary0pt1">
    			</div>
            
        	</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->
        
        <!-- 2 -->
        
         <?php for ($i=1; $i<=5; $i++) { ?>
     	 <div style="page-break-before:always"><br clear='all'/></div>
    	 <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">PreTest <?php echo $lessonid ?></h3>
        </header>

		<div class="tab_container">
			<div id="tab1<?php echo $lessonid ?>" class="tab_content">
            <?php if($customers) { ?>
			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" style="font-size:12px;">No of Correct</th> 
                    <th width="120" style="font-size:12px;">% of Correct</th> 
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea','style'=>'color:#1F1F20;')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures','style'=>'color:#1F1F20;')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php $perlesson = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts'];  if ($perlesson < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo $perlesson; ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Pretest ".$lessonid."."; 
			} ?>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
		<?php } ?>
        
        <?php $y = 5; for ($i=6; $i<=10; $i++) { ?>
     	 <div style="page-break-before:always"><br clear='all'/></div>
    	 <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i - $y;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Benchmark <?php echo $lessonid ?></h3>
        </header>

		<div class="tab_container">
			<div id="tab1<?php echo $lessonid ?>" class="tab_content">
            <?php if($customers) { ?>
			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" style="font-size:12px;">No of Correct</th> 
                    <th width="120" style="font-size:12px;">% of Correct</th> 
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea','style'=>'color:#1F1F20;')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures','style'=>'color:#1F1F20;')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php $perlesson = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts'];  if ($perlesson < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo $perlesson; ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Benchmark ".$lessonid."."; 
			} ?>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
		<?php } ?>
        
        <?php $y = 10; for ($i=11; $i<=15; $i++) { ?>
     	 <div style="page-break-before:always"><br clear='all'/></div>
    	 <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i - $y;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Post Test <?php echo $lessonid ?></h3>
        </header>

		<div class="tab_container">
			<div id="tab1<?php echo $lessonid ?>" class="tab_content">
            <?php if($customers) { ?>
			<table style="font-size:12px; font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px;" class="empty"></th> 
                    <th width="120" style="font-size:12px;">No of Correct</th> 
                    <th width="120" style="font-size:12px;">% of Correct</th> 
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea','style'=>'color:#1F1F20;')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence','style'=>'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences','style'=>'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures','style'=>'color:#1F1F20;')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php $perlesson = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts'];  if ($perlesson < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo $perlesson; ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                   <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Post Test ".$lessonid."."; 
			} ?>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
        <?php if ($i != 15) { echo "<br clear='all'/>"; } else { echo ""; } ?>
		<?php } ?>
        
		<!-- 3 -->
        
        <div style="page-break-before:always; page-break-after:always; display:block;"></div>
        
         <article class="module width_3_quarter" style="border:0;">
		<header>
        	<h3 class="tabs_involved">Student Summary as correctly answered</h3>
        </header>

		<div class="tab_container">
			<div id="tab100" class="tab_content">
          	
            <!-- CLON-ING CODE PLACED HERE -->
          	<div class="summary2pt1">
			</div>
			
            </div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
        
       </article><!-- end of content manager article --> 
        
        <div style="page-break-before:always; page-break-after:always; display:block;"><br clear='all'/></div>
        
        <!-- 4 -->
        
         <article class="module width_3_quarter" style="border:0;">
		<header>
        	<h3 class="tabs_involved">Student Summary As Percentage</h3>
        </header>

		<div class="tab_container">
			<div id="tab111" class="tab_content">
           
           <!-- CLON-ING CODE PLACED HERE -->
          	<div class="summary3pt1">
			</div>
            
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article --> 
        
        <div style="page-break-before:always; page-break-after:always; display:block;"><br clear='all'/></div>
        
        <!-- 5 -->
        
         <article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Strategy Summary Chart</h3>
        </header>

		<div class="tab_container">
			<div id="tab110" class="tab_content">
             <div id="container_graphclass2" class="graphPrintWidth"></div>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article --> 
        
</div>

<div id="classreportprintsummary">
<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Class Summary Of Strategies</h3>
        </header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter summary0pt2" cellspacing="0">
            <thead>
            <tr> 
    				<th width="170" style="padding-right:5px; border-bottom: 1px #CCCCCC solid;" class="empty"></th> 
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea',"style"=> 'color:#1F1F20;')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details',"style"=> 'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence',"style"=> 'color:#1F1F20;')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect',"style"=> 'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions',"style"=> 'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context',"style"=> 'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences',"style"=> 'color:#1F1F20;')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures',"style"=> 'color:#1F1F20;')); ?></th>
				</tr>
           </thead>
				<tr> 
                    <td width="170" class="bold" align="right">Question</td> 
                    <td class="nobold">1</td> 
                    <td class="nobold">2</td> 
                    <td class="nobold">3</td> 
                    <td class="nobold">4</td>
                    <td class="nobold">5</td>
                    <td class="nobold">6</td>
                    <td class="nobold">7</td>
                    <td class="nobold">8</td>
				</tr>
                <tr> 
                    <td width="170" class="bold">No of Student Reponses</td> 
                    <td class="nobold"><?php echo $noofresponse_MI ?></td> 
                    <td class="nobold"><?php echo $noofresponse_FD; ?></td> 
                    <td class="nobold"><?php echo $noofresponse_US; ?></td> 
                    <td class="nobold"><?php echo $noofresponse_CE; ?></td>
                    <td class="nobold"><?php echo $noofresponse_MP; ?></td>
                    <td class="nobold"><?php echo $noofresponse_WM; ?></td>
                    <td class="nobold"><?php echo $noofresponse_CI; ?></td>
                    <td class="nobold"><?php echo $noofresponse_RP; ?></td>
				</tr>
                <tr> 
                    <td width="170" class="bold" align="right">No of Correct Reponses</td> 
                    <td class="nobold"><?php echo $nocorrect_MI; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_FD; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_US; ?></td> 
                    <td class="nobold"><?php echo $nocorrect_CE; ?></td>
                    <td class="nobold"><?php echo $nocorrect_MP; ?></td>
                    <td class="nobold"><?php echo $nocorrect_WM; ?></td>
                    <td class="nobold"><?php echo $nocorrect_CI; ?></td>
                    <td class="nobold"><?php echo $nocorrect_RP; ?></td>
				</tr>
                <tr> 
                    <td width="170" class="bold" align="right">% of Correct Reponses</td> 
                    <?php 
					$totalMI = 0;
					if ($nocorrect_MI != 0 && $noofresponse_MI != 0) {
					$totalMI = $nocorrect_MI/$noofresponse_MI*100; } ?>
                    <td class="nobold" style<?php if($totalMI >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalMI, 0)."%"; ?></td> 
                    
                    <?php
					$totalFD = 0;
					if ($nocorrect_FD != 0 && $noofresponse_FD != 0) {
					$totalFD = $nocorrect_FD/$noofresponse_FD*100; } ?>
                    <td class="nobold" style<?php if($totalFD >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalFD, 0)."%"; ?></td> 
                    
                     <?php
					$totalUS = 0;
					if ($nocorrect_US != 0 && $noofresponse_US != 0) {
					$totalUS = $nocorrect_US/$noofresponse_US*100; } ?>
                    <td class="nobold" style<?php if($totalUS >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalUS, 0)."%"; ?></td> 
                    
                    <?php
					$totalCE = 0;
					if ($nocorrect_CE != 0 && $noofresponse_CE != 0) {
					$totalCE = $nocorrect_CE/$noofresponse_CE*100; } ?>
                    <td class="nobold" style<?php if($totalCE >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalCE, 0)."%"; ?></td>
                    
                    <?php
					$totalMP = 0;
					if ($nocorrect_MP != 0 && $noofresponse_MP != 0) {
					$totalMP = $nocorrect_MP/$noofresponse_MP*100; } ?>
                    <td class="nobold" style<?php if($totalMP >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalMP, 0)."%"; ?></td>
                    
                    <?php
					$totalWM = 0;
					if ($nocorrect_WM != 0 && $noofresponse_WM != 0) {
					$totalWM = $nocorrect_WM/$noofresponse_WM*100; } ?>
                    <td class="nobold" style<?php if($totalWM >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalWM, 0)."%"; ?></td>
                    
                    <?php
					$totalCI = 0;
					if ($nocorrect_CI != 0 && $noofresponse_CI != 0) {
					$totalCI = $nocorrect_CI/$noofresponse_CI*100; } ?>
                    <td class="nobold" style<?php if($totalCI >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalCI, 0)."%"; ?></td>
                    
                    <?php
					$totalRP = 0;
					if ($nocorrect_RP != 0 && $noofresponse_RP != 0) {
					$totalRP = $nocorrect_RP/$noofresponse_RP*100; } ?>
                    <td class="nobold" style<?php if($totalRP >= 50) echo "='color:green'"; else echo "='color:red'" ?>><?php  echo round($totalRP, 0)."%"; ?></td>
				</tr>              
			</tbody> 
            
			</table>
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

<?php

				for ($i=1; $i<=15; $i++) { 

				foreach ($custperanswers as $custperanswer) {
					(int)${$custperanswer['Customer']['id'].'_count'.$i} = 0;
				}
				
				}
?>


 <?php for ($i=1; $i<=5; $i++) { ?>
     <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Pretest <?php echo $lessonid ?></h3>
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
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php (int)${$customer['Customer']['id'].'_count'.$i} = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']; if ((int)${$customer['Customer']['id'].'_count'.$i} < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo (int)${$customer['Customer']['id'].'_count'.$i} ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Pretest ".$lessonid."."; 
			} ?>
            
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
        <?php // if ($i != 10) { echo "<br clear='all'/>"; } else { echo ""; } ?>
		<?php } ?>
        
        
        <?php $y = 5; for ($i=6; $i<=10; $i++) { ?>
     <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i - $y;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Benchmark <?php echo $lessonid ?></h3>
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
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php (int)${$customer['Customer']['id'].'_count'.$i} = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']; if ((int)${$customer['Customer']['id'].'_count'.$i} < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo (int)${$customer['Customer']['id'].'_count'.$i} ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Benchmark ".$lessonid."."; 
			} ?>
            
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->   
        <!-- <div style="page-break-before:always"></div> -->
        <?php // if ($i != 10) { echo "<br clear='all'/>"; } else { echo ""; } ?>
		<?php } ?>
        
        
         <?php $y = 10; for ($i=11; $i<=15; $i++) { ?>
     <article class="module width_3_quarter" style="margin:10px 25px;">
     <?php 	$lessonid = $i - $y;
			$sessionkey = $this->params['pass'][1];
			$customers = $this->requestAction('/scores/geteachlesson/'.$i."/".$sessionkey); ?>
		<header>
        	<h3 class="tabs_involved">Post Test <?php echo $lessonid ?></h3>
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
    				<th class="header"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details')); ?></th> 
                    <th class="header"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence')); ?></th> 
                    <th class="header"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect')); ?></th>
                    <th class="header"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions')); ?></th>
                    <th class="header"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context')); ?></th>
                    <th class="header"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences')); ?></th>
                    <th class="header"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures')); ?></th>
				</tr>
              </thead>
              <tbody> 
               <?php foreach ($customers as $customer) { ?>
				<tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $customer['Customer']['customers_name']; ?></td> 
                     <td class="nobold" <?php (int)${$customer['Customer']['id'].'_count'.$i} = $customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']; if ((int)${$customer['Customer']['id'].'_count'.$i} < 4) { echo "style='color:red;'"; } else { echo "style ='color:green'"; } ?>> <?php echo (int)${$customer['Customer']['id'].'_count'.$i} ?>
                    
                    </td> 
                    <td class="nobold"><?php $totalpercent = ($customer['Score']['MI_pts'] + $customer['Score']['FD_pts'] + $customer['Score']['US_pts'] + $customer['Score']['CE_pts'] + $customer['Score']['MP_pts'] + $customer['Score']['WM_pts'] + $customer['Score']['CI_pts'] + $customer['Score']['RP_pts']) / 8 * 100; if (round($totalpercent, 0) < 50) { echo "<span style='color:red;'>".round($totalpercent, 0)."%</span>"; } else { echo "<span style='color:green'>".round($totalpercent, 0)."%</span>"; } ?></td> 
                    <td align="center" style<?php if($customer['Score']['MI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MI_pts'] != 0) echo $customer['Score']['MI_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['FD_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['FD_pts'] != 0) echo $customer['Score']['FD_pts']; else echo "X"; ?>
                    </td>  
                    <td align="center" style<?php if($customer['Score']['US_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['US_pts'] != 0) echo $customer['Score']['US_pts']; else echo "X"; ?>
                    </td> 
                    <td align="center" style<?php if($customer['Score']['CE_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CE_pts'] != 0) echo $customer['Score']['CE_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['MP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['MP_pts'] != 0) echo $customer['Score']['MP_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['WM_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['WM_pts'] != 0) echo $customer['Score']['WM_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['CI_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['CI_pts'] != 0) echo $customer['Score']['CI_pts']; else echo "X"; ?>
                    </td>
                    <td align="center" style<?php if($customer['Score']['RP_pts'] == 1) echo "='color:#000000'"; else echo "='color:red'" ?>>
					<?php if ($customer['Score']['RP_pts'] != 0) echo $customer['Score']['RP_pts']; else echo "X"; ?>
                    </td>
				</tr>  
                <?php  } ?>   
			</tbody> 
            
			</table>
            <?php } else { 
				echo "<p style='padding:20px;'>There is currently no record for Post Test ".$lessonid."."; 
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
<h3>Student Summary as correctly answered</h3>
<div class="accordcontent1" style="padding:5px 0px 0px 0px; margin:0px;">
 
 <?php
			  	$sessionkey = $this->params['pass'][1];
				
				//
				// Step up variables for each customers
				//
				foreach ($custperanswers as $custperanswer) {
					(int)${$custperanswer['Customer']['id'].'_total'} = 0;
					//(int)${$custperanswer['Customer']['id'].'_count'} = 0;
				}
			  				
				for($lesson_id = 1; $lesson_id <= 15; $lesson_id++) {
					$score = $this->requestAction('/scores/eachlesson/'.$lesson_id."/".$sessionkey); // returns all customer scores who did book $lesson_id.
				
					foreach ($score as $s) {
						//Debugger::dump($score);
						//Debugger::dump(count($s['Customer']));
						//(int)${$s['Customer']['id'].'_count'} = count($s['Score']);

						(int)${$s['Customer']['id'].'_total'} += $s['Score']['MI_pts'] + $s['Score']['FD_pts'] + $s['Score']['US_pts']  + $s['Score']['CE_pts'] + $s['Score']['MP_pts'] + $s['Score']['WM_pts'] + $s['Score']['CI_pts'] + $s['Score']['RP_pts'];
					}
				}
			 ?>
             
             <table style="font-family:'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter summary2pt2" cellspacing="0">
            <thead>
            <tr> 
    				<th width="130" style="padding-right:5px;" class="empty"></th> 
                    <th width="90" class="header">No of Correct</th> 
                    <th width="90" class="header">% of Correct</th> 
    				<th class="header">PT 1</th> 
    				<th class="header">PT 2</th> 
                    <th class="header">PT 3</th> 
                    <th class="header">PT 4</th>
                    <th class="header">PT 5</th>
                    <th class="header">BT 1</th>
                    <th class="header">BT 2</th>
                    <th class="header">BT 3</th>
                    <th class="header">BT 4</th>
                    <th class="header">BT 5</th>
                    <th class="header">PT 1</th>
                    <th class="header">PT 2</th>
                    <th class="header">PT 3</th>
                    <th class="header">PT 4</th>
                    <th class="header">PT 5</th>
				</tr>
              </thead>
              <tbody>
                <?php foreach ($custperanswers as $custperanswer) { ?>
				<tr>
                <td class="bold fonteleven" align="right">
                <?php echo $custperanswer['Customer']['customers_name']; ?>
                </td>
                <td class="fonteleven">
                <?php 
					$noofattemptedlesson = $this->requestAction('/scores/noofattemptedlesson/'.$sessionkey."/".$custperanswer['Customer']['id']);
					$totalnoofattemptedlesson = $noofattemptedlesson * 8 ;
					$halfoftotalnoofattemptedlesson = $totalnoofattemptedlesson / 2;
					
					if (${$custperanswer['Customer']['id'].'_total'} < $halfoftotalnoofattemptedlesson || ${$custperanswer['Customer']['id'].'_total'} == 0) {
					echo"<span style='color:red'>".${$custperanswer['Customer']['id'].'_total'}."</span>";
					} else {
						echo"<span style='color:green'>".${$custperanswer['Customer']['id'].'_total'}."</span>";
					}
			
                ?>
                </td>
                <td class="fonteleven">
                <?php
				if ($noofattemptedlesson == 0 || ${$custperanswer['Customer']['id'].'_total'} == 0) {
				
				echo"<span style='color:red'>"."0%"."</span>";
					
				} else {
					
				$figureofcorrecttotalpercent = round(((${$custperanswer['Customer']['id'].'_total'} / $totalnoofattemptedlesson) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
						
				}
				?>
                </td>
                
				<?php for ($g=1; $g<=15; $g++) { ?>
                <td class="fonteleven">
                <?php 
                if ((int)${$custperanswer['Customer']['id'].'_count'.$g}  < 4) {
				echo"<span style='color:red'>".(int)${$custperanswer['Customer']['id'].'_count'.$g}."</span>";
				} else {
				echo"<span style='color:green'>".(int)${$custperanswer['Customer']['id'].'_count'.$g}."</span>";
				}
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
<h3>Student Summary As Percentage</h3>
<div style="padding:5px 0px 0px 0px; margin:0px;">
			<table style="font-family: 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;" class="tablesorter summary3pt2" cellspacing="0">
            <thead>
            <tr> 
    				<th width="130" style="padding-right:5px;" class="empty"></th> 
                    <th width="100" class="header">No of Correct</th> 
                    <th width="100" class="header">% of Correct</th> 
    				<th class="header">PT 1</th> 
    				<th class="header">PT 2</th> 
                    <th class="header">PT 3</th> 
                    <th class="header">PT 4</th>
                    <th class="header">PT 5</th>
                    <th class="header">BT 1</th>
                    <th class="header">BT 2</th>
                    <th class="header">BT 3</th>
                    <th class="header">BT 4</th>
                    <th class="header">BT 5</th>
                    <th class="header">PT 1</th>
                    <th class="header">PT 2</th>
                    <th class="header">PT 3</th>
                    <th class="header">PT 4</th>
                    <th class="header">PT 5</th>
				</tr>
              </thead>
              <tbody>
			<?php 	
            foreach ($custperanswers as $custperanswer) { ?>
                <tr>
                <td class="bold fonteleven" align="right">
                <?php echo $custperanswer['Customer']['customers_name']; ?>
                </td>
                <td class="fonteleven">
				<?php 
					$noofattemptedlesson = $this->requestAction('/scores/noofattemptedlesson/'.$sessionkey."/".$custperanswer['Customer']['id']);
					$totalnoofattemptedlesson = $noofattemptedlesson * 8 ;
					$halfoftotalnoofattemptedlesson = $totalnoofattemptedlesson / 2;
					
					if (${$custperanswer['Customer']['id'].'_total'} < $halfoftotalnoofattemptedlesson || ${$custperanswer['Customer']['id'].'_total'} == 0) {
					echo"<span style='color:red'>".${$custperanswer['Customer']['id'].'_total'}."</span>";
					} else {
						echo"<span style='color:green'>".${$custperanswer['Customer']['id'].'_total'}."</span>";
					}
			
                ?>
                </td>
                <td class="fonteleven">
                  <?php
				if ($noofattemptedlesson == 0 || ${$custperanswer['Customer']['id'].'_total'} == 0) {
				
				echo"<span style='color:red'>"."0%"."</span>";
					
				} else {
					
				$figureofcorrecttotalpercent = round(((${$custperanswer['Customer']['id'].'_total'} / $totalnoofattemptedlesson) * 100), 0)."%"; 
				
				if ($figureofcorrecttotalpercent < 50) {
					echo"<span style='color:red'>".$figureofcorrecttotalpercent."</span>";
				} else {
					echo"<span style='color:green'>".$figureofcorrecttotalpercent."</span>";
				}
						
				}
				?>
                </td>
                <?php for ($y=1; $y<=15; $y++) {  ?>
                <td class="fonteleven">
                <?php 
                
                if (round(((int)${$custperanswer['Customer']['id'].'_count'.$y}  / 8) * 100, 0) < 50) {
				
				echo"<span style='color:red'>".round(((int)${$custperanswer['Customer']['id'].'_count'.$y}  / 8) * 100, 0)."%"."</span>";
				
				} else { 
				
				echo"<span style='color:green'>".round(((int)${$custperanswer['Customer']['id'].'_count'.$y}  / 8) * 100, 0)."%"."</span>";
				
				}
				
				?>
                </td>
                <?php } ?>
                </tr>
             <?php 
			} 
			?>
           
			</tbody> 
			</table>
</div>
</div>
  <div class="group">
        <h3>Strategy Summary Chart</h3>
        
        <div class="accordcontent3" style="padding:0px;">
        	 <div id="surrounding">
             <div id="container_graphclass"></div>
             </div>
        </div>
    </div>
</div>
     
        <br clear="all" /><br clear="all" />
        <div id="basepage">
        </div>