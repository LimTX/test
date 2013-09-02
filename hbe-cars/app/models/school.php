<?php
    class School extends AppModel {	
	var $name = 'School';
	
	var $hasMany = array('Classroom','Account');
}
?>