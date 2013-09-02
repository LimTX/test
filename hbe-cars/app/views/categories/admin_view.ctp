<?php echo $javascript->link('content'); ?>
    <div class="alpha-content">
	<p>HOME &gt; ADMIN PANEL &gt; CATEGORIES</p>
    <h1>Categories</h1>
    <br />
    <p>This section allows you to view Category.</p>
    <h3><?php echo $category['Category']['name'] ?></h3>
        <p><small>Created: <?php echo date('d/m/Y', strtotime($category['Category']['created'])); ?></small> &#124;
    <small>Last Modified: <?php echo date('d/m/Y', strtotime($category['Category']['modified'])); ?></small>
    </p>
    <?php if(!empty($category['Category']['image'])) { ?>
    <br />
    <?php echo $html->image('sets/big/'.$category['Category']['image'], array('class' => 'drop-shadow'))?>
    <br />
    <?php } ?>
    <br />
    <?php if(!empty($category['Category']['description'])) { ?>
    <p><strong>Description</strong></p>
    <p><?php echo $category['Category']['description']?></p>
    <br />
    <?php } ?>
        <?php if(!empty($category['Category']['id'])) { ?>
         <div id="SubCategory">
             <p style="padding-bottom:8px;"><strong>Sub-Categories</strong></p>
<ul>
 <!-- <li><a href="#" style="background-color:#FFF; color:#AFAFAF; border:1px #AFAFAF solid;">SUB CATEGORIES</a></li> -->
<?php foreach ($subtags as $subtag) { ?>
 <li><a href="#"><?php echo $subtag['Category']['name']; } ?></a></li>

</ul>
</div>
<?php } ?>
<br />

 <div id="SubCategory">
             <p style="padding-bottom:8px;"><strong>Products</strong></p>
<ul>
 <!-- <li><a href="#" style="background-color:#FFF; color:#AFAFAF; border:1px #AFAFAF solid;">SUB CATEGORIES</a></li> -->
<?php foreach ($listproducts as $listproduct) { ?>
<li><a href="#"><?php echo $listproduct['Product']['name']; } ?></a></li>

</ul>
</div>
<br clear="all" /><br />
    <div class="sumybutton left">
    <a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
    </div>
     <div class="left" style="width:10px; height:40px;">&nbsp;</div>
    <div class="sumybutton left">
    
    <?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$category['Category']['id']));?>

    </div>
    
    </div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>