<div class="alpha-content">
<p>HOME &gt; ADMINISTRATION PANEL &gt; CATEGORIES</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to create new Categories, edit or delete existing ones.</p>
	<br />
    
    <h3><?php echo $post['Post']['title']?></h3>
    <?php echo $html->image('sets/big/'.$post['Post']['image'])?>
    <p><small>Created: <?php echo $post['Post']['created']?></small></p>
    <p><?php echo $post['Post']['body']?></p>
    
   </div>
   
    <?php echo
    $this->element('admin-sidenav');
    ?>