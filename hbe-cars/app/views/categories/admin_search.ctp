<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL &gt; CATEGORIES</p>
   <h1>Categories</h1>
   <br />
   <div id="sub-category-bar">
   <p>
   <?php echo $html->link(__('Categories', true), array('controller' => 'categories', 'action' => 'index'), array('class' => 'selectedcat')); ?>&nbsp; &#124; &nbsp;<?php echo $html->link(__('Sub-Categories', true), array('controller' => 'categories', 'action' => 'subcategories')); ?>
   </p>
   </div>
   <br />
      <p>This section allows you to create new Categories, edit or delete existing ones.</p>
	<br />
    <p class="orange"><?php $session->flash(); ?></p>      
    <table id="newspaper-a" summary="Category">
    <thead>
    	<tr>
            <th width="50%" scope="col"><?php echo $paginator->sort('Name', 'name', array('title' => 'Sorting Title Alphabetically','class' => 'normalTip')); ?></th>
            <th scope="col"><?php echo $paginator->sort('Created', 'created', array('title' => 'Sorting Creation Date Chronologically','class' => 'normalTip')); ?></th>
           <!-- <th scope="col">Action</th> -->
        </tr>
    </thead>
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
    <?php foreach ($categories as $category) { ?>
    <tr>
    <td>
    <p><?php echo $html->link($category['Category']['name'],
    array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])); ?></p>
    </td>
        <td><p><?php echo date('d.m.Y', strtotime($category['Category']['created'])); ?></p></td>
    </tr>
    <?php }; ?>
    </tbody>
	</table>
	<br />

    <div class="center" style="width:100%;">
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	<br />
    <div class="sumybutton">
    <?php echo $html->link('Add Category',array('action'=>'add'))?>
    </div>
	<br />
   	</div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>