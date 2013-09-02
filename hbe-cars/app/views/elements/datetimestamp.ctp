
<?php
$orders = $this->requestAction('/orders/datetimestamp');
foreach($orders as $order) {
?>
<?php 

$date = date('d/m/Y', strtotime($order['Order']['modified']));
$time = date('h:i:s A', strtotime($order['Order']['modified']));

echo $date." at ".$time;
}
?>