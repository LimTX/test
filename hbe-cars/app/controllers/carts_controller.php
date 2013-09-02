<?php
class CartsController extends AppController {
    var $name = 'Carts';
	var $uses = array('Cart');
	
	var $helpers = array('Html','Form','Ajax','Javascript', 'Text', 'Paginator');
	var $components = array('Password'); 
	
	function beforeFilter() {
	$this->Auth->allow('*');
    parent::beforeFilter();
	}
	
	function index() {
	}
	
	function listview() {
		$catyID = $this->Session->write('Category.id', $this->passedArgs['cat_id']);
	}

	function checkout() {
		$this->set('cartContents', $this->getMiniCart());	
	}
	
	/*
	Get all item in current session
	from shopping cart table
	*/
	// This renders the mini cart based on the current session id
	function getMiniCart() {	
	   return $this->Cart->getCartContent( $this->sid );
	}	
	
	function getCartNum() {	
	   return $this->Cart->getCartContentNum( $this->sid );
	}
	
	function getCart() {
		$carts = $this->Cart->find('all', array('conditions' => array('Cart.ct_session_id' => $this->passedArgs['s']),   'recursive' => 2 ));	
		if(isset($this->params['requested'])) {
			return $carts;
		}
		$this->set('carts', $carts);
	}
	
	/** function edit($id = null) {
								
		$this->Cart->id = $id;
		if (empty($this->data)) {
			$this->Cart->id = $id;
			$this->data = $this->Cart->read();
		} else {
			if ($this->Customer->save($this->data)) {
			$this->redirect(array('controller'=>'Products', 'action'=>"view/cat_id:$this->catId/pd_id:$this->pdId"));
			}
		}
	}
	**/
	
	function addon() {
	App::import('Helper', 'Text');
    $text = new TextHelper();
	$newCartkeyAct = $this->Session->read('Cart.keypass');
	
	if(empty($newCartkeyAct)) {
	 		$newCartkeyAct = $text->truncate("g6bce077".$this->sid,
    '10',
    '',
    true
    );	
	}
	$sessionData = $this->Cart->getCart($this->pdId, $this->sid,$newCartkeyAct);
	
	if (empty($sessionData)) {	
			if (!empty($this->data)) {
					$this->Cart->create();
					$this->data['Cart']['product_id'] = $this->passedArgs['pd_id'];
					$this->data['Cart']['keypass'] = $newCartkeyAct;
					$this->Cart->save($this->data);
					//Debugger::dump($this->Cart->getInsertID());
				} 
	} else {
																							
	$sql = "UPDATE carts 
		        SET qty = ".$this->data['Cart']['qty'].", process = 'UnPaid'
				WHERE ct_session_id = '".$this->data['Cart']['ct_session_id']."' AND product_id = ".$this->passedArgs['pd_id']." AND keypass = '".$newCartkeyAct."'";		
		$this->Cart->query($sql); 
		
	}
	
	//$this->Cart->cleanUp();	
	$this->redirect(array('controller'=>'Products', 'action'=>"view/cat_id:$this->catId/pd_id:$this->pdId"));
	
	}
	
	
	
	
	function add() {	
	$data = $this->Product->findById( $this->pdId );
	if( !is_array( $data ) ) {
		$this->redirect('/');	
	} else {
		// how many of this product we
		// have in stock
		if ($data['Product']['qty'] <= 0) {
			// we no longer have this product in stock
			// show the error message
			$this->Session->setFlash('The product you requested is no longer in stock');
			$this->redirect('/');	
		}
	}
	// check if the product is already
	// in cart table for this session	
	$sessionData = $this->Cart->getCart($this->pdId, $this->sid);
	if ( empty($sessionData)) {	
    	// put the product in cart table
		$this->Cart->addCart($this->pdId, $this->sid);
	} else {
		// update product quantity in cart table
		$this->Cart->updateCart($this->pdId, $this->sid);
	}
	// an extra job for us here is to remove abandoned carts.
	// right now the best option is to call this function here
	$this->Cart->cleanUp();		
	$this->redirect(array('controller'=>'Products', 'action'=>"view/cat_id:$this->catId/pd_id:$this->pdId"));
}
	
	function view() {	
		$this->layout = 'default';
		$this->pageTitle= 'Shopping Cart';
	}
	
	
	function remove() {
		$this->Cart->emptyBasket($this->passedArgs['ct_id']);		
		if( $this->Cart->isCartEmpty( $this->sid) || !empty($this->passedArgs['pd_id']) ) {		
			$this->redirect(array('controller'=>'carts', 'action'=>'index'));
		}else {
			$this->redirect(array('controller'=>'carts', 'action'=>'view'));
		}
	}	
	
	function updates() {	
		$cart = array();
		$data = $this->data;
		foreach( $data as $key => $val ) {		
			if ( is_array($val) ) continue;				
				$this->Cart->doUpdate($val, $key);
		}	
			$this->redirect(array('controller'=>'carts', 'action'=>'view'));
	}
	
	function doUpdates() {	
		$cart = array();
		$data = $this->data;
		foreach( $data as $key => $val ) {		
			if ( is_array($val) ) continue;				
				$this->Cart->doUpdate($val, $key);
		}	
			$this->redirect(array('controller'=>'orders', 'action'=>'confirm', "ct_session_id:".$this->sid));
	}
	
	function purchasedProducts() {
	//Debugger::dump($this->params["named"]["keypass"]);
	return $this->Cart->find('all', array('conditions' => array('keypass' => $this->params["named"]["keypass"])));
	}
}
?>