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
<h4 class="alert_info">This section allows you to create new Class, edit or delete existing ones.</h4>
     	
        <div class="top-nav">
        
        <article class="lefty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'classrooms', 'action' => 'add'))); ?>
        <button  class="btn-primary" type="submit">Add Class</button>
        <?php echo $form->end(); ?>
        </article>
        
        <article class="righty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'classrooms', 'action' => 'search'),'class'=>'genform','id'=>'searchbox2')); ?>
       
        <button class="btn-primary" type="submit">Go!</button>
     	</article>
        
        <article class="rightysearch">
        <?php echo $form->input('search_text', array('placeholder'=>'Search Class','label' => false, 'class' => 'searchinput')); ?>
       
       <?php echo $form->end(); ?>
     	</article>
        
        </div>
        
	<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">Class Listing</h3>
         <ul class="tabs">
   			<li>
            
            <?php 
		
			echo $totalSchools;
						
			?>
            
             RECORDS</li>
		</ul>
        </header>
       <?php
   			 if(isset($classrooms) && !empty($classrooms)) {
		?> 
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th width="20%">Classroom</th> 
                    <th width="20%">Year Level</th>
                    <?php if ($admin == "superadmin") { ?>
                    <th width="25%">School</th> 
                    <?php } ?>
                    <?php //if ($admin == "superadmin") { ?>
    				<!-- <th width="15%">Created On</th> 
                    <?php // } else { ?>
                    <th>Created On</th>  -->
                    <?php // } ?>
                    <?php if ($admin == "superadmin") { ?>
    				<th width="25%">Modified On</th> 
                    <?php } else { ?>
                    <th width="25%">Modified On</th> 
                    <?php } ?>
    				 <?php if ($admin == "superadmin") { ?>
    				<th width="10%">Actions</th> 
                    <?php } else { ?>
                    <th width="10%">Actions</th> 
                    <?php } ?>
				</tr> 
			</thead> 
            <tbody> 
			<?php foreach ($classrooms as $classroom){ ?>
				<tr> 
   					<td>
<div style="height:20px; display:inline-block; padding-top:10px; padding-bottom:10px; vertical-align:middle;">

<?php echo $classroom['Classroom']['name']; ?></div>			</td> 
<td>
<?php echo $classroom['Classroom']['year_level']; ?>
</td>
<?php if ($admin == "superadmin") { ?>
<td>
<?php echo $classroom['School']['name']; ?>
</td>
<?php } ?>
<!-- <td>
<?php //echo date('d/m/Y', strtotime($classroom['Classroom']['created'])); ?>
		</td>  -->
        <td>
<?php  $date = date('d-m-Y', strtotime($classroom['Classroom']['modified']));
	   $time = date('h:i:s A', strtotime($classroom['Classroom']['modified']));
	   echo $date." ".$time.""; ?>
		</td> 
       <td> <?php 
	echo $html->image("edit.png", array(
"title" => "Edit Class",'class'=>'borderzero',
'url' => array('action'=>'edit', 'id'=>$classroom['Classroom']['id'])));
	
 ?>&nbsp;
    <?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete Class",'class'=>'borderzero'))
, array('action' =>'delete', $classroom['Classroom']['id'])
, array('title' => 'Delete Class')
, sprintf('Are you sure you want to delete this Class: %s?', $classroom['Classroom']['name'])
, false);
 ?>
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
    } else if (empty($this->params['url']['search_text'])) {
		
			
       echo "<p style='margin-left:20px;'>
		
		
		<br /> Your search <strong>'"." "."'</strong> did not match any Class records. <br/><br/></p>";	
		
			
		} else {
		
		
        echo "<p style='margin-left:20px;'>
		
		
		<br /> Your search <strong>'".$this->params['url']['search_text']."'</strong> did not match any Class records. <br/><br/></p>";
    } 
    ?>
        
        
		