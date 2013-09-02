<?php echo $html->css('classreport'); ?>
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
<h4 class="alert_info">Book P &nbsp;&nbsp; CARS &reg; Series</h4>
<br/><br/>

<div class="class_status">

</div>

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
    				<th class="header"><?php echo $html->link('BI', '#', array('title' => 'Finding Big Idea')); ?></th> 
    				<th class="header"><?php echo $html->link('FD', '#', array('title' => 'Finding Details')); ?></th> 
                    <th class="header"><?php echo $html->link('PO', '#', array('title' => 'Putting Things in Order')); ?></th> 
                    <th class="header"><?php echo $html->link('WW', '#', array('title' => 'Understanding What Happens and Why')); ?></th>
                    <th class="header"><?php echo $html->link('MG', '#', array('title' => 'Making a Guess')); ?></th>
                    <th class="header"><?php echo $html->link('FO', '#', array('title' => 'Figuring Things Out')); ?></th>
				</tr>
           </thead>
           <?php
		   $sessionkey = $this->params['pass'][1];
		   
		   foreach ($students as $student) {
		   
		   (int)${$student['Customer']['id'].'_total'} = 0;
			   
		   }
		   ?>
            <?php foreach ($students as $student) { ?>
                <tr> 
                    <td widtd="170" class="bold" align="right"><?php echo $student['Customer']['customers_name']; ?></td> 
                    <td class="nobold">
					<?php echo ${$student['Customer']['id'].'_total'}; ?>
                    </td> 
                    <td class="nobold"><?php ?></td>
                    <td class="nobold"><?php ?></td> 
                    <td class="nobold"><?php ?></td>
                    <td class="nobold"><?php ?></td>
                    <td class="nobold"><?php ?></td>
				</tr>
            <?php } ?>
			</tbody> 
            
			</table>
            
           
            
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->
        
        <br clear="all" /><br clear="all" />
        <div id="basepage">
        </div>