<?php echo $javascript->link('order'); ?>
<style type="text/css">
#example2 li.lastitem ul {
	height: 215px;
}
</style>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL > ITEMS ORDERED</p>
   <h1>Items Ordered</h1>
   <br />
      <p>This section allows you to review orders.</p>
	     <br />
         	 <p class="orange"><?php $session->flash(); ?><?php $session->flash('auth'); ?></p>
<?php echo $form->create(null, array('url' => array('controller' => 'orders', 'action' => 'search'),'class'=>'cmxform','id'=>'form2')); ?>
<?php echo $form->input('search_text4', array('id' => 's','div'=>'aaa','placeholder'=>'Transaction ID','label' => false)); ?>
<br />
<div style="width:5px; height:5px; float:right;"></div>
<br clear="all" />
<br />       
    <table id="newspaper-a" summary="Customer">
    <thead>
    	<tr>
            <th width="28%" scope="col"><?php echo $paginator->sort('Transaction ID', 'keypass', array('title' => 'Sorting Transaction ID','class' => 'normalTip')); ?></th>
            <th width="20%" scope="col"><?php echo $paginator->sort('Customer', 'customer_id', array('title' => 'Sorting Customer Name','class' => 'normalTip')); ?></th>
            <th scope="col"><?php echo $paginator->sort('Created', 'customer_id', array('title' => 'Sorting Creation Date','class' => 'normalTip')); ?></th>
            <th width="20%" align="Center" scope="col"><?php echo $paginator->sort('Status', 'status', array('title' => 'Sorting Status','class' => 'normalTip')); ?></th>
                        <th scope="col">Action</th>
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
    <td style="color:#6D6E71"> <?php 
	echo $order['Customer']['customers_firstname']." ".$order['Customer']['customers_lastname'];
     ?></td>
        <td><p><?php echo date('d/m/Y', strtotime($order['Order']['modified'])); ?></p></td>
        <td style="text-align:center;"><p><?php
		
		if($order['Order']['status'] == "Processing") {
		$datastatus = "Payment is completed & the order info is transferred to the SumyKids";	
		} else if($order['Order']['status'] == "Shipped")  {
			$datastatus = "SumyKids sent out voucher and it is on the way to you.";
		}
		
		echo $html->link($order['Order']['status'], array('#'),array('title' => $datastatus,'style'=>'font-size:14px;width:100px;color:#6D6E71;','class' => 'normalTip'));
		
		
		?></p></td>
    <td style="text-align:center;">
    <?php 
	echo $html->image("edit.png", array(
"title" => "Edit Order",'class'=>'borderzero',
'url' => array('action'=>'edit', 'id'=>$order['Order']['id'])));
	?>
    </td>
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

   
    <?php echo
    $this->element('admin_sidenav');
    ?>