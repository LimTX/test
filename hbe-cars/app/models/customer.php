<?php
class Customer extends AppModel
{
    // Mainly for PHP4 users
    var $name = 'Customer';
	var $hasMany = array('Order','Test'); 
	
	var $belongsTo = array
(
    'StudentExtra'=>array
    (
       'className'  => 'Customer',
       'foreignKey' => 'customers_teacher_id'
    ),'School','Classroom'
);

   /**
   
    function getTeacherName($id) {
        $id = (int) $id;
        $sql = "SELECT customers_name FROM customers WHERE ID = (SELECT CUSTOMERS_TEACHER_ID FROM customers WHERE ID = $id)";
       	 return $this->query($sql);
		}
	
	 var $validate = array(
        'customers_firstname' => array('rule' => '/.+/'),
        'customers_lastname' => array('rule' => '/.+/'),
        'customers_dob' => array('rule' => '/.+/'),
        'customers_email_address' => array('rule' => 'isUnique','message'=>'This email has already been registered.'),
		'customers_password' => array('rule' => '/.+/'),
		'customers_telephone' => array('rule' => '/.+/'));
	**/
	
	//BEFORE SAVING CHECKING THE EMAIL UNIQUENESS
	
	/*
	
	var $validate = array(
        'customers_email_address' => array('rule' => 'isUnique','message'=>'This email has already been registered.'),
        'customers_sid' => array('rule' => 'isUnique','message'=>'This ID has already been registered.')
		);
	
	*/
	
	/** function beforeSave() {
		 /**
		 if($this->data['Customer']['customers_password'] == $this->data['Customer']['customers_password']) {
       		$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
		 }
      return TRUE;
	  	  //$this->hashPasswords(NULL, TRUE);
		  
	} **/
	 
	/**
	function hashPasswords($data) {
		if(isset($this->data['Customer']['customers_password'])) {
	$this->$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], NULL, TRUE);
		return $data;
		}
		return $data;
	}
	
	**/

}
?>