<?php
class TestsController extends AppController {

	var $name = 'Tests';
	
	var $uses = array('Test');

	var $helpers = array('Html', 'Form', 'Session','Paginator');
	
	var $components = array("Session","Image","RequestHandler","Password");
	
	var $paginate = array('order'=>array('Test.modified' => 'ASC'));	
	
	function admin_index() {
	
		$this->layout = 'admin_student';
		
		$this->pageTitle= 'CARS & STARS Online / Assessment';
			
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='tests'>Begin New Level</a></article>";
			
		$this->set('breadcrumbs', $breadcrumbs);
	
	}
	
	function admin_report() {
		
		$this->layout = 'admin_student';
		
		$this->pageTitle= 'CARS & STARS Online / Reports';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Reports</a></article>";
			
		$this->set('breadcrumbs', $breadcrumbs);
		
		//CHECK WHETHER IS SUPERADMIN 
			
		if($this->Auth->user('customers_roles') == "superadmin") {
		
		/**/
			
    	$this->Test->recursive = 0;
        $this->paginate['Test'] = array(
            'fields' => array(
                'Test.*','Customer.*','School.*', 'Count(Test.bk_session_id) as Count'
            ),
            'group' => array(
                'Test.bk_session_id'
            ),
            'order' => array(
                'Count' => 'desc'
            ),
			'limit' => 10
        );
		
        $this->set('tests', $this->paginate('Test'));
			
		/**/
	
		} 
			
		//SCHOOLADMIN
		else if ($this->Auth->user('customers_roles') == "schooladmin") {
			
		$this->Test->recursive = 0;
		$conditions = array('Test.school_id' => $this->Auth->user('school_id'));
        $this->paginate['Test'] = array(
            'fields' => array(
                'Test.*','Customer.*','School.*', 'Count(Test.bk_session_id) as Count'
            ),
            'group' => array(
                'Test.bk_session_id'
            ),
            'order' => array(
                'Count' => 'desc'
            ),
			'limit' => 10
        );
		
        $this->set('tests', $this->paginate('Test',$conditions));
			
			} 
			
		//TEACHER
		else {

		$this->Test->recursive = 0;
		//NON-SHARABLE
		$conditions = array('Test.customer_customers_teacher_id LIKE' => $this->Auth->user('id'));
		
		//SHARABLE
		//$conditions = array('Customer.classroom_id LIKE' => '%'.$this->Auth->user('classroom_id').'%');
		$this->paginate['Test'] = array(
            'fields' => array(
                'Test.*','Customer.*','School.*', 'Count(Test.bk_session_id) as Count'
            ),
            'group' => array(
                'Test.bk_session_id'
            ),
            'order' => array(
                'Count' => 'desc'
            ),
			'limit' => 10
        );
		
        $this->set('tests', $this->paginate('Test',$conditions));
				    
		}
	
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	//SEARCH TEST/////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	function admin_search_report() {
				
		$this->layout = 'admin_student';
			
		$this->pageTitle= 'CARS & STARS Online / Reports';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Reports</a></article>";
			
		$this->set('breadcrumbs', $breadcrumbs);	
			
		$searchQuery = null;
		if (isset($this->params['url']['search_text'])) {
			$searchQuery = $this->params['url']['search_text'];
		} elseif (isset($this->params['pass'][0])) {
			$searchQuery = $this->params['pass'][0];
		} else {
			$searchQuery;
		}
		
		
		if($this->Auth->user('customers_roles') == "superadmin") {
					
			$this->set('tests', $this->Test->find('all', array('conditions' => array('Test.seriesbook LIKE' => '%'.$searchQuery.'%'),'group' => array('Test.bk_session_id'))));
		
		//SCHOOLADMIN 		
		} else if ($this->Auth->user('customers_roles') == "schooladmin") {
		
			$this->set('tests', $this->Test->find('all', array('conditions' => array('Test.seriesbook LIKE' => '%'.$searchQuery.'%','Test.school_id' => $this->Auth->user('school_id')),'group' => array('Test.bk_session_id'))));
		
		//TEACHER		
		} else {
			$this->set('tests', $this->Test->find('all', array('conditions' => array('Test.seriesbook LIKE' => '%'.$searchQuery.'%','Test.customer_customers_teacher_id' => $this->Auth->user('id')),'group' => array('Test.bk_session_id'))));
		}
		
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	//ADD TEST////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	function admin_add() {
	
		$this->layout = 'admin_student';
		
		$this->pageTitle= 'CARS & STARS Online / Begin New Level';
			
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Begin New Level</a></article>";
		
		$token = $this->Password->generatePassword();
		
		$this->set('token', $token);
		
		//CHECK FOR TEACHER VIEW TEACHER ID AND CLASS
		
		//IDENTITY THE FIRST STUDENT BASED ON THE CUSTOMER NAME
		$thefirststudent = $this->Test->Customer->find('first', array('conditions' => array('Customer.classroom_id' => $this->data['Test']['classroom_id'],'Customer.customers_types' => 'student'), array('order' => 'Customer.customers_name ASC')));
									
		if (!empty($this->data)) {
			
			//CHECK IF TEACHER HAS STUDENT 	
			//$fub = $this->Test->Customer->findBycustomers_teacher_id($this->data['Test']['customers_teacher_id']);
			
			$fub = $this->Test->Customer->find('all', array('conditions' => array('Customer.classroom_id' => $this->data['Test']['classroom_id'], 'Customer.customers_teacher_id LIKE' => '%'.$this->data['Test']['customers_teacher_id'].'%')));
			
			$this->data['Test']['customer_id'] = $this->data['Test']['customers_teacher_id'];
			
			$teacherid = $this->data['Test']['customer_id'];
			
			$this->data['Test']['seriesbook'] = $this->data['Test']['series_type']." ".$this->data['Test']['book_type'];
                
			if($fub) { 
										
			if ($this->Test->save($this->data)) {
												
				//INSERTING THE TOTAL NO. OF STUDENT BASED ON THE TEACHER ID INTO THE TEST TABLE.
				$fub = $this->Test->Customer->find('all', array('conditions' => array('Customer.customers_teacher_id LIKE' => '%'.$this->data['Test']['customer_id'].'%', 'Customer.customers_types' => 'student', 'Customer.classroom_id' => $this->data['Test']['classroom_id'])));
				
				foreach ($fub as $fu) {
					
				$this->data['Test']['customer_id'] = $fu['Customer']['id'];
				
				$this->data['Test']['customer_customers_teacher_id'] = $teacherid;
				
				$this->data['Test']['seriesbook'] = $this->data['Test']['series_type']." ".$this->data['Test']['book_type'];
				
				$this->Test->saveall($this->data);
				
				}
				// END OF //
				
				//FIND TEST ID WITH $THEFIRSTSTUDENT
				$thefirsttestid = $this->Test->find('first', array('conditions' => array('Test.customer_id' => $thefirststudent['Customer']['id'], 'Test.bk_session_id' => $this->data['Test']['bk_session_id'])));
				
				//IDENTITY THE SERIES AND BOOK TYPE.
				if($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "K") {
					
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_k_1', $thefirststudent['Customer']['id'] ,$this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "P") {
					
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_p_1', $thefirststudent['Customer']['id'] ,$this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "AA") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_aa_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "A") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_a_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "B") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_b_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "C") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_c_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "D") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_d_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "E") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_e_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				}  else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "F") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_f_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "G") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_g_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				} else if ($this->data['Test']['series_type'] == "Cars Series" && $this->data['Test']['book_type'] == "H") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_h_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				//CARS PLUS BOOK P
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "P") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_p_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK AA
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "AA") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_aa_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK A
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "A") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_a_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK B
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "B") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_b_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK C
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "C") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_c_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK D
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "D") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_d_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK E
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "E") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_e_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK F
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "F") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_f_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK G
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "G") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_g_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				//CARS PLUS BOOK H
				} else if ($this->data['Test']['series_type'] == "Cars Plus" && $this->data['Test']['book_type'] == "H") {
				
				$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_h_1', $thefirststudent['Customer']['id'] , $this->data['Test']['bk_session_id'], $thefirsttestid['Test']['id']));
				
				}
				
				else {
				
				$this->redirect(array('controller' => 'tests', 'action' => 'add'));
				
				}
				
				}
			//END OF IDENTITY THE SERIES AND BOOK TYPE.
			} else {
				
			$this->Session->setFlash('<h4 class="alert_warning">This teacher has not been assigned to any student.</h4>');	
			
			$this->redirect(array('controller' => 'tests', 'action' => 'add'));
			
			}	
	}	
				
		$schools = $this->Test->Customer->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$schoolsfiltered = $this->Test->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));

		$classes = $this->Test->Classroom->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$classesfiltered = $this->Test->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		$classesfilteredteacher = $this->Test->Classroom->find('list', array('conditions' => array('Classroom.id' => $classid), 'order' => 'name ASC'));
		
		$teachers = $this->Test->Customer->find('list', array('conditions' => array('customers_roles' => array('teacher', 'schooladmin')),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$teachersfiltered = $this->Test->Customer->find('list', array('conditions' => array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_roles' => 'teacher'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$realteachersfiltered = $this->Test->Customer->find('list', array('conditions' => array('Customer.id' => $this->Auth->user('id')),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
				
		$this->set(compact('classesfiltered','students','studentsName','schools','classes','teachers','schoolsfiltered','teachersfiltered','classesfilteredteacher','realteachersfiltered')); 
		
		$this->set('breadcrumbs', $breadcrumbs);

		//Debugger::dump($this->sid);

	}
	
	//////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	//DELETE TEST/////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	function admin_delete($session_id) {
		//$upload = $this->Test->findById($id);
		
		$scorecondition = array('Score.test_bk_session_id' => $session_id);
		$this->Test->Score->deleteAll($scorecondition);
		$testcondition = array('Test.bk_session_id' => $session_id);
		$this->Test->deleteAll($testcondition);	
		$this->Session->setFlash('<h4 class="alert_success">The test record has been deleted.</h4>');
		$this->redirect($this->referer());
	}
	
	
	/////////////////////////////////////
	//// PAGE FILTER FOR STUDENT VIEW ///
	/////////////////////////////////////
	function admin_page_filter($id) {
		
		$testid = $id;
		$session_key = $this->params['pass'][1];
		$customerid = $this->params['pass'][2];
		$book_type = $this->params['pass'][3];
		
		$seriestype = $this->Test->find('first', array('conditions' => array('Test.customer_id' => $customerid,'Test.bk_session_id' => $session_key)));
		
		//Debugger::dump($seriestype['Test']['series_type']);
		
		if($seriestype['Test']['series_type'] == "Cars Series") {
		
		if ($book_type === "K") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_k_1', $customerid, $session_key, $testid));
		} else if($book_type === "P") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_p_1', $customerid, $session_key, $testid));
		} else if($book_type === "AA") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_aa_1', $customerid, $session_key, $testid));
		} else if($book_type === "A") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_a_1', $customerid, $session_key, $testid));
		} else if($book_type === "B") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_b_1', $customerid, $session_key, $testid));
		} else if($book_type === "C") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_c_1', $customerid, $session_key, $testid));
		} else if($book_type === "D") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_d_1', $customerid, $session_key, $testid));
		} else if($book_type === "E") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_e_1', $customerid, $session_key, $testid));
		} else if($book_type === "F") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_f_1', $customerid, $session_key, $testid));
		} else if($book_type === "G") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_g_1', $customerid, $session_key, $testid));
		} else if($book_type === "H") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carseries_h_1', $customerid, $session_key, $testid));
		}
		
		} else if ($seriestype['Test']['series_type'] == "Cars Plus") {
		
		if ($book_type === "P") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_p_1', $customerid, $session_key, $testid));
		} else if ($book_type === "AA") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_aa_1', $customerid, $session_key, $testid));
		} else if ($book_type === "A") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_a_1', $customerid, $session_key, $testid));
		} else if ($book_type === "B") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_b_1', $customerid, $session_key, $testid));
		} else if ($book_type === "C") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_c_1', $customerid, $session_key, $testid));
		} else if ($book_type === "D") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_d_1', $customerid, $session_key, $testid));
		} else if ($book_type === "E") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_e_1', $customerid, $session_key, $testid));
		} else if ($book_type === "F") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_f_1', $customerid, $session_key, $testid));
		} else if ($book_type === "G") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_g_1', $customerid, $session_key, $testid));
		} else if ($book_type === "H") {
		$this->redirect(array('controller' => 'scores', 'action' => 'edit_carsplus_h_1', $customerid, $session_key, $testid));
		}
			
		}
		
	}
	
	//////
	
	function admin_gencptreport() {
		
		$testid = $this->params['pass'][0];
		$session_key = $this->params['pass'][1];
		$customerid = $this->params['pass'][2];
		$book_type = $this->params['pass'][3];
		
		$seriestype = $this->Test->find('first', array('conditions' => array('Test.customer_id' => $customerid,'Test.bk_session_id' => $session_key)));
				
		if($seriestype['Test']['series_type'] == "Cars Series") {

			if($book_type === "P") {
			$this->redirect(array('controller' => 'scores', 'action' => 'admin_compactreports_p', $customerid, $session_key, $testid));
			} else if($book_type === "AA") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_aa', $customerid, $session_key, $testid));
			} else if($book_type === "A") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_a', $customerid, $session_key, $testid));
			} else if($book_type === "B") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_b', $customerid, $session_key, $testid));
			} else if($book_type === "C") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_c', $customerid, $session_key, $testid));
			} else if($book_type === "D") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_d', $customerid, $session_key, $testid));
			} else if($book_type === "E") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_e', $customerid, $session_key, $testid));
			} else if($book_type === "F") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_f', $customerid, $session_key, $testid));
			} else if($book_type === "G") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_g', $customerid, $session_key, $testid));
			} else if($book_type === "H") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_h', $customerid, $session_key, $testid));
			}
		
		} else if ($seriestype['Test']['series_type'] == "Cars Plus") {
			
			if($book_type === "P") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_p', $customerid, $session_key, $testid));
			} else if ($book_type === "AA") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_aa', $customerid, $session_key, $testid));
			} else if ($book_type === "A") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_a', $customerid, $session_key, $testid));
			} else if ($book_type === "B") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_b', $customerid, $session_key, $testid));
			} else if ($book_type === "C") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_c', $customerid, $session_key, $testid));
			} else if ($book_type === "D") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_d', $customerid, $session_key, $testid));
			} else if ($book_type === "E") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_e', $customerid, $session_key, $testid));
			} else if ($book_type === "F") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_f', $customerid, $session_key, $testid));
			} else if ($book_type === "G") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_g', $customerid, $session_key, $testid));
			} else if ($book_type === "H") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_h', $customerid, $session_key, $testid));
			}
			
		}
		
	}
	
	//////
	
	function admin_generatereport() {
		
		$testid = $this->params['pass'][0];
		$session_key = $this->params['pass'][1];
		$customerid = $this->params['pass'][2];
		$book_type = $this->params['pass'][3];
		
		$seriestype = $this->Test->find('first', array('conditions' => array('Test.customer_id' => $customerid,'Test.bk_session_id' => $session_key)));
				
		if($seriestype['Test']['series_type'] == "Cars Series") {

			if($book_type === "P") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_p', $customerid, $session_key, $testid));
			} else if($book_type === "AA") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_aa', $customerid, $session_key, $testid));
			} else if($book_type === "A") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_a', $customerid, $session_key, $testid));
			} else if($book_type === "B") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_b', $customerid, $session_key, $testid));
			} else if($book_type === "C") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_c', $customerid, $session_key, $testid));
			} else if($book_type === "D") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_d', $customerid, $session_key, $testid));
			} else if($book_type === "E") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_e', $customerid, $session_key, $testid));
			} else if($book_type === "F") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_f', $customerid, $session_key, $testid));
			} else if($book_type === "G") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_g', $customerid, $session_key, $testid));
			} else if($book_type === "H") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreports_h', $customerid, $session_key, $testid));
			}
		
		} else if ($seriestype['Test']['series_type'] == "Cars Plus") {
			
			if($book_type === "P") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_p', $customerid, $session_key, $testid));
			} else if ($book_type === "AA") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_aa', $customerid, $session_key, $testid));
			} else if ($book_type === "A") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_a', $customerid, $session_key, $testid));
			} else if ($book_type === "B") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_b', $customerid, $session_key, $testid));
			} else if ($book_type === "C") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_c', $customerid, $session_key, $testid));
			} else if ($book_type === "D") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_d', $customerid, $session_key, $testid));
			} else if ($book_type === "E") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_e', $customerid, $session_key, $testid));
			} else if ($book_type === "F") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_f', $customerid, $session_key, $testid));
			} else if ($book_type === "G") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_g', $customerid, $session_key, $testid));
			} else if ($book_type === "H") {
			$this->redirect(array('controller' => 'scores', 'action' => 'classreportsplus_h', $customerid, $session_key, $testid));
			}
			
		}
		
	}
	
	function newsfeeds() {
		
	return $this->Test->find('all', array('conditions' => array('Customer.customers_roles' => 'student'), 'order' => 'Test.id DESC', 'limit' => 3));
	
	}
	
	function getthefirsttestid($student_id, $access_token) {
	
	return $this->Test->find('first', array('conditions' => array('Test.customer_id' => $student_id, 'Test.bk_session_id' => $access_token)));
	
	}
	
	function getthefirststudentid($cust_id,$session_id) {
	
	return $this->Test->find('first', array('conditions' => array('Test.customer_customers_teacher_id' => $cust_id, 'Test.bk_session_id' => $session_id)));
	
	}
	
	//score_edit files less without the teacher - only students.
	function checktestcompletedlesson($access_token) {
		
	return $this->Test->find('all', array('conditions' => array('Test.bk_session_id' => $access_token, 'Test.customer_customers_teacher_id !=' => null)));
		
	}
	
}
?>