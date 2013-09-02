<div class="alpha-content" style="width:92%;">
<p>HOME &gt; SHOPPING CART  &gt; ORDER SUMMARY<br/><br />
    <div class="titleBar" style="float:left;">
    <h1>Order Summary</h1>
    <br />
     <p>This section allows you to confirm your order before payment.</p>
    <br />
    </div>
       <div style=" float:right; width:147px; height:20px;">
    <?php echo $html->image("paypal.png", array(
			"alt" => "paypal",
			'url' => "/",
			'class' => 'logo',
			'style' => 'border:1px;'
			)); ?>
            </div>
            <br /><br />
            <br clear="all" /><br clear="all" /><br clear="all" />
 <table id="newspaper-a" summary="Product" style="color:#333;">
 <?php     
        if (!empty($totalUsers)) { 
		$subTotal2 = null;
		?>
  <thead>
    	<tr >
        	<th width="70%" style="background-color:#f8f6f2" scope="col">Item</th>
            <th width="15%" style="background-color:#f8f6f2" align="center" scope="col">Unit Price</th>
            <th width="25%" style="background-color:#f8f6f2" scope="col" style="padding:1px 1px" align="center">Quantity</th>
            <th width="5%" style="background-color:#f8f6f2" scope="col" align="center">Total</th>
        </tr>
    </thead>
    <tbody>
    <!-- https://www.sandbox.paypal.com/cgi-bin/webscr -->
    <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="sk2012_1345308581_biz@gmail.com">
	<input type="hidden" name="currency_code" value="AUD">
    <input type="hidden" name="image_url" value="http://sumykids.com.au/images/logo2.png">
	<?php 				
	$y = 0;	
	foreach($totalUsers AS $totalUser) {
	$y = $y+1;
	?>
    <tr>
    <td>
	   <div style="float:left;">
 <?php     echo e( $html->link(
	       $html->image('sets/small/' . $totalUser['Product']['image'], array('class' => 'drop-shadow-small','style' =>'width:50px;')),
           array('action' => '/products/view/pd_id'),
           array('escape' => false))); ?> 
  </div>
    <div style="float:left; text-align:left; padding-left:5px; padding-top:25px;">
    
  <p>  
   <?php echo $html->link($totalUser['Product']['name'],"/products/view/pd_id:".$totalUser['Product']['id']) ?><?php echo $form->hidden("item_name_$y", array('name' =>'item_name_'.$y, 'value'=>$totalUser['Product']['name'])); ?></p>
  </div>
    </td>
	<td align="center" style="color:#6D6E71;">
<?php echo Configure::read('Shop.currency');?><?php echo $totalUser['Product']['price']; ?><?php echo $form->hidden("amount_$y", array('name' =>'amount_'.$y ,'value'=>$totalUser['Product']['price'])); ?>
    </td>
    <td  align="center" style="color:#6D6E71;">
    <?php echo $totalUser['Cart']['qty']; ?><?php echo $form->hidden("quantity_$y", array('name' =>'quantity_'.$y,'value'=>$totalUser['Cart']['qty'])); ?>
  <?php echo $form->hidden('Order.id', array( 'value'=>$totalUser['Cart']['id']));?>
    </td>
    <td align="center" style="color:#6D6E71;">
<?php echo Configure::read('Shop.currency');?><?php echo number_format((float)$totalUser['Product']['price'] * $totalUser['Cart']['qty'], 2, '.', '') ?>
    </td>
    </tr>
    <?php } } ?>
    </tbody>
	</table>
         <table id="newspaper-a"  style="border:0px;" summary="Product" style="color:#333;">
  <thead>
    	<tr style="border:0px;" >
            <th style="border:0px;"  class="totalbg" scope="col" align="center"></th>
             <th style="border:0px; padding-right:125px;"  class="totalbg" scope="col" align="right"><h1 style="color:#4D5353;"><span style="font-size:18px;">Total</span>&nbsp;&nbsp;<?php echo Configure::read('Shop.currency');?><?php 
			 
			 foreach($totalUsers AS $totalUser) {
				$subTotal2 += $totalUser['Product']['price'] * $totalUser['Cart']['qty'];
			 }
			 echo number_format((float)$subTotal2, 2, '.', ''); ?></h1>
</th>
        </tr>
    </thead>
    </table>
    
 
    
<div style="float:right; padding:10px 18px;">

</div>
<br clear="all" />
<br />
<table width="100%" border="0"  align="center" cellpadding="20" cellspacing="0">
 <tr> 
  <td align="right" style="padding-right:35px;">
   <div style="float:right"><?php echo $form->button('Update Shopping Cart', array('class'=>'box3' , 'onClick'=>"window.location.href='".$this->base."/carts/view'" ) ) ;?>
  </td>  </div>
  <td align="left" style="padding-left:35px;">
<?php /*?> <?php echo "<input type='hidden' name='return' value='".$this->base."/orders/complete'>"; ?>
<?php */?>
<input type='hidden' name='return' value='http://localhost:8888/development05/orders/complete'>
<div style="float:left;"><?php echo $form->submit('Pay Now', array( 'class'=>'box3','' ) ) ;?></div>
  </td>
 </tr>
</table>

<br />
</div>
