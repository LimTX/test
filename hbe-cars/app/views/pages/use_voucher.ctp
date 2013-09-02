<div class="alpha-content"  style="width:60%">
<p>HOME &gt; <span style="text-transform:uppercase;">Use Voucher</span></p>
<Br />
<div class="titleBar">
   <h1>Use Voucher</h1>
   </div>    
    <p>
  <?php
$nonfunctions = $this->requestAction('/nonfunctions/usevoucher');
foreach($nonfunctions as $nonfunction) {
echo $nonfunction['Nonfunction']['content'];
}
?>
</p>
   	</div>
    
      <div class="beta-content" style="padding-bottom:0px;">
 <?php echo
    $this->element('advertisement');
    ?>
           <span style="color:white;">     <?php $session->flash();  ?>  </span>
    </div>