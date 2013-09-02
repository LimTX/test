<ul id="cat">
            <li>
            <?php
                    echo $html->link(   'Home',
                                        '/' );
                ?>
            </li>								
            <li>
            <a href="#">Experience</a>
<ul class="subcat">
<?php
$categories = $this->requestAction('/categories/menu');
foreach($categories as $category) {
?>
<li><?php 

echo $html->link($category['Category']['name'], array('admin' => false,'controller' => 'products','action'=>'cat', 'cat_id'=>$category['Category']['id'])); ?></li>
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
                    echo $html->link(   'Use Voucher',
                                        '/pages/use_voucher' );
                ?>
            </li>
            <li>
            <?php
                    echo $html->link(   'Latest Offers',
                                        '/products/latest' );
                ?>
            </li>
            <li>
            <?php
                    echo $html->link(   'Contact',
                                        '/pages/contact_us' );
                ?>
            </li>							
            </ul>