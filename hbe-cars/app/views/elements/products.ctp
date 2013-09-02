<div class="alpha-content">
<?php 
$categories = $this->requestAction("/categories/getCategoryName");	
foreach($categories as $category) { ?>
<p>HOME &gt; CATEGORIES &gt; <span style="text-transform:uppercase;"><?php echo $category['Category']['name']; ?></span></p>
<br />
<div class="titleBar">
   <h1><?php echo $category['Category']['name']; ?></h1>
   </div>
   <br />   
<?php 

$products = $this->requestAction("/products/lists/c:$catId/"); 

?>

<?php
    if(isset($products) && !empty($products)) {
				
       ?>
              <p>This section allows you to view a list of products.</p><br />

 <table id="newspaper-a" summary="Product">
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
	<?php foreach ($products as $product): ?>

    <tr>
    <td>
	 <?php echo $html->image('sets/small/'.$product['Product']['image'], array('class' => 'drop-shadow-small'))?>
	<div style="float:right; padding-left:10px; width:75%;">
    <p><?php echo $html->link($product['Product']['name'],"/products/view/cat_id:$catId/pd_id:".$product['Product']['id'] ); ?><br/>
	
    <?php
    echo $text->truncate($product['Product']['description'],
    90,
    ' ...',
    false
    );
    ?>&nbsp; <br/><small><?php echo $html->link('Read More>>', "/products/view/cat_id:$catId/pd_id:".$product['Product']['id'] );  ?></small>
	<br/><strong>Location:</strong>&nbsp;<?php echo $product['Product']['suburb'] ; ?>
    	</p>
	</div>
    </td>
	<td width="15%" align="center" style="color:#a2b420;">
	<big style=" font-size:18px;">$<strong><?php echo $product['Product']['price'] ; ?></strong></big>
    </td>
     <!-- <td><p> -->
	<?php /**echo date('d.m.Y', strtotime($product['Product']['created'])); ?></p></td>
	<td width="5%" align="center"><p>
        
    <?php if($product['Product']['status'] == "Published") { ?>
   
    <?php echo $html->image("tick.png", array());
	
	} else {
	
	echo $html->image("archived.png", array()); 
	
	}
	
	?>        
    </p></td>
    <td>
    
    <?php 
	
	/**echo $html->image("edit.png", array(
"title" => "Edit Product",
'url' => array('action'=>'edit', 'id'=>$product['Product']['id'])));
	
 ?>&nbsp;
   <?php
echo $html->link(  $html->image("delete.png")
, array('action' =>'delete', $product['Product']['id'])
, array('title' => 'Delete Product')
, sprintf('Are you sure you want to delete this product: %s?', $product['Product']['name'])
, false); **/
	
	//echo $html->link('Delete', array('action'=>'delete', $product['Product']['id']), null, sprintf('Are you sure you want to delete Product: %s?', $product['Product']['name'])); ?>
   <!--  </td> -->
    </tr>
	
    <?php endforeach; ?>
    </tbody>
	</table>
       
       <?php
    } else {
        echo "<p>Sorry! There are currently no products found in the ".$category['Category']['name'].".</p>";
    }
    ?>

<?php } ?>
</div>

       <?php echo
    $this->element('sidenav');
    ?>