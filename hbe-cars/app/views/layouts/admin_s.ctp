<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
  <?php echo $javascript->link('jquery_score'); ?>
  <?php echo $javascript->link('ui.core_score'); ?>
  <?php echo $javascript->link('jquery.cookie_score'); ?>
  <?php echo $javascript->link('jquery.scroll-follow_score'); ?>
  <script type="text/javascript">
   		$( document ).ready( function ()
			{
				$("#example2").scrollFollow(
					{
						speed: 1000,
						offset: 60,
						killSwitch: 'exampleLink',
						onText: 'Disable Follow',
						offText: 'Enable Follow'
					}
				);
			}
		);
   	</script>
	
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			height: 2000px;
			font-family: Georgia;
			font-size: 0.9em;
			line-height: 1.4em;
		}
		
		#example2 {
			position: relative;
			width: 180px;
			margin: 10px;
			padding: 20px 20px 20px;
			background: #eee url(/images/sfbgTile.png);
			border: 2px solid #42CBDC;
		}
		
		p {
			margin: 7px 0 0 0;
		}
		
		a {
			color: blue;
			text-decoration: underline;
			cursor: pointer;
		}
	</style>
</head>

<body style="height:1000px;">
<?php  echo $content_for_layout  ?>
</body>
</html>
