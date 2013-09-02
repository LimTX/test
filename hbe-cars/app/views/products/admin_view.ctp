<?php echo $javascript->link('content'); ?>
    <div class="alpha-content">
	<p>HOME &gt; ADMIN PANEL &gt; PRODUCTS</p>
    <h1>Products</h1>
    <br />
    <p>This section allows you to view Products.</p>
    <h3><?php echo $product['Product']['name'] ?></h3>
        <p><small>Created: <?php echo date('d/m/Y', strtotime($product['Product']['created'])); ?></small> &#124;
    <small>Last Modified: <?php echo date('d/m/Y', strtotime($product['Product']['modified'])); ?></small>
    </p>
    <?php if(!empty($product['Product']['image'])) { ?>
    <br />
    <?php echo $html->image('sets/big/'.$product['Product']['image'], array('class' => 'drop-shadow'))?>
    <br />
    <?php } ?>
	<br />
<div class="usual"> 
  <ul class="idTabs"> 
    <li><a id="detarget" href="#idTab1" class="selected">Description</a></li> 
    <li><a id="target" href="#idTab2">Need To Know</a></li> 
  </ul> 
  <div id="idTab1" style="display:block;">
  <br/>
    <?php if(!empty($product['Product']['price'])) { ?>
    <h1><span style="font-size:18px; vertical-align:text-top;"><b>Only $</b></span><strong><?php echo $product['Product']['price']?></strong></h1>
    <?php } ?>
      <br/>
       <?php if(!empty($product['Product']['qty'])) { ?>
    <p><strong>Quantity</strong></p>
    <p><?php echo $product['Product']['qty']?> slots to go</p>
    <br />
    <?php }?>
  <?php if(!empty($product['Product']['description'])) { ?>
   <!-- <p><strong>Description</strong></p> -->
    <p><?php echo $product['Product']['description']?></p>
    <?php } ?>
  </div> 
  <div id="idTab2" style="display:none;">
  <br />
    <?php if(!empty($product['Product']['event_start_date']) && !empty($product['Product']['event_end_date'])) { ?>
    <p><strong>Duration</strong></p>
    <p><?php echo $product['Product']['event_start_date']?> till <?php echo $product['Product']['event_end_date']?> </p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['open_hours'])) { ?>
    <p><strong>Opening Hours</strong></p>
    <p><?php echo $product['Product']['open_hours']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['age_group'])) { ?>
    <p><strong>Age Group</strong></p>
    <p><?php echo $product['Product']['age_group']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['available_date'])) { ?>
    <p><strong>Available Date</strong></p>
    <p><?php echo $product['Product']['available_date']?></p>
   	<br />
    <?php } ?>
    <?php if(!empty($product['Product']['weather'])) { ?>
    <p><strong>Weather</strong></p>
    <p><?php echo $product['Product']['weather']?></p> 
   	<br />
    <?php } ?>
    <?php if(!empty($product['Product']['guidelines'])) { ?>
    <p><strong>Guidelines</strong></p>
    <p><?php echo $product['Product']['guidelines']?></p> 
   	<br />
    <?php } ?>
    <?php if(!empty($product['Product']['facilities'])) { ?>
    <p><strong>Facilities</strong></p>
    <p><?php echo $product['Product']['facilities']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['spectators'])) { ?>
    <p><strong>Spectators</strong></p>
    <p><?php echo $product['Product']['spectators']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['other_activities'])) { ?>
    <p><strong>Other Activities</strong></p>
    <p><?php echo $product['Product']['other_activities']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['disabled_access'])) { ?>
    <p><strong>Disabled Access</strong></p>
    <p><?php echo $product['Product']['disabled_access']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($product['Product']['supplier_id'])) { ?>
    <p><strong>Supplier</strong></p>
    <p>
    
 <?php foreach ($suppliers as $supplier) {
    echo $supplier['Supplier']['name'];
}
 ?>
    
    </p>
    <?php } ?>
    <br />
    <?php if(!empty($product['Product']['supplier_policy'])) { ?>
    <p><strong>Supplier Policy</strong></p>
    <p><?php echo $product['Product']['supplier_policy']?></p>
    <?php } ?>  
  </div> 
</div>
           		<?php  echo $this->element('map') ;?>
                <div style="width:100%; height:15px; margin-left:10px; border-top:1px #DEDEDE solid;">
                </div>
                
                <div id="productCategory">
<ul>
       <?php if(!empty($product['Product']['category_id'])) { ?>
     <li><?php foreach ($tags as $tag) {
 echo $html->link($tag['Category']['name'], "/products/cat/cat_id:".$tag['Category']['id'] );}
 ?></li>
      <?php } ?> 
<?php if(!empty($product['Product']['category_parent_id'])) { ?>
 <li><?php foreach ($subtags as $subtag) {
	 echo $html->link($subtag['Category']['name'], "/products/subcat/cat_id:".$subtag['Category']['id']."/subcat_id:".$subtag['Category']['parent_id'] );
}
 ?></li>
     <?php } ?> 
     <li><a href="#" style="background-color:#FFF; color:#AFAFAF; border:1px #AFAFAF solid;">TAGS</a></li>
</ul>
</div>  
<br clear="all" />   <br /> <div class="sumybutton left">
    <a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
    </div>
    <div class="left" style="width:10px; height:40px;">&nbsp;</div>
    
    <div class="sumybutton left">
    <?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$product['Product']['id']));?>
    </div>

    </div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>