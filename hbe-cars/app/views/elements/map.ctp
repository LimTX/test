   <div id="googlemap" style="margin-left:10px;">
	<?php if(!empty($product['Product']['location'])) { ?>
    <p><strong>Location</strong></p>
    <p><?php echo $product['Product']['location']?></p>
    <br />
    <?php } ?>
     <?php if(!empty($product['Product']['how_to_get_there'])) { ?>
    <p><strong>How To Get There</strong></p>
    <p><?php echo $product['Product']['how_to_get_there']?></p>
        <br />
    <?php } ?>
   <p><strong>Map</strong>
    <br />
    The map below gives you the location of this experience to allow you to plan.
    </p>
 <br />
    </div>
    <div id="maplocation">
    <?php
include_once("map/GoogleMap.php");
include_once("map/JSMin.php");

$MAP_OBJECT = new GoogleMapAPI(); $MAP_OBJECT->_minify_js = isset($_REQUEST["min"])?FALSE:TRUE;
$MAP_OBJECT->addMarkerByAddress($product['Product']['location'],"", $product['Product']['name']);
?>
<?php echo $MAP_OBJECT->getHeaderJS(); ?>
<?php echo $MAP_OBJECT->getMapJS(); ?>
<?php echo $MAP_OBJECT->printOnLoad(); ?>
<?php echo $MAP_OBJECT->printMap(); ?>
<?php /** echo $MAP_OBJECT->printSidebar(); **/ ?>
<br />
</div>