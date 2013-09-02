<div class="beta-content">

<h3 style="padding-bottom:8px; padding-left:5px; font-weight:bold; color:#971526; font-weight:normal;">
<strong>What's On</strong>
</h3>
<div id="sideBar">
<ul class="subcat">
<?php 
$whatsons = $this->requestAction("/whatsons/listwhatsons/");	
foreach($whatsons as $whatson) { ?>
<li class="sublink" style="border-bottom:1px dotted #808080; padding:10px;"><?php echo $html->link($whatson['Whatson']['name'], array('controller' => 'whatsons','action'=>'view',$whatson['Whatson']['id'])); ?></li>
<?php } ?>
</ul>
</div>
<br />


   <?php echo
    $this->element('advertisement_small');
   ?>

