<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
   };
   window.setTimeout( show_popup, 3000 ); // 5 seconds
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
<h4 class="alert_info">This section allows you to create new Student, edit or delete existing ones.</h4>

     	 <div class="top-nav">
        
        <article class="lefty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'customers', 'action' => 'add'))); ?>
        <button  class="btn-primary" type="submit">Add Student</button>
        <?php echo $form->end(); ?>
        </article>
        
        <article class="righty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'customers', 'action' => 'search'),'class'=>'genform','id'=>'searchbox2')); ?>
        <button class="btn-primary" type="submit">Go!</button>
     	</article>
        
        <article class="rightysearch">
        <?php echo $form->input('search_text', array('placeholder'=>'Search Student','label' => false, 'class' => 'searchinput')); ?>
        <?php echo $form->end(); ?>
     	</article>
        
        </div>
        
	<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Student Listing</h3>
         <ul class="tabs">
   			<li><?php 
			
				echo $totalUsers;
			
			?> RECORDS</li>
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
    				<th width="20%">Student Name</th> 
 					<?php if ($admin == "superadmin") { ?>
 				    <th width="20%">School</th> 
                    <?php } ?>
 					<?php if ($admin == "superadmin" ||$admin == "schooladmin") { ?>
    				<th width="14%">Class</th> 
                    <?php } ?>
                    <?php if ($admin == "teacher") { ?>
                    <th width="10%">Class</th> 
                    <?php } ?>					
                    <th width="18%">Teacher</th>
    				<th width="19%">Modified On</th> 
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
    array('controller' => 'customers', 'action' => 'view', $customer['Customer']['id'])); ?></div>			
                    </td> 
                    <?php if ($admin == "superadmin") { ?>
 				    <td>
   					 <?php echo $customer['School']['name']; ?>
                    </td> 
                    <?php } ?>
    				<td>
                     <?php echo $customer['Classroom']['name']; ?>
					</td> 
    				<td>
					 <?php //echo $customer['StudentExtra']['customers_name']; ?>
                     <?php 
					 
					    $teachers = $this->requestAction('/customers/teachernames/'.$customer['Customer']['customers_teacher_id']); 
                  
						foreach ($teachers as $teacher) {
					
						echo $teacher['Customer']['customers_name']."&nbsp;&nbsp;"." ";
					
						}
					 ?>
                    </td>
    				<td><?php $date = date('d-m-Y', strtotime($customer['Customer']['modified']));
	   $time = date('h:i:s A', strtotime($customer['Customer']['modified']));
	   echo $date." ".$time.""; ?></td> 
    				<td> <?php 
	echo $html->image("edit.png", array(
"title" => "Edit Student",'class'=>'borderzero',
'url' => array('action'=>'edit', 'id'=>$customer['Customer']['id'])));
	
 ?>&nbsp;
    <?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete Customers",'class'=>'borderzero'))
, array('action' =>'delete', $customer['Customer']['id'])
, array('title' => 'Delete Student')
, sprintf('Please note that all the assessments assigned to this student will be deleted. Are you sure you want to delete this student: %s?', $customer['Customer']['customers_firstname']." ".$customer['Customer']['customers_lastname'])
, false); ?>
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
    
    <?php 
	$searchQuery = null;
	
	if(isset($this->params['url']['search_text'])) {
	$searchQuery = $this->params['url']['search_text'];
	} 
	elseif (isset($this->params['pass'][0])) {
	$searchQuery = $this->params['pass'][0];
	}
	
	echo $paginator->options(array('url' => $searchQuery));
	
	?>
    
	<?php echo $paginator->numbers(); ?> 
   <br/><br/>
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
    
    <?php
    } else {
		
		if($this->params['url']['search_text'] == "") {
			
		
       echo "<p style='margin-left:20px;'>
		
		
		<br /> Your search <strong>'"." "."'</strong> did not match any student records. <br/><br/></p>";	
		
			
		} else {
		
		
        echo "<p style='margin-left:20px;'>
		
		
		<br /> Your search <strong>'".$this->params['url']['search_text']."'</strong> did not match any student records. <br/><br/></p>";
    } }
    ?>