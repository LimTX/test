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
<h4 class="alert_info">This section allows you to create new School, edit or delete existing ones.</h4>
     	
        <div class="top-nav">
        
        <article class="lefty">
       <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'schools', 'action' => 'add'))); ?>
        <button  class="btn-primary" type="submit">Add School</button>
        <?php echo $form->end(); ?>
        </article>
        
        <article class="righty">
        <?php echo $form->create(null, array('type' => 'get' ,'url' => array('controller' => 'schools', 'action' => 'search'),'class'=>'genform','id'=>'searchbox2')); ?>
       
       <button class="btn-primary" type="submit">Go!</button>
     	</article>
        
        <article class="rightysearch">
       <?php echo $form->input('search_text', array('placeholder'=>'Search School','label' => false, 'class' => 'searchinput')); ?>
       
       <?php echo $form->end(); ?>
     	</article>
        
        </div>
        
	<article class="module width_3_quarter">
		<header>
        	<h3 class="tabs_involved">School Listing</h3>
         <ul class="tabs">
   			<li><?php
				echo $totalSchools;
			
			?> RECORDS</li>
		</ul>
        </header>
        <?php
   			 if(isset($schools) && !empty($schools)) {
		?> 
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th width="65%">School Name</th> 
    				 <th width="25%">Modified On</th> 
                    <th width="10%">Actions</th> 
				</tr> 
			</thead> 
            <tbody> 
			<?php foreach ($schools as $school){ ?>
				<tr> 
   					<td>
<div style="height:20px; display:inline-block; padding-top:10px; padding-bottom:10px; vertical-align:middle;">

<?php echo $school['School']['name']; ?></div>			</td> 
		 <td>
<?php  $date = date('d-m-Y', strtotime($school['School']['modified']));
	  $time = date('h:i:s A', strtotime($school['School']['modified']));
	  echo $date." ".$time."";
?>
		</td>  
       <td><?php 
	echo $html->image("edit.png", array(
"title" => "Edit School",'class'=>'borderzero',
'url' => array('action'=>'edit', 'id'=>$school['School']['id'])));
	
 ?>&nbsp;<?php 
	echo $html->image("config.png", array(
"title" => "Config School Account",'class'=>'borderzero',
'url' => array('controller'=>'accounts','action'=>'edit', 'id'=>$school['School']['id'])));
	
 ?>&nbsp;<?php 
echo $html->link(  $html->image("delete.png", array(
"alt" => "Delete School",'class'=>'borderzero'))
, array('action' =>'delete', $school['School']['id'])
, array('title' => 'Delete School')
, sprintf('Are you sure you want to delete this School:%s?', $school['School']['name'])
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
		
		
		<br /> Your search <strong>'"." "."'</strong> did not match any School records. <br/><br/></p>";	
		
			
		} else {
		
		
        echo "<p style='margin-left:20px;'>
		
		
		<br /> Your search <strong>'".$this->params['url']['search_text']."'</strong> did not match any School records. <br/><br/></p>";
    } 
    ?>
        
        
		