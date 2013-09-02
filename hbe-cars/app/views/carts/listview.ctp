<?php

	if ($pdId) {
	} else if ($catId) {
		echo $this->element('products');	
	} else {
		echo $this->element('categories');	
	}	
?>