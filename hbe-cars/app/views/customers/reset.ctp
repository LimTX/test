<div class="main-wrapper">

<div class="wrapper">
    <div class="loginpanel">
    
    <?php echo $html->link('CARS & STARS Online', '/customers/login', array('style'=>'font-size:32px;color:white;text-decoration:none;')); ?>
    <br />
        <div>
         <br />
                <span><?php $session->flash('auth'); $session->flash(); ?></span>
      
      <form method="post" class="cmxform" id="form2">

      
        <div style=" margin-top:-25px;">
        <table border="0" width="250px" cellpadding="10" cellspacing="10" style="margin: auto;">
        <tr>
        <td style="padding-bottom:5px; text-align:left;">
       	<h3>Reset Password</h3>
        <p style="font-size:13px;">Enter a new password, and then type it in again to confirm it.</p>
        </td>
        </tr>
        <tr>
        <td style="padding-bottom:20px; text-align:left;">
         <div class="input-prepend">
        <span style="height:25px;" class="add-on">
        <i style="margin-top:4px;" class="icon-user"></i></span>   
        <?php echo $form->input('customers_password',array('class' => 'inputIcon input-large', 'label' => false,'name'=>'data[Customer][customers_password]','style' => 'height:25px;','validate' => 'required:true,minlength:6', 'id' => 'password', 'placeholder' => 'Create a Password', 'div' => '','type' => 'password')) ?>
        </div>
		<td>
        </tr>
        <tr>
        <td style="padding-bottom:20px; text-align:left;">
           <div class="input-prepend">
        <span style="height:25px;" class="add-on">
        <i style="margin-top:4px;" class="icon-user"></i></span>  
    <?php echo $form->input('customers_password_confirmation',array('name'=>'data[Customer][password_confirm]','id' => 'confirm_password','type' => 'password','label' => false, 'placeholder' => 'Re-enter Password ', 'class' => 'inputIcon input-large', 'div' => '', 'validate'=>'required:true,minlength:6,equalTo: "#password"','style' => 'height:25px;')); ?>
   	    </div>
		<td>
        </tr>
        <tr>
        <td style="text-align:right;">
		<?php echo $form->button('Submit', array('style'=>'width:90px;','type'=>'submit','class'=>'btn btn-primary')); ?>
        <?php echo $form->end(); ?>
        <td>
        </tr>
        </table>
       </div>
        </div>
    
    </div>
    
</div>

 <div class="copyright">
    <br />
    	Copyright &copy; 2013 Hawker Brownlow Education. All Rights Reserved.
    <br />
</div>

</div>