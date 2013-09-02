<style type="text/css">
#newspaper-a td {
    color: #666699;
    padding: 7px 12px;
}

#newspaper-a th {
    background-color: #FFFFFF;
    border-bottom: 1px dashed #6699CC;
    color: #4D5353;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
}
</style>
 <?php     
	$cartContents = $this->requestAction("/carts/getMiniCart/c:$catId/p:$pdId/s:$sid");

        if ( !empty($cartContents) && is_array($cartContents) ) { 
		$subTotal = null;
		?>
	
<script type="text/javascript">
$(document).ready(function() {
	<?php 		
	$y = 0;		
	foreach($cartContents as $cartContent) { 
	$y = $y+1;
	?>
    $("#firsttagg<?php echo $y; ?>").keyup(function() {
		 var start = $("#firsttagg<?php echo $y; ?>").val();
		 $("#secondtagg<?php echo $y; ?>").val(start);
        if($("#firsttagg<?php echo $y; ?>").val().length > 0) $("#btnUpdate").css("background-color", "#FF6A6A");
	
    });
	<? } ?>
});
</script>
<div class="alpha-content" style="width:92%;">
<p>HOME &gt; SHOPPING CART <br/><br />
    <div class="titleBar">
    <h1>Shopping Cart</h1>
    </div>
    <p>This section allows you to review your shopping cart.</p>
    <br />
 <table id="newspaper-a" summary="Product" style="color:#333;">

  <thead>
    	<tr >
        	<th width="70%" style="background-color:#f8f6f2" scope="col">Item</th>
            <th width="26%" style="background-color:#f8f6f2" align="center" scope="col">Unit Price</th>
            <th width="2%" style="background-color:#f8f6f2" scope="col" style="padding:1px 1px" align="center">Quantity</th>
            <th width="25%" style="background-color:#f8f6f2" scope="col" align="center">Total</th>
            <th scope="col" style="background-color:#f8f6f2" align="center"></th>
        </tr>
    </thead>
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
	<?php
	$x = 0; 				
	foreach($cartContents as $cartContent) { 
	$x = $x+1;
			$subTotal += $cartContent['pd']['price'] * $cartContent['ct']['qty'];
			
			echo $form->create(null, array('url' => array('controller' => 'carts', 'action' => 'updates'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
			
	?>
    <tr>
    <td>
	   <div style="float:left;">
 <?php echo e( $html->link(
	      $html->image('sets/small/' . $cartContent['pd']['image'], array('class' => 'drop-shadow-small','style' =>'width:50px;')),
          array('action' => '/products/view/pd_id'),
          array('escape' => false))); ?> 
  </div>
    <div style="float:left; width:260px; text-align:left; padding-left:5px; padding-top:25px;">
  <? echo $html->link( $cartContent['pd']['name'], "/products/view/pd_id:".$cartContent['ct']['product_id'].'id:'.$cartContent['ct']['id']);?>
  </div>
    </td>
	<td align="center" style="color:#6D6E71;">
<?php echo Configure::read('Shop.currency');?><?php echo $cartContent['pd']['price'];?>
    </td>
    <td  align="center" style="color:#6D6E71;">
  <?php echo $form->input('Cart.qty', array('name'=>'data['.$cartContent['ct']['id']. ']', 'div'=>'formfield', 'style'=>'width:3em;text-align:center;', 'type'=>'text', 'label'=>'', 'id'=>'firsttagg'.$x, 'value'=>$cartContent['ct']['qty'] ) );?>
  <?php echo $form->hidden('Order.id', array( 'value'=>$cartContent['ct']['id']));?>
    </td>
    <td align="center" style="color:#6D6E71;">
<?php echo Configure::read('Shop.currency');?><?php echo number_format((float)$cartContent['pd']['price'] * $cartContent['ct']['qty'], 2, '.', '');?>
    </td>
    <td  align="center" style="color:#6D6E71; padding-left:10px;">
  <?php echo $form->button('X', array('class'=>'btndelete','onClick'=>"window.location.href='".$this->base."/carts/remove/ct_id:".$cartContent['ct']['id']."'" ) ) ;?>
    </td>
    </tr>
    <?php } } ?>
    </tbody>
	</table>
         <table id="newspaper-a"  style="border:0px;" summary="Product" style="color:#333;">
  <thead>
    	<tr style="border:0px;" >
            <th style="border:0px;"  class="totalbg" scope="col" align="center"></th>
             <th style="border:0px; padding-right:125px;"  class="totalbg" scope="col" align="right"><h1 style="color:#4D5353;"><span style="font-size:18px;">Total</span>&nbsp;&nbsp;<?php echo Configure::read('Shop.currency');?><?php echo number_format((float)$subTotal, 2, '.', '');?></h1>
</th>
        </tr>
    </thead>
    </table>

<div style="float:right; padding:10px 18px;">
  <?php echo $form->end( array('class'=>'box3' , 'label'=>'Update Shopping Cart', 'id'=>'btnUpdate') );?>	
</div>
<br clear="all" />
<br />
<table width="100%" border="0"  align="center" cellpadding="20" cellspacing="0">
 <tr> 
  <td align="right" style="padding-right:35px;">
   <?php echo $form->submit('Continue Shopping', array( 'class'=>'box3' , 'onClick'=>"window.location.href='".$this->base."/products/view/pd_id:".$cartContent['ct']['product_id']."'" ) ) ;?>
  </td>  
  <td align="left" style="padding-left:35px;">
<?php /*?>  <?php	
  	foreach($cartContents as $key=>$val) {
		$str[] = $val['ct']['id'];
	}
  	$str = implode("_", $str);
  echo $form->submit('Proceed To Checkout', array('class'=>'box3' , 'onClick'=>"window.location.href='".$this->base."/orders/confirm/ct_session_id:".$sid."'" ) ) ;?>
<?php */?>  

  <?php 
  
  	echo $form->create(null, array('url' => array('controller' => 'carts', 'action' => 'doUpdates'),'class'=>'cmxform','type' => 'file'));
			$d = 0;
				foreach($cartContents as $cartContent) { 

$d = $d+1;
			
	echo $form->hidden('Cart.qty', array('name'=>'data['.$cartContent['ct']['id']. ']', 'div'=>'formfield', 'style'=>'width:3em;text-align:center;', 'type'=>'text', 'label'=>'','id'=>'secondtagg'.$d, 'value'=>$cartContent['ct']['qty']) ); 

				}

    echo $form->submit('Proceed To Checkout', array('class'=>'box3' , 'label'=>'Procced To Checkout', 'id'=>'btnUpdate') );?>	
</td>
 </tr>
</table>

<br />
</div>
