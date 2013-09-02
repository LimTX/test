<script type="text/javascript">
$(window).load(function(){
   function show_popup(){
      $(".alert_success").slideUp(800);
	  $(".alert_error").slideUp(800);
	  $(".alert_warning").slideUp(800);
   };
   window.setTimeout( show_popup, 2000 ); // 2 seconds
})
</script>
<br /><br/><br /><br/><br /><br/><br />
<?php $session->flash(); ?>
<br /><br />
<h4 class="alert_info">This section allows you to adjust your settings.</h4>

<article class="module width_full">

<header><h6>Settings</h6></header>
            
<?php
echo $form->create(null, array('url' => array('controller' => 'customers', 'action' => 'settings'),'class'=>'cmxform','id'=>'form2','type' => 'file'));
?>	<div style="float:left; width:7%;">
    &nbsp;
    </div>
    <div style="float:left; width:100%;">
    <table width="100%" style="float:right;" cellspacing="10" border="0">
    <tr>
    <td width="22%" valign="top" style="text-align:right;">
    </td>
    <td>
    <p><?php echo $html->image("warning.png", array('style'=>'margin-bottom:-2px;')); ?><small> Fields marked <span class="red">*</span> are required.</small></p>
    </td>
    </tr>
     <tr>
    <td  valign="top" style="text-align:right;"><p>CSV <span class="red">*</span></p></td>
    <td>
    <?php echo $form->file('CSV'); ?>
    </td>
    </tr>
     <tr>
    <td valign="top" style="text-align:right; padding-bottom:20px;"><p> </p></td>
    <td>    
    <button onclick="history.back(); return false;" class="btn-sec" style="width:71px;" type="submit">Back</button>
	<button class="btn-primary" type="submit">Submit</button>
    <?php echo $form->end(); ?>
    </td>
    </tr>
    </table>
    </div>
    <br clear="all" /> 
    <br /><br />
</article>
<div class="spacer"></div>