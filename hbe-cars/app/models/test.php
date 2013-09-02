<?php
class Test extends AppModel
{
    var $name = 'Test';
	
   // var $hasMany = array('Customer'); 
		
	var $belongsTo = array('Customer','Classroom','School');
	
	var $hasMany = array('Score');
	
	///////////////////////////////////////////////////////////////////////
	//																	 //
	//OVERWRITE PAGINATECOUNT BECUS OF THE GROUP BY AND COUNT LIMITATION //
	//																	 //
	///////////////////////////////////////////////////////////////////////
	
	function paginateCount($conditions = null, $recursive = 0) {
	
	App::import('Component', 'Session');
	$Session = new SessionComponent();

	$user_roles = $_SESSION['Auth']['Customer']['customers_roles'];
	$user_id = $_SESSION['Auth']['Customer']['id'];
	$user_schoolid = $_SESSION['Auth']['Customer']['school_id'];
	
	//Debugger::dump($user_schoolid);
	
	if ($user_roles == "superadmin") {
	
	$sql = "SELECT DISTINCT bk_session_id FROM tests";
    $this->recursive = $recursive;
    $results = $this->query($sql);
		
	return count($results); 
	
	} else if ($user_roles == "schooladmin") {
	
	$sql = "SELECT DISTINCT bk_session_id FROM tests WHERE school_id = ".$user_schoolid;
    $this->recursive = $recursive;
    $results = $this->query($sql);
		
	return count($results);
	
	} else if ($user_roles == "teacher") {
	
	$sql = "SELECT DISTINCT bk_session_id FROM tests WHERE customer_customers_teacher_id = ". $user_id;
    $this->recursive = $recursive;
    $results = $this->query($sql);
	
	return count($results);
	
	}

}

}
?>