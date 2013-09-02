<?php echo $javascript->link('user'); ?>
<div class="alpha-content">
<p>HOME &gt; CREATE YOUR ACCOUNT</p>
   <h1>Create Your Account</h1>
   <br />
      <p>Please kindly complete the registration form.</p>
	<br />
    
   <!-- <h3>Your Personal Information</h3>
        <br /> -->
       
     <p>    <?php $session->flash(); ?> </p>
        
<?php
echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'registration'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>

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
    'maxYear' => date('Y') - 0, 'validate' => 'required:true','dateFormat' => 'DMY', 'div'=>'formfield2')); ?>
</td>
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
<td valign="top" style="text-align:right;"><p>Password*</p></td>
<td>
<?php echo $form->input('customers_password',array('value'=>'','id' => 'password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Confirm Password*</p></td>
<td>
<?php echo $form->input('customers_password_confirmation',array('value'=>'','id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6,equalTo: "#password"')); ?>
</td>
</tr>
<?php if ($admin) { ?>
<tr>
<td valign="top" style="text-align:right;"><p>Roles*</p></td>
<td>
<?php echo $form->input('customers_roles',array('label' => false,'div'=>'formfield')); ?>
</td>
</tr>
<?php } ?>
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
<td></td>
<td>
    <div style="float:left;">
<?php echo $form->end('Sign Up',array('class' => 'btn')); ?></div>
</td>
</tr>
</tr>
</table>
<br />
   </div>
   
       <div class="beta-content">
 <?php echo
    $this->element('advertisement');
    ?>
    </div>