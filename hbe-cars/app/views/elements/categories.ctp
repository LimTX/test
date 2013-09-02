<br />
<?php 
$categories = $this->requestAction("/categories/getAll");	
foreach($categories as $category) { ?>
<div class="product_container">
<?php

    if ( $category['Category']['image'] ) {
        $cat_thumbnail = '/img/products/' . $category['Category']['image'];
    } else {
        $cat_thumbnail = 'no-image-small.png';
    }
      e( $html->link(
	      $html->image($cat_thumbnail, array( 'border' => '0' )),
          array('action' => '/generate/cat_id:' . $category['Category']['id']),
          array('escape' => false))); ?>
    <br>
    
    
    <?php e( $html->link( $category['Category']['name'], "/carts/generate/cat_id:".$category['Category']['id'] )); ?>
</div>

<?php } ?>