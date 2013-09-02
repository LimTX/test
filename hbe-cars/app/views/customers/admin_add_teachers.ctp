<script type="text/javascript">

	$(window).resize(function() {
		
	$('#main-right').css({height: '1250px'});
	$('#main-left').css({height: '1250px'});
	$('#main-left').css({background: 'url(\'/img/sidebar.png\') repeat scroll 0 0 #E0E0E3'});
	
});
</script>
<style>
@media only screen and (max-width: 1024px) { 

.studenttablelefty {
	padding-left:122px;
}

.teachertablelefty {
	padding-left:127px;
}

#section-right {
		height:1150px;
}

}
</style>
<!--[if lte IE 8]>
<style>

.teachertablelefty {
	padding-left:106px;
}

}
</style>
<![endif]-->
<?php echo $javascript->link('list_models', array('inline' => FALSE)); ?>
<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
   };
   window.setTimeout( show_popup, 10000 ); // 2 seconds
})
</script>

<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to create new a Teacher record.</h4>

<article class="module width_full">

<header><h6>Teacher Form</h6></header>
<div style="padding-left:30px;">
           <br/><br/>
                 <p>Each teacher must have a unique email address. Check Send E-Mail Notification to notify the user of his/her new account. An email address must be entered to receive notifications.</p>
			<br/><br/>
</div>           
<?php
echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'add_teachers'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	<div style="float:left; padding-left:30px;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td width="130px" valign="top" style="text-align:right;">
    </td>
    <td>
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
    <?php if ($admin == "superadmin") { ?>
    <tr>
    <td valign="top" style="text-align:right;"><p>Access Control <span class="red">*</span></p></td>
    <td>
    <?php 
	$roles_options = array('superadmin' => 'HBE Administrator', 'schooladmin' => 'School Administrator', 'teacher' => 'Teacher');
	echo $form->input('customers_roles', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $roles_options ,'validate'=>'required:true','div'=>'formfield'));
	?>
    </td>
    </tr>
    <?php } else {
	
		echo $form->hidden('customers_types', array('value' => 'teacher'));
		echo $form->hidden('customers_roles', array('value' => 'teacher'));
	
	}
	?>
    <?php if ($admin == "superadmin") { ?>
    <tr>
    <td  valign="top" style="text-align:right;"><p>School <span class="red"></span></p></td>
    <td>
    <?php 
	echo $form->input('school_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $schools,'div'=>'formfield'));
	?>
    </td>
    </tr>
    <?php } else { ?>
    <tr>
    <td  valign="top" style="text-align:right;"><p>School <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('school_id', array('type' => 'select','label' => false,'style'=>'width:254px;', 'options' => $schoolsfiltered,'validate'=>'required:true','div'=>'formfield','disabled' => true));
		echo $form->hidden('school_id', array('value' => $users_school));
	?>
    </td>
    </tr>
	<?php } ?>
    <?php if ($admin == "superadmin") { ?>
    <tr>
    <td valign="top" style="text-align:right; vertical-align:top;"><p>Class <span style="font-weight:bold;"><a style="color:green;" title="You can select more than one class by holding down the Ctrl (Windows) or Command (Apple) key." href="#">?</a></span><span class="red"></span></p></td>
    <td>
  <?php 
echo $form->input('classroom_id', array('type' => 'select', 'style'=> 'width:254px;padding:5px;height:187px;', 'multiple' => 'true', 'label' => false,'options'=>$classes)); 
?>
    </td>
    </tr>
    <?php } else { ?>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Class <span style="font-weight:bold;"><a style="color:green;" title="You can select more than one class by holding down the Ctrl (Windows) or Command (Apple) key." href="#">?</a></span><span class="red"> *</span></p></td>
    <td>
    <?php 
	echo $form->input('classroom_id', array('type' => 'select', 'style'=> 'width:254px;padding:5px;height:187px;', 'multiple' => 'true','label' => false, 'options' => $classesfiltered,'validate'=>'required:true','div'=>'formfield'));
	?>
    <br/>
    </td>
    </tr>
    <?php } ?>
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
     ?><label for="data[Customer][customers_gender]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Date of Birth </p></td>
    <td>
    <?php echo $form->input('customers_dob',array('placeholder' => 'DD-MM-YYYY','type'=>'text','label' => false,'dateFormat' => 'DMY', 'div'=>'formfield2', 'id' => 'datepicker')); ?></td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Email <span class="red">*</span></p></td>
    <td>
    <?php echo $form->input('customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'required:true,email:true')); ?>
    </td>
    </tr>
    <tr>
<td valign="top" style="text-align:right;"><p>Password <span class="red">*</span></p></td>
<td>
<?php echo $form->input('customers_password',array('value'=>'','id' => 'password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6')); ?>
</td>
</tr>
<tr>
<td valign="top" style="text-align:right;"><p>Confirm Password <span class="red">*</span></p></td>
<td>
<?php echo $form->input('customers_password_confirmation',array('value'=>'','id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6,equalTo: "#password"')); ?>
</td>
</tr>
    </table>
    </div>
     <div class="teachertablelefty" style="float:left; width:40%;">
    <table width="100%" cellspacing="10" border="0">
    <tr>
    <td width="90" valign="top" style="text-align:right;">
    </td>
    <td>
    <p>&nbsp;</p>
    </td>
    </tr>
     <tr>
    <td  valign="middle" style="text-align:right; vertical-align:middle;"><p>Photo</p></td>
    <td>
    <?php
	function get_user_browser()
	{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent))
    {
        $ub = "ie";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $ub = "firefox";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $ub = "safari";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $ub = "chrome";
    }
    elseif(preg_match('/Flock/i',$u_agent))
    {
        $ub = "flock";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $ub = "opera";
    }

    return $ub;
	}
	
	$browser = get_user_browser();
	if($browser == "ie"){
	?>
  <?php echo $form->file('Image.name1', array('size' => '23','validate' => 'accept:"jpg|jpeg|png|gif"')); ?>
<label for="ImageName1" class="error">Please select an image (png, jpg, jpeg, gif)</label>
    <?php } else { ?>
    <div id="ImageName10" style="height:30px; padding-top:15px; width:358px; border: 1px dashed #BBB; cursor:pointer;" onclick="getFile()">Click to Upload Photo!</div>
    <div style='height: 0px;width:0px; overflow:hidden;'><input validate = "accept:'jpg|jpeg|png|gif'" onchange="getFileName()" id="ImageName1" name="data[Image][name1]" type="file" value="upload"/></div>
    <?php } ?>
    <label for="ImageName1" class="error"><div style="padding-top:2px;">Please select an image (png, jpg, jpeg, gif)</div></label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Notes </p></td>
    <td>
     <?php echo $form->input('customers_notes',array('label' => false,'style'=>'height:150px;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
     
    <?php
    echo $form->hidden('customers_types', array('value' => 'teacher'));
	echo $form->input('id', array('type'=>'hidden')); 
    ?>

    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p> </p></td>
    <td>
    <p>
    <?php echo $form->checkbox('sendemail', array('value' => '1','class' => 'statuss')); ?> Send E-Mail Notification      
    </p>
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