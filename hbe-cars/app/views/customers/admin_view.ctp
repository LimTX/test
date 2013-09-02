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
<h4 class="alert_info">This section allows you to view Student Details</h4>
  
<article class="module width_full">
<header><h6>Student DETAILS</h6></header>
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
     
     <?php echo $html->link('Edit Student Details', array('admin'=> true, 'controller' => 'customers','action' => 'edit',$this->params['pass'][0]));  ?>
     
     </p>
    </div>
    <div style="float:left; padding-top:14px; width:43%;">
    <br />
   	<h3 style="font-size:28px; color:#ea6402; font-family: 'Anton', sans-serif; padding:0px; margin:0;"><?php echo $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname']?> </h3>
    <br />
         <p style="display:inline-block;"> Teacher In-Charge</p>
      <p style="display:inline-block;" class="black">
      <style type="text/css">  
	  ul#chernames li  {
		  display:inline-block; 
		  font-weight:bold;
	  }
	  
	  ul#chernames  {
		  display:inline-block; 
	  }
	  </style>
      <script type="text/javascript">
	  $(document).ready(function() { 
	  var lasttest = $('ul#chernames>li:last').html().replace(',', "");
	  $('ul#chernames>li:last').contents().remove();
	  $('ul#chernames>li:last').append(lasttest);
	  });
	  </script>
      <ul id="chernames">
      <?php 
	 foreach ($teacherNames as $teacherName):
	
	 echo "<li>".$teacherName['Customer']['customers_name'].",&nbsp;</li>";
 
	 //echo $html->link($teacherName['Customer']['customers_name'],
     //array('controller' => 'customers', 'action' => 'view_teachers', $customer['Customer']['customers_teacher_id']));
	
	 endforeach ?>
     </ul>
      </p>
     <br />
        <p style="display:inline-block;"> School</p>
      <p style="display:inline-block;" class="black">
      <?php 
	 foreach ($schools as $school):
	 echo $school['School']['name'];
	 endforeach ?>
      </p>
     <br /><br />
     <p style="display:inline-block;">Class&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php 
	 foreach ($classes as $class):
	 echo $class['Classroom']['name'];
	 endforeach ?>
     </p>
     <br /><br />
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
     <?php if (!empty($customer['Customer']['customers_address']) && !empty($customer['Customer']['customers_city']) && !empty($customer['Customer']['customers_state']) && !empty($customer['Customer']['customers_postcode']) && !empty($customer['Customer']['customers_country'])) { ?>
     <br /><br /> 
     <p style="display:inline-block;">Address&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php echo $customer['Customer']['customers_address']." ".$customer['Customer']['customers_city']." ".$customer['Customer']['customers_state']." ".$customer['Customer']['customers_postcode']." ".$customer['Customer']['customers_country']; ?>
     </p>
     <?php } ?>
     <?php if (!empty($customer['Customer']['customers_address2']))  { ?>
     <br /><br /> 
     <p style="display:inline-block;">Address 2&nbsp;</p><p class="black" style="display:inline-block;">
	 <?php echo $customer['Customer']['customers_address2']; ?>
     </p>
     <?php } ?>
     <?php if (!empty($customer['Customer']['customers_email_address']))  { ?>
     <br /><br />
     <p style="display:inline-block;"> Email</p>
      <p style="display:inline-block;" class="black"><?php echo $customer['Customer']['customers_email_address']?></p>
     <br /><br />
     <?php } ?>
      <?php if (!empty($customer['Customer']['customers_parent']))  { ?>
      <p style="display:inline-block;"> Parent Name</p>
      <p style="display:inline-block;" class="black"><?php echo $customer['Customer']['customers_parent']?></p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php } ?>
      <?php if (!empty($customer['Customer']['customers_parent_email']))  { ?>
     <p style="display:inline-block;"> Parent Email</p>
      <p style="display:inline-block;" class="black"><?php echo $customer['Customer']['customers_parent_email']?></p>
      <?php } ?>
     <br /><br />
     <?php if (!empty($customer['Customer']['customers_notes']))  { ?>
     <p> Notes </p>
      <p class="black"><?php echo $customer['Customer']['customers_notes']?></p>
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
    		<h3 class="tabs_involved">Assessment Listing</h3>
             <ul class="tabs">
                <li><?php echo count($tests); ?> RECORDS</li>
            </ul>
     </header>
        <div class="tab_container">
		<div id="tab1" class="tab_content">
         <?php
   			 if(isset($tests) && !empty($tests)) {
		?>  
        <table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Series</th> 
    				<th>Book</th> 
    				<th width="300">Tested On</th> 
                    <th>Action</th> 
				</tr> 
			</thead> 
			<tbody> 
            <?php foreach ($tests as $test) { ?>
            <tr>                     
            	<td>
					<?php echo $test['Test']['series_type']; ?>
				</td>
                <td>
					<?php echo $test['Test']['book_type']; ?>
				</td>
                <td>
					<?php
					 $date = date('d-m-Y', strtotime($test['Test']['modified']));
					 $time = date('h:i:s A', strtotime($test['Test']['modified']));
					echo $date." ".$time.""; ?> 
				</td>
                <td>
			<?php 
		echo $html->image("edit.png", array(
		"title" => "Edit Test",'class'=>'borderzero',
		'url' => array('controller' => 'tests','action'=>'page_filter', 'id'=>$test['Test']['id'], $test['Test']['bk_session_id'], $test['Test']['customer_id'], $test['Test']['book_type'])));
 			?>    
 		<?php /*?>&nbsp;
   		    <?php 
		echo $html->link(  $html->image("delete.png", array(
		"alt" => "Delete Test",'class'=>'borderzero'))
		, array('controller' => 'tests','action' =>'delete', $test['Test']['id'])
		, array('title' => 'Delete Test')
		, sprintf('Are you sure you want to delete this test record?')
		, false);
			?><?php */?>
				</td>
        	</tr>
        	<?php } ?>
        	</tbody> 
			</table>
        
         <?php
    } else {
        echo "<p style='margin-left:20px;'>
		<br /> There are currently no assessment records.<br/><br/></p>";
    }
    ?>
        
        </div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->

<div class="spacer"></div>

<br clear="all" /><br clear="all" /><br clear="all" />