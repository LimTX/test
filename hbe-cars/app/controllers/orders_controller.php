<?php
class OrdersController extends AppController {

    var $name = 'Orders';	
	var $uses = array('Order', 'Cart','Customer');	
	
	var $helpers = array('Html', 'Form', 'Session','Text');
		
	var $components = array("Email","Session","Password");

	
	var $paginate = array('limit' => 5, 'page' => 1,'order'=>array('Order.modified' => 'desc')); 
	
	function admin_search() {
		
		$this->Order->recursive = 0;
		if ($this->data['Order']['search_text4']) {
			$this->set('orders', 
			$this->paginate('Order', array('AND' => array('Order.keypass LIKE' => '%' . 
        $this->data['Order']['search_text4'] . '%')))); 
		}
		else {
			$this->set('orders', $this->paginate());
		}
			
	$this->layout = 'admin';
	
	}
	
	function checkout() {
		//Debugger::dump($this->passedArgs['sid']);
		//$data = explode('_', $data);
		$this->layout = 'checkbase';
	}
	
	function admin_index() {
			
	$this->layout = 'admin';
	
	$this->paginate = array('recursive' => 2, 'order' => 'Order.id desc');
			
			$data = $this->paginate('Order');			
			
			$this->set('orders',$data);
		
	//$this->set('orders', $this->paginate('Order'));
	
    //$custJoNames = $this->Order->find('all', array('recursive' => 2));

	//$this->set(compact('custJoNames'));  

	}
	
	function admin_edit($id = null){
		$this->layout = 'admin';
			
			$this->Order->id = $id;
		
			//
				if (empty($this->data)) {
					$this->data = $this->Order->read();
					
						
					$this->paginate = array('conditions' => array('Order.id' => $id));
					$data = $this->paginate('Order');			
					$this->set('orders',$data);
			
					
				} else {
					
					//$upload = $this->Post->findById($id);
   					//$this->Image->delete_image($upload['Post']['image'],"sets");
					
					$this->Order->create();
				if ($this->Order->save($this->data)) {
	
					
					$this->Session->setFlash('<p>Your order record has been updated.</p><br/>');
					$this->redirect(array('controller' => 'orders', 'action' => 'index'));
							 }
				}
	}
	
	function status() {
			$this->layout = 'admin';
			$this->paginate = array('conditions' => array('customer_id' => $this->Auth->user('id')), 'order' => 'Order.id desc');
			$data = $this->paginate('Order');			
			$this->set('orders',$data);
	}
	
	function order_detail($keypass = null) {
			$this->Order->keypass = $keypass;	
			$this->layout = 'admin';
			$this->paginate = array('conditions' => array('keypass' => $keypass));
			$data = $this->paginate('Order');			
			$this->set('orders',$data);
	}
	
	function admin_order_detail($keypass = null) {
			$this->Order->keypass = $keypass;	
			$this->layout = 'admin';
			$this->paginate = array('conditions' => array('keypass' => $keypass));
			$data = $this->paginate('Order');			
			$this->set('orders',$data);
	}
	
	function complete() {
			App::import('Helper', 'Text');
       	    $text = new TextHelper();
			$orders = $this->data;
			
			$this->layout = 'default';
			$newCartkeyAct = $this->Session->read('Cart.keypass');
			
			if(empty($newCartkeyAct)) {
	 		$newCartkeyAct = $text->truncate("g6bce077".$this->sid,
    '10',
    '',
    true
    );	
			}
			
			$this->data['keypass'] = $newCartkeyAct;
			$this->data['cart_ct_session_id'] =  $this->sid;
			$this->data['customer_id']	= $this->Auth->user('id');
			$this->Order->save($this->data);
			
			$lastOrderID = $this->Order->getLastInsertId();
			
			$this->Order->Cart->updateAll(
   			array('order_id' => $lastOrderID),
  			array('ct_session_id' => $this->sid, 'keypass' => $this->Session->read('Cart.keypass'))
   			);

			$newkey = substr(md5(uniqid(mt_rand(), true)), 0, 10);
						
			$cartKey = $this->Session->write('Cart.keypass', $newkey);
		    $this->Session->read('Cart.keypass', $cartKey);
			
			//Debugger::dump($this->Session->read('Cart.keypass', $cartKey));
			//Debugger::dump($this->Order->getLastInsertId());
			
			$newCartkey = $this->Password->generatePassword(); 
			$newCartkeyAct = $this->Session->write('Cart.keyypass', $newCartkey);
			$newCartkeyAct = $this->Session->read('Cart.keyypass', $newCartkey);
						
			$this->Order->Cart->updateAll(
   			array('process' => "'Paid'"),
  			array('ct_session_id' => $this->sid)
   			);
		
			$this->Order->Cart->updateAll(
			array('Cart.Keypass' => "'$cartKey'"),
			array('ct_session_id' => $this->sid,'keypass' => "'$newkey'")
			);
			
			// START OF EMAIL

            $fu = $this->Order->find('first',array('conditions'=>array('Order.id'=>$lastOrderID)));
            //Debugger::dump($lastOrderID);
			
			 if($fu)
                {					
						$clientname =  $fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname'];
						$clientemail = $fu['Customer']['customers_email_address'];
						$clientdate =  $fu['Order']['created'];
						$clientkeypass =  $fu['Order']['keypass'];
						$clientaddress =  $fu['Customer']['customers_address'];
						//Debugger::dump($clientdate);
                        //$this->Customer->id= $fu['Customer']['id'];
						
						$this->Email->smtpOptions = array(
						'host' => 'ssl://smtp.gmail.com',
						'port' => 465,
						'username' => 'sumykids@gmail.com',
						'password' => 'passwordz',
						);
					 
						$this->Email->from = 'The SumyKids Team <sumykids@gmail.com>';
   					    $this->Email->to = "'".$fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname']."<".$fu['Customer']['customers_email_address'].">'";
   					    $this->Email->subject = 'Your Sumykids\' Order';
						$this->Email->template = 'receipt';
                        $this->Email->sendAs = 'both';
					    $this->Email->delivery = 'smtp';
					  	
						$this->set('clientemail', $clientemail);
						$this->set('clientname', $clientname);
						$this->set('clientdate', $clientdate);
						$this->set('clientkeypass', $clientkeypass);
						$this->set('clientaddress', $clientaddress);
						$this->set('fu', $fu);
						
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
				}
			
			// END OF EMAIL
		
	}
	
	function datetimestamp() {
	return $this->Order->find('all', array('conditions' => array('cart_ct_session_id' => $this->sid), 'limit'=> 1, 'order' => 'Order.modified desc'));
	}
	
	function confirm() {
		
		//Debugger::dump($this->data['Order']['cts']);
			$orders = $this->data;
			$this->layout = 'default';
			$sessionId = $this->passedArgs['ct_session_id'];
			$this->set('data', $sessionId );
			$totalUsers = $this->Cart->find('all', array(
			'conditions'=>array('Cart.ct_session_id'=>$sessionId,'Cart.process'=>'UnPaid'), 'recursive' => 1 
			));
			$carts = $this->Cart->find('all', array(
			'conditions'=>array('Cart.ct_session_id'=>$sessionId,'Cart.process'=>'UnPaid'), 'recursive' => 1 
			));
			$this->set(compact('carts', 'orders','totalUsers'));
	}
		
	function subTotal($ids) {
	
	}
	
	function beforeFilter() {
	
		//Debugger::dump($this->Session->read('Cart.keyypass'));

	
		parent::beforeFilter();
	
        if ($this->action == 'complete')
        {
            $this->data['keypass'] = $this->Session->read('Cart.keyypass');
			$this->data['cart_ct_session_id'] =  $this->sid;
			$this->data['customer_id']	= 1;
			$this->Order->save($this->data);
        } 
	}
	
}
?>