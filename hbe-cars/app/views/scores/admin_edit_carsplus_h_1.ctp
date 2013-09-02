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
<h4 class="alert_info">Book H &nbsp;&nbsp; CARS &reg; Plus</h4>
<br/><br/>

<div class="lessons">

<?php 
$access_token = $this->params['pass'][1];
$checktest = $this->requestAction('/tests/checktestcompletedlesson/'.$access_token);
?>

<?php
	$navlessonid = 1;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 1) {
        $state1 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state1 = "full-qns";
    } else {
        if ($page_no == 1) { 
        $state1 = "active";
        } else {
        $state1 = "non-active";
        }
    }
	
    $navlessonid = 2;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 2) {
        $state2 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state2 = "full-qns";
    } else {
        if ($page_no == 2) { 
        $state2 = "active";
        } else {
        $state2 = "non-active";
        }
    }

	$navlessonid = 3;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 3) {
        $state3 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state3 = "full-qns";
    } else {
        if ($page_no == 3) { 
        $state3 = "active";
        } else {
        $state3 = "non-active";
        }
    }

	
    $navlessonid = 4;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 4) {
        $state4 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state4 = "full-qns";
    } else {
        if ($page_no == 4) { 
        $state4 = "active";
        } else {
        $state4 = "non-active";
        }
    }

	   
    $navlessonid = 5;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 5) {
        $state5 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state5 = "full-qns";
    } else {
        if ($page_no == 5) { 
        $state5 = "active";
        } else {
        $state5 = "non-active";
        }
    }

	$navlessonid = 6;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 6) {
        $state6 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state6 = "full-qns";
    } else {
        if ($page_no == 6) { 
        $state6 = "active";
        } else {
        $state6 = "non-active";
        }
    }

	$navlessonid = 7;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 7) {
        $state7 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state7 = "full-qns";
    } else {
        if ($page_no == 7) { 
        $state7 = "active";
        } else {
        $state7 = "non-active";
        }
    }

	$navlessonid = 8;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 8) {
        $state8 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state8 = "full-qns";
    } else {
        if ($page_no == 8) { 
        $state8 = "active";
        } else {
        $state8 = "non-active";
        }
    }

	$navlessonid = 9;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 9) {
        $state9 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state9 = "full-qns";
    } else {
        if ($page_no == 9) { 
        $state9 = "active";
        } else {
        $state9 = "non-active";
        }
    }

	$navlessonid = 10;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 10) {
        $state10 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state10 = "full-qns";
    } else {
        if ($page_no == 10) { 
        $state10 = "active";
        } else {
        $state10 = "non-active";
        }
    }
	
	$navlessonid = 11;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 11) {
        $state11 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state11 = "full-qns";
    } else {
        if ($page_no == 11) { 
        $state11 = "active";
        } else {
        $state11 = "non-active";
        }
    }
	
	$navlessonid = 12;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 12) {
        $state12 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state12 = "full-qns";
    } else {
        if ($page_no == 12) { 
        $state12 = "active";
        } else {
        $state12 = "non-active";
        }
    }
	
	$navlessonid = 13;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 13) {
        $state13 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state13 = "full-qns";
    } else {
        if ($page_no == 13) { 
        $state13 = "active";
        } else {
        $state13 = "non-active";
        }
    }
	
	$navlessonid = 14;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 14) {
        $state14 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state14 = "full-qns";
    } else {
        if ($page_no == 14) { 
        $state14 = "active";
        } else {
        $state14 = "non-active";
        }
    }
	
	$navlessonid = 15;
    $checkscore = $this->requestAction('/scores/checkscorecompletedlesson/'.$access_token."/".$navlessonid);

    if (count($checktest) == count($checkscore) && $page_no == 15) {
        $state15 = "active";
    } else if (count($checktest) == count($checkscore)) {
        $state15 = "full-qns";
    } else {
        if ($page_no == 15) { 
        $state15 = "active";
        } else {
        $state15 = "non-active";
        }
    }
?>

<?php echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_h_1', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state1,'title' => 'PreTest 1')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_h_2', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state2,'title' => 'PreTest 2')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_h_3', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state3,'title' => 'PreTest 3')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_h_4', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state4,'title' => 'PreTest 4')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_h_5', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state5,'title' => 'PreTest 5')); ?> &nbsp; <span style="color:#CCC;">&Iota;</span> &nbsp;
<?php echo $html->link('BM 1', array('controller' => 'scores', 'action' => 'edit_carsplus_h_6', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state6,'title' => 'Benchmark 1')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('BM 2', array('controller' => 'scores', 'action' => 'edit_carsplus_h_7', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state7,'title' => 'Benchmark 2')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('BM 3', array('controller' => 'scores', 'action' => 'edit_carsplus_h_8', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state8,'title' => 'Benchmark 3')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('BM 4', array('controller' => 'scores', 'action' => 'edit_carsplus_h_9', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]), array('id' => $state9,'title' => 'Benchmark 4')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('BM 5', array('controller' => 'scores', 'action' => 'edit_carsplus_h_10', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state10,'title' => 'Benchmark 5')); ?> &nbsp; <span style="color:#CCC;">&Iota;</span> &nbsp;
<?php echo $html->link('PT 1', array('controller' => 'scores', 'action' => 'edit_carsplus_h_11', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state11,'title' => 'Post Test 1')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 2', array('controller' => 'scores', 'action' => 'edit_carsplus_h_12', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state12,'title' => 'Post Test 2')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 3', array('controller' => 'scores', 'action' => 'edit_carsplus_h_13', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state13,'title' => 'Post Test 3')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 4', array('controller' => 'scores', 'action' => 'edit_carsplus_h_14', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state14,'title' => 'Post Test 4')); ?> &nbsp; &bull; &nbsp;
<?php echo $html->link('PT 5', array('controller' => 'scores', 'action' => 'edit_carsplus_h_15', $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('id' => $state15,'title' => 'Post Test 5')); ?>
 
</div>

<!------------------------------------------------------------------------------------------------

LESSON 1

------------------------------------------------------------------------------------------------->

<article class="module width_5_quarter_test">
<header><h6>Pretest <?php echo $page_no ?></h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'scores', 'action' => 'edit_carsplus_h_'.$page_no.''),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>
    <div style="float:left; width:100%; padding-top:10px;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td class="fiftythree" valign="top" style="text-align:right;">
    </td>
    <td width="5px">
    
    </td>
    <td width="100%">
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Finding Main Idea <span class="red">*</span></div><div class="content2"><?php echo $html->link('MI', '#', array('title' => 'Finding Main Idea')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
    <p><strong> 1 </strong></p>
    </td>
    <td>
    <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
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
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
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
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
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
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('CE', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][CE]" class="error">This field is required.</label>
    </td>
    </tr>
      <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Comparing and Constrasting <span class="red">*</span></div><div class="content2"><?php echo $html->link('CC', '#', array('title' => 'Comparing and Constrasting')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 5 </strong></p>
    </td>
    <td>
     <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('CC', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][CC]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Making Predictions <span class="red">*</span></div><div class="content2"><?php echo $html->link('MP', '#', array('title' => 'Making Predictions')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
  <p><strong> 6 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('MP', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][MP]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Finding Word Meaning in Context <span class="red">*</span></div><div class="content2"><?php echo $html->link('WM', '#', array('title' => 'Finding Word Meaning in Context')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 7 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('WM', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][WM]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Drawing Conclusions and Making Inferences <span class="red">*</span></div><div class="content2"><?php echo $html->link('CI', '#', array('title' => 'Drawing Conclusions and Making Inferences')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 8 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('CI', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][CI]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Distinguishing Between Fact and Opinion <span class="red">*</span></div><div class="content2"><?php echo $html->link('FO', '#', array('title' => 'Distinguishing Between Fact and Opinion')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 9 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('FO', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][FO]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Identifying Author's Purpose <span class="red">*</span></div><div class="content2"><?php echo $html->link('AP', '#', array('title' => 'Identifying Author\'s Purpose')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 10 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('AP', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][AP]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Interpreting Figurative Language <span class="red">*</span></div><div class="content2"><?php echo $html->link('FL', '#', array('title' => 'Interpreting Figurative Language')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 11 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('FL', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][FL]" class="error">This field is required.</label>
    </td>
    </tr>
    <tr>
    <td  valign="top" class="table_space"><p><div class="content1">Summarising <span class="red">*</span></div><div class="content2"><?php echo $html->link('SM', '#', array('title' => 'Summarising')); ?>  <span class="red">*</span></div></p></td>
    <td width="5px">
   <p><strong> 12 </strong></p>
    </td>
    <td>
        <?php 
$options = array('A' => ' A', 'B' => ' B', 'C' => ' C', 'D' => ' D');
echo $form->input('SM', array('label' => false,'class'=>'ProductStatusPublish','validate'=>'required:true','options' => $options,'legend' => false,'separator' => '&nbsp;&nbsp;', 'type' => 'radio'));
 ?><label for="data[Score][SM]" class="error">This field is required.</label>
    </td>
    </tr>
    <td valign="top" style="text-align:right;"><p> </p></td>
    <td width="5px">
    
    </td>
    <td>
    
     <?php
	 echo $form->hidden('lesson', array('value' => $page_no));
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
	 echo $form->hidden('lesson', array('value' => $page_no));
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
    'action' => 'reportsplus_h',
    $this->params['pass'][0],$this->params['pass'][1],$this->params['pass'][2]),array('target' => '_blank'));
	?>
    
    </p>
    </div>

		</article><!-- end of messages article -->

<br clear="all" />

<br/><br/>
