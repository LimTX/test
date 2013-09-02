<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL > PRODUCTS</p>
<br />
<h1>Products</h1>
   <br />
      <p>This section allows you to create new Products, edit or delete existing ones.</p>
    <br />
    <p class="orange"><?php $session->flash(); ?></p>
<?php echo $form->create(null, array('url' => array('controller' => 'products', 'action' => 'search'),'class'=>'cmxform','id'=>'form2')); ?>
<?php echo $form->input('search_text2', array('id' => 's','div'=>'aaa','placeholder'=>'Search','label' => false)); ?>
<br /><br /><?php $agegroup_options=array('Babies and Toddlers'=>'Babies and Toddlers','Preschoolers'=>'Preschoolers','5-7 Years Old'=>'5-7 Years Old','8-12 Years Old'=>'8-12 Years Old','12-15 Years Old'=>'12-15 Years Old','16+ Years Old'=>'16+ Years Old','Family'=>'Family') ?>
<?php echo $form->input('search_agegroup', array('options' => $agegroup_options, 'empty' => '-- Select Age Group --','label' => false,'id' => 'd','div'=>'aaa')); ?><div style="width:5px; height:5px; float:right;"></div>
<?php echo $form->input('search_suburb', array('options' => $suburb, 'empty' => '-- Select Location --','label' => false,'id' => 'd','div'=>'aaa')); ?><div style="width:5px; height:5px; float:right;"></div><?php echo $form->input('search_category', array('options' => $categories,'type'=>'select','empty' => '-- Select Category --','label' => false,'id' => 'd','div'=>'aaa')); ?>
<br clear="all" />
<br />
    <p class="orange"><?php $session->flash(); ?></p>
       
    <table id="newspaper-a" summary="Product">
    <thead>
    	<tr>
            <th width="50%" scope="col"><?php echo $paginator->sort('Name', 'name', array('title' => 'Sorting Title Alphabetically','class' => 'normalTip')); ?></th>
            <th width="10%" scope="col"><?php echo $paginator->sort('Created', 'created', array('title' => 'Sorting Creation Date Chronologically','class' => 'normalTip')); ?></th>
            <th width="5%" scope="col"><?php echo $paginator->sort('Status', 'status', array('title' => 'Sorting Status','class' => 'normalTip')); ?></th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
    <?php foreach ($products as $product): ?>
    <tr>
    <td>
    <p><?php echo $html->link($product['Product']['name'],
    array('controller' => 'products', 'action' => 'view', $product['Product']['id'])); ?></p>
    </td>
    <td><p><?php echo date('d.m.Y', strtotime($product['Product']['created'])); ?></p></td>
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
	
	echo $html->image("edit.png", array(
"title" => "Edit Product",
'url' => array('action'=>'edit', 'id'=>$product['Product']['id'])));
	
 ?>&nbsp;
    <?php
echo $html->link(  $html->image("delete.png")
, array('action' =>'delete', $product['Product']['id'])
, array('title' => 'Delete Product')
, sprintf('Are you sure you want to delete this product: %s?', $product['Product']['name'])
, false);
	
	//echo $html->link('Delete', array('action'=>'delete', $product['Product']['id']), null, sprintf('Are you sure you want to delete Product: %s?', $product['Product']['name'])); ?>
     </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
	<br />

    <div class="center">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	<br />
    <div class="sumybutton">
	    <?php echo $html->link('Add Product',array('action'=>'add'))?>
    </div>
	<br />
   	</div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>