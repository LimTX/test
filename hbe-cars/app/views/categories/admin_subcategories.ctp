<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL &gt; CATEGORIES &gt SUB-CATEGORIES</p>
   <h1>Sub-Categories</h1>
   <br />
   <div id="sub-category-bar">
   <p>&nbsp;
   <?php echo $html->link(__('Categories', true), array('controller' => 'categories', 'action' => 'index')); ?>&nbsp;  &nbsp;<?php echo $html->link(__('Sub-Categories', true), array('controller' => 'categories', 'action' => 'subcategories'), array('class' => 'selectedcat','id' => 'selectedcat')); ?>
  </p>
  	</div>
   <br />
      <p>This section allows you to create new Sub-Categories, edit or delete existing ones.</p>
	<br />
    <p class="orange"><?php $session->flash(); ?></p>
       
    <table id="newspaper-a" summary="Category">
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
    <?php foreach ($categories as $category): ?>
    <tr>
    <td>
    <p><p><?php echo $html->link($category['Category']['name'],
    array('controller' => 'categories', 'action' => 'subcategories_view', $category['Category']['id'])); ?></p>
    </td>
        <td><p><?php echo date('d/m/Y', strtotime($category['Category']['created'])); ?></p></td>
        <td width="5%" align="center"><p>
        
    <?php if($category['Category']['status'] == "Published") { ?>
   
    <?php echo $html->image("tick.png", array());
	
	} else {
	
	echo $html->image("archived.png", array());
	
	}
	
	?>        
    </p></td>
    <td>
	<?php 
	echo $html->image("edit.png", array(
"title" => "Edit Category",'class'=>'borderzero',
'url' => array('action'=>'subcategories_edit', 'id'=>$category['Category']['id'])));
	
 ?>&nbsp;
    <?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete Category",'class'=>'borderzero'))
, array('action' =>'admin_subcategories_delete', $category['Category']['id'])
, array('title' => 'Delete Category','class'=>'borderzero')
, sprintf('Are you sure you want to delete this category: %s?', $category['Category']['name'])
, false);

//echo $html->link('Edit', array('action'=>'edit', 'id'=>$category['Category']['id'])); ?>
    </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
	<br />

    <div class="center" style="width:100%;">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	<br />
    <div class="sumybutton2">
    <?php echo $html->link('Add Sub-Category',array('action'=>'subcategories_add'))?>
    </div>
	<br />
   	</div>

    <?php echo
    $this->element('admin_sidenav');
    ?>