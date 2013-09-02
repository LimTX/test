<style>
.main-wrapper {
    min-height: 20px;
    overflow: auto;
    padding: 10px;
    width: 650px;
	margin:0 auto;
}

.wrapper {
	border:1px solid #f0f0f0;
	border-radius: 5px 5px 5px 5px;
	-moz-border-radius: 5px;
 	-webkit-border-radius: 5px;
    font-family: Helvetica,Arial,sans-serif;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    min-height: 20px;
    overflow: auto;
    padding: 10px;
    width: 520px;
	margin:0 auto;
}

.loginpanel {
	border-radius: 5px 5px 5px 5px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    color: #fff;
	font-family: 'Maven Pro',sans-serif;
	font-size:32px;
	text-align:center;
	padding-top:22px;
	padding-bottom:20px;
	text-decoration: none;
    min-height: 335px;
    overflow: hidden;
    position: relative;
    width: 520px;
	background-color: white;
}
</style>
<div class="main-wrapper">

<div class="wrapper">
    <div class="loginpanel">
    
    <?php echo $html->link('CARS & STARS Online', '/customers/login', array('style'=>'font-size:32px;color:white;text-decoration:none;')); ?>

    <br />
    <br />
      
       <div style="padding:20px; line-height:1.2em;">
   <p><strong>Did you know that your Internet Explorer is out of date?</strong></p>
   
   <p style="display:block; padding:10px 0px;">We built CARS and STARS Portal using the latest techniques and technologies. This makes CARS and STARS Portal faster and easier to use. Unfortunately, your browser doesn't support those technologies.<br/><br/>
   Download one of these great browsers and you'll be on your way <br/><br/>
   
   
   <?php 
   
    echo $html->link(
    $html->image("safari.jpg", array("alt" => "Download Apple Safari", 'class'=>'borderzero')),
    "http://www.apple.com/safari/",
    array('escape' => false)
	);
   
   ?>
    
   &nbsp;&nbsp;
   
   <?php 
   
    echo $html->link(
    $html->image("firefox.jpg", array("alt" => "Download Mozilla Firefox", 'class'=>'borderzero')),
    "http://www.mozilla.org/en-US/firefox/fx/#desktop",
    array('escape' => false)
	);
   
   ?>
   
   &nbsp;&nbsp;
   
   <?php 
   
    echo $html->link(
    $html->image("chrome.jpg", array("alt" => "Download Google Chrome", 'class'=>'borderzero')),
    "https://www.google.com/intl/en/chrome/browser/?hl=us",
    array('escape' => false)
	);
   
   ?>
   
   &nbsp;&nbsp;
   
   <?php /*?> <?php
   
    echo $html->link(
    $html->image("ie.jpg", array("alt" => "Download Internet Explorer", 'class'=>'borderzero')),
    "http://windows.microsoft.com/en-AU/internet-explorer/download-ie",
    array('escape' => false)
	);
   
   ?><?php */?>
   
   <?php 
   
    echo $html->link(
    $html->image("ie.jpg", array("alt" => "Download Internet Explorer 9", 'class'=>'borderzero')),
    "http://windows.microsoft.com/en-US/internet-explorer/downloads/ie-9/worldwide-languages",
    array('escape' => false)
	);
   
   ?>
   <br/><br/>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/downloads/ie-9/worldwide-languages">Click here to download Internet Explorer 9</a>
   
   <br/><br/>Not sure how? <a href="http://browser-update.org/update.html">Learn how to update your browser</a>
   </p>
  
    </div>    
    
    </div>
    
</div>

 <div class="copyright">
    <br />
    	Copyright &copy; 2013 Hawker Brownlow Education. All Rights Reserved.
    <br />
</div>

</div>