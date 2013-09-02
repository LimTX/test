<div class="beta-content">

<h3 style="padding-bottom:8px; padding-left:5px; font-weight:bold; color:#971526; font-weight:normal;">
<strong>Browse</strong>
</h3>
<div id="sideBar">
<ul class="subcat">
<?php 
$categories = $this->requestAction("/categories/getSubCategoryName");	
foreach($categories as $category) { ?>
<li class="sublink" style="border-bottom:1px dotted #808080; padding:10px;"><?php echo $html->link($category['Category']['name'], array('controller' => 'products','action'=>'subcat', 'cat_id'=>$category['Category']['id'], 'subcat_id'=>$category['Category']['parent_id'])); ?></li>
<?php } ?>
</ul>
</div>
<br />
   