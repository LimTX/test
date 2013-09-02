<?php
    class ClassroomsController extends AppController {
    	var $name = 'Classrooms';
		var $uses = array('Classroom','Account');
		
		var $helpers = array('Html', 'Form', 'Session');
		
		var $components = array("Email","Session","Image","RequestHandler","Password");
				
		var $paginate = array('limit' => 10, 'page' => 1,'order'=>array('Classroom.name' => 'asc')); 
		////////////
		////////////
		
		function admin_search() {
			
			$searchQuery = null;
		if (isset($this->params['url']['search_text'])) {
			$searchQuery = $this->params['url']['search_text'];
		} elseif (isset($this->params['pass'][0])) {
			$searchQuery = $this->params['pass'][0];
		}
		
		 elseif ($this->params['url']['search_text'] == 0) {
			$searchQuery = 0;
		}
		
		 else {
			$searchQuery;
		} 
	
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='classrooms'>Class</a><div class='breadcrumb_divider'></div><a class='current'>Search Class</a></article>";
			
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->pageTitle= 'CARS & STARS Online / Class';
		
		//CHECK WHETHER IS SUPERADMIN OR SCHOOLADMIN
		
		if($this->Auth->user('customers_roles') == "superadmin") {
		
		if ($searchQuery != "") {
		
		$totalSchools = $this->Classroom->find('count', array('conditions' => array('Classroom.name LIKE' => '%'. $searchQuery .'%')));
		
		} else {
		
		$totalSchools = $this->Classroom->find('count', array('conditions' => array('Classroom.name LIKE' => ''. $searchQuery .'')));
		
		}
						
		$this->Classroom->recursive = 0;
		if ($searchQuery) {
			$this->set('classrooms', $this->paginate('Classroom', array('Classroom.name LIKE' => '%' . $searchQuery . '%')));
			
		}
		else {
		$this->paginate = array(
    	'limit' => 10,
   	    'order' => array('name' => 'ASC'));
		}
		
		} else {
			
			if ($searchQuery != "") {
			
		$totalSchools = $this->Classroom->find('count', array('conditions' => array('Classroom.name LIKE' => '%'. $searchQuery .'%','Classroom.school_id' => $this->Auth->user('school_id'))));
			
			} else {
				
				$totalSchools = $this->Classroom->find('count', array('conditions' => array('Classroom.name LIKE' => ''. $searchQuery .'','Classroom.school_id' => $this->Auth->user('school_id'))));
			
			}
		
		$this->Classroom->recursive = 0;
		if ($searchQuery) {
			$this->set('classrooms', $this->paginate('Classroom', array('Classroom.name LIKE' => '%' . $searchQuery . '%','Classroom.school_id' => $this->Auth->user('school_id'))));
			
		}
		else {
		$this->paginate = array(
    	'limit' => 10,
   	    'order' => array('name' => 'ASC'));
		}
		
		}
		$this->set('totalSchools', $totalSchools);

		// END OF CHECK WHETHER IS SUPERADMIN OR SCHOOLADMIN

		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Search Class</a></article>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->layout = 'admin_student';
	}
		
		
		////////////
		////////////
		
		function admin_index() {
			
			$this->pageTitle= 'CARS & STARS Online / Class';
			
			//CHECK WHETHER IS SUPERADMIN OR SCHOOLADMIN
			
			if($this->Auth->user('customers_roles') == "superadmin") {
			
			$totalSchools = $this->Classroom->find('count');
		
			$this->set('totalSchools', $totalSchools);
						
			$this->set('classrooms', $this->paginate('Classroom'));
			
			} else {
			
			$totalSchools = $this->Classroom->find('count', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id'))));
		
			$this->set('totalSchools', $totalSchools);
						
			$this->set('classrooms', $this->paginate('Classroom', array('Classroom.school_id' => $this->Auth->user('school_id'))));
			
			}
			
			// END OF CHECK WHETHER IS SUPERADMIN OR SCHOOLADMIN
			
			//Debugger::dump();
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Class</a></article>";
		
		$this->set('breadcrumbs', $breadcrumbs);
			
			$this->layout = 'admin_student';
		}
		
		function admin_view($id = null) {
			$this->Classroom->id = $id;
			$this->set('Classroom', $this->Classroom->read());
			$this->layout = 'admin_student';
		}
		
		function admin_add() {
			$this->layout = 'admin_student';
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$linkclass = Router::url(array('controller' => "classrooms", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkclass."'>Class</a><div class='breadcrumb_divider'></div><a class='current'>Add Class</a></article>";
			
			$schools = $this->Classroom->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
			
			$schoolsfilter = $this->Classroom->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id'))));
									
		$this->set(compact('schools','schoolsfilter')); 
		
			$this->set('breadcrumbs', $breadcrumbs);
			
			if (!empty($this->data)) {
				$this->Classroom->create();
				
				$createdClass = $this->Classroom->find('count', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id'))));
				
				$givenClass = $this->Account->find('first', array('conditions' => array('Account.school_id' => $this->Auth->user('school_id'))));
			
				$givenClass['Account']['accessright'];
				
				///CHECK IF IT SUPER ADMIN
				if($this->Auth->user('customers_roles') == "superadmin" || $givenClass['Account']['accessright'] == "unlimited") {
					
					//unlimited access for super admin and school with unlimited access
					$this->Classroom->saveField('school_id',$this->Auth->user('school_id'));
					if ($this->Classroom->save($this->data)) {     
						$this->Session->setFlash('<h4 class="alert_success">Class has been added.</h4>');
						$this->redirect(array('controller' => 'classrooms', 'action' => 'index'));
					}
				
					
				} else {
					
					
					if ($createdClass >= $givenClass['Account']['accessright']) {
						$this->Session->setFlash('<h4 class="alert_warning">Sorry, Your subscription allows you to add up to '.$givenClass['Account']['accessright'].' classes.</h4>');			
						$this->redirect($this->referer());			
					} else {
						
						$this->Classroom->saveField('school_id',$this->Auth->user('school_id'));
					if ($this->Classroom->save($this->data)) {     
						$this->Session->setFlash('<h4 class="alert_success">Class has been added.</h4>');
						$this->redirect(array('controller' => 'classrooms', 'action' => 'index'));
					}
					
					}
					
		
				}
				
			}
			
		}
		
		function admin_delete($id) {
			$upload = $this->Classroom->findById($id);
			
			$vaildTeacher = $this->Classroom->Customer->find('count',array('conditions' => array('Customer.classroom_id LIKE' => '%'.$id.'%')));
			
			if ($vaildTeacher > 0) {
			
			$this->Session->setFlash('<h4 class="alert_error">There are students or teachers assigned to '.$upload['Classroom']['name'].'. Please reassign the students or teachers first.</h4>');
		$this->redirect(array('controller' => 'classrooms', 'action' => 'index'));
			
			} else {
				
			$this->Classroom->delete($id);
			$this->Session->setFlash('<h4 class="alert_success">Class: '.$upload['Classroom']['name'].' has been deleted.</h4>');
			$this->redirect(array('controller' => 'classrooms', 'action' => 'index'));
				
			}
		
		}
		
		function admin_edit($id = null) {
			
			$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$linkclass = Router::url(array('controller' => "classrooms", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkclass."'>Class</a><div class='breadcrumb_divider'></div><a class='current'>Edit Class</a></article>";
			
			$this->set('breadcrumbs', $breadcrumbs);
			
			$schools = $this->Classroom->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
			
			$schoolsfilter = $this->Classroom->School->find('list');
									
		$this->set(compact('schools','schoolsfilter')); 
			
			$this->layout = 'admin_student';
			
				$this->Classroom->id = $id;
				
				if (empty($this->data)) {
					
					$this->data = $this->Classroom->read();
					
				} else {
					
					$upload = $this->Classroom->findById($id);
					
					$this->Classroom->create();
				if ($this->Classroom->save($this->data)) {
					
					$this->Session->setFlash('<h4 class="alert_success">Class has been updated.</h4>');
					$this->redirect(array('controller' => 'classrooms', 'action' => 'index'));
					
							 }
					}
			}
			
	////////////
	
		
	function teacherclasses($classid) {
						
		if ($classid != null || $classid != 0) {
		
		$classid = explode(',', $classid);
		
		}
				
		return $this->Classroom->find('all',array('conditions' => array('Classroom.id' => $classid)));
	}
		
	////////////
	
	function classnames($id) {
	$name = $this->Classroom->Customer->find('first', array('conditions' => array('Customer.id' => $id)));
	
	//Debugger::dump($name['Customer']['classroom_id']);
	
	return $this->Classroom->find('all', array('conditions' => array('Classroom.id' => $name['Customer']['classroom_id'])));
	}
	
	function classtestnames($session) {	
		
	return $this->Classroom->Test->find('all', array('conditions' => array('Test.bk_session_id' => $session),'limit' => 1));
	
	}
	
}
?>