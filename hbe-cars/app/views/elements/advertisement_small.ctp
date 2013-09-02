<?php
$advertisements = $this->requestAction('/advertisements/advertisement_small');
foreach($advertisements as $advertisement) {
echo $advertisement['Advertisement']['advert']."<br/><br/>";
}
?>
