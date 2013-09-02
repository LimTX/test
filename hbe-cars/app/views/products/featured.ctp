<?php echo $javascript->link('content'); ?>
<div class="alpha-content-full">
<p>HOME &gt; <span style="text-transform:uppercase;">Featured Offers</span></p>
<div class="titleBar" style="padding-top:10px;">

   <h1 style="font-size:28px;">Featured Offers</h1>
</div>
<?php
    if(isset($products) && !empty($products)) {
				
       ?><br />
             <div style="padding-bottom:5px;"> <p>This section allows you to view a list of featured experience.</p></div>
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
    </tr>
	
    <?php endforeach;
	}
	
	 ?>
    </tbody>
	</table>
	<br />

    <div class="center">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	
	
	
	<br />
   <!-- <div class="sumybutton"> -->
    <!-- </div> -->
	<br />
   	</div>
	