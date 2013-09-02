<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
	  $(".alert_warning").slideUp(800);
   };
   window.setTimeout( show_popup, 5000 ); // 2 seconds
})
</script>
<style>
@media only screen and (max-width: 1024px) { 

#section-right {
	height:800px;
}

}
</style>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to create new a Classroom record.</h4>

<article class="module width_full">

<header><h6>Class Form</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'classrooms', 'action' => 'add'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	
    <div style="float:left; padding:30px;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td width="28%" valign="top" style="text-align:right;">
    </td>
    <td>
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
     <?php if($admin == "schooladmin") { ?>
    <tr>
    <td  valign="top" style="text-align:right;"><p>School </p></td>
    <td>
     <?php 
	echo $form->input('school_id', array('type' => 'select','label' => false,'style'=>'width:254px;', 'options' => $schoolsfilter,'validate'=>'required:true','div'=>'formfield','disabled'=>true));
	?>
    </td>
    </tr>
    <?php } ?>
    <?php if($admin == "superadmin") { ?>
     <tr>
    <td  valign="top" style="text-align:right;"><p>School <span class="red">*</span></p></td>
    <td>
    <?php 
	echo $form->input('school_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $schools,'validate'=>'required:true','div'=>'formfield'));
	?>
    </td>
    </tr>
    <?php } ?>
     <tr>
    <td  valign="top" style="text-align:right;"><p>Name <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('name',array('label' => false,'validate' => 'required:true','div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Year Level <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('year_level',array('label' => false,'div'=>'formfield','validate' => 'required:true')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Description </p></td>
    <td>
     <?php echo $form->input('description',array('label' => false,'style'=>'height:150px;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right;"><p> </p></td>
    <td>	  		 <button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>

  		 <button class="btn-primary" type="submit">Submit</button>
        <?php echo $form->end(); ?>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    <br/>
    <p style="color:green;">
    <span style="font-weight:bold; color:#FBB117">Class Guidelines</span>
    <br/>
    Please refer to the examples below to create a class.
   	<br/><br/>
    Example 1. Room 1 is only for Year Level 1.<br/>
    You will need to create one class below,<br/><br/>
    
    Name: <span style="font-weight:bold;">RM 1</span>
    <br/>
    Year Level: <span style="font-weight:bold;">Primary 1</span>
    <br/><br/>
    
    Example 2. Room 2 is shared between Year Level 2 and 3.<br/>
    You will need to create two classes below,<br/><br/>
    
    Name: <span style="font-weight:bold;">RM 2 - 2</span>
    <br/>
    Year Level: <span style="font-weight:bold;">Primary 2</span>
    <br/><br/>

    Name: <span style="font-weight:bold;">RM 2 - 3</span>
    <br/>
    Year Level: <span style="font-weight:bold;">Primary 3</span>
    </p>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>
<div class="spacer"></div>

 <br clear="all" /><br clear="all" />
        <div id="basepage">
        </div>