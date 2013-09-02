<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})
</script>

<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to edit <?php 
if ($this->params['pass'][0] == $users_userID) 
{ echo "your account details"; }
else if ($filterstudent == "student") {
echo "a Student record.";
}
else { 
echo "a Teacher record.";
} ?></h4>

<article class="module width_full">

<header><h6>Change Password Form</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'change_password'),'class'=>'cmxform','id'=>'form2','type' => 'file'));?>

	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:43%;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td width="28%" valign="top" style="text-align:right;">
    </td>
    <td>
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
    <?php if(!empty($customer['Customer']['customers_password'])) { ?>
     <tr>
    <td  valign="top" style="text-align:right;"><p>Class <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('classroom_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $classes,'validate'=>'required:true','div'=>'formfield'));
	?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>First Name <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('customers_firstname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Last Name <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('customers_lastname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield')); 
     ?>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>Gender <span class="red">*</span></p></td>
    <td>
    <?php 
    $options = array('M' => ' Male', 'F' => ' Female');
    echo $form->input('customers_gender', array('label' => false,'class'=>'','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
     ?><label for="data[Customer][customers_gender]" class="error">Please select your gender.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Date of Birth <span class="red">*</span></p></td>
    <td>
    <?php 
	
	$customer['Customer']['customers_dob'] = date("d-m-Y",strtotime($customer['Customer']['customers_dob']));
	
	echo $form->input('customers_dob',array('value' => $customer['Customer']['customers_dob'],'type'=>'text','label' => false, 'validate' => 'required:true','dateFormat' => 'DMY', 'div'=>'formfield2', 'id' => 'datepicker')); ?></td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Email <span class="red">*</span></p></td>
    <td>
    <?php echo $form->input('customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'required:true,email:true')); ?>
    </td>
    </tr>
    <?php } ?>
    <tr>
<td valign="top" style="text-align:right;"><p>Password <span class="red">*</span></p></td>
<td>
<?php echo $form->input('customers_password',array('value' => '','id' => 'password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Confirm Password <span class="red">*</span></p></td>
<td>
<?php echo $form->input('customers_password_confirmation',array('id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6,equalTo: "#password"')); ?>
</td>
</tr>
    <tr>
    <td valign="top" style="text-align:right;"><p> </p></td>
    <td>	  		 <button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>

  		 <button class="btn-primary" type="submit">Submit</button>
        <?php echo $form->end(); ?>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>
<div class="spacer"></div>