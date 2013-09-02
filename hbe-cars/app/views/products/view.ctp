	<?php echo $javascript->link('jquery.idTabs.min.js'); ?>
    <div class="alpha-content">
	<p>HOME &gt; PRODUCTS &gt; <span style="text-transform:uppercase;"><?php echo $product[0]['Product']['name'] ?></span></p><br/>
    <div class="titleBar">
    <h1><?php echo $product[0]['Product']['name'] ?></h1>
    </div>
    <p>This section allows you to view product details.</p>
  <!-- <p><small>Created: <?php // echo date('d/m/Y', strtotime($product[0]['Product']['created'])); ?></small> &#124;
    <small>Last Modified: <?php // echo date('d/m/Y', strtotime($product[0]['Product']['modified'])); ?></small>
    </p> -->
    <?php if(!empty($product[0]['Product']['image'])) { ?>
    <br />
    <?php echo $html->image('sets/big/'.$product[0]['Product']['image'], array('class' => 'drop-shadow'))?>
    <br />
    <?php } ?>
	<br />
    <?php
	echo $form->create(null, array('url' => array('controller' => 'carts', 'action' => 'addon',"pd_id" => $product[0]['Product']['id']),'class'=>'cmxform','id'=>	'form2'));
	?><label for="data[Cart][qty]" class="error">Please select your newsletter subscription.</label>
    
	<table align="right" border="0"><tr>
    <td align="right" style="width:500px; height:10px; padding-bottom:4px;">
	<div style="float:right;">
	<?php echo $form->input('Cart.qty',array('label' => false,'style'=>'width:5em;','div'=>'formfield','validate' => 'required:true,number:true')); ?>
    </div>
    <div style=" position:absolute; margin-left:50px; z-index:1; padding-top:7px; border:0px solid #666; padding-left:300px; height:20px;">
    <p>Quantity</p>
    </div>
    </td>
    </td></tr>
    <tr><td colspan="2" align="right">
    <?php echo $form->hidden('Cart.ct_session_id', array('value'=> $sid)); ?>
    <?php
	$options = array(
	'label' => 'Add to Shopping Cart',
	'div' => array('class' => 'cartBtn')
	);
	echo $form->end($options); ?>
    </td></tr>
    </table>
  <br /><br /><br /><br />
<div class="usual"> 
  <ul class="idTabs"> 
    <li><a id="detarget" href="#idTab1" class="selected">Description</a></li> 
    <li><a id="target" href="#idTab2">Need To Know</a></li> 
  </ul> 
  <div id="idTab1" style="display:block;">
  <br/>
    <?php if(!empty($product[0]['Product']['price'])) { ?>
    <h1><span style="font-size:18px; vertical-align:text-top;"><b>Only $</b></span><strong><?php echo $product[0]['Product']['price']?></strong></h1>
    <?php } ?>
      <br/>
       <?php if(!empty($product[0]['Product']['qty'])) { ?>
    <p><strong>Quantity</strong></p>
    <p><?php echo $product[0]['Product']['qty']?> slots to go</p>
    <br />
    <?php }?>
  <?php if(!empty($product[0]['Product']['description'])) { ?>
   <!-- <p><strong>Description</strong></p> -->
    <p><?php echo $product[0]['Product']['description']?></p>
    <?php } ?>
  </div> 
  <div id="idTab2" style="display:none;">
  <br />
    <?php if(!empty($product[0]['Product']['event_start_date']) && !empty($product[0]['Product']['event_end_date'])) { ?>
    <p><strong>Duration</strong></p>
    <p><?php echo $product[0]['Product']['event_start_date']?> till <?php echo $product[0]['Product']['event_end_date']?> </p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['open_hours'])) { ?>
    <p><strong>Opening Hours</strong></p>
    <p><?php echo $product[0]['Product']['open_hours']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['age_group'])) { ?>
    <p><strong>Age Group</strong></p>
    <p><?php echo $product[0]['Product']['age_group']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['available_date'])) { ?>
    <p><strong>Available Date</strong></p>
    <p><?php echo $product[0]['Product']['available_date']?></p>
   	<br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['weather'])) { ?>
    <p><strong>Weather</strong></p>
    <p><?php echo $product[0]['Product']['weather']?></p> 
   	<br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['guidelines'])) { ?>
    <p><strong>Guidelines</strong></p>
    <p><?php echo $product[0]['Product']['guidelines']?></p> 
   	<br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['facilities'])) { ?>
    <p><strong>Facilities</strong></p>
    <p><?php echo $product[0]['Product']['facilities']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['spectators'])) { ?>
    <p><strong>Spectators</strong></p>
    <p><?php echo $product[0]['Product']['spectators']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['other_activities'])) { ?>
    <p><strong>Other Activities</strong></p>
    <p><?php echo $product[0]['Product']['other_activities']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['disabled_access'])) { ?>
    <p><strong>Disabled Access</strong></p>
    <p><?php echo $product[0]['Product']['disabled_access']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product[0]['Product']['supplier_id'])) { ?>
    <p><strong>Supplier</strong></p>
    <p>
    
 <?php foreach ($suppliers as $supplier) {
    echo $supplier['Supplier']['name'];
}
 ?>
    
    </p>
    <?php } ?>
    <br />
    <?php if(!empty($product[0]['Product']['supplier_policy'])) { ?>
    <p><strong>Supplier Policy</strong></p>
    <p><?php echo $product[0]['Product']['supplier_policy']?></p>
    <?php } ?>  
  </div> 
</div>
           		<?php  echo $this->element('open_map') ;?>
                <div style="width:100%; height:15px; margin-left:10px; border-top:1px #DEDEDE solid;">
                </div>
     <div id="productCategory">
    
<ul>


        <?php if(!empty($product[0]['Product']['category_id'])) { ?>
     <li><?php foreach ($tags as $tag) {
 echo $html->link($tag['Category']['name'], "/products/cat/cat_id:".$tag['Category']['id'] );}
 ?></li>

      <?php } ?> 
      <?php if(!empty($product[0]['Product']['category_parent_id'])) { ?>
 <li><?php foreach ($subtags as $subtag) {
	 echo $html->link($subtag['Category']['name'], "/products/subcat/cat_id:".$subtag['Category']['id']."/subcat_id:".$subtag['Category']['parent_id'] );
}
 ?></li>
     <?php } ?> 
                     <li><a href="#" style="background-color:#FFF; color:#AFAFAF; border:1px #AFAFAF solid;">TAGS</a></li>

</ul>
</div>   <br clear="all" />   <br />
    <div class="sumybutton">
    <a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
    </div>
<br clear="all" />
   </div>
   <br />
   <div class="beta-content" style="margin-right:8px;">
   <div id="sidebar">
     <h3 style="padding-bottom:8px; padding-left:5px; font-weight:bold; color:#971526; font-weight:normal;">
	<strong>Carts Content</strong>
	</h3>
   <?php echo
    $this->element('minicart');
    ?>
  </div>
</div>
<?php echo $javascript->link('jquery.stickybar.js'); ?>
<?php echo $javascript->link('jquery.easing.1.3.js'); ?>
<script type="text/javascript">
      //<![CDATA[
      $(function () {
        $("#sidebar").stickySidebar({
            timer: 300
          , easing: "easeInOutElastic"
        });
      });
      //]]>
</script>
   
