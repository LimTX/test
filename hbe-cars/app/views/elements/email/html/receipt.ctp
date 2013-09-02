<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Your SumyKids' Order</title>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
<style>
* {
	margin:0;
	padding:0;
}
h1 {
	color: #a2b420;
	font-family:'Maven Pro', sans-serif;
	font-size:28px;
	font-weight:700;
	padding:5px 0 0;
}
h2 {
	color:#4D5353;
	font-family:'Maven Pro', sans-serif;
	font-size:28px;
	font-weight:400;
	padding:5px 0 0;
}
h3 {
	color:#4D5353;
	font-family:'Maven Pro', sans-serif;
	font-size:20px;
	font-weight:blod;
	padding:15px 0 0;
}
h5 {
	color:#4D5353;
	font-family:'Maven Pro', sans-serif;
	font-size:16px;
	font-weight:blod;
	padding:15px 0 0;
}
h6 {
	color:#4D5353;
	font-family:'Maven Pro', sans-serif;
	font-size:16px;
	font-weight:blod;
	padding:15px 0 0;
}
#newspaper-a {
	font-family:'Maven Pro', sans-serif;
	font-size: 14px;
	width: 100%;
	text-align: left;
	border-collapse: collapse;
	border:1px solid #d8ebea;
}
#newspaper-a th {
	padding: 12px 17px 12px 17px;
	font-weight: normal;
	font-size: 16px;
	background-color:#fff;
	color: #4D5353;
	font-weight: bold;
	border-bottom: 1px dashed #69c;
}
#newspaper-a td {
	padding: 7px 17px 7px 17px;
	color: #669;
}
#newspaper-a tbody tr:hover td {
	background-color:#ece8e8;
	color:#FFF;
}
#newspaper-a tr:nth-child(odd) {
	background-color:#ebf2f1;
}

 #newspaper-a .jk tbody tr:hover td{
	background-color:#333;
}
p {
	font-size:14px;
	font-family:'Maven Pro', sans-serif;
	color:#6d6e71;
	line-height:1.3em;
}
</style>
</head>
     
  	<table id="newspaper-a" summary="Customer">
    <tr>
    <td>
    <h3>Order Details</h3>
    </td>
    </tr>
    <tr>
    <td width="150"><p style="font-weight:bold;">Transaction ID</p></td><td><p>
	<?php
    echo $text->truncate($clientkeypass,
    '10',
    '',
    true
    )
    ?>
	</p></td>
    </tr>
    <tr>
    <td width="150"><p style="font-weight:bold;">Order Processed On</p></td><td><p><?php 
    
	
	$date = new DateTime($clientdate);
	$HeaderDate = $date->format('d/m/Y'); 

	$time = new DateTime($clientdate);
	$HeaderTime= $date->format('h:i:s A'); 

	echo $HeaderDate." at ".$HeaderTime; ?></p></td>
    </tr>
    </tbody>
	</table>
    <hr />
    <table id="newspaper-a" summary="Customer">
    <tr>
    <td>
    <h3>Customer Details</h3>
    </td>
    </tr>
    <tr>
    <td width="150"><p style="font-weight:bold;">Customer Name</p></td><td><p><?php echo $clientname ?></p></td>
    </tr>
    <tr>
    <td width="150"><p style="font-weight:bold;">Email</p></td><td><p><?php echo $clientemail ?></p></td>
    </tr>
    <tr>
    <td width="150"><p style="font-weight:bold;">Address</p></td><td><p><?php echo $clientaddress ?></p></td>
    </tr>
    </tbody>
	</table>
<hr />
   <table id="newspaper-a" summary="Customer">
   <tr>
   <td><h3>Purchased Details</h3></td>
   </tr>
    <tr height="50">
    <td width="250"><p style="font-weight:bold;">Product</p></td><td width="50"><p style="font-weight:bold;">Price</p></td><td width="50"><p style="font-weight:bold; text-align:center;">Quantity</p></td><td width="50"><p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal</p></td>
    </tr>
    
   <?php
   $total = 0;
	$purchasedProducts = $this->requestAction('/carts/purchasedProducts/keypass:'.$clientkeypass);
	
	foreach($purchasedProducts as $purchasedProduct) {
		$total += $purchasedProduct['Cart']['qty'] * $purchasedProduct['Product']['price'];
	 ?>
     <tr height="50">
    <td width="150"><p><?php echo $purchasedProduct['Product']['name']; //echo $html->link(__($purchasedProduct['Product']['name'], true), array('admin'=>false,'controller' => 'products', 'action' => 'view', '/cat_id:'.$purchasedProduct['Product']['category_id'].'/pd_id:'.$purchasedProduct['Product']['id'])); ?></p></td><td width="50"><p>$<?php echo $purchasedProduct['Product']['price']; ?></p></td><td width="50"><p style="text-align:center;"><?php echo $purchasedProduct['Cart']['qty']; ?></p></td><td width="120"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
    <?php $subtotal = $purchasedProduct['Cart']['qty'] * $purchasedProduct['Product']['price'];
	
	echo "$".$subtotal;
	
	 ?>
    
    </p></td>   
    </tr>
    
  <?php } ?>
  </tbody>
	</table>
<hr />    
     <table id="newspaper-a" summary="Customer">
    <tr>
    <td width="200">
         <h3>Payment Details</h3>
    </td>
    </tr>
    <tr>
    <td width="35"><p style="font-weight:bold;">Total</p></td><td><p>$<?php echo $total;  ?></p></td>
    </tr>
    </table>
