<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
   };
   window.setTimeout( show_popup, 3000 ); // 5 seconds
})

var showOrHide = true; 
 
$(function () {
    $('.checkedBtn').on('click', function () {
		if ( showOrHide == true ) {
			showOrHide = false;
			$('.checked').prop('checked', true);
		} else if ( showOrHide == false ) {
			showOrHide = true; 
			$('.checked').prop('checked', false);
		}
    });
});

</script>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to view Teacher Details</h4>
  
<article class="module width_full">
<header><h6>Teacher Details</h6></header>
<div style="float:left; text-align:center; width:200px; padding-left:20px; padding-right:20px; padding-top:30px;">
	<?php if(!empty($customer['Customer']['customers_image'])) { ?>


      <?php echo $html->image('sets/small/'.$customer['Customer']['customers_image'], array('class' => 'drop-shadow'))?>
      
      <?php } else { ?>
    <?php 
	
	if ($customer['Customer']['customers_gender'] == "M") {
	
	echo $html->image('no-user-m.jpg', array('class' => 'drop-shadow','width'=>'160px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	} else {
	echo $html->image('no-user-f.jpg', array('class' => 'drop-shadow','width'=>'160px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	}
	 ?>
  <?php }  ?>
      <p style="text-align:center; padding-top:10px;">
     
     <?php echo $html->link('Edit Teacher Details', array('admin'=> true, 'controller' => 'customers','action' => 'edit_teachers',$this->params['pass'][0]));  ?>
     
     </p>
    </div>
    <div style="float:left; padding-top:14px; width:43%;">
    <br />
   	<h3 style="font-size:28px; color:#ea6402; font-family: 'Anton', sans-serif; text-transform:none; padding:0px; margin:0;"><?php echo $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname']?> </h3>
    <br /><br />
    <p style="display:inline-block;">Appointment&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php if ($customer['Customer']['customers_roles'] == "superadmin") 
	 { echo "HBE Administrator"; } 
	 else if ($customer['Customer']['customers_roles'] == "schooladmin")
	 { echo "School Administrator"; } 
	 else if ($customer['Customer']['customers_roles'] == "teacher")
	 { echo "Teacher"; }
	  ?>
     </p>
    <br /><br />
    <?php if (!empty($customer['School']['name'])) { ?>
     <p style="display:inline-block;">School&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php echo $customer['School']['name']; ?>
     </p>
     <br /><br />
     <?php } ?>
    <?php if (!empty($customer['Classroom']['name'])) { ?>
     <p style="display:inline-block;">Class&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php 
	 
	 
	  $classroomid = $customer['Customer']['classroom_id'];
					
					$classes = $this->requestAction('/classrooms/teacherclasses/'.$classroomid); 
                     
					if (count($classes) == 0) { 
					
					echo "Not Assigned";
					
					} else {
					 
					foreach ($classes as $class) {
					
					echo $class['Classroom']['name']." ";	
					
					}
					
					}
	 
	 ?>
     </p>
     <br /><br />
     <?php } ?>
     <p style="display:inline-block;">Gender&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php if($customer['Customer']['customers_gender'] == 'M') 
		{ echo "Male"; } else { echo "Female"; }
	 ?>
     </p>
	 <?php if ($customer['Customer']['customers_dob'] != "1970-01-01") { ?>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <p style="display:inline-block;">Date of Birth&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php echo date('d/m/Y', strtotime($customer['Customer']['customers_dob'])); ?>
     </p>
  
     <?php } ?>
        <br /><br />
     <p style="display:inline-block;"> Email</p>
      <p style="display:inline-block;" class="black"><?php echo $customer['Customer']['customers_email_address']?></p>
     <br /><br />
     <?php if(!empty($customer['Customer']['customers_notes'])) { ?>
     <p> Notes </p>
      <p class="black"><?php echo $customer['Customer']['customers_notes']; ?></p>
      <?php } ?>
      <br /><br />
      <br /><br />
    </div>
    <div class="viewbtm">
   <p>Created: <span class="black"><?php echo date('d/m/Y', strtotime($customer['Customer']['created'])); ?> </span> &#124;
    Last Modified: <span class="black"><?php echo date('d/m/Y', strtotime($customer['Customer']['modified'])); ?> </span> 
    </p>
</div>
    <br clear="all" />
</article>

<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved" style="padding-top:3px">Students Under <?php echo $customer['Customer']['customers_name'] ?></h3>
         <ul class="tabs">
   			<li class="record" style="padding-top:2px"><?php echo count($students) ?> RECORDS</li>
		</ul>
        </header>
<div class="tab_container">
			<div id="tab1" class="tab_content">   
            
		  <?php if(isset($students) && !empty($students)) { ?>
          
          <?php /*?> <?php echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'update_students'),'class'=>'cmxform','id'=>'form2')); ?>
          
          <div style="float:right; height:36px; width:400px; border:0px solid #999; text-align:right; padding:10px;">
		  <?php echo $form->input('classroom_id', array('type' => 'select','empty' => '-- Select --','label' => false,'style'=>'width:254px;', 'options' => $classesfiltered,'validate'=>'required:true','div'=>'formfield', 'value' => '')); ?>
          </div>
          
          <br clear="all"/><?php */?>
            
    		<table class="tablesorter" cellspacing="0">
    			<thead> 
				<tr> 
                <!--  <th width="10%"><span class="checkedBtn">Check All</span></th> -->
   				  <th width="40%">Name</th> 
                  <th width="80%">Class</th> 
				</tr> 
			</thead>
			<tbody> 
             	<?php foreach ($students as $student): ?>
            	<tr>
                	<!--<td width="10%">-->
                    
                    <?php
					
					//echo $form->input('Model.field', 
//									array(
//										  'id'=>'abcd_'.$student['Customer']['id'],
//										  'value' => $student['Customer']['id'],
//										  'hiddenField' => false,
//										  'name' => 'data[Customer][field][]',
//										  'label' => false,
//										  'div' => false,
//										  'type' => 'checkbox',
//										  'class' => 'checked'
//									));
					?>
                    
                     <?php // echo $form->input('Customer.'.$student['Customer']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$student['Customer']['id'], 'label' => false)); ?> 
                  <!--  </td>-->
                	<td width="40%">
					<div style="display:inline-block; padding-right:10px; vertical-align:middle;">	
					<?php if(!empty($student['Customer']['customers_image'])) { ?>
    <?php echo $html->image('sets/small/'.$student['Customer']['customers_image'], array('width'=>'50px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'))?>
    <?php } else { ?>
    <?php 
	
	if($student['Customer']['customers_gender'] == "M") {
	
	echo $html->image('no-user-m.jpg', array('width'=>'50px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	} else {
	echo $html->image('no-user-f.jpg', array('width'=>'50px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'));
	}
	?>
  <?php }  ?>
	</div>
<div style="height:40px; display:inline-block; padding-top:19px; vertical-align:middle;">	<?php echo $html->link($student['Customer']['customers_firstname']." ".$student['Customer']['customers_lastname'],
    array('controller' => 'customers', 'action' => 'view', $student['Customer']['id'])); ?></div>	
					</td>
                    <td width="80%">
                    <p><?php echo $student['Classroom']['name']; ?></p>
                    </td>
                </tr>
                <?php endforeach ?>
    		</tbody>
    </table>
    </tbody> 
			</table>
            
          <!--  <div style="float:right; height:36px; width:400px; border:0px solid #999; text-align:right; padding:10px;">
          
                  <button  class="btn-primary" type="submit">Update Class</button>

          </div>
                              <?php // echo $form->end(); ?>-->

             <?php
    } else {
        echo "<p style='margin-left:20px;'>
		<br /> There are currently no student under ".$customer['Customer']['customers_name'].".<br/><br/></p>";
    }
    ?>
            
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->

<div class="spacer"></div>

<br clear="all" /><br clear="all" /><br clear="all" />