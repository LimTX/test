<h4 class="alert_info">This section allows you to view Teacher Details</h4>
  
<article class="module width_full">
<header><h3>Teacher DETAILS</h3></header>
<div style="float:left; width:20%; padding-left:40px; padding-right:20px; padding-top:40px;">
	<?php if(!empty($customer['Customer']['customers_image'])) { ?>


      <?php echo $html->image('sets/small/'.$customer['Customer']['customers_image'], array('class' => 'drop-shadow'))?>
      
      <?php } else { ?>
    <?php echo $html->image('sets/small/no-user.jpg', array('class' => 'drop-shadow','width'=>'160px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'))?>
  <?php }  ?>
      
    </div>
    <div style="float:left; padding-top:14px; width:43%;">
    <br />
   	<h3 style="font-size:28px; color:#ea6402; text-transform:none; padding:0px; margin:0;"><?php echo $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname']?> </h3>
    <p class="black" style="padding:0px; margin:0px; font-size:18px;"><?php echo $customer['Customer']['customers_sid']; ?></p>
     <br />
     <p style="display:inline-block;">Gender:&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php if($customer['Customer']['customers_gender'] == 'M') 
		{ echo "Male"; } else { echo "Female"; }
	 ?>
     </p>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <p style="display:inline-block;">Date of Birth:&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php echo date('d/m/Y', strtotime($customer['Customer']['customers_dob'])); ?>
     </p>
     <br />
     <p style="display:inline-block;"> Email: </p>
      <p style="display:inline-block;" class="black"><?php echo $customer['Customer']['customers_email_address']?></p>
     <br />
     <p> Notes </p>
      <p class="black"><?php echo $customer['Customer']['customers_notes']?></p>
      <br />
      <br />
    </div>
    <div style="float:right; padding-right:40px;">
   <p>Created: <span class="black"><?php echo date('d/m/Y', strtotime($customer['Customer']['created'])); ?> </span> &#124;
    Last Modified: <span class="black"><?php echo date('d/m/Y', strtotime($customer['Customer']['modified'])); ?> </span> 
    </p>
</div>
    <br clear="all" />
</article>
<div class="spacer"></div>