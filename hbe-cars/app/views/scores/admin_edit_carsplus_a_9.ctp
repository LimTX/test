<?php echo $javascript->link('acronym_switcher') ?>
<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
   };
   window.setTimeout( show_popup, 3000 ); // 5 seconds
})
</script>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">Book A &nbsp;&nbsp; CARS &reg; Plus</h4>
<br/><br/>

<div class="lessons">
<?php 
$access_token = $this->params['pass'][1];
$checktest = $this->requestAction('/tests/checktestcompletedlesson/'.$access_token);
?>

<?php 
//MAIN DIFFERENT IS THE SELECTED QNS IS ACTIVE FIRST AND FULL-QNS CSS SECOND.
$navlessonid = 1;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'PreTest 1'));
} else {
echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'PreTest 1'));
} 
?> &nbsp; &bull; &nbsp;
<?php 
$navlessonid = 2;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_2', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'PreTest 2')); 
} else {
echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_2', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'PreTest 2')); 
} ?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 3;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_3', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'PreTest 3')); 
} else {
echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_3', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'PreTest 3'));	
} ?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 4;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_a_4', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'PreTest 4'));
} else {
echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_a_4', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'PreTest 4'));
} ?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 5;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_5', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'PreTest 5'));
} else {
echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_5', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'PreTest 5'));
} ?> &nbsp; <span style="color:#CCC;">&Iota;</span> &nbsp;
<?php
$navlessonid = 6;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('BM 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_6', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Benchmark 1'));
} else {
echo $html->link('BM 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_6', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Benchmark 1'));
} ?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 7;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('BM 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_7', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Benchmark 2'));
} else {
echo $html->link('BM 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_7', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Benchmark 2'));
} ?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 8;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('BM 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_8', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Benchmark 3')); 
} else {
echo $html->link('BM 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_8', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Benchmark 3')); 
}?> &nbsp; &bull; &nbsp;
<?php 
echo $html->link('BM 4', array('controller' => 'scores', 'action' => 'edit_carsplus_a_9', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'active', 'title' => 'Benchmark 4'));
?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 10;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('BM 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_10', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Benchmark 5'));
} else {
echo $html->link('BM 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_10', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Benchmark 5'));
}?> &nbsp; <span style="color:#CCC">&Iota;</span> &nbsp;
<?php
$navlessonid = 11;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_11', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Post Test 1'));
} else {
echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_a_11', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Post Test 1'));
}?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 12;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_12', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Post Test 2'));
} else {
echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_a_12', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Post Test 2'));
}?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 13;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_13', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Post Test 3'));
} else {
echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_a_13', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Post Test 3'));
}?> &nbsp; &bull; &nbsp;
<?php
$navlessonid = 14;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_a_14', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Post Test 4'));
} else {
echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_a_14', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Post Test 4'));
}?> &nbsp; &bull; &nbsp;
<?php
$navlessonid =15;
$checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);
if (count($checktest) == count($checkscore)) {
echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_15', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => 'full-qns','title' => 'Post Test 5'));
} else {
echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_a_15', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('title' => 'Post Test 5'));
}?> 

</div>
<!------------------------------------------------------------------------------------------------

LESSON 1

------------------------------------------------------------------------------------------------->

<article class="module width_4_quarter_test">
<header><h6>Benchmark 4</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'scores', 'action' => 'edit_carsplus_a_9'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	 <div style="float:left; width:100%; padding-top:10px;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td class="fortynine" valign="top" style="text-align:right;">
    </td>
    <td width="5px">
    
    </td>
    <td width="100%">
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Finding Main Idea  <span class="red">*</span></div><div class="content2"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
    <p><strong> 1 </strong></p>
    </td>
    <td>
    <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('MI', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][MI]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Recalling Facts and Details <span class="red">*</span></div><div class="content2"><?php echo $html->link('FD', '#', array('title' => 'Recalling Facts and Details')); ?>  <span class="red">*</span></div></p></td><td width="5px">
   <p><strong> 2 </strong></p>
    </td>
    <td>
    <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('FD', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][FD]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Understanding Sequence <span class="red">*</span></div><div class="content2"><?php echo $html->link('US', '#', array('title' => 'Understanding Sequence')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
    <p><strong> 3 </strong></p>
    </td>
    <td>
     <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('US', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][US]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Recognising Cause and Effect <span class="red">*</span></div><div class="content2"><?php echo $html->link('CE', '#', array('title' => 'Recognising Cause and Effect')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 4 </strong></p>
    </td>
    <td>
     <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('CE', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][CE]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Making Predictions <span class="red">*</span></div><div class="content2"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
  <p><strong> 5 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('MP', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][MP]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Finding Word Meaning in Context <span class="red">*</span></div><div class="content2"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 6 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('WM', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][WM]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Drawing Conclusions and Making Inferences <span class="red">*</span></div><div class="content2"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 7 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('CI', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][CI]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Reading Pictures <span class="red">*</span></div><div class="content2"><?php echo $html->link('RP', '#', array('title' => 'Reading Pictures')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 8 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C');
echo $form->input('RP', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][RP]" class="error">This field is required.</label>
    </td>
    </tr>
    <td valign="top" style="text-align:right;"><p> </p></td>
    <td width="5px">
    
    </td>
    <td>
    
     <?php
	 echo $form->hidden('lesson', array('value' => 9));
	 echo $form->hidden('test_id', array('value' => $this->params['pass'][2]));
	 echo $form->hidden('customer_id', array('value' => $this->params['pass'][0]));
	 echo $form->hidden('test_bk_session_id', array('value' => $this->params['pass'][1]));
	 echo $form->hidden('id');
    ?>
    
    <button class="btn-primary" type="submit">Submit</button>
    <?php echo $form->end(); ?>
    
    <div style="float:left; border:0px; width:80px;">
     <?php echo $form->create(null, array('url' => array('controller' => 'scores', 'action' => 'delete_score'),'class'=>'cmxform','id'=>'form2','type' => 'file')); ?>	
    <?php 
	 echo $form->hidden('lesson', array('value' => 9));
	 echo $form->hidden('test_id', array('value' => $this->params['pass'][2]));
	 echo $form->hidden('customer_id', array('value' => $this->params['pass'][0]));
	 echo $form->hidden('test_bk_session_id', array('value' => $this->params['pass'][1]));
	 echo $form->hidden('id');
	?>
    <button class="btn-sec" style="width:71px;" type="submit">Reset</button>
    <?php echo $form->end(); ?>
    </div>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>


<article class="module width_quarter_test">
			<header><h6>Student Details</h6></header>
            <div style="text-align:center; padding-top:40px;">
   <?php if(!empty($studentPhoto)) { ?>

      <?php echo $html->image('sets/small/'.$studentPhoto, array('class' => 'drop-shadow','width'=>'120px'))?>
      
      <?php } else { ?>
    <?php
    
	if ($studentGender == "M") {
	echo $html->image('no-user-m.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	} else {
	echo $html->image('no-user-f.jpg', array('class' => 'drop-shadow','width'=>'120px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	}
	
	?>
  <?php }  ?>
    	</div>
        
        <div style="text-align:center; padding-top:40px;">
   <!-- <p class="test_label">Student ID: </p> -->
   <!-- <p class="test_label bold"><strong><?php // echo $studentID ?></strong></p> -->
    <!-- <br /><br /> -->
    <p class="test_label">Name: </p>
    <p class="test_label bold"><strong><?php echo $studentName ?></strong></p>
    <br /><br />
    <p class="test_label">Teacher: </p>
    <p class="test_label bold"><strong><?php
	
	$getteacher = $this->requestAction('/customers/getteacher/'.$this->params['pass'][0].'/'.$this->params['pass'][1]);
	
	if ($getteacher) { 
				
				echo $getteacher['Customer']['customers_name'];
				
	} else {
					
	$getactualteacher = $this->requestAction('/customers/getactualteacher/'.$this->params['pass'][0]);		
							
	echo $getactualteacher['Customer']['customers_name'];
									
	};
	
	
	?></strong></p>
    <br /><br />
    <p class="test_label">Tested On: </p>
    <p class="test_label bold"><strong><?php echo date('d/m/Y', strtotime($studentTestedOn)); ?> </strong></p>
    <br /><br />
    <p class="test_label bold">
    
    <?php echo $html->link('View Student Report', array(
    'controller' => 'scores',
    'action' => 'reportsplus_a',
    $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('target' => '_blank'));
	?>
    
    </p>
    </div>

	
   
       

		</article><!-- end of messages article -->

<br clear="all" />

<br/><br/><br/><br/>
