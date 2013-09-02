<?php
    class Classroom extends AppModel {	
	var $name = 'Classroom';

	var $belongsTo = array('School');
	
	var $hasMany = array('Customer','Test');
}
?>