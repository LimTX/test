<?php
    class Post extends AppModel {	
	var $name = 'Post';
var $validate = array(
'title' => array(
'rule' => '/.+/'
),
'body' => array(
'rule' => '/.+/'
)
);	
}
?>