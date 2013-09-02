<?php echo $javascript->link('content'); ?>
<div class="alpha-content">
<p>HOME &gt; ADMIN PANEL > PRODUCTS > ADD PRODUCT</p>
   <h1>Products</h1>
   <br />
      <p>This section allows you to create new Product.</p>
	<br />
    
    <h3>Add Product</h3>
        <br />
<?php
echo $form->create('Product', array('class'=>'cmxform','id'=>'form2','type' => 'file'));
?>
<table width="100%" cellspacing="10" border="0">
<tr>
<td colspan="2">
<p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked * are required.</small></p>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;">
<div style="border-bottom: 1px dashed #69c; padding-bottom:8px; width:520px;">
<h2>Details</h2>
</div>
</td>
</tr>
<tr>
<td valign="top">
<p>Supplier*</p>         
</td>
<td  valign="top" style="text-align:left;"><p>Age Group*</p></td>
</tr>
<tr>
<td valign="top">
<?php 
  echo $form->input('supplier_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:17em;', 'options' => $suppliers,'validate'=>'required:true','div'=>'formfield'));
?><label for="ProductSupplierId" class="error">Please select your supplier.</label><?php echo $html->link(__('Create New Supplier', true), array('controller' => 'suppliers', 'action' => 'add'), array('style' =>'font-size:12px')); ?>             
</td>
<td  valign="top" style="text-align:left;">
<?php $agegroup_options=array('Babies and Toddlers'=>'Babies and Toddlers','Preschoolers'=>'Preschoolers','5-7 Years Old'=>'5-7 Years Old','8-12 Years Old'=>'8-12 Years Old','12-15 Years Old'=>'12-15 Years Old','16+ Years Old'=>'16+ Years Old','Family'=>'Family') ?>
<?php echo $form->input('age_group', array('options' => $agegroup_options,'style'=>'width:16em;', 'empty' => '-- Select --','label' => false,'validate'=>'required:true','div'=>'formfield','style'=>'width:17em;')); ?>
<label for="ProductAgeGroup" class="error">Please select your age group.</label>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Name*</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('name',array('label' => false,'validate' => 'required:true,rangelength:[5,140]','style'=>'width:36em;','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Description*</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('description', array('rows' => '10','label' => false,'style'=>'width:36em;','validate' => 'required:true,rangelength:[5,1400]','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:left;"><p>Category*</p></td>
<td  valign="top" style="text-align:left;"><p>Sub Category*</p></td>
</tr>
<tr style="height:40px;">
<td valign="top">
<?php 
echo $form->input('category_id', array('multiple' => 'checkbox', 'label' => false,'validate'=>'required:true','options'=>$categories)); 
 // echo $form->input('category_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:17em;', 'options' => $categories,'validate'=>'required:true','div'=>'formfield'));
?><label for="ProductCategoryId" class="error">Please select your category.</label>
<?php echo $html->link(__('Create New Category', true), array('controller' => 'categories', 'action' => 'add'), array('style' =>'font-size:12px')); ?>             
</td>
<td valign="top">
<?php echo $form->input('category_parent_id', array('multiple' => 'checkbox', 'label' => false,'validate'=>'required:true', 'options'=>$subcategories));
 ?>
 <?php echo $html->link(__('Create New Sub Category', true), array('controller' => 'categories', 'action' => 'admin_subcategories_add'), array('style' =>'font-size:12px')); ?> 
</td>
</tr>
<tr class="trsubcatsection" style="display:none;">
<td  valign="top" colspan="2" style="text-align:left;"><p>Sub Category*</p></td>
</tr>
</tr>
<tr class="trsubcatsection" style="display:none;">
<td colspan="2" >
<div class="subcategorysection" style="display: none;">
  <?php //echo $form->input('', array('type' => 'select','style'=>'width:17em;','label' => false,'class' => 'formerror','div'=>'formfield')); ?>
  
</div>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:left;"><p>Quantity*</p></td>
<td  valign="top" style="text-align:left;"><p>Price*</p></td>
</tr>
<tr style="height:40px;">
<td valign="top">
<p>
<?php echo $form->input('qty',array('label' => false,'style'=>'width:16em;','div'=>'formfield','validate' => 'required:true,number:true,rangelength:[1,8]')); ?>
</p>
</td>
<td valign="top">
<p><?php echo $form->input('price',array('label' => false,'style'=>'width:16em;','validate' => 'required:true,number:true,rangelength:[1,8]','div'=>'formfield')); ?>
</p>
</td>
</tr>
<tr>
<td valign="top" style="text-align:left;"><p>Location*</p></td>
<td valign="top"valign="top" style="text-align:left;"><p>Suburb*</p></td>
</tr>
<tr style="height:40px;">
<td width="50%" valign="top">
<?php echo $form->input('location',array('label' => false,'style'=>'width:16em;','validate' => 'required:true,rangelength:[2,200]','div'=>'formfield')); ?>
</td>
<td width="50%" valign="top">
<?php echo $form->input('suburb',array('label' => false,'style'=>'width:16em;','validate' => 'required:true,rangelength:[2,100]','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>How To Get There</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('how_to_get_there',array('label' => false,'style'=>'width:36em;','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:left;"><p>Event Start Date</p></td>
<td  valign="top" style="text-align:left;"><p>Event End Date</p></td>
</tr>
<tr>
<td>
<?php echo $form->input('event_start_date',array('label' => false,'dateFormat' => 'DMY'
 ,'class' => 'formerror','div'=>'formfield2')); ?>
</td>
<td>
<?php echo $form->input('event_end_date',array('label' => false,'dateFormat' => 'DMY'
,'class' => 'formerror','div'=>'formfield2')); ?>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Available Date</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('available_date',array('label' => false,'style'=>'width:36em;','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Weather</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('weather',array('label' => false,'style'=>'width:36em;','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Spectators</p></td>
<tr>
<td colspan="2">
<?php echo $form->input('spectators',array('label' => false,'style'=>'width:36em;','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td colspan="2" valign="top" style="text-align:left;"><p>Opening Hours</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('open_hours',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td  colspan="2" valign="top" style="text-align:left;"><p>Guidelines</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('guidelines',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td  colspan="2" valign="top" style="text-align:left;"><p>Facilities</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('facilities',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;"><p>Other Activities</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('other_activities',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
</tr>
<tr>
<td  colspan="2" valign="top" style="text-align:left;"><p>Disabled Access</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('disabled_access',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;"><p>Cancellation Policy</p></td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->input('supplier_policy',array('label' => false,'style'=>'width:36em;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;">
<div style="border-bottom: 1px dashed #69c; padding-bottom:8px; width:520px;">
<h2>Upload Image</h2>
</div>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;">
<p>Image</p>
</td>
</tr>
<tr>
<td colspan="2">
<?php echo $form->file('Image.name1', array('size' => '40','validate' => 'accept:"jpg|jpeg|png|gif"')); ?>
<label for="ImageName1" class="error">Please select an image (png, jpg, jpeg, gif)</label>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;">
<div style="border-bottom: 1px dashed #69c; padding-bottom:8px; width:520px;">
<h2>Publish Product</h2>
</div>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;"><p>Status*</p></td>
</tr>
<tr>
<td>
<?php 
$options = array('Published' => ' Published', 'Archived' => ' Archived');
echo $form->input('status', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Product][status]" class="error">Please select your status.</label>
</td>
</tr>
<tr>
<td valign="top" colspan="2" style="text-align:left;"><p>Featured</p></td>
</tr>
<tr>
<td colspan="2">
<p> <?php echo $form->checkbox('featured', array('value' => '1','class' => 'statuss')); ?> Yes</p>
 </td>
</tr>
<tr>
<td colspan="2"><br /><div class="sumybutton" style="float:left; width:100px;">
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