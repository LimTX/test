   <script type="text/javascript">
   
	   $(document).ready(function() {
		   		   
    		$('#TestCustomerCustomersSid').blur(function(e) {
				
    			var text2 = $('#TestCustomerCustomersSid').val();
				$("#TestCustomerCustomersName option").filter(function() {
					return this.value == text2; 
				}).attr('selected', true);
   
    		})
    	});
   
    $(function() {
        var availableTags = [
           <?php 
		   
		   foreach ($students as $student):
		   
		   echo '"'.$student['Customer']['customers_sid'].'"'.",";
		   
		   endforeach;
		   
		    ?>
            
        ];
        $( "#TestCustomerCustomersSid" ).autocomplete({
            source: availableTags
        });
    });
    </script>
    <script type="text/javascript">
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
<h4 class="alert_info">This section allows you to create a new Test record.</h4>

<article class="module width_full">

<header><h6>Test Form</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'tests', 'action' => 'add'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:100%;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td width="22%" valign="top" style="text-align:right;">
    </td>
    <td>
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right; padding-bottom:20px;"><p>Student ID <span class="red">*</span></p></td>
    <td>
    <?php 
    echo $form->input('customer_customers_sid',array('label' => false, 'validate' => 'required:true,minlength:[8],number:true','div'=>'formfield')); 
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; padding-bottom:20px;"><p>Student Name <span class="red">*</span></p></td>
    <td>
    <?php echo $form->input('customer_customers_name', array('empty' => true, 'type' => 'select','label' => false, 'style' => 'width:254px;background-color:#f5f5f5;', 'options'=>$studentsName, 'disabled' => true, 'selected' => $selectedvalue));
	// echo $form->input('customer_customers_name', array('label' => false,'validate'=>'required:true','div'=>'formfield'));
    ?>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; padding-bottom:20px;"><p>Series <span class="red">*</span></p></td>
    <td>
   	<?php 
$options = array('Cars Series' => ' Cars Series');
echo $form->input('series_type', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Test][series_type]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" style="text-align:right; padding-bottom:20px;"><p>Book <span class="red">*</span></p></td>
    <td>
   	<?php 
$options = array('K' => ' K', 'AA' => ' AA', 'A' => ' A', 'B' => ' B','C' => ' C','D' => ' D','E' => ' E','F' => ' F','G' => ' G','H' => ' H');
echo $form->input('book_type', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Test][book_type]" class="error">This field is required.</label>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right; padding-bottom:20px;"><p> </p></td>
    <td>
    <?php echo $form->hidden('customer_id', array('value' => 'teacher')); ?>
    <button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>
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