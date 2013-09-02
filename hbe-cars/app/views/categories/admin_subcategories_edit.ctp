<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL &gt; SUB-CATEGORIES &gt; EDIT SUB-CATEGORY</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to create new Sub-Category.</p>    
    <h3>Edit Sub-Category</h3>
        <br />
    <p class="orange"><?php $session->flash(); ?></p>
    
<?php
echo $form->create(null, array('url' => array('controller' => 'categories', 'action' => 'subcategories_edit'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>
<table width="100%" cellspacing="10" border="0">
<tr>
<td width="10%" valign="top" style="text-align:right;"></td>
<td>
<p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked * are required.</small></p>
</td>
</tr>
<tr>
<td width="10%" valign="top" style="text-align:right;"><p>Category*</p></td>
<td>
   <p>
<?php 
echo $form->input('parent_id', array('type' => 'select','empty' => '-- Select --','label' => false, 'options' => $categories,'validate'=>'required:true','div'=>''));
?><label for="CategoryParentId" class="error">Please select your category.</label>             
   </p>
</td>
</tr>
<tr>
<td width="10%" valign="top" style="text-align:right;"><p>Name*</p></td>
<td>
   <p>
<?php echo $form->input('name',array('label' => false,'id' =>'name','validate' => 'required:true,rangelength:[5,140]','div'=>'formfield')); ?>
   </p>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;">
<p>Image</p>
</td>
<td>
<?php echo $form->file('Image.name1', array('size' => '40','validate' => 'accept:"jpg|jpeg|png|gif"')); ?><br />
    <?php if(!empty($category['Category']['image'])) { ?>
                <?php echo $html->link('Delete Image', array('action'=>'admin_delete_image', $category['Category']['id']), null, sprintf('Are you sure you want to delete image?')); ?>
                <?php } ?><label for="ImageName1" class="error">Please select an image (png, jpg, jpeg, gif)</label>
</td>
<td valign="top" width="30%" style="text-align:left;">
    <?php if(!empty($category['Category']['image'])) { ?>
    <?php echo $html->image('sets/small/'.$category['Category']['image'], array('width'=>'40px'))?>
    <?php } ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Description*</p></td>
<td>
<?php echo $form->input('description', array('rows' => '10','validate' => 'required:true,rangelength:[5,1400]','label' => false,'div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Status*</p></td>
<td>
<?php 
$options = array('Published' => ' Published', 'Archived' => ' Archived');
echo $form->input('status', array('label' => false,'validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Category][status]" class="error">Please select your status.</label>
</td>
</tr>
<tr>
<td></td>
<td> <div class="sumybutton" style="float:left; width:100px;">
<a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
</div><div style="width:40px; height:100px; float:left;"></div>
    <div style="float:left;">
<?php echo $form->end('Save',array('class' => 'btn')); ?></div>
</td>
</tr>
</tr>
</table>
<br />


     
   </div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>