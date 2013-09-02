<?php echo $javascript->link('content'); ?>
<style type="text/css">
#example2 li.lastitem ul {
	height: 215px;
}
</style>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL > ITEMS ORDERED STATUS</p>
   <h1>Items Ordered Status</h1>
   <br />
      <p>This section allows you to view your items ordered status.</p>
	<br />
     <p class="orange"><?php $session->flash(); ?></p>
       
    <table id="newspaper-a" summary="Customer">
    <thead>
    	<tr>
            <th width="60%" scope="col"><?php echo $paginator->sort('Transaction ID', 'keypass', array('title' => 'Sorting Transaction ID','class' => 'normalTip')); ?></th>
            <th scope="col"><?php echo $paginator->sort('Created', 'customer_id', array('title' => 'Sorting Creation Date','class' => 'normalTip')); ?></th>
            <th scope="col" style="text-align:center;"><?php echo $paginator->sort('Status', 'status', array('title' => 'Sorting Status','class' => 'normalTip')); ?></th>
        </tr>
    </thead>
    <tbody>
    
	
    
    <!-- Here is where we loop through our $customer array, printing out customer info -->
    <?php foreach ($orders as $order){ ?>
    <tr>
    <td>
    <p><?php echo $html->link($text->truncate($order['Order']['keypass'],
    '10',
    '',
    true
    ),
    array('controller' => 'orders', 'action' => 'order_detail', $order['Order']['keypass'])); ?></p>
    </td>
        <td><p><?php echo date('d/m/Y', strtotime($order['Order']['modified'])); ?></p></td>
        <td style="text-align:center;"><p>
        
        <?php
		
		if($order['Order']['status'] == "Processing") {
		$datastatus = "Payment is completed & the order info is transferred to the SumyKids";	
		} else if($order['Order']['status'] == "Shipped")  {
			$datastatus = "SumyKids sent out voucher and it is on the way to you.";
		}
		
		echo $html->link($order['Order']['status'], array('#'),array('title' => $datastatus,'style'=>'font-size:14px;width:100px;color:#6D6E71;','class' => 'normalTip','style'=>'color:#EA6402;font-size:14px;'));
		
		?>
        
        </p></td>
    </tr>
    <?php } ?>
    </tbody>
	</table>
	<br />

    <div class="center">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div>
	<br />
   	</div>
   
     <?php echo $this->element('admin_user_sidenav'); ?>