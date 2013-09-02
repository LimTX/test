<?php
class Order extends AppModel
{
	var $name = "Order";
	var $hasMany = array('Cart'); 
	var $belongsTo = array('Customer');

}
?>