<div style="width:262px; border-radius:0.4em;
	-moz-border-radius:0.4em;
	-khtml-border-radius:0.4em; border:5px #f3f1ec solid; marign-right:50px;">
<table id="minicart">
    <?php
	$cartContents = $this->requestAction("/carts/getMiniCart/s:$sid");	
        if ( !empty($cartContents) && is_array($cartContents) ) { 
		$Total = 0;
	?>
 	<?php
					foreach($cartContents as $cartContent) { 
					// Subtotal Calculation
					$Total += $cartContent['pd']['price'] * $cartContent['ct']['qty'];
	?>
                <tr>
                    <td colspan="2" width="100%" style="border-bottom:1px #CC6600 solid;">
					<div style="float:left; width:70%; border-right:0px dotted #963;">
					<?php echo $cartContent['ct']['qty'];?> X 
					<?php echo $html->link($cartContent['pd']['name'], '/products/view/pd_id:'.$cartContent['ct']['product_id'].'cat_id:'.$cartContent['pd']['category_id']);?>
                    <?php echo $form->hidden("id", array('value'=> $cartContent['ct']['id'])); ?>
                    </div>
                    <div style="float:right; text-align:left; border:0px solid black; width:65px">
                    <?php echo Configure::read('Shop.currency');?><?php echo number_format((float)$cartContent['pd']['price'] * $cartContent['ct']['qty'], 2, '.', '');?>
                    </div>
                    </td>
                    
                </tr>
              <?php
				} ?>       
                <tr>
                    <td align="left" colspan="2">
                    
                    <div style="float:left; text-align:right; width:70%">
					<strong> Total&nbsp;&nbsp;&nbsp; </strong>
                    </div>
                    <div style="float:right; text-align:left; border:0px solid black; width:65px;">
                  <strong>  <?php echo Configure::read('Shop.currency');?><?php echo number_format((float)$Total, 2, '.', '');?> </strong>
                    </div>
                    
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td class="dotyline" colspan="2" align="center">
					 <div id="shoppycart" style="padding-top:6px;">
					<?php echo $html->link(' Go To Shopping Cart','/carts/view');?>
                    </div>
                    </td>
                </tr>				
		<?php                 
        }
        else{
            echo '<tr><td width="150" valign="middle" align="center"><br/> '.$html->image('cart.png', array('alt' => 'Cart')).'<br/><br></td></tr>';
        }
    ?>
</table>
</div>