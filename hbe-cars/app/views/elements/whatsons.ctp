<div class="alpha-home-content" style="border:0px #999999 solid; position:relative; z-index:3; top:-40px; padding-bottom:0px; width:98%;">
<div style="padding-bottom:10px;"><h1>What's On</h1></div>
<?php $whatsons = $this->requestAction('/whatsons/whatsons');
foreach($whatsons as $whatson) { ?>
<div style="padding-right:0px; width:296px; float:left; border:0px #999999 solid;">
<?php echo $html->image('sets/big/'.$whatson['Whatson']['image'], array('style'=>'width:222px;','class' => 'drop-shadow')) ?>
<p style="font-weight:bold;"><?php echo $whatson['Whatson']['name'] ?></p>
<div style="width:250px"><p>  <?php
    echo $text->truncate($whatson['Whatson']['description'],
    110,
    ' ...',
    false
    );
    ?></p></div>
    <div style="float:left; text-align:right; width:250px;"><?php echo $html->link('Read More>>', "/whatsons/view/".$whatson['Whatson']['id'] , array('class'=>'readmore'));  ?></div>
</div>
<?php } ?>
</div>