<script type="text/javascript">

function writeCookie(name,value,days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires=" + date.toGMTString();
            }else{
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    for(i=0;i < ca.length;i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return '';
}
								
$(document).ready(function(){
	
if ($.browser.webkit) {
	$("#low").css( "paddingTop","4px" );
	$("#high").css( "paddingTop","4px" );
	$("#sortby").css( "paddingTop","5px" );
	$("#prodno").css( "paddingTop","5px" );
  }


var lol;
lol = readCookie('sessionId');

if (lol == "yes") {
	$('#low').show();
	$('#high').hide();
	}
	else if (lol == "no") {
	$('#high').show();
	$('#low').hide();
}

$('#high').click(function() {
	
	var sId = 'yes';
	writeCookie('sessionId', sId, 3);
	lol = readCookie('sessionId');
	
    if (lol == "yes") {
	$('#high').show();
	$('#low').hide();
	}
	else {
	$('#low').show();
	$('#high').hide();
	}
	
});

$('#low').click(function() {
	
	var sId = 'no';
	writeCookie('sessionId', sId, 3);
	lol = readCookie('sessionId');
	
    if (lol == "no") {
	$('#high').hide();
	$('#low').show();
	}
	else {
	$('#low').hide();
	$('#high').show();
	}
	
});

});

</script>
<div class="alpha-content">
<?php 

$paginator->options(array('url'=>$this->passedArgs));

$categories = $this->requestAction("/categories/getCategoryName");	
foreach($categories as $category) { ?>
<p>HOME &gt; CATEGORIES &gt; <span style="text-transform:uppercase;"><?php echo $category['Category']['name']; ?></span></p>
<br />
<div class="titleBar">
   <h1><?php echo $category['Category']['name']; ?></h1>
   </div>
<?php
    if(isset($products) && !empty($products)) {
				
       ?>
              <p>This section allows you to view a list of products.</p><br />

 <table id="newspaper-a" summary="Product">
 <thead>
    	<tr>
            <th id="bgth" colspan="2" align="right" scope="col">
          <div id="prodno"><?php echo $totalProducts." Result(s)"; ?></div>
            <div id="high">
            <?php echo $paginator->sort('Price (Lowest to Highest)', 'price', array('price' => 'Price (Lowest to Highest)','class' => 'normalTip')); ?>
            </div>  
            <div id="low">
            <?php echo $paginator->sort('Price (Highest to Lowest)', 'price', array('price' => 'Price (Highest to Lowest)','class' => 'normalTip')); ?>
            </div> 
             <div id="sortby">
            Sort By:
            </div> 
            </th>
        </tr>
    </thead>
    <tbody>
    <!-- Here is where we loop through our $category array, printing out category info -->
	<?php foreach ($products as $product): ?>

    <tr>
    <td>
	 <?php echo $html->image('sets/small/'.$product['Product']['image'], array('class' => 'drop-shadow-small'))?>
	<div style="float:right; padding-left:10px; width:75%;">
    <p><?php echo $html->link($product['Product']['name'],"/products/view/cat_id:$catId/pd_id:".$product['Product']['id'] ); ?><br/>
	
    <?php
    echo $text->truncate($product['Product']['description'],
    90,
    ' ...',
    false
    );
    ?>&nbsp; <br/><small><?php echo $html->link('Read More>>', "/products/view/cat_id:$catId/pd_id:".$product['Product']['id'] );  ?></small>
	<br/><strong>Location:</strong>&nbsp;<?php echo $product['Product']['suburb'] ; ?>
    	</p>
	</div>
    </td>
	<td width="15%" align="center" style="color:#a2b420;">
	<big style=" font-size:18px;">$<strong><?php echo $product['Product']['price'] ; ?></strong></big>
    </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
    
    <br />

    <div class="center">
    <?php 				$paginator->options(array('url' => $this->passedArgs )); ?>
    <p><?php echo $paginator->numbers(); ?></p> 
    <br />
    <p><small>Showing Page <?php echo $paginator->counter(); ?></small><p>
    </div> 
	<br />
       
       <?php
    } else {
        echo "<p>Sorry! There are currently no products found in the ".$category['Category']['name'].".</p>";
    }
    ?>

<?php } ?>
</div>

       <?php echo
    $this->element('sidenav');
    ?>
	
     <?php echo
    $this->element('advertisement_small');
    ?>
	
     </div>