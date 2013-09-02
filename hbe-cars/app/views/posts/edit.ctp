<div class="alpha-content">
<p>HOME &gt; ADMINISTRATION PANEL > CATEGORIES</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to create new Categories, edit or delete existing ones.</p>
	<br />
    
    <h3>Edit Post</h3>
<?php
echo $form->create('Post', array('action' => 'edit','class'=>'form','type' => 'file'));
echo $form->input('title');
echo $form->file('Image.name1', array('size' => '40'));
echo $form->input('body', array('rows' => '3'));
echo $form->input('id', array('type'=>'hidden'));
echo $form->end('Save Post');
?>
    
   </div>
   
    <?php echo
    $this->element('admin-sidenav');
    ?>