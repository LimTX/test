<div class="alpha-content">
<p>HOME &gt; ADMINISTRATION PANEL > CATEGORIES</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to create new Categories, edit or delete existing ones.</p>
	<br />
    <p class="orange"><?php $session->flash(); ?></p>
       
    <table id="newspaper-a" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col"><?php echo $paginator->sort('ID', 'id'); ?></th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
            <th scope="col">Created</th>
        </tr>
    </thead>
    <tbody>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php foreach ($posts as $post): ?>
    <tr>
    <td><p><?php echo $post['Post']['id']; ?></p></td>
    <td>
    <p><?php echo $html->link($post['Post']['title'],
    array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></p>
    </td>
    <td>
	<?php echo $html->link('Delete', array('action' => 'delete', $post['Post']['id']), null, 'Are you sure?' )?> &#124; 
    <?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$post['Post']['id']));?>
    </td>
    <td><p><?php echo $post['Post']['created']; ?></p></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br />

    <div class="center">
    
    <p>
	<?php echo $paginator->numbers(); ?>
    </p> 
    
    <br />
    
    <p>
    <small>Showing Page <?php echo $paginator->counter(); ?></small>
    <p>
    
    </div> 


<br />

<div class="sumybutton">
<?php echo $html->link('Add Post',array('controller' => 'posts', 'action' => 'add'))?>
</div>

<br />
   </div>
   
    <?php echo
    $this->element('admin-sidenav');
    ?>