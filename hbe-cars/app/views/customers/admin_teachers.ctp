<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})
</script>
<style type="text/css">
.styled-select select {
   background: transparent;
   width: 100px;
   padding-left: 0px;
   padding-top: 9px;
   border: 0px solid #ccc;
   height: 34px;
   overflow:hidden;
}

.webkit .styled-select select {
   background: transparent;
   width: 100px;
   padding-left: 0px;
   padding-top: 0px;
   border: 0px solid #ccc;
   height: 34px;
   overflow:hidden;
}
</style>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to create a new Teacher, or edit or delete an existing ones.</h4>
     
        <div class="top-nav">
        
        <article class="lefty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'customers', 'action' => 'add_teachers'))); ?>
        <button  class="btn-primary" type="submit">Add Teacher</button>
        <?php echo $form->end(); ?>
        </article>
        
        <article class="righty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'customers', 'action' => 'search_teachers'),'class'=>'genform','id'=>'searchbox2')); ?>
       
       <button class="btn-primary" type="submit">Go!</button>
     	</article>
        
        <article class="rightysearch">
        <?php echo $form->input('search_text', array('placeholder'=>'Search Teacher','label' => false, 'class' => 'searchinput')); ?>
       
       <?php echo $form->end(); ?>
     	</article>
        
        </div>
        
	<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Teacher Listing</h3>
         <ul class="tabs">
   			<li class="record"><?php echo $totalUsers; ?> RECORDS</li>
		</ul>
        </header>
       <?php
   			 if(isset($customers) && !empty($customers)) {
		?> 
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th width="20%">Teacher Name</th> 
                    <?php if ($admin == "superadmin") { ?>
                    <th width="20%">School</th> 
                    <?php } ?>
    				<th width="14%">Class</th> 
                    <?php if ($admin == "superadmin") { ?>
    				<th width="17%">Appointment</th>
                    <?php } ?>
                    <th width="17%">Modified On</th> 
    				<th width="11%">Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			<?php foreach ($customers as $customer){ ?>
				<tr> 
   					<td>
					<div style=" display:inline-block; padding-right:10px; vertical-align:middle;">	
					<?php if(!empty($customer['Customer']['customers_image'])) { ?>
    <?php echo $html->image('sets/small/'.$customer['Customer']['customers_image'], array('width'=>'50px','style'=>'-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-khtml-border-radius:4px;
	border-radius:4px;'))?>
    <?php } else { ?>
    <?php
    
	if($customer['Customer']['customers_gender'] == "M") {
	
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
<div style="height:40px; display:inline-block; padding-top:19px; vertical-align:middle;">	<?php echo $html->link($customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname'],
    array('controller' => 'customers', 'action' => 'view_teachers', $customer['Customer']['id'])); ?></div>			</td>
     				<?php if ($admin == "superadmin") { ?>
    				<td>
                    <?php if (empty($customer['School']['name'])) {
					
					echo "Not Assigned";
					
					} else {
                    
                    echo $customer['School']['name'];
					
					} ?>
                    </td>
                    <?php } ?>
    				<td>
					<?php /*?>if (empty($customer['Classroom']['name'])) {
					
					echo "Not Assigned";
					
					} else {
					
					echo $customer['Classroom']['name'];
					
					}<?php */?>
                    
                    <?php 
					if($customer['Customer']['classroom_id'] == null || $customer['Customer']['classroom_id'] == 0) {
						echo "Not Assigned";
					} else {
						$classroomid = $customer['Customer']['classroom_id'];	
						
						$classes = $this->requestAction('/classrooms/teacherclasses/'.$classroomid); 
                   
						foreach ($classes as $class) {
					
						echo $class['Classroom']['name']." ";	
					
						}
					}
					
					?>
                    </td> 
                    <?php if ($admin == "superadmin") { ?>
    				<td><?php
					
					if($customer['Customer']['customers_roles'] == "superadmin")
					{ echo "HBE Administrator"; }
					else if ($customer['Customer']['customers_roles'] == "schooladmin")
				    { echo "School Administrator"; }
					else if ($customer['Customer']['customers_roles'] == "teacher")
					{ echo "Teacher"; }
					
					 ?></td>
                     <?php } ?>
                   <td><?php $date = date('d-m-Y', strtotime($customer['Customer']['modified']));
	   $time = date('h:i:s A', strtotime($customer['Customer']['modified']));
	   echo $date." ".$time.""; ?></td>

    				<td> <?php 
	echo $html->image("edit.png", array(
"title" => "Edit Teacher",'class'=>'borderzero',
'url' => array('action'=>'edit_teachers', 'id'=>$customer['Customer']['id'])));
	
 ?>&nbsp;
    <?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete Customers",'class'=>'borderzero'))
, array('action' =>'delete_teachers', $customer['Customer']['id'])
, array('title' => 'Delete Teacher')
, sprintf('Are you sure you want to delete this Teacher: %s?', $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname'])
, false);

//echo $html->link('Edit', array('action'=>'edit', 'id'=>$category['Category']['id'])); ?>
</td> 
				</tr> 
				 <?php } ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
    
    <br clear="all" /><br clear="all" />
    <div id="basepage">
    <?php if ($paginator->hasPage(2)) { ?>
    <div style="display:inline-block; width:95px; padding:10px; border:0px solid #666;"><?php echo $paginator->prev('Previous', null, null, array('class' => 'disabled')); ?></div>
	 <div style="display:inline-block; display:inline-block; padding:10px; border:0px solid #666;"><?php echo $paginator->numbers(); ?></div>
    <div style="display:inline-block; width:95px; padding:10px; border:0px solid #666;"><?php echo $paginator->next('Next', null, null, array('class' => 'disabled')); ?></div>
    <br /><br />
    <?php } ?>
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
  
    </div> 
       
    <?php
    } else {
        echo "<p style='margin-left:20px;'>
		<br /> There are currently no Teacher records.<br/><br/></p>";
    }
    ?>
        
        
		