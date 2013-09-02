<?php echo $javascript->link('user'); ?>
<div class="alpha-content">
<p>HOME &gt; MY ACCOUNT &gt; PERSONAL INFORMATION</p>
   <h1>Personal Information</h1>
   <br />
        <p>This section shows your Personal Information.</p>
            <p class="orange"><?php $session->flash(); ?></p>
   <h3><?php echo $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname']?></h3>
        <p><small>Created: <?php echo date('d/m/Y', strtotime($customer['Customer']['created'])); ?>&#124; Modified: <?php echo date('d/m/Y', strtotime($customer['Customer']['modified'])); ?></small>
    </p>
    <br />
    <?php if(!empty($customer['Customer']['customers_gender'])) { ?>
    <p><strong>Gender</strong></p>
    <p><?php if($customer['Customer']['customers_gender'] == 'M') 
	{ echo "Male"; } else { echo "Female"; }
	?></p>
    <br />
    <?php } ?>
    <?php if(!empty($customer['Customer']['customers_dob'])) { ?>
    <p><strong>Date of Birth</strong></p>
    <p><?php echo date('d/m/Y', strtotime($customer['Customer']['customers_dob'])); ?></p>
    <br />
    <?php }?>
    <?php if(!empty($customer['Customer']['customers_email_address'])) { ?>
    <p><strong>Email</strong></p>
    <p><?php echo $customer['Customer']['customers_email_address']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($customer['Customer']['customers_address'])) { ?>
    <p><strong>Address</strong></p>
    <p><?php echo $customer['Customer']['customers_address']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($customer['Customer']['customers_telephone'])) { ?>
    <p><strong>Telephone</strong></p>
    <p><?php echo $customer['Customer']['customers_telephone']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($customer['Customer']['customers_fax'])) { ?>
    <p><strong>Fax</strong></p>
    <p><?php echo $customer['Customer']['customers_fax']?></p>
    <br />
    <?php } ?>
    <?php if(!empty($customer['Customer']['customers_newsletter'])) { ?>
    <p><strong>Newsletter subscription</strong></p>
    <p><?php echo $customer['Customer']['customers_newsletter']?></p>
   	<br />
 
    <?php } ?>
    <br />
 <?php echo $form->button('Update', array('style' => 'width:40px','class'=>'box2' , 'onClick'=>"window.location.href='".$this->base."/customers/account_edit/".$customer['Customer']['id']."'" ) ) ;?>

<br />
   </div>
   
       <?php echo $this->element('admin_user_sidenav'); ?>