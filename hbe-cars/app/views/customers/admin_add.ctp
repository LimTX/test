<script type="text/javascript">
	$(window).resize(function() {
		
	$('#main-right').css({height: '1950px'});
	$('#main-left').css({height: '1950px'});
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

#main-right {
	height:1950px;
}

#main-left {
	height:1950px;
	background: url('/img/sidebar.png') repeat scroll 0 0 #E0E0E3; 
}

}
</style>
<!--[if lte IE 8]>
<style>

.studenttablelefty {
	padding-left:106px;
}

}
</style>
<![endif]-->
<?php echo $javascript->link('list_models_student_addedit', array('inline' => FALSE)); ?>
<br /><br/><br /><br/><br /><br/><br /><br/><br />
<h4 class="alert_info">This section allows you to create a new Student.</h4>

<div style="height:1000px;">
<article class="module width_full">

<header><h6>Student Form</h6></header>
    <?php echo $form->create('Customer', array('class'=>'cmxform','id'=>'form2','type' => 'file')); ?>

<div style="float:left; padding-left:30px;">
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
    <td  valign="top" style="text-align:right;"><p>School <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('school_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $schools,'validate'=>'required:true','div'=>'formfield'));
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
    <td  valign="top" style="text-align:right;"><p>Class <span class="red">*</span></p></td>
    <td>
    <?php 	
	echo $form->input('classroom_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'validate'=>'required:true','options' => $classes,'div'=>'formfield'));
	?>
    </td>
    </tr>
    <?php } else if ($admin == "teacher") { ?>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Class <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('classroom_id', array('type' => 'select','label' => false,'style'=>'width:254px;', 'options' => $classesfilteredteacher,'validate'=>'required:true','div'=>'formfield'));
	echo $form->hidden('classroom_id', array('value' => $users_class));
	?>
    </td>
    </tr>
    <?php } else { ?>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Class <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('classroom_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $classesfiltered,'validate'=>'required:true','div'=>'formfield'));
	?>
    </td>
    </tr>
    <?php } ?>
     <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Teacher <span style="font-weight:bold;"><a style="color:green;" title="You can select more than one teacher by holding down the Ctrl (Windows) or Command (Apple) key." href="#">?</a></span><span class="red"> *</span></p></td>
    <td>
     <?php if ($admin == "teacher") { ?>
     
     <script type="text/javascript">
	    function load() {
			var CustomerCustomersTeacherId = document.getElementById('CustomerCustomersTeacherId');
			var i;
			for (i=0;i<CustomerCustomersTeacherId.length;i++)
			{
				CustomerCustomersTeacherId.options[i].selected = true;
			}
		 }
      window.onload = load;
	</script>
     
    <?php 
	echo $form->input('customers_teacher_id', array('type' => 'select', 'style'=> 'width:254px;padding:5px;height:187px;', 'multiple' => 'true','label' => false,'validate'=>'required:true','div'=>'formfield','selected' => $teachersschooladminfilteredmany, 'options' => $teachersschooladminfilteredmany));
	
		//echo $form->hidden('customers_teacher_id', array('value' => $users_userID));
		echo $form->hidden('customers_roles', array('value' => 'student'));

	
	?><label for="CustomerCustomersTeacherId" class="error">This field is required.</label>
    
    <?php } else if ($admin == "schooladmin") { ?>
    
    <?php 
	echo $form->input('customers_teacher_id', array('type' => 'select', 'style'=> 'width:254px;padding:5px;height:187px;', 'multiple' => 'true','label' => false, 'options' => $teachersschooladminfiltered,'validate'=>'required:true','div'=>'formfield'));
	?><label for="CustomerCustomersTeacherId" class="error">This field is required.</label>
    
    <?php } else { ?>
    
	<?php 
	echo $form->input('customers_teacher_id', array('style'=> 'width:254px;padding:5px;height:187px;', 'multiple' => 'true','label' => false, 'options' => $teachers,'validate'=>'required:true','div'=>'formfield'));
	?><label for="CustomerCustomersTeacherId" class="error">This field is required.</label>
    
    <?php } ?>
    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right;"> &nbsp;</td>
    <td>
    &nbsp;
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
     ?><label for="data[Customer][customers_gender]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Date of Birth </p></td>
    <td>
    <?php echo $form->input('customers_dob',array('placeholder' => 'DD-MM-YYYY','type'=>'text','label' => false, 'minYear' => date('Y') - 70,
        'maxYear' => date('Y') - 0,'dateFormat' => 'DMY', 'div'=>'formfield2', 'id' => 'datepicker')); ?>
        
        </td>
    </tr>
    </td>
    <td>
    <p>&nbsp;</p>
    </td>
    <tr style="display:none;">
    <td  valign="top" style="text-align:right;"><p>Email <span class="red"></span></p></td>
    <td>
    <?php // echo $form->input('customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'required:true,email:true')); ?>
    <?php echo $form->input('customers_email_address',array('default'=>'','label' => false,'div'=>'formfield','validate' => 'email:true')); ?>
    </td>
    </tr>
     <tr style="display:none;">
    <td valign="top" style="text-align:right;"><p>Password <span class="red"></span></p></td>
    <td>
    <?php // echo $form->input('customers_password',array('id' => 'password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6')); ?>
    <?php echo $form->input('customers_password',array('default'=>'','id' => 'password','type' => 'password','label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
     <tr style="display:none;">
    <td valign="top" style="text-align:right;"><p>Confirm Password <span class="red"></span></p></td>
    <td>
    <?php // echo $form->input('customers_password_confirmation',array('id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'required:true,minlength:6,equalTo: "#password"')); ?>
    <?php echo $form->input('customers_password_confirmation',array('id' => 'confirm_password','type' => 'password','label' => false,'div'=>'formfield','validate'=>'equalTo: "#password"','default'=>'')); ?>
    </td>
    </tr>
    <tr style="display:none;">
    <td>
    <p>&nbsp;</p>
    </td>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Address 1</p></td>
    <td>
    <?php echo $form->input('customers_address',array('label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>Address 2</p></td>
    <td>
 	    <?php echo $form->input('customers_address2',array('label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>Country</p></td>
    <td>
<div class="formfield">
<select style="width:254px;" validate ="" name="data[Customer][customers_country]" id="CustomerCustomersCountry">
<script language="javascript">
var states = new Array("-- Select --","Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");

for(var hi=0; hi<states.length; hi++)
if (states[hi] == "-- Select --") {
document.write("<option value=\""+""+"\">"+states[hi]+"</option>");
} else {
document.write("<option value=\""+states[hi]+"\">"+states[hi]+"</option>");
}
</script>
</select>
</div>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>City</p></td>
    <td>
 	    <?php echo $form->input('customers_city',array('label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>State</p></td>
    <td>
 	    <?php echo $form->input('customers_state',array('label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right;"><p>Post Code</p></td>
    <td>
 	    <?php echo $form->input('customers_postcode',array('label' => false,'div'=>'formfield')); ?>
    </td>
    </tr>
    </table>
   
    </div>
 <div class="studenttablelefty" style="float:left; width:40%;">
    <table width="100%" align="left" cellspacing="10" border="0">
    <tr>
    <td width="90" valign="top" style="text-align:right;">
    </td>
    <td>
    <p>&nbsp;</p>
    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right;"><p>Parent</p></td>
    <td>
    <?php 
    echo $form->input('customers_parent',array('label' => false,'div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Email</p></td>
    <td>
    <?php 
    echo $form->input('customers_parent_email',array('label' => false,'div'=>'formfield', 'validate' => 'email:true')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"> &nbsp;</td>
    <td>
    &nbsp;
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Photo</p></td>
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
    <?php } else { ?>
    <div id="ImageName10" style="height:30px; padding-top:15px; width:358px; border: 1px dashed #BBB; cursor:pointer;" onclick="getFile()">Click to Upload Photo!</div>
    <div style='height: 0px;width:0px; overflow:hidden;'><input validate = "accept:'jpg|jpeg|png|gif'" onchange="getFileName()" id="ImageName1" name="data[Image][name1]" type="file" value="upload"/></div>
    <?php } ?>
  <label for="ImageName1" class="error"><div style="padding-top:2px;">Please select an image (png, jpg, jpeg, gif)</div></label>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right; vertical-align:top;"><p>Notes </p></td>
    <td>
     <?php echo $form->input('customers_notes',array('label' => false,'style'=>'height:220px;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
     
     <?php
    echo $form->hidden('customers_types', array('value' => 'student'));
    ?>
     
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
              <br /><br />  <br /><br />  <br /><br />
    </div>
    <br clear="all" /><br clear="all" /> <br clear="all" />  
</article>
</div>
        <br clear="all" /><br clear="all" />
        <div id="basepage">
        </div>