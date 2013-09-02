<?php
$advertisements = $this->requestAction('/advertisements/advertisement');
foreach($advertisements as $advertisement) {
echo $advertisement['Advertisement']['advert']."<br/>";
}
?>
