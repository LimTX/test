<script type="text/javascript">
$(window).resize(function(){
    
	<?php 
	
	$response = "invalid";
		
	if($response == $invalid) {
	
    ?>
	
	$('.main-wrapper').css({
		position:'absolute',
		left: ($(window).width() - $('.main-wrapper').outerWidth())/2,
		top: ($(window).height() - $('.main-wrapper').outerHeight())/2
	});
	
	<?php } else { ?>
	
	$('.main-wrapper').css({
		position:'absolute',
		left: ($(window).width() - $('.main-wrapper').outerWidth())/2,
		top: 50
	});
	
	<?php } ?>

});
</script>
<style>
.main-wrapper {
    overflow: auto;
    padding: 10px;
    width: 750px;
}

.wrapper {
	border:1px solid #f0f0f0;
	border-radius: 5px 5px 5px 5px;
	-moz-border-radius: 5px;
 	-webkit-border-radius: 5px;
    font-family: Helvetica,Arial,sans-serif;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    padding: 10px;
    width: 720px;
}

.loginpanel {
	border-radius: 5px 5px 5px 5px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    color: #fff;
	font-family: 'Maven Pro',sans-serif;
	font-size:32px;
	text-align:center;
	padding-top:22px;
	padding-bottom:20px;
	text-decoration: none;
    position: relative;
    width: 720px;
	background-color: white;
}

input[type=radio] {
float:left;
margin:0px;
width:20px;
}

form#form2 input[type=radio].locRad {
margin:3px 0px 5px 53px; 
float:none;
}

.radio, .checkbox {
    padding-left: 0;
}

form.cmxform label.error {
	width: 304px;
	margin-top:-10px;
}
</style>

<div class="main-wrapper">
<div class="wrapper">
    <div class="loginpanel">
    
    <?php echo $html->link('CARS & STARS Online', '/customers/register', array('style'=>'font-size:32px;color:white;text-decoration:none;')); ?>
    <br />
    <br />
     <div style="text-align:center; padding-bottom:10px;"><?php $session->flash('auth'); $session->flash(); ?></div>
     
        <?php 
				
		if($response == $invalid) { ?>
     
        <div style="padding-left:40px; padding-left:40px; line-height:1.2em; text-align:left;">
        
        <p><span style="font-size:24px; text-align:left; color:#ea6623; text-transform:uppercase;">Registration Form</span>
        <br/><span style="font-size:14px;">
        Enter the registration token below from the email that was sent to you and click the "Validate" button.
        </span>
        </p>
                
        <?php
        echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'register'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
        ?>
        <table style="color:#6D6E71; font-size:14px; margin:0 auto; text-align:left;" border="0" width="550">
        <tr>
        <td width="140" style="text-align:right; padding-right:15px;">Registration Token <span style="color:#F33;">*</span></td>
        <td style="padding-top:20px;"><?php 
		
		if (!empty($this->params['pass']['0'])) {
		
		$tokenkey = $this->params['pass']['0'];
			
		} else {
			
		$tokenkey = "";
			
		}
		
        echo $form->input('Account.tokenkey',array('value'=>$tokenkey,'label' => false,'validate' => 'required:true','div'=>'formfield','style'=>'width:280px;'));    ?></td>
        </tr>
        <tr>
        <td width="130" style="text-align:right; padding-right:15px;"></td>
        <td style="padding-top:10px;"> 
        <?php echo $form->button('Validate', array('style'=>'width:110px;','type'=>'submit','class'=>'btn btn-primary')); ?>
        </td>
        </tr>
        </table>
           <?php echo $form->end(); ?>
        </div>   
        
        <?php } else { ?>
        
        <div style="padding:40px; line-height:1.2em; text-align:left;">
   <p>
   <span style="font-size:24px; text-align:left; color:#ea6623; text-transform:uppercase;">Registration Form</span>
   <br/>
   <span style="font-size:14px;">Please provide all required details to register your school with us.</span>
   </p>
   <?php
        echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'register_process'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
        ?>
   <table style="color:#6D6E71; font-size:14px; margin:0 auto; text-align:left;" border="0" width="550">
   <tr>
   <td colspan="2" style="font-size:18px; color:#666666; font-weight:bold; border-bottom:1px solid #666;">School Details</td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Name <span style="color:#F33;">*</span></td>
   <td style="padding-top:20px;"><?php 
    echo $form->input('School.name',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield','style'=>'width:280px;'));    ?>
    <?php echo $form->hidden('School.id', array('value' => $school_id)); ?>
    </td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Address <span style="color:#F33;">*</span></td>
   <td style="padding-top:10px;"><?php 
    echo $form->input('School.address',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield','style'=>'width:280px;'));    ?></td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">No. of Classroom </td>
   <td style="padding-top:10px;"><?php
    echo $form->input('Account.accessright',array('value'=> $accessrightvalue,'label' => false,'div'=>'formfield','disabled'=>true,'style'=>'background-color:#eeefef;width:280px;'));    ?></td>
   </tr>
   <tr>
   <td colspan="2" style="font-size:18px; color:#666666; font-weight:bold; border-bottom:1px solid #666;">Administrator Details</td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">First Name <span style="color:#F33;">*</span></td>
   <td style="padding-top:20px;"><?php 
    echo $form->input('Customer.customers_firstname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield','style'=>'width:280px;'));    ?></td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Last Name <span style="color:#F33;">*</span></td>
   <td style="padding-top:10px;"><?php 
    echo $form->input('Customer.customers_lastname',array('label' => false,'validate' => 'required:true,rangelength:[2,140]','div'=>'formfield','style'=>'width:280px;'));    ?></td>
   </tr>
    <tr>
    <td width="130" style="text-align:right; padding-right:15px;"><p>Gender <span style="color:#F33;">*</span></p></td>
    <td style="text-align:left;">
    <?php 
    $options = array('M' => ' Male', 'F' => ' Female');
    echo $form->input('Customer.customers_gender', array('label' => false,'class'=>'locRad','validate'=>'required:true','options' => $options,'legend' => false,'type'=>'radio','style'=>'text-align:center;','separator' => '&nbsp;&nbsp;'));
     ?><label style="margin-top:0px;" for="data[Customer][customers_gender]" class="error">This field is required.</label>
     <div class="clear"></div>  
	</div> 
    </td>
    </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Email <span style="color:#F33;">*</span></td>
   <td style="padding-top:10px;"><?php echo $form->input('Customer.customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'email:true,required:true','style'=>'width:280px;')); ?></td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Password <span style="color:#F33;">*</span></td>
   <td style="padding-top:10px;">
   <?php echo $form->input('customers_password',array('value'=>'','id' => 'password','type' => 'password','label' => false,'div'=>'formfield','style'=>'width:280px;','validate'=>'required:true')); ?>
    </td>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;">Confirm Password <span style="color:#F33;">*</span></td>
   <td style="padding-top:10px;"><?php echo $form->input('customers_password_confirmation',array('id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'equalTo: "#password",required:true','style'=>'width:280px;')); ?>
   <?php echo $form->hidden('Customer.id', array('value' => $userID)); ?>
   </td>
   </tr>
   </tr>
   <tr>
   <td width="130" style="text-align:right; padding-right:15px;"></td>
   <td style="padding-top:10px;"> 
   <?php echo $form->button('Create my account', array('style'=>'width:150px;','type'=>'submit','class'=>'btn btn-primary')); ?>
   </td>
   </tr>
   </table>
   <?php echo $form->end(); ?>
    </div>   
        
        <? } ?>
    
    </div>
    
</div>

 <div class="copyright">
    <br />
    	Copyright &copy; 2013 Hawker Brownlow Education. All Rights Reserved.
    <br />
</div>

</div>