<?php
class AppController extends Controller {
		
    // default page title
    var $pageTitle = 'CARS & STARS Online';
	var $catId;
	var $pdId;
	var $sid;
				
	var $uses = array('Product','Category');
	    
    // The view helpers that we'll use globally
    var $helpers = array( 'Form', 'Html',  'Session', 'Javascript');
    
    // Componenets that we'll often use
    var $components = array('Session', 'RequestHandler', 'Shop', 'Auth');
	
	function beforeFilter() {
				
		$this->RequestHandler->setContent('json', 'text/x-json');
	
        if ($this->action == 'complete')
        {
			$newCartkey =  0;
            $this->data['keypass'] = $this->Session->read('Cart.keyypass', $newCartkey);
			$this->data['cart_ct_session_id'] =  $this->sid;
			$this->data['customer_id']	= 1;
			$this->Order->save($this->data);
        } 
    
		$this->Auth->authorize = 'controller';
			
		$this->Auth->userModel = 'Customer';
		$this->Auth->autoRedirect = false;
		$this->Auth->fields = array('username' => 'customers_email_address', 'password' => 'customers_password');
		//Auth Control
		//$this->Auth->allow = array('admin' => true,'controller' => 'products', 'action' => 'index');
		$this->Auth->loginAction = array('admin' => false, 'controller' => 'customers', 'action' => 'login');
		
		$this->Auth->allow('studentlogin','scoring','browser','search','invitation','menu','index','latestlists','cat','subcat','view','getProdCategoryName','getSubCategoryName','getCategoryName','cartnum','getMiniCart','getCartNum','getCart','addon','captcha','updates','remove','checkout','beforeFilter','datetimestamp','adv_search','forgetpwd','reset','advertisement','advertisement_small','order_detail','admin_order_detail','cust_order','whatsons','whatson_sidenav','listwhatsons','doUpdates','display', 'aboutus','latest','usevoucher','contactus','featured','register','subauth','register_process');
		$this->Auth->authError = "<p style='color:red;'>Please login to view that page.</p>";
		$this->Auth->loginError = "<p style='color:red;'>Wrong Username/Email and Password combination.</p>";
		$this->Auth->loginRedirect = array('controller' => 'carts', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'customers', 'action' => 'login');
			
		$this->getNamedArgs(); 
		
		if ( isset( $this->passedArgs['cat_id'] ) && (int)$this->passedArgs['cat_id'] != 1 )  {
				$this->catId = (int)$this->passedArgs['cat_id'];
		} else {
				$this->catId = 0;
		}
		if ( isset( $this->passedArgs['pd_id'] ) && $this->passedArgs['pd_id'] != '' )  {
				$this->pdId = (int)$this->passedArgs['pd_id'];
		} else {
				$this->pdId = 0;
		}
		
		$data = $this->Session->read();
		$this->sid = $data['Config']['userAgent'];							
		$this->set('catId', $this->catId);
		$this->set('pdId', $this->pdId);		
		$this->set('sid', $this->sid);
		$this->setPageTitle();		
		
		$this->set('admin', $this->_isAdmin());
		$this->set('logged_in', $this->_loggedIn());
		$this->set('users_username', $this->_usersUsername());
		$this->set('users_userID', $this->_usersID());
		$this->set('users_lastlogin', $this->_userslastlogin());
		$this->set('users_school', $this->_usersSchool());
		$this->set('users_class', $this->_usersClass());
		//$this->set('resume_test', $this->_resumeTest());
	}
	
	function isAuthorized() {
if ($this->action == 'admin_add' || $this->action == 'admin_edit' || $this->action == 'admin_index' || $this->action == 'admin_delete' || $this->action == 'admin_search' || $this->action == 'admin_view' || $this->action == 'admin_subcategories' || $this->action == 'admin_subcategories_add' || $this->action == 'admin_subcategories_edit' || $this->action == 'admin_subcategories_delete' || $this->action == 'admin_subcategories_view') {

if ($this->Auth->user('customers_roles') == 'admin' || $this->Auth->user('customers_roles') == 'superadmin' || $this->Auth->user('customers_roles') == 'schooladmin' || $this->Auth->user('customers_roles') == 'teacher' || $this->Auth->user('customers_roles') == 'student') {
return true;
$this->redirect(array('controller'=>'customers', 'action' => 'admin_index'));
} else {
$this->redirect(array('admin' => false, 'controller'=>'customers', 'action' => 'error'));
return false;
}

}
return true;
$this->redirect(array('controller'=>'customers', 'action' => 'admin_index'));
}
	
	function _isAdmin() {
		$admin = FALSE;
		if ($this->Auth->user('customers_roles') == 'superadmin') {
			$admin = "superadmin";
		} else if ($this->Auth->user('customers_roles') == 'schooladmin') {
			$admin = "schooladmin";
		} else if ($this->Auth->user('customers_roles') == 'teacher') {
			$admin = "teacher";
		} else {
			$admin = "student";
		}
		return $admin;	
	}
	
	function _loggedIn() {
		$logged_in = FALSE;
		if ($this->Auth->user()) {
		$logged_in = TRUE;
		}
		return $logged_in;
	}
	
	/* function _resumeTest() {
		$resume_test = NULL;
		if ($this->Auth->user()) {
		$resume_test = $this->Auth->user('resumetest');
		}
		return $resume_test;
	} */
	
	function _usersSchool() {
		$users_school = NULL;
		if ($this->Auth->user()) {
		$users_school = $this->Auth->user('school_id');
		}
		return $users_school;
	}
	
	function _usersClass() {
		$users_class = NULL;
		if ($this->Auth->user()) {
		$users_class = $this->Auth->user('classroom_id');
		}
		return $users_class;
	}
	
	function _usersUsername() {
		$users_username = NULL;
		if ($this->Auth->user()) {
		$users_userfirst = $this->Auth->user('customers_firstname');
		$users_userlast = $this->Auth->user('customers_lastname');
		$users_username = $users_userfirst ." ". $users_userlast;
		}
		return $users_username;
	}
	
	function _userslastlogin() {
		$users_lastlogin = NULL;
		if ($this->Auth->user()) {
		$users_lastlogin = $this->Auth->user('lastlogin');
		}
		return $users_lastlogin;
	}
	
	function _usersID() {
		$users_userID = NULL;
		if ($this->Auth->user()) {
		$users_userID = $this->Auth->user('id');
		}
		return $users_userID;
	}
	
	var $namedArgs = FALSE;
    var $argSeparator = ":"; 
	
	function getNamedArgs() {
        if ($this->namedArgs)
        {
            $this->namedArgs = array();
            if (!empty($this->params['pass']))
            {
                foreach ($this->params['pass'] as $param)
                {
                    if (strpos($param, $this->argSeparator))
                    {
                        list($name, $val) = split($this->argSeparator,
                                                   $param );
                        $this->namedArgs[$name] = $val;
                    }
                }
            }
        }
        return TRUE;
    } 
	
	
	 function setPageTitle() {
		if ( $this->pdId > 0 ) {
			$result = $this->Product->find('all', array('conditions'=>array('Product.id' => $this->pdId )));
			$this->pageTitle = $result[0]['Product']['name'];
		} elseif ( $this->catId > 0 ){
			$result = $this->Category->find('all', array('conditions'=>array('Category.id' => $this->catId )));
			$this->pageTitle = $result[0]['Category']['name'];
		}	 
	 }
	
}
?>