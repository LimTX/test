<?php
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
header('Content-Type: text/javascript');
header("X-JSON: ".$content_for_layout);

$callback = $_REQUEST['callback']; 
echo $callback . '(' . $content_for_layout . ')';
?>