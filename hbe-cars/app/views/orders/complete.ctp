<div class="alpha-content" style="width:80%;">
<p>HOME &gt; PAYMENT > CONGRATULATIONS</p>
   <h1>Congratulations</h1>
   <br />
 
      <p>Order Processed on<?php echo $this->element('datetimestamp') ;?>
      <br /><br />
      Thanks for buying from SumyKids. We are informing that your order has been successfully placed. <br /><br />
      For more information about the order, please click <?php echo $html->link(__('here', true), array('admin'=>false,'controller' => 'orders', 'action' => 'status')); ?>
       <br /><br />
      
      </p>
	<br />
    <p class="orange"><?php $session->flash(); ?></p>

   	</div>