<script type="text/javascript">
	$(window).resize(function() {
		
	$('#main-right').css({height: '1650px'});
	$('#main-left').css({height: '1650px'});
	$('#main-left').css({background: 'url(\'/img/sidebar.png\') repeat scroll 0 0 #E0E0E3'});
	
});

	$(document).ready(function() { 

	if ($('#apple-copyright').css('display') != 'none') {
		$('#apple-copyright').css({marginTop: '50px'});
	}
	
	});
</script>
<style>
@media only screen and (max-width: 1024px) { 

.studenttablelefty {
	padding-left:122px;
}

#main-right {
	height:1650px;
}

#main-left {
	height:1650px;
	background: url('/img/sidebar.png') repeat scroll 0 0 #E0E0E3; 
}

}

@media only screen and (max-width: 1000px) { 

#apple-copyright {	
	width:100%;
	height:10px;
	color:#FFF;
	bottom:0px;
	margin-top:300px;
	float:left;
	padding-top:25px;
	padding-bottom:25px;
	display:block;
	background: #222222 url(../img/apple-base.png) repeat-x;
	text-align:center;
}

}
</style>
<!--[if lte IE 8]>
<style>

.studenttablelefty {
	padding-left:116px;
}

}
</style>
<![endif]-->
<?php echo $javascript->link('list_models_student_addedit', array('inline' => FALSE)); ?>
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
<h4 class="alert_info">This section allows you to create a edit Student.</h4>

<article class="module width_full">

<header><h6>Student Form</h6></header>

<div style="height:810px">
            
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
	//echo $form->hidden('classroom_id', array('value' => $users_class));
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

    <?php 
	//echo $form->input('customers_teacher_id', array('type' => 'select','disabled' => true,'label' => false,'style'=>'width:254px;', 'options' => $teachersfiltered,'validate'=>'required:true','div'=>'formfield')); ?>
    
    <?php // echo $form->hidden('customers_teacher_id', array('value' => $users_userID)); ?>
       
    <!-- <label for="CustomerCustomersTeacherId" class="error">This field is required.</label> -->
    
    
  <?php 
  
  $customer['Customer']['customers_teacher_id'] = explode(",", $customer['Customer']['customers_teacher_id']);
 
	
	echo $form->input('customers_teacher_id', array('type' => 'select','selected' => $customer['Customer']['customers_teacher_id'],'label' => false,'style'=>'width:254px;', 'options' => $teachersschooladminfilteredmany,'validate'=>'required:true','div'=>'formfield','multiple' => 'true'));
	?><label for="CustomerCustomersTeacherId" class="error">This field is required.</label>
    
    
    <?php } else if ($admin == "schooladmin") { ?>
    
    <?php 
	
	$customer['Customer']['customers_teacher_id'] = explode(",", $customer['Customer']['customers_teacher_id']);
	
	echo $form->input('customers_teacher_id', array('type' => 'select','selected' => $customer['Customer']['customers_teacher_id'],'label' => false,'style'=>'width:254px;', 'options' => $teachersschooladminfilteredmany,'validate'=>'required:true','div'=>'formfield','multiple' => 'true'));
	?><label for="CustomerCustomersTeacherId" class="error">This field is required.</label>
    
    <?php } else { ?>
    
	<?php 
	
		$customer['Customer']['customers_teacher_id'] = explode(",", $customer['Customer']['customers_teacher_id']);
	
	echo $form->input('customers_teacher_id', array('type' => 'select','selected' => $customer['Customer']['customers_teacher_id'],'label' => false,'style'=>'width:254px;', 'options' => $teachers,'validate'=>'required:true','div'=>'formfield','multiple' => 'true'));
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
     ?><label for="data[Customer][customers_gender]" class="error">Please select a gender.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Date of Birth <span class="red"></span></p></td>
    <td>
    <?php 
	$customer['Customer']['customers_dob'] = date("d-m-Y",strtotime($customer['Customer']['customers_dob']));
	
	if ($customer['Customer']['customers_dob'] == "01-01-1970") {
	$customer['Customer']['customers_dob'] = "DD-MM-YYYY";
	}
	
	echo $form->input('customers_dob',array('value' => $customer['Customer']['customers_dob'],'type'=>'text','label' => false,'dateFormat' => 'DMY', 'div'=>'formfield2', 'id' => 'datepicker')); ?>
    </td>
    </tr>
    <tr>
    <td align="top" style="text-align:right;">
    </td>
    <td>
    <p>&nbsp;</p>
    </td>
    </tr>
    <tr style="display:none;">
    <td  valign="top" style="text-align:right;"><p>Email <span class="red"></span></p></td>
    <td>
    <?php // echo $form->input('customers_email_address',array('label' => false,'div'=>'formfield','validate' => 'required:true,email:true')); ?>
     <?php echo $form->input('customers_email_address',array('default'=>NULL,'label' => false,'div'=>'formfield','validate' => 'email:true')); ?>
    </td>
    </tr>
    <tr style="display:none;">
    <td valign="top" style="text-align:right;"><p>Password <span class="red"></span></p></td>
    <td>
 	 <?php if ($this->params['pass'][0] == $users_userID) { ?>
     <?php echo $html->link(__('Change Password', true), array('admin'=>true,'controller' => 'customers', 'action' => 'change_password', $users_userID)); ?>
     <?php } else { ?>
     <?php echo $html->link(__('Change Password', true), array('admin'=>true,'controller' => 'customers', 'action' => 'change_password', $this->params['pass'][0])); ?>
     <?php } ?>
    </td>
    </tr>
    <tr style="display:none;">
    <td align="top" style="text-align:right;">
    </td>
    <td>
    <p>&nbsp;</p>
    </td>
    </tr>
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
    
    <?php $country_options=array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Andorra','Angola'=>'Angola','Antarctica'=>'Antarctica','Antigua and Barbuda'=>'Antigua and Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia and Herzegovina'=>'Bosnia and Herzegovina','Botswana'=>'Botswana','Brazil'=>'Brazil','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burma'=>'Burma','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Colombia'=>'Colombia','Comoros'=>'Comoros','Congo, Democratic Republic'=>'Congo, Democratic Republic','Costa Rica'=>'Costa Rica','Cote d\'Ivoire'=>'Cote d\'Ivoire','Croatia'=>'Croatia','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Korea, North'=>'Korea, North','Korea, South'=>'Korea, South','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Mongolia'=>'Mongolia','Morocco'=>'Morocco','Monaco'=>'Monaco','Mozambique'=>'Mozambique','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Poland'=>'Poland','Portugal'=>'Portugal','Qatar'=>'Qatar','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Samoa'=>'Samoa','San Marino'=>'San Marino','Sao Tome'=>'Sao Tome','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Serbia and Montenegro'=>'Serbia and Montenegro','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovakia'=>'Slovakia','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tonga'=>'Tonga','Trinidad and Tobago'=>'Trinidad and Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Yemen'=>'Yemen','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe') ?>
    
<?php echo $form->input('customers_country', array('options' => $country_options,'style'=>'width:254px;', 'empty' => '-- Select --','label' => false,'div'=>'formfield')); ?>
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
    <td   valign="top" style="text-align:right;"><p>Email</p></td>
    <td>
    <?php 
    echo $form->input('customers_parent_email',array('validate' => 'email:true','label' => false,'div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td align="top" style="text-align:right;"></td>
    <td>
	&nbsp;
    </td>
    </tr>
    <tr>
    <td  style="text-align:right; vertical-align:middle;"><?php if(!empty($customer['Customer']['customers_image'])) {
		echo "<p style='padding-bottom:12px;'>Photo</p>";
	} else {
		echo "<p>Photo</p>";
	}?></td>
    <td>
      <div style="float:left;">
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
 
<?php if(!empty($customer['Customer']['customers_image'])) { ?>
<div style="padding-top:5px;">
<?php echo $html->link('Delete Photo', array('action'=>'admin_delete_image', $customer['Customer']['id']), null, sprintf('Are you sure you want to delete photo?')); ?>
</div>
    <?php } ?>
    </div>     
</div>
<br clear="all"/>
<label for="ImageName1" class="error"><div style="padding-top:2px;">Please select an image (png, jpg, jpeg, gif)</div></label>
    </td>
    <td style="vertical-align:top;">
<?php if(!empty($customer['Customer']['customers_image'])) { ?>
    <?php echo $html->image('sets/small/'.$customer['Customer']['customers_image'], array('width'=>'47px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'))?>
    <?php } ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Notes </p></td>
    <td>
     <?php echo $form->input('customers_notes',array('label' => false,'style'=>'height:220px;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
     
    <?php
    echo $form->hidden('customers_types', array('value' => 'student'));
	echo $form->hidden('customers_roles', array('value' => 'student'));
    ?>
    <?php echo $form->input('id', array('type'=>'hidden'));  ?>
     
    </td>
    <td>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right;"><p> </p></td>
    <td>
    
    	<button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>

  		 <button class="btn-primary" type="submit">Submit</button>
    </td>
    <td>
    </td>
    </tr>
    </table>
            <br /><br />  <br /><br />  <br /><br />
    </div>
          
            <?php echo $form->end(); ?>
</div>
    
    <br clear="all" /><br clear="all" /> <br clear="all" />  
</article>

 <br /><br />   <br /><br />  