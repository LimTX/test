<div class="main-wrapper">

<div class="wrapper">
    <div class="loginpanel">
    
    <?php echo $html->link('CARS & STARS Online', '/customers/login', array('style'=>'font-size:32px;color:white;text-decoration:none;')); ?>

    <br />
    <br />
        <div>
        
   <div style="text-align:center;"><?php $session->flash('auth'); $session->flash(); ?></div>

        
        <?php
        echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'login'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
        ?>
        
        <table border="0" width="200px;" cellpadding="10" cellspacing="10" style="margin:0 auto;">
       <!-- <tr>
        <td style="text-align:left;">
		<p style="font-size:12px; color:green;">
        Notice: CARS & STARS Portal will be unavailable for purposes of maintenance on Melbourne (AEST):
    on Tuesday 30th Apr 2012 from 13:00 hours to 16:00 hours.
        </p>
        <td>
        </tr>-->
        <tr>
        <td style="padding-bottom:5px; text-align:left;">
       	<p>Sign in using your registered account:</p>
        </td>
        </tr>
        <tr>
        <td style="padding-bottom:20px; text-align:left;">
        <div class="input-prepend">
        <span style="height:25px;" class="add-on">
        <i style="margin-top:4px;" class="icon-user"></i></span>   
        <?php echo $form->input('customers_email_address',array('class' => 'inputIcon input-large', 'label' => false,'style' => 'height:25px;','validate' => 'required:true,email:true', 'placeholder' => 'Email', 'div' => '')) ?>
		<td>
        </tr>
        <tr>
        <td style="text-align:left;">
		<div class="input-prepend">
        <span style="height:25px;" class="add-on">
        <i style="margin-top:4px;" class="icon-lock"></i>
        </span>
        <?php echo $form->input('customers_password',array('style'=>'height:25px','type' => 'password','label' => false,'div'=>'','placeholder'=>'Password','validate'=>'required:true,minlength:6', 'class'=>'inputIcon input-large')); ?>    
        <td>
        </tr>
        <tr>
        <td style="padding-bottom:5px; text-align:left;">
       	 <span class="forgotpassword"><?php echo $html->link("Forgotten Password?",array("controller"=>"customers","action"=>"forgetpwd")); ?></span>
        </td>
        </tr>
        <tr>
        <td style="text-align:right;">
		<?php echo $form->button('Sign In', array('style'=>'width:90px;','type'=>'submit','class'=>'btn btn-primary')); ?>
        <?php echo $form->end(); ?>
        <td>
        </tr>
        </table>
       
        </div>
    
    </div>
    
</div>

 <div class="copyright">
    <br />
    	Copyright &copy; 2013 Hawker Brownlow Education. All Rights Reserved.
    <br />
</div>

</div>