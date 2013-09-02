<?php
    class SchoolsController extends AppController {
    	var $name = 'Schools';
		var $uses = array('School');
		
		var $helpers = array('Html', 'Form', 'Session');
		
		var $components = array("Email","Session","Image","RequestHandler","Password");
				
		var $paginate = array('limit' => 10, 'page' => 1,'order'=>array('School.name' => 'ASC')); 
		
		////////////
		////////////
		
		function admin_search() {
			
		$searchQuery = null;
		if (isset($this->params['url']['search_text'])) {
			$searchQuery = $this->params['url']['search_text'];
		} elseif (isset($this->params['pass'][0])) {
			$searchQuery = $this->params['pass'][0];
		} else {
			$searchQuery;
		}
			
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='schools'>School</a><div class='breadcrumb_divider'></div><a class='current'>Search School</a></article>";
			
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->pageTitle= 'CARS & STARS Online / School';
		
		if ($searchQuery != "") {
		
		$totalSchools = $this->School->find('count', array('conditions' => array('School.name LIKE' => '%'. $searchQuery .'%')));
		
		} else {
		
		$totalSchools = $this->School->find('count', array('conditions' => array('School.name LIKE' => ''. $searchQuery .'')));
		
		}
			
		$this->set('totalSchools', $totalSchools);
		
		$this->School->recursive = 0;
		if ($searchQuery) {
			$this->set('schools', $this->paginate('School', array('School.name LIKE' => '%' . $searchQuery . '%')));
		}
		else {
		$this->paginate = array(
    	'limit' => 10,
   	    'order' => array('School.name' => 'ASC'));
		}
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Search School</a></article>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->layout = 'admin_student';
	}
		
		
		////////////
		////////////
		
		function admin_index() {
			
			$this->pageTitle= 'CARS & STARS Online / School';

			$totalSchools = $this->School->find('count');
		
			$this->set('totalSchools', $totalSchools);
			
			//Debugger::dump($this->Auth->user('id'));
			
			$this->set('schools', $this->paginate('School'));
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>School</a></article>";
		
		$this->set('breadcrumbs', $breadcrumbs);
			
			$this->layout = 'admin_student';
		}
		
		function admin_view($id = null) {
			$this->School->id = $id;
			$this->set('School', $this->School->read());
			$this->layout = 'admin_student';
		}
		
		function admin_add() {
			$this->layout = 'admin_student';
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$linkschool = Router::url(array('controller' => "schools", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkschool."'>School</a><div class='breadcrumb_divider'></div><a class='current'>Add School</a></article>";
			
			$this->set('breadcrumbs', $breadcrumbs);
			
			if (!empty($this->data)) {
				$this->School->create();
				
					$this->data['School']['expiry'] = date('Y-m-d', strtotime('+1 year'));
				
				if ($this->School->save($this->data)) {
				
					//ADD ACCOUNT TYPE
					$this->School->Account->create();
					
					$this->data['Account']['school_id'] = $this->School->getInsertID();
					$this->data['Account']['accessright'] = $this->data['School']['accessright'];
					$this->data['Account']['teacher_carscombo'] = $this->data['School']['teacher_carscombo'];
					$this->data['Account']['teacher_focus'] = $this->data['School']['teacher_focus'];
					$this->data['Account']['tokenkey'] = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);			
										
					$this->School->Account->save($this->data);
					
					//END ACCOUNT TYPE
					
					$this->Session->setFlash('<h4 class="alert_success">School has been added.</h4>');
					$this->redirect(array('controller' => 'schools', 'action' => 'index'));
				}
			}
		}
		
		function admin_delete($id) {
			$upload = $this->School->findById($id);
			
			$this->School->delete($id);
			
			$account_id = $this->School->Account->find('first', array('conditions' => array('Account.school_id' => $id)));
			
			$this->School->Account->delete($account_id);
			
			$this->Session->setFlash('<h4 class="alert_success">School: '.$upload['School']['name'].' has been deleted.</h4>');
			$this->redirect(array('controller' => 'schools', 'action' => 'index'));
			
		}
		
		function admin_edit($id = null) {
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$linkschool = Router::url(array('controller' => "schools", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkschool."'>School</a><div class='breadcrumb_divider'></div><a class='current'>Edit School</a></article>";
			
				$this->set('breadcrumbs', $breadcrumbs);
			
				$this->layout = 'admin_student';
				
				
								
				$this->School->id = $id;
																
				if (empty($this->data)) {
					
					$this->data = $this->School->read();
					
				} else {
					
					$upload = $this->School->findById($id);
					
					$this->School->create();
				if ($this->School->save($this->data)) {
					
					$this->Session->setFlash('<h4 class="alert_success">School has been updated.</h4>');
					$this->redirect(array('controller' => 'schools', 'action' => 'index'));
					
							 }
					}
			}
			
			
			function schoolexpirydate($id) {
			
			$expirydate = $this->School->find('first', array('conditions' => array('School.id' => $id)));	
				
			return $expirydate['School']['expiry'];
			}
	}
?>