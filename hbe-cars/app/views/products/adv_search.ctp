<div class="alpha-content-full">
<p>HOME &gt; ADVANCED SEARCH</p>
<br />
<h1>Advanced Search</h1>
   <br />
   <br />
<!-- ************************ADVANCED SEARCH ************************************ -->

<p class="orange"><?php $session->flash(); ?></p>

<?php echo $form->create(null, array('url' => array('controller' => 'products', 'action' => 'adv_search'),'class'=>'cmxform','id'=>'searchbox3')); ?>
<?php echo $form->input('search_text3', array('id' => 's','div'=>'aaa','placeholder'=>'Search','label' => false)); ?>
<br /><br />
<?php $agegroup_options=array('Babies and Toddlers'=>'Babies and Toddlers','Preschoolers'=>'Preschoolers','5-7 Year Olds'=>'5-7 Year Olds','8-12 Year Olds'=>'8-12 Year Olds','12-15 Year Olds'=>'12-15 Year Olds','16+ Year Olds'=>'16+ Year Olds','Family'=>'Family') ?>
<?php echo $form->input('search_agegroup2', array('options' => $agegroup_options, 'empty' => '-- Select Age Group --','label' => false,'id' => 'd','div'=>'aaa')); ?><div style="width:5px; height:5px; float:right;"></div>
<?php echo $form->input('search_suburb2', array('options' => $suburb, 'empty' => '-- Select Location --','label' => false,'id' => 'd','div'=>'aaa')); ?><div style="width:5px; height:5px; float:right;"></div><?php echo $form->input('search_category2', array('options' => $categories,'type'=>'select','empty' => '-- Select Category --','label' => false,'id' => 'd','div'=>'aaa')); ?>
<?php echo $form->end(); ?>
<br />
<br />
<br />

<!--- ******************************************************** -->
<?php
    if(isset($products) && !empty($products)) {
	?>   
<p><?php echo $totalUsers2; ?> Result(s) Found.</p>

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
	
   <!--  </td> -->
    </tr>
	
    <?php endforeach; ?>
    </tbody>
	</table>
	<br />
<p><?php echo $totalUsers2; ?> Result(s) Found.</p>
    <div class="center">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	
	<p><?php
    } else {
	
	echo "Your search <strong>'".$this->data['Product']['search_text3']."'</strong> did not match any experience. <br/><br/>";
		echo "Please try searching again with different criteria and we'll do our best to find it for you.";
    }
    ?></p>
	
	<br />
   <!-- <div class="sumybutton"> -->
	    <?php // echo $html->link('Add Product',array('action'=>'add'))?>
    <!-- </div> -->
	<br />
   	</div>