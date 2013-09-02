    <?php
	$cartContents = $this->requestAction("/carts/getCartNum/s:$sid");	
        if ( !empty($cartContents) && is_array($cartContents) ) { 
		$Total = 0;
	?>
 	<?php
					foreach($cartContents as $cartContent) { 
	?>
                
					<?php $Total += $cartContent['ct']['qty'];

					?>
                  
              <?php
				} ?>       
                
                
                
                <?php echo $html->link("$Total Items", array('admin'=> false,'controller'=>'carts','action'=>'view'), array('class' => 'toplinking'));  ?>
                
              <?php // echo 'Your Cart ('.$Total.' Items)';?>

               			
		<?php                 
        }
        else{
            echo 'Your Cart (empty)';
        }
    ?>