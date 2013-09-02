<div class="beta-content">

<h5 style="padding-bottom:8px; color:#6d6e71; font-weight:normal;">Global Configuration</h5>
            <ul id="example2">
                <li>
                    <a href="#">Account Manager</a>
                    <ul>
                        <li>
     
   <?php echo $html->link(__('User Accounts', true), array('controller' => 'customers', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   							
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Content Manager</a>
                    <ul>
                        <li>
   <?php echo $html->link(__('Categories', true), array('controller' => 'categories', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   <?php echo $html->link(__('Products', true), array('controller' => 'products', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   <?php echo $html->link(__('Suppliers', true), array('controller' => 'suppliers', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   <?php echo $html->link(__('What\'s On', true), array('controller' => 'whatsons', 'action' => 'admin_index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   <?php echo $html->link(__('Content Menu', true), array('controller' => 'nonfunctions', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
   <!-- <a style="background-image:url(../img/ha-header.png);" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suppliers</a>				-->																										
															
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Advertisement Manager</a>
                    <ul>
                        <li>		
                        
                        
                        													
  <?php echo $html->link(__('Advertisements', true), array('controller' => 'advertisements', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Order Manager</a>
                    <ul>
                        <li>
 <?php echo $html->link(__('Items Ordered', true), array('controller' => 'orders', 'action' => 'index'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>
                        </li>
                    </ul>
                </li>
            </ul>
   </div>
   