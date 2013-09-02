<?php echo $javascript->link('user'); ?>
<div class="alpha-content">
<p>HOME &gt; MY ACCOUNT &gt; PERSONAL INFORMATION</p>
    <h1>Personal Information</h1>
        <br />
        <p>This section allows you to update Personal Information.</p>
            <p class="orange"><?php $session->flash(); ?></p>
<?php
echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'account_edit'),'class'=>'cmxform','id'=>'form2','type' => 'file'));?>

<table width="100%" cellspacing="10" border="0">
<tr>
<td width="23%" valign="top" style="text-align:right;"></td>
<td>
<p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked * are required.</small></p>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>First Name*</p></td>
<td>
<?php 
echo $form->input('customers_firstname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield')); 
?>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>Last Name*</p></td>
<td>
<?php 
echo $form->input('customers_lastname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield')); 
 ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Gender*</p></td>
<td>
<?php 
$options = array('M' => ' Male', 'F' => ' Female');
echo $form->input('customers_gender', array('label' => false,'class'=>'','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Customer][customers_gender]" class="error">Please select your gender.</label>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>Date of Birth*</p></td>
<td>
<?php echo $form->input('customers_dob',array('label' => false, 'minYear' => date('Y') - 70,
    'maxYear' => date('Y') - 0, 'validate' => 'required:true','dateFormat' => 'DMY', 'div'=>'formfield2')); ?></td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>Email*</p></td>
<td>
<?php echo $form->input('customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'required:true,email:true')); ?>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>Address*</p></td>
<td>
<?php echo $form->input('customers_address',array('label' => false,'div'=>'formfield','validate' => 'required:true')); ?>
</td>
</tr>
<tr>
<td  valign="top" style="text-align:right;"><p>Telephone*</p></td>
<td>
<?php echo $form->input('customers_telephone',array('label' => false,'div'=>'formfield','validate'=>'required:true,number:true,minlength:10')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Fax</p></td>
<td>
<?php echo $form->input('customers_fax',array('label' => false,'div'=>'formfield','validate'=>'number:true,minlength:10')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Newsletter*</p></td>
<td>
<?php 
$options = array('Yes' => ' Yes', 'No' => ' No');
echo $form->input('customers_newsletter', array('label' => false,'class'=>'','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Customer][customers_newsletter]" class="error">Please select your newsletter subscription.</label>
 </td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Password</p></td>
<td>
 <?php echo $html->link(__('Change Password', true), array('admin'=>false,'controller' => 'customers', 'action' => 'change_password', $custIDedit)); ?>
 </td>
</tr>
<?php if($admin) { ?>
<tr>
<td valign="top" style="text-align:right;"><p>Roles*</p></td>
<td>
<?php 
$options = array('admin' => ' Admin', 'user' => ' User');
echo $form->input('customers_roles', array('label' => false,'class'=>'','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Customer][customers_newsletter]" class="error">Please select the role.</label></td>
</tr>
<?php } ?>
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
   
       <?php echo $this->element('admin_user_sidenav'); ?>