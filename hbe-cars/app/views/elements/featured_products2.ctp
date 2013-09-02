<div class="alpha-home-content">

        <div class="slider-wrapper theme-pascal">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
<?php 
$products = $this->requestAction("/products/latestlists/c:$catId/");
foreach($products as $product): ?>

<?php //Check if images exist and display images
    if ( $product['Product']['image'] ) {
        $thumbnail = '/img/sets/big/' . $product['Product']['image'];
    } else {
        $thumbnail = 'no-image-small.png';
    } 
		
      e( $html->link(
	      $html->image($thumbnail, array('width' => '542', 'height' => '350', 'border' => '0', 'title' => $product['Product']['name']  )),
          array('action' => "#"), array('escape' => false))); ?>
<? endforeach;?>     </div>
        </div>
        
        </div>
   
    <div class="beta-content">
    <?php echo $html->image("slide_03.jpg", array(
                "alt" => "Event Banner",
                'class' => '',
                )); ?>
    <?php echo $html->image("slide_02.jpg", array(
                "alt" => "Discount Banner",
                'class' => 'image-small',
                )); ?>
    </div>
