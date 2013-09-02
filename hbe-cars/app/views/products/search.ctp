<?php echo $javascript->link('content'); ?>
<div class="alpha-content-full">
<p>HOME &gt; SEARCH RESULTS</p>
<br />
<h1>Search Results</h1>
   <br />
   
<?php
    if(isset($products) && !empty($products)) {
?>   
	      <p><?php echo $totalUsers; ?> Result(s) Found.</p>

	 <p class="orange"><?php $session->flash(); ?></p>
    <table id="newspaper-a" summary="Product">
    <thead>
    	<tr>
            <th colspan="2" scope="col"><?php echo $paginator->sort('Name', 'name', array('title' => 'Sorting Title Alphabetically','class' => 'normalTip')); ?></th>
        </tr>
		
    </thead>
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
	<?php foreach ($products as $product): ?>

    <tr>
    <td>
	 <?php echo $html->image('sets/small/'.$product['Product']['image'], array('class' => 'drop-shadow-small'))?>
	<div style="float:left; padding-left:10px; width:80%;">
    <p><?php echo $html->link($product['Product']['name'],"/products/view/cat_id:$catId/pd_id:".$product['Product']['id'] ); ?><br/>
	
    <?php
    echo $text->truncate($product['Product']['description'],
    150,
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
	<br />
<p><?php echo $totalUsers; ?> Result(s) Found.</p>
    <div class="center">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	
	<p><?php
    } else {
        echo "Your search <strong>'".$this->params['url']['search_text']."'</strong> did not match any experience. <br/><br/>";
		echo "We couldn't find any <strong>'".$this->params['url']['search_text']."'</strong> experiences. Try searching again and we'll do our best to find it for you.";
    }
    ?></p>
	
	<br />
   <!-- <div class="sumybutton"> -->
	    <?php // echo $html->link('Add Product',array('action'=>'add'))?>
    <!-- </div> -->
	<br />
   	</div>