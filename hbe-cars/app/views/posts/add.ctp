<div class="alpha-content">
<p>HOME &gt; ADMINISTRATION PANEL > CATEGORIES > ADD CATEGORY</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to create new Categories, edit or delete existing ones.</p>
	<br />
    
    <h3>Add Post</h3>
        <br />
<?php
echo $form->create('Post', array('class'=>'form','type' => 'file'));
?>

<table width="100%" cellspacing="10" border="0">
<tr>
<td width="10%" valign="top" style="text-align:right;"><p>Title</p></td>
<td>
<?php echo $form->input('title',array('label' => false,'class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;">
<p>Image</p>
</td>
<td>
<?php echo $form->file('Image.name1', array('size' => '40')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Description</p></td>
<td>
<?php echo $form->input('body', array('rows' => '5','label' => false,'div'=>'formfield')); ?>
</td>
<tr>
<td></td>
<td>
<?php echo $form->end('Save Post'); ?>
</td>
</tr>
</tr>
</table>
<br />


     
   </div>
   
    <?php echo
    $this->element('admin-sidenav');
    ?>