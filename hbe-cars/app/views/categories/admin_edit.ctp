<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL &gt; CATEGORIES &gt; EDIT CATEGORY</p>
   <h1>Categories</h1>
   <br />
      <p>This section allows you to edit Category.</p>
    <h3>Edit Category</h3>
    <br />
    <p class="orange"><?php $session->flash(); ?></p>
<?php echo $form->create('Category', array('action' => 'edit','class'=>'cmxform','id'=>'form2','type' => 'file')); ?>
<table width="100%" cellspacing="10" border="0">
<tr>
<td width="10%" valign="top" style="text-align:right;"></td>
<td>
<p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked * are required.</small></p>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Name*</p></td>
<td>
<?php echo $form->input('name',array('label' => false,'validate' => 'required:true,rangelength:[5,140]','div'=>'formfield')); ?>
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
<?php echo $form->input('description', array('rows' => '5','validate' => 'required:true,rangelength:[5,1400]','label' => false,'div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Status*</p></td>
<td>
<?php 
$options = array('Published' => ' Published', 'Archived' => ' Archived');
echo $form->input('status', array('label' => false,'validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?>			<label for="data[Category][status]" class="error">Please select your status</label>
</td>
</tr>
<tr>
<td></td>
<td>
<?php echo $form->input('id', array('type'=>'hidden')); ?>
 <div class="sumybutton" style="float:left; width:100px;">
<a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
</div><div style="width:40px; height:100px; float:left;"></div>
    <div style="float:left;"><?php echo $form->end('Save'); ?></div>
</td>
</tr>
</tr>
</table>

    
   </div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>