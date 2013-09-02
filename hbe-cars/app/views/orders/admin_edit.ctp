<?php echo $javascript->link('order'); ?>
<style type="text/css">
#example2 li.lastitem ul {
	height: 215px;
}
</style>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL > ITEMS ORDERED</p>
   <h1>Order Details</h1>
   <br />
      <p>This section allows you to edit a Customer Order.</p>
      <h3>Order Record Form</h3>
        <br />
<?php echo $form->create('Order', array('action' => 'edit','class'=>'cmxform','id'=>'form2')); ?>
<table width="100%" cellspacing="10" border="0">
<tr>
<td width="10%" valign="top" style="text-align:right;"></td>
<td>
<p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked * are required.</small></p>
</td>
</tr>
<tr>
<td width="10%" valign="top" style="text-align:right;"><p>Memo</p></td>
<td>
   <p>
<?php echo $form->input('memo', array('rows' => '10','label' => false,'div'=>'formfield','style'=>'width:98%')); ?>        
   </p>
</td>
</tr>
<tr>
<td width="10%" valign="top" style="text-align:right;"><p>Status*</p></td>
<td>
   <p>
<?php 
$options = array('Processing' => ' Processing', 'Shipped' => ' Shipped');
echo $form->input('id', array('type'=>'hidden'));
echo $form->input('status', array('label' => false,'validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Order][status]" class="error">Please select your status.</label>
   </p>
</td>
</tr>
<tr>
<td></td>
<td> <div class="sumybutton" style="float:left; width:100px;">
<a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
</div><div style="width:40px; height:50px; float:left;"></div>
    <div style="float:left;">
    
<?php echo $form->end('Save',array('class' => 'btn')); ?></div>
</td>
</tr>
</table>
</p>
      <h3>Order Details</h3>
   <br /><p>
   <table id="newspaper-a" summary="Customer">
    <?php
	foreach($orders as $order) {
	 ?>
    <tr height="50">
    <td width="150"><p style="font-weight:bold;">Transaction ID</p></td><td><p><?php echo $text->truncate($order['Order']['keypass'],
    '10',
    '',
    true
    ); ?></p></td>
    </tr>
    <tr height="50">
    <td width="150"><p style="font-weight:bold;">Order Processed On</p></td><td><p><?php $date = date('d/m/Y', strtotime($order['Order']['modified']));
$time = date('h:i:s A', strtotime($order['Order']['modified']));

echo $date." at ".$time; ?></p></td>
    </tr>
    <?php } ?>
    </tbody>
	</table>
</p>
      <h3>Customer Details</h3>
   <br /><p>
   <table id="newspaper-a" summary="Customer">
    <?php
	$customers = $this->requestAction('/customers/cust_order');
	foreach($customers as $customer) {
	 ?>
    <tr height="50">
    <td width="150"><p style="font-weight:bold;">Customer Name</p></td><td><p><?php echo $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname']; ?></p></td>
    </tr>
    <tr height="50">
    <td width="150"><p style="font-weight:bold;">Email</p></td><td><p><?php echo $customer['Customer']['customers_email_address'] ?></p></td>
    </tr>
     <tr height="50">
    <td width="150"><p style="font-weight:bold;">Address</p></td><td><p><?php echo $customer['Customer']['customers_address']; ?></p></td>
    </tr>
    <?php } ?>
    </tbody>
	</table>
</p>
<h3>Purchased Details</h3>
   <br />
 <p>
   
   <table id="newspaper-a" summary="Customer">
    <tr height="50">
    <td width="250"><p style="font-weight:bold;">Product</p></td><td width="50"><p style="font-weight:bold;">Price</p></td><td width="50"><p style="font-weight:bold;">Quantity</p></td><td width="50"><p style="font-weight:bold;">Subtotal</p></td>
    </tr>
    
        <?php
	foreach($orders as $order) {
	 ?>
     
   <?php
   $total = 0;
	$purchasedProducts = $this->requestAction('/carts/purchasedProducts/keypass:'.$order['Order']['keypass']);
	
	}
	foreach($purchasedProducts as $purchasedProduct) {
		$total += $purchasedProduct['Cart']['qty'] * $purchasedProduct['Product']['price'];
	 ?>
     <tr height="50">
    <td width="150"><p><?php echo $html->link(__($purchasedProduct['Product']['name'], true), array('admin'=>false,'controller' => 'products', 'action' => 'view', 
'/cat_id:'.$purchasedProduct['Product']['category_id'].'/pd_id:'.$purchasedProduct['Product']['id'])); ?></p></td><td width="50"><p>$<?php echo $purchasedProduct['Product']['price']; ?></p></td><td width="50"><p><?php echo $purchasedProduct['Cart']['qty']; ?></p></td><td width="50"><p>
    
    <?php $subtotal = $purchasedProduct['Cart']['qty'] * $purchasedProduct['Product']['price'];
	
	echo "$".$subtotal;
	
	 ?>
    
    </p></td>   
    </tr>
    
  <?php } ?>
  </tbody>
	</table>
    <h3>Payment Details</h3>
        <br />
     <table id="newspaper-a" summary="Customer">
    <tr height="50">
    <td width="35"><p style="font-weight:bold;">Total</p></td><td><p>$<?php echo $total;  ?></p></td>
    </tr>
    </table>
 
  
   	</div>
     <?php echo $this->element('admin_sidenav'); ?>