<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})
</script>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to edit previous assessments and view reports.</h4>
        
        <div class="top-nav">
        
        <article class="lefty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'tests', 'action' => 'add'))); ?>
        <button  class="btn-primary" type="submit">Begin New Level</button>
        <?php echo $form->end(); ?>
        </article>
        
        <article class="righty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'tests', 'action' => 'search_report'),'class'=>'genform','id'=>'searchbox2')); ?>
       
        <button class="btn-primary" type="submit">Go!</button>
     	</article>
        
        <article class="rightysearch">
        <?php echo $form->input('search_text', array('placeholder'=>'Search Assessment','label' => false, 'class' => 'searchinput')); ?>
       
       <?php echo $form->end(); ?>
     	</article>
        
        </div>
        
	<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Assessment &amp; Report Listing</h3>
         <ul class="tabs">
   			<li>
			
            <?php 
			echo count($tests);
			 ?>
			
			 RECORDS</li>
		</ul>
        </header>
       <?php
   			 if(isset($tests) && !empty($tests)) {
		?> 
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Series</th> 
                    <th>Book</th>
                    <th>School</th> 
                    <?php if ($admin != "teacher") { ?>
                    <th>Teacher</th>
                    <?php } ?>
    				<th>Modified On</th>
                    <th align="center">Actions</th>  
				</tr> 
			</thead> 
            <tbody> 
			<?php foreach ($tests as $test){ ?>
				<tr> 
   					<td>
<div style="height:20px; display:inline-block; padding-top:10px; padding-bottom:10px; vertical-align:middle;">
<?php echo $test['Test']['series_type']; ?></div>
					</td> 
					<td>
<?php echo $test['Test']['book_type']; ?>
					</td>
                    <td>
<?php echo $test['School']['name']; ?>
					</td>
                	<?php if ($admin != "teacher") { ?>
                    <td>
<?php echo $test['Customer']['customers_name']; ?>
					</td>
                	<?php } ?>
        			<td>
<?php  $date = date('d-m-Y', strtotime($test['Test']['modified']));
	   $time = date('h:i:s A', strtotime($test['Test']['modified']));
	   echo $date." ".$time.""; ?>
   					</td>
                    <td align="center">
                    <?php
					
					//important //
					//to check whether the the customer id is student or teacher.
					// ////////////////////////        //
					
					$cust_id = $test['Test']['customer_id'];
					
					if ($admin == "teacher") {
						 $cust_id = $users_userID;
					}
					
					$cust_id;
					
				    $session_id = $test['Test']['bk_session_id'];
					
					$getthefirststudentid = $this->requestAction('/tests/getthefirststudentid/'.$cust_id.'/'.$session_id);
					?>
                    <?php // echo $getthefirststudentid['Test']['id']; ?>
                    <?php /*?>echo $html->image("viewreport.png", array(
    					"title" => "View Report",'class'=>'borderzero',
    					'url' => array('controller' => 'tests', 'action' => 'generatereport', $getthefirststudentid['Test']['id'],$session_id,$getthefirststudentid['Test']['customer_id'],$test['Test']['book_type'])));<?php */?>                    
              <?php echo $html->link($html->image('viewreport1.png',array('alt'=>'View Full Class Report','class'=>'borderzero')),array('controller' => 'tests', 'action' => 'generatereport', $getthefirststudentid['Test']['id'],$session_id,$getthefirststudentid['Test']['customer_id'],$test['Test']['book_type']), array('target'=>'_blank','escape'=>false,'title'=>'View Full Class Report')); ?>
               &nbsp;
               
              <?php echo $html->link($html->image('viewreport2.png',array('alt'=>'View Compact Class Report','class'=>'borderzero')),array('controller' => 'tests', 'action' => 'gencptreport', $getthefirststudentid['Test']['id'],$session_id,$getthefirststudentid['Test']['customer_id'],$test['Test']['book_type']), array('target'=>'_blank','escape'=>false,'title'=>'View Compact Class Report')); ?>
                        
                     &nbsp;
                     
                    <?php /*?>
		echo $html->image("edit.png", array(
		"title" => "Edit Test",'class'=>'borderzero',
		'url' => array('controller' => 'tests','action'=>'page_filter', 'id'=>$getthefirststudentid['Test']['id'], $session_id,$getthefirststudentid['Test']['customer_id'],$test['Test']['book_type'])));<?php */?>
 			
			<?php echo $html->link($html->image('edit.png',array('alt'=>'Edit Assessment','class'=>'borderzero')),array('controller' => 'tests','action'=>'page_filter', 'id'=>$getthefirststudentid['Test']['id'], $session_id,$getthefirststudentid['Test']['customer_id'],$test['Test']['book_type']), array('target'=>'_blank','escape'=>false,'title'=>'Edit Assessment')); ?>
            
                    &nbsp;
                    
  <?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete Assessment/Report",'class'=>'borderzero'))
, array('action' =>'delete', $session_id)
, array('title' => 'Delete Assessment/Report')
, sprintf('Are you sure you want to delete this report: %s?', $test['Test']['series_type']." ".$test['Test']['book_type'])
, false);

//echo $html->link('Edit', array('action'=>'edit', 'id'=>$category['Category']['id'])); ?>					</td>  
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
		<br /> There are currently no report records.<br/><br/></p>";
    }
    ?>
        
        
		