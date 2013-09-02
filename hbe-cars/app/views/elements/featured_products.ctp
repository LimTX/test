<style type="text/css">
.content { padding-bottom:0px;
}
</style>
<div class="alpha-home-content" style="padding-bottom:0px;">
        <div class="slider-wrapper theme-pascal">
           <div class="ribbon"></div>    
           <div class="nivo-directionNav"></div>
            <div id="slider" class="nivoSlider">
<?php 
$products = $this->requestAction("/products/latestlists");
foreach($products as $product) { ?>

<?php //Check if images exist and display images
    if ( $product['Product']['image'] ) {
        $thumbnail = '/img/sets/big/' . $product['Product']['image'];
    } else {
        $thumbnail = 'no-image-large.png';
    } 
		
      e( $html->link(
	      $html->image($thumbnail, array('width' => '542', 'height' => '350', 'border' => '0', 'title' => $product['Product']['name']  )),
          array('controller' =>'products',
		  'action' => "view/pd_id:".$product['Product']['id']
		  ), array('escape' => false))); ?>
<?php } ?>     </div>
        </div>
        </div>
       
    <div class="beta-content" style="padding-bottom:0px;">
 <?php echo
    $this->element('advertisement');
    ?>
           <span style="color:white;">     <?php $session->flash();  ?>  </span>
    </div>
     <br clear="all" /><br />
    <?php echo
    $this->element('whatsons');
    ?>
