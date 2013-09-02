<style>
@media only screen and (max-width: 1024px) { 
#section-right {
	height:700px;
}

}
</style>
<br /><br/><br /><br/><br /><br/><br /><br/><br />
<h4 class="alert_info">This section allows you to edit a School record.</h4>

<article class="module width_full">

<header><h6>School Form</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'schools', 'action' => 'edit'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
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
     <tr>
    <td  valign="top" style="text-align:right;"><p>Name <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('name',array('label' => false,'validate' => 'required:true','div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right;"><p>Address <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('address',array('label' => false,'validate' => 'required:true','div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Description </p></td>
    <td>
     <?php echo $form->input('description',array('label' => false,'style'=>'height:150px;','validate' => 'maxLen:1400','class' => 'formerror','div'=>'formfield')); ?>
     <?php echo $form->input('id', array('type'=>'hidden'));  ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; vertical-align:top;"><p>Expiry Date </p></td>
    <td>
     <?php	 
	 echo $form->input('School.expiry',array('label' => false,'type'=>'date','validate' => 'required:true','div'=>'formfield','style'=>'width:100px;','dateFormat'=>'D-M-Y',));  ?>
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