<?php
    class AccountsController extends AppController {
    	var $name = 'Accounts';
		var $uses = array('Account');
		
		var $helpers = array('Html', 'Form', 'Session');
		
		var $components = array("Email","Session","Image","RequestHandler","Password");
						
		////////////
		////////////
		
		function accountType($users_school) {
		
		return $this->Account->find('first', array('conditions' => array('Account.school_id' => $users_school)));
		
	}
	
	function admin_edit($id = null) {
		
			$this->pageTitle= 'CARS & STARS Online / School Account Configuration';
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$linkschool = Router::url(array('controller' => "schools", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkschool."'>School</a><div class='breadcrumb_divider'></div><a class='current'>Edit School Access Control</a></article>";
			
				$this->set('breadcrumbs', $breadcrumbs);
			
				$this->layout = 'admin_student';
				
				$schoolaccount = $this->Account->find('first', array('conditions' => array('Account.school_id' => $id)));
								
				$this->Account->id = $schoolaccount['Account']['id'];
				
				$this->loadModel('School');
										
				$schoolname = $this->School->find('first', array('conditions' => array('School.id' => $id)));
				
				$this->set('schoolname', $schoolname['School']['name']);
																
				if (empty($this->data)) {
					
					$this->data = $this->Account->read();
					
				} else {
										
					$upload = $this->Account->findById($id);
					
					$this->Account->create();
					
					$this->Account->id = $id;
					
				if ($this->Account->save($this->data)) {
					
					$this->Session->setFlash('<h4 class="alert_success">School access control has been updated.</h4>');
					$this->redirect(array('controller' => 'schools', 'action' => 'index'));
					
							 }
					}
					
		
			}
		
		
	}
?>