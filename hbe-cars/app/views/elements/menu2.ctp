 <ul id="cat">
            <li>
            <?php
                    echo $html->link(   'Home',
                                        '/' );
                ?>
            </li>								
            <li>
            <a href="#">To Do</a>
<ul class="subcat">
<?php $categories = $this->requestAction("/categories/menu/c:$catId/p:$pdId/");
foreach ($categories as $category) {
	extract($category);
	// now we have $id, $parent_id, $name
	
	$level = ($parent_id == 0) ? 1 : 2;

    $url   = '#'; /** '/carts/generate/cat_id:' . $id;	**/

	// for second level categories we print extra spaces to give
	// indentation look
	if ($level == 2) {
		$name = "~~~" . $name;
	}
	
	// assign id="current" for the currently selected category
	// this will highlight the category name
	$listId = '';
	if ($id == $catId) {
		$listId = ' id="current"';
	}
?>
<li<?php echo $listId; ?>><?=$html->link($name, $url);?></li>
<?php
}
?>
</ul>
<li>
            <?php
                    echo $html->link(   'About Us',
                                        '/pages/about_us' );
                ?>
            </li>
            <li>
            <?php
                    echo $html->link(   'We Love',
                                        '/#' );
                ?>
            </li>
            <li>
            <?php
                    echo $html->link(   'Competitions',
                                        '/#' );
                ?>
            </li>
            <li>
            <?php
                    echo $html->link(   'Contact',
                                        '/#' );
                ?>
            </li>							
            </ul>