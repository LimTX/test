<div class="main-wrapper">

<div class="wrapper">
    <div class="loginpanel">
    
    <?php echo $html->link('CARS & STARS Online', '/customers/login', array('style'=>'font-size:32px;color:white;text-decoration:none;')); ?>
    <br />
        <div>
         <br />
                <span><?php $session->flash('auth'); $session->flash(); ?></span>
       <?php
		echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'forgetpwd'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
		?>
        <div style=" margin-top:-25px;">
        <table border="0" width="250px" cellpadding="10" cellspacing="10" style="margin: auto;">
        <tr>
        <td style="padding-bottom:5px; text-align:left;">
       	<h3>Forgot your password?</h3>
        <p>Enter your email account below.</p>
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