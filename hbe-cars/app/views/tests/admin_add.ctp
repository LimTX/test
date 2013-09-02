<?php echo $javascript->link('list_models_student_test', array('inline' => FALSE)); ?>
<style>

#ctrlloading {
	display:none;
}

</style>
<script type="text/javascript">

$(document).ready(function() {
	$('#addtest').click(function() {
        if($('#TestSchoolId').val() != '' && $('#TestClassroomId').val() != '' && $('#TestCustomersTeacherId').val() != '' && $('.radioseries').is(':checked') &&  $('.radiotype').is(':checked')) {
           $('#addtable').hide();
		   if ( $.browser.msie ) {
		   $("#ctrlloading").html($("#ctrlloading").html());
		   }
		   $('#ctrlloading').show();
        }
	 });	
 });

$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
	  $(".alert_warning").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})
</script>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to create a new Assessment record.</h4>

<article class="module width_full">

<header><h6>Assessment Form</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'tests', 'action' => 'add'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:100%;">
     <table id="ctrlloading" width="100%" style="float:right;" border="0" cellspacing="10">
    <tr>
    <td width="22%" valign="top" style="text-align:right;">
    <?php echo $html->image('report-loader.gif', array('alt' => 'Loading...'))?>
    </td>
    <td valign="middle" style="vertical-align:middle">
    <div style="width:700px;"><p>Please avoid using your browser's Back / Refresh Button - this may lead to incomplete data being transmitted and pages being loaded incorrectly.</p></div>
    </td>
    </tr>
    </table>
    <table id="addtable" width="100%" style="float:right;" border="0" cellspacing="10">
    <tr>
    <td width="22%" valign="top" style="text-align:right;">
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
    <td  valign="top" style="text-align:right; "><p>Teacher <span class="red">*</span></p></td>
    <td>
    <?php if ($admin == "teacher") { ?>
    <?php 
	echo $form->input('customers_teacher_id', array('type' => 'select','disabled' => true, 'label' => false,'style'=>'width:254px;', 'options' => $realteachersfiltered,'validate'=>'required:true','div'=>'formfield'));
		
		echo $form->hidden('customers_teacher_id', array('value' => $users_userID));
	
	?>
    
    <?php } elseif ($admin == "schooladmin") { ?>
    
    <?php 
echo $form->input('customers_teacher_id', array('type' => 'select', 'empty' => '-- Select --', 'label' => false,'style'=>'width:254px;', 'options' => $teachersfiltered,'validate'=>'required:true','div'=>'formfield'));
	?>
    <?php } else { ?>
    <?php 
	echo $form->input('customers_teacher_id', array('type' => 'select', 'empty' => '-- Select --', 'label' => false,'style'=>'width:254px;', 'options' => $teachers,'validate'=>'required:true','div'=>'formfield'));
	?>
    <?php } ?>
    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right; padding-bottom:20px;"><p>Token <span class="red">*</span></p></td>
    <td>
    <span style="display:inline-block;"><?php 
	echo $form->input('bk_session_id',array('disabled' => true,'label' => false,'validate' => 'required:true','div'=>'formfield','value' => $token)); 
	?></span><span style="display:inline-block; vertical-align:middle;">&nbsp;
	<?php //echo $html->image('question-mark.png', array('alt' => 'Question', 'title' => 'You may provide this token to allow your students to attempt the test.'))?> </span>
    <?php echo $form->hidden('bk_session_id', array('value' => $token)); ?>
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right; padding-bottom:20px;"><p>Series <span class="red">*</span></p></td>
    <td>
    <?php
	
	if ($admin == "superadmin") {
		
		$options = array('Cars Series' => ' Cars Series', 'Cars Plus' => ' Cars Plus');
		echo $form->input('series_type', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio', 'class' => 'radiotype'));
	
	} else {
		
		$accountType = $this->requestAction('/accounts/accountType/'.$users_school);
		
		if ($accountType['Account']['teacher_focus'] == 'yes' && $accountType['Account']['teacher_carscombo'] == 'yes') {
			
			$options = array('Cars Series' => ' Cars Series', 'Cars Plus' => ' Cars Plus', 'Focus' => ' Focus');
			
		} else if ($accountType['Account']['teacher_carscombo'] == 'yes') {
			
			$options = array('Cars Series' => ' Cars Series', 'Cars Plus' => ' Cars Plus');
		
		} else if ($accountType['Account']['teacher_focus'] == 'yes') {
		
			$options = array('Focus' => ' Focus');
		
		}
		
		echo $form->input('series_type', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio', 'class' => 'radiotype'));
	
	}
	
    ?>
	<label for="data[Test][series_type]" class="error">This field is required.</label>
 
    </td>
    </tr>
    <tr>
    <td valign="top" style="text-align:right; padding-bottom:20px;"><p>Book <span class="red">*</span></p></td>
    <td>
   	<?php 
$options = array('P' => ' P', 'AA' => ' AA', 'A' => ' A', 'B' => ' B','C' => ' C','D' => ' D','E' => ' E','F' => ' F','G' => ' G','H' => ' H');
echo $form->input('book_type', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio', 'class' => 'radioseries'));
 ?><label for="data[Test][book_type]" class="error">This field is required.</label>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right; padding-bottom:20px;"><p> </p></td>
    <td>    
    <button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>
	<button class="btn-primary" id="addtest" type="submit">Submit</button>
    <?php echo $form->end(); ?>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right; padding-bottom:25px;"><p> </p></td>
    <td>   
    <br/>
    <p style="color:green; width:75%;"> 
    <span style="font-weight:bold; color:#FBB117;">TIPS</span>
    <br/>
    Please read <?php echo $html->link('HELP Section', array('admin'=> true,'controller'=>'customers','action'=>'help')); ?> before starting an assessment.
    </p>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>
<div class="spacer"></div>