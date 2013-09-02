<?php
class Score extends AppModel
{
    var $name = 'Score';
	
    //var $hasMany = array('Customer'); 
		
	var $belongsTo = array('Customer','Test');
}
?>