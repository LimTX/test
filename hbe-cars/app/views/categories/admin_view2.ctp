    <div class="alpha-content">
	<p>HOME &gt; ADMINISTRATION PANEL &gt; CATEGORIES</p>
    <h1>Categories</h1>
    <br />
    <p>This section allows you to view Category.</p>
    <h3><?php echo $category['Category']['name'] ?></h3>
        <p><small>Created: <?php echo date('d.m.Y', strtotime($category['Category']['created'])); ?></small> &#124;
    <small>Last Modified: <?php echo date('d.m.Y', strtotime($category['Category']['modified'])); ?></small>
    </p>
    <?php if(!empty($category['Category']['image'])) { ?>
    <br />
    <?php echo $html->image('sets/big/'.$category['Category']['image'])?>
    <br />
    <?php } ?>
    <br />
    <p><?php echo $category['Category']['description']?></p>
    <br />
    
    <div class="sumybutton">
    <a href="javascript:void(0);" onclick="history.back(); return false;">Back</a>
    </div>
    
    </div>
   
    <?php echo
    $this->element('admin_sidenav');
    ?>