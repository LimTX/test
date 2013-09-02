<div class="beta-content">

<h5 style="padding-bottom:8px; color:#6d6e71; font-weight:normal;">&nbsp;</h5>
            <ul id="example2">
                <li>
                    <a href="#">General Account Settings</a>
                    <ul>
                        <li>
     
<?php echo $html->link(__('Personal Information', true), array('admin'=>false,'controller' => 'customers', 'action' => 'account'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>		
   							
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Order History</a>
                    <ul>
                        <li>
                           <?php echo $html->link(__('Items Ordered Status', true), array('admin'=>false,'controller' => 'orders', 'action' => 'status'), array('style' =>"background-image:url(".$this->base."/img/ha-header.png);".'padding-left:45px;')); ?>			
                        </li>
                    </ul>
                </li>
            </ul>
   </div>
   