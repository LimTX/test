<?php
class CustomersController extends AppController {

	var $name = 'Customers';
	var $uses = array('Customer','School','Account');

	var $helpers = array('Html', 'Form', 'Session', 'Ajax','Text');
	
	var $components = array("Email","Session","Image","RequestHandler","Password");
	
	// Pagination
	var $paginate = array('limit' => 10, 'page' => 1,'order'=>array('Customer.customers_lastname' => 'asc'));	
	
	//Create AJAX Classes
	function admin_get_classes_ajax() {
  		if($this->RequestHandler->isAjax()) {
    		$this->set('Classrooms', $this->Customer->Classroom->find('list',
				array('conditions' =>
                array('Classroom.school_id' => $this->params['url']['school_id']),'order'=>array('Classroom.name ASC'))));
  		}
	}
	
	function auth() {
	$this->Customer->recursive = -1;
	
    $this->set('auth', $this->Customer->find('all',array('conditions'=>array('Customer.id' => 13))));
	}
	
	function admin_expiry() {
		
		$this->pageTitle= 'CARS & STARS Online / Subscription';
		
		$this->layout = 'admin_student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
					
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Subscription</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		$email = $this->Customer->find('first',array('conditions'=>array('Customer.customers_roles' => 'schooladmin','Customer.school_id' => $this->Auth->user('school_id'))));	
		
		 $this->set('email', $email['Customer']['customers_email_address']);
		
	}
	
	function subauth() {
		
		$this->layout = false;
		
		//1
		if (!empty($this->params['pass']['0']) || !empty($this->params['pass']['1']) || !empty($this->params['pass']['2']) || !empty($this->params['pass']['3'])) {
			
			$firsttokenkey = $this->params['pass']['3'];
			
			//2
			if ($this->params['pass']['0'] == 'W4ng4r4') {
				
				$emailexist = $this->Customer->find('count',array('conditions'=>array('Customer.customers_email_address'=>$this->params['pass']['1'])));
				//3
				if ($emailexist <= 0) {
				
				//CREATE SCHOOL//
				$this->School->create();
				
				if (empty($this->params['pass']['4'])) {
				
				$this->data['School']['expiry'] = date('Y-m-d', strtotime('+1 year'));
				
				} else {
				
				if ($this->params['pass']['4'] == "trial") {
				$this->data['School']['expiry'] = date('Y-m-d', strtotime('+1 month'));
				} else {
				$this->data['School']['expiry'] = date('Y-m-d', strtotime('+1 year'));
				}
					
				}
				
				
				$this->School->save($this->data);	
				
				//CREATE ACCOUNT//
				$this->Account->create();
				$this->data['Account']['school_id'] = $this->School->getInsertID();
				$this->data['Account']['teacher_carscombo'] = $this->params['pass']['2'];
				$this->data['Account']['accessright'] = $this->params['pass']['3'];
				$this->data['Account']['tokenkey'] = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);			
				$hash = $this->data['Account']['tokenkey'];

				$this->Account->save($this->data);	
				
				//CREATE CUSTOMER//
				$this->Customer->create();
				
				$this->data['Customer']['customers_email_address'] = $this->params['pass']['1'];
				$email = $this->data['Customer']['customers_email_address'];
				
				$this->data['Customer']['customers_roles'] = "schooladmin";
				$this->data['Customer']['customers_types'] = "teacher";
				$this->data['Customer']['school_id'] = $this->School->getInsertID();
				$this->Customer->save($this->data);
				
				
				//SENDING OUT TOKEN KEY TO CUSTOMER
				
                $fu = $this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address'=>$email)));
				//4
                if ($fu) {
										
                        $url = Router::url( array('controller'=>'customers','action'=>'register'), true ).'/'.$hash;
                        $ms=$url;
						//$clientname = $fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname'];
						$tokenkey = $hash;
                        $ms=wordwrap($ms,1000);
              
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe',
						'password' => 'Apple928Gorilla',
						);
								
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = $fu['Customer']['customers_email_address'];
   					    $this->Email->subject = 'CARS & STARS Online';
						$this->Email->template = 'subscription';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$this->set('tokenkey', $tokenkey);
						//$this->set('clientname', $clientname);
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
						   
                        $this->Session->setFlash(__('<p style="color:green">Recorded Successfully.</h4><br/>', true));  
						$this->redirect(array('controller'=>'customers','action'=>'login'));       
						//4
                        }
						
					//3
					} else {
						
						//5
						if($this->params['pass']['3'] == "unlimited") {
						
						$userid = $this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address' => $this->params['pass']['1'])));
									
						$this->data = array('id' => $userid['Customer']['school_id'], 'expiry' => date('Y-m-d', strtotime('+1 year')));				
							
						$this->School->save($this->data);
						
						$accountID = $this->Account->find('first',array('conditions'=>array('Account.school_id' => $userid['Customer']['school_id'])));
										
						$this->Account->id = $accountID['Account']['id'];
																						
						$totalaccounts = $this->params['pass']['3'];									
																
						$this->data = array('accessright' => $totalaccounts);
										
						$this->Account->save($this->data);
					
						$this->Session->setFlash(__('<p style="color:green">Your subscription has been successfully updated.</h4><br/>', true));  
						
						$this->redirect(array('controller'=>'customers','action'=>'login'));
							
						} else {
										
										$userid = $this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address' => $this->params['pass']['1'])));
										
										$minus7days = strtotime("-7 days", strtotime($userid['School']['expiry']));
										
										//CHECK IF EXPIRY DATE IS > 7 DAYS OF EXPIRES
										if (strtotime(date("Y-m-d", $minus7days)) > strtotime(date('Y-m-d'))) {
											
										$userid = $this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address' => $this->params['pass']['1'])));
										
										$accountID = $this->Account->find('first',array('conditions'=>array('Account.school_id' => $userid['Customer']['school_id'])));
										
										$this->Account->id = $accountID['Account']['id'];
											//ADD THE EXISTING NO. OF ACC + THE NEW ACC
											
										if($accountID['Account']['accessright']	== "unlimited") {
											
										$totalaccounts = $this->params['pass']['3'];									
										
										} else {
										
										$totalaccounts = $accountID['Account']['accessright'] + $this->params['pass']['3'];									
											
										}
										
										$this->data = array('accessright' => $totalaccounts);
										
										$this->Account->save($this->data);
										
										//$this->Session->setFlash(__('<p style="color:red">'."aaa".date("d/m/Y", $minus7days).'</h4><br/>', true));  
										$this->Session->setFlash(__('<p style="color:green">Your subscription has been successfully updated.</h4><br/>', true));  
										
										$this->redirect(array('controller'=>'customers','action'=>'login'));
										
										} else {
										//EXPIRED
									
										$this->data = array('id' => $userid['Customer']['school_id'], 'expiry' => date('Y-m-d', strtotime('+1 year')));
										
										$this->School->save($this->data);
																
										$this->Session->setFlash(__('<p style="color:green">Your subscription has been successfully renewed.</h4><br/>', true));  
										$this->redirect(array('controller'=>'customers','action'=>'login'));	
											
										}
							
						}
						
						//5
					
					}
						
			//2
			} else {
				
						//UNAUTHORIZED ENTRY DETECTION
						$ms=wordwrap($ms,1000);
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe',
						'password' => 'Apple928Gorilla',
						);
								
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = 'dlee@hbe.com.au';
   					    $this->Email->subject = 'Unauthorized entry has been detected';
						$this->Email->template = 'unauthorized-entry';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$errorURL = $_SERVER['REQUEST_URI'];
						$ipaddress = $_SERVER['REMOTE_ADDR'];
						$proxyipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
						
						$this->set('errorURL', $errorURL);
						$this->set('ipaddress', $ipaddress);
						$this->set('proxyipaddress', $proxyipaddress);
						
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
				
				$this->Session->setFlash(__('<p style="color:red">Error: Invaild Security Token.<br/>Entry has been recorded.</h4><br/>', true));  
				$this->redirect(array('controller'=>'customers','action'=>'login'));
			}
	//1	
	} else {
						//UNAUTHORIZED ENTRY DETECTION
						$ms=wordwrap($ms,1000);
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe',
						'password' => 'Apple928Gorilla',
						);
								
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = 'dlee@hbe.com.au';
   					    $this->Email->subject = 'Unauthorized entry has been detected';
						$this->Email->template = 'unauthorized-entry';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$errorURL = $_SERVER['REQUEST_URI'];
						$ipaddress = $_SERVER['REMOTE_ADDR'];
						$proxyipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
						
						$this->set('errorURL', $errorURL);
						$this->set('ipaddress', $ipaddress);
						$this->set('proxyipaddress', $proxyipaddress);
						
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
		
			$this->Session->setFlash(__('<p style="color:red">Error: Unauthorized entry has been recorded.</h4><br/>', true));
			$this->redirect(array('controller'=>'customers','action'=>'login'));
	}
		
	}
		
	//Create AJAX Teachers
	function admin_get_teachers_ajax() {

  		if($this->RequestHandler->isAjax()) {
			
			$classroom_id = $this->params['url']['classroom_id'];
			
    		$this->set('Teachers', $this->Customer->find('list',
				array('fields' => array('customers_name'), 'conditions' =>
                array('Customer.classroom_id LIKE' => '%'.$classroom_id.'%','customers_types' => 'teacher')
                )));
  		}
	}
	
	
	function register($id = null) {
				
		$this->layout = 'login';
		$this->pageTitle= 'CARS & STARS Online / Register';
		
		if (empty($this->data['Account']['tokenkey'])) {
			
			$id;
			
		} else {
			$id = $this->data['Account']['tokenkey'];
		}
		
		$accountID = $this->Account->find('first',array('conditions'=>array('Account.tokenkey' => $id)));
				
			if($accountID <= 0) {
							
			$this->set('invalid', "invalid");
			
			if(!empty($id)) {	
				
			$this->Session->setFlash(__('<p style="color:red">Sorry, your registration token is invalid. <br/>You can obtain your registration token via your email.</h4><br/>', true));
			
			}
			
			} else {
				
			$this->set('invalid', "vaild");
							
			$tokenID = $this->Account->find('first',array('conditions'=>array('Account.tokenkey' => $id)));
			
			$userID = $this->Customer->find('first',array('conditions'=>array('Customer.school_id' => $tokenID['Account']['school_id'])));
									
			$this->set('accessrightvalue', $tokenID['Account']['accessright']);
			
			$this->set('school_id', $tokenID['Account']['school_id']);
			
			$this->set('userID', $userID['Customer']['id']);
			
			$userid = $this->Customer->find('first',array('conditions'=>array('Customer.customers_roles' => 'schooladmin','Customer.school_id' => $tokenID['Account']['school_id'])));
			
			$this->Customer->id = $userid['Customer']['id'];
			
			$this->data = $this->Customer->read();
				
			}
			
	}
	
	function register_process() {
				
	$this->layout = false;
		
	$this->School->id = $this->data['School']['id'];
	
	$this->data['School']['name'];
	
	$this->data['School']['address'];														
																										
	$this->School->save($this->data);
	
	$this->Customer->id = $this->data['Customer']['id'];
	
	$this->data['Customer']['customers_name'] = $this->data['Customer']['customers_firstname']." ".$this->data['Customer']['customers_lastname'];
	
	if ($this->data['Customer']['customers_dob'] == NULL) {
	
	$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime(1970-01-01));
	
	} else {
		
	$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime($this->data['Customer']['customers_dob']));
		
	}
																
	$this->Customer->save($this->data);
	
	$this->Session->setFlash(__('<p style="color:green">Your school account has been successfully created.</h4><br/>', true));
	$this->redirect(array('controller'=>'customers','action'=>'login'));
	
	}
	
	////////////////
	//ADD TEACHER //
	////////////////
	
	function admin_add_teachers() {
		
		
		$this->pageTitle= 'CARS & STARS Online - Add Teacher';
		
		$this->layout = 'admin_student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkteacher = Router::url(array('controller' => "customers", 'action' => "teachers", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkteacher ."'>Teacher</a><div class='breadcrumb_divider'></div><a class='current'>Add Teacher</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
												
		if (!empty($this->data)) {
		
				$this->Customer->create();
				
				$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime($this->data['Customer']['customers_dob']));
				
				$this->data['Customer']['customers_name'] = $this->data['Customer']['customers_firstname']." ".$this->data['Customer']['customers_lastname'];
				
				if ($this->data['Customer']['classroom_id'] == "") {
						$this->data['Customer']['classroom_id'] = NULL; 
				} else {
						//this is for new the teacher
						$this->data['Customer']['classroom_id'] = implode(',', $this->data['Customer']['classroom_id']);
				}
					
				$classid = $this->data['Customer']['classroom_id'];
					
		
				$dupemail = $this->Customer->find('count', array('conditions' => array('Customer.customers_email_address' => $this->data['Customer']['customers_email_address'])));			
		
		if ($dupemail > 0) {
						
			$this->Session->setFlash('<h4 class="alert_error">You cannot use the same email address to create an account. You may want go to \'My Account\' link to assign yourself in a Class.</h4>');
			$this->redirect(array('controller' => 'customers', 'action' => 'add_teachers'));
					
		} else {
						
		if ($this->Customer->save($this->data)) {
					
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MASS UPDATE //
		
		if ($classid != NULL) {
		
		$listofstudentbelongstoexistingsclasses = $this->Customer->find('all', array('conditions' => array('Customer.customers_roles' => 'student','Customer.classroom_id IN'."(".$this->data['Customer']['classroom_id'].")")));
						
			foreach ($listofstudentbelongstoexistingsclasses as $listofstudentbelongstoexistingsclass) {
				
				$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
				$this->Customer->set('customers_teacher_id', $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'].",".$this->Customer->getInsertID());
				$this->Customer->save();
												
			} 
		
		}
								
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
	
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 573,380,160,160, "sets");
	    			if(isset($image_path)) {
	     				$this->Customer->saveField('customers_image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					
					
					if($this->data['Customer']['sendemail'] == 1) {
						
						
						
						
				$email=$this->data['Customer']['customers_email_address'];
                $fu=$this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address'=>$email)));
                if($fu)
                {
                    	//Debugger::dump($fu['Customer']['id']);
					
                        $key = Security::hash("aaaa", 'sha1', TRUE);
                        $hash = sha1($fu['Customer']['customers_email_address'].rand(0,100));
                        $url = Router::url( array('controller'=>'customers','action'=>'reset'), true ).'/'.$hash.'#'.$key;
                        $ms=$url;
						$clientname = $fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname'];
						$clientemail = $fu['Customer']['customers_email_address'];
                        $ms=wordwrap($ms,1000);
                        $fu['Customer']['tokenhash']=$hash;
                        $this->Customer->id= $fu['Customer']['id'];
                        if($this->Customer->saveField('tokenhash',$fu['Customer']['tokenhash'])){     
						
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe',
						'password' => 'Apple928Gorilla',
						);
								
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = $fu['Customer']['customers_email_address'];
   					    $this->Email->subject = 'CARS & STARS Online';
						$this->Email->template = 'invitation';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$this->set('clientemail', $clientemail);
						$this->set('clientname', $clientname);
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
					
					
					
					}
					
					
				}
				
					}
					
					$this->Session->setFlash('<h4 class="alert_success">Your teacher record has been saved.</h4>');
					$this->redirect(array('controller' => 'customers', 'action' => 'teachers'));
					
					} // if duplicate email

			} 
					
		}
	
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$classesfiltered = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')),'order'=>array('Classroom.name ASC')));
		
		$schools = $this->Customer->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$schoolsfiltered = $this->Customer->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
			
		$this->set(compact('classes','schools','classesfiltered','schoolsfiltered')); 
		
	}
	
	
	function admin_delete_image($id = null) {
	
		// set the id of the dvd
		$this->Customer->id = $id;

		$this->set('customers', $this->Customer->read());
		$this->data = $this->Customer->read();
		
		// delete the physcial image from the server
		$upload = $this->Customer->findById($id);
   		$this->Image->delete_image($upload['Customer']['customers_image'],"sets");
		
		// remove the image's title from the database
		$this->Customer->saveField('customers_image', "");

		$this->Session->setFlash('<h4 class="alert_success">Photo has been deleted successfully.</h4>');
		
		// redirect to the existing page
		$this->redirect($this->referer());

	} 
	
	
	function forgetpwd(){
		$this->layout = 'login';
        $this->Customer->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['Customer']['customers_email_address']))
            {
                $this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
            }
            else
            {
                $email=$this->data['Customer']['customers_email_address'];
                $fu=$this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address'=>$email)));
                if($fu)
                {
                    	//Debugger::dump($fu['Customer']['id']);
					
                        $key = Security::hash("aaaa", 'sha1', TRUE);
                        $hash = sha1($fu['Customer']['customers_email_address'].rand(0,100));
                        $url = Router::url( array('controller'=>'customers','action'=>'reset'), true ).'/'.$hash.'#'.$key;
                        $ms=$url;
						$clientname = $fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname'];
						$clientemail = $fu['Customer']['customers_email_address'];
                        $ms=wordwrap($ms,1000);
                        $fu['Customer']['tokenhash']=$hash;
                        $this->Customer->id= $fu['Customer']['id'];
                        if($this->Customer->saveField('tokenhash',$fu['Customer']['tokenhash'])){     
						
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe@carsandstars.com.au',
						'password' => 'Apple928Gorilla',
						);
						
						
		
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = $fu['Customer']['customers_email_address'];
   					    $this->Email->subject = 'Reset Your Password';
						$this->Email->template = 'resetpw';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$this->set('clientemail', $clientemail);
						$this->set('clientname', $clientname);
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
						   
                        $this->Session->setFlash(__('<p style="color:green">We\'ve sent a password reset link to your email address.</h4><br/>', true));         
                        }
                        else{
                            $this->Session->setFlash("<p style='color:red;'>Error Generating Reset link</h4><br/>");                           
                        }                       
					
                }
                else
                {
                    $this->Session->setFlash('<p style="color:red;">The email address is incorrect.</p>');
                }
            }
        }
    }
	
	function invitation(){
		$this->layout = 'login';
        $this->Customer->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['Customer']['customers_email_address']))
            {
                $this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
            }
            else
            {
                $email=$this->data['Customer']['customers_email_address'];
                $fu=$this->Customer->find('first',array('conditions'=>array('Customer.customers_email_address'=>$email)));
                if($fu)
                {
                    	//Debugger::dump($fu['Customer']['id']);
					
                        $key = Security::hash("aaaa", 'sha1', TRUE);
                        $hash = sha1($fu['Customer']['customers_email_address'].rand(0,100));
                        $url = Router::url( array('controller'=>'customers','action'=>'reset'), true ).'/'.$hash.'#'.$key;
                        $ms=$url;
						$clientname = $fu['Customer']['customers_firstname']." ".$fu['Customer']['customers_lastname'];
						$clientemail = $fu['Customer']['customers_email_address'];
                        $ms=wordwrap($ms,1000);
                        $fu['Customer']['tokenhash']=$hash;
                        $this->Customer->id= $fu['Customer']['id'];
                        if($this->Customer->saveField('tokenhash',$fu['Customer']['tokenhash'])){     
						
						
						$this->Email->smtpOptions = array(
						'host' => 'mail.globalbacking.com',
						'port' => 465,
						'username' => 'hbe',
						'password' => 'Apple928Gorilla',
						);
								
						$this->Email->from = 'CARS & STARS Online <hbe@carsandstars.com.au>';
						$this->Email->replyTo = 'CARS & STARS Online <hbe@carsandstars.com.au>';
   					    $this->Email->to = $fu['Customer']['customers_email_address'];
   					    $this->Email->subject = 'CARS & STARS Online';
						$this->Email->template = 'invitation';
                        $this->Email->sendAs = 'html';
					    $this->Email->delivery = 'mail';
					  	
						$this->set('clientemail', $clientemail);
						$this->set('clientname', $clientname);
                        $this->set('ms', $ms);
					    $this->Email->send();
					    $this->set('smtp-errors', $this->Email->smtpError);
						   
                        $this->Session->setFlash(__('<p style="color:green">We\'ve sent a invitation to your email address.</h4><br/>', true));         
                        }
                        else{
                            $this->Session->setFlash("<p style='color:red;'>Error Generating Reset link</h4><br/>");                           
                        }                       
					
                }
                else
                {
                    $this->Session->setFlash('<p style="color:red;">The email address is incorrect.</p>');
                }
            }
        }
    }
	
	function reset($token=null){
		
        $this->layout="login";
		
		if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')) {
				$this->pageTitle= 'CARS & STARS Online / Your Browser Is Not Supported';
     			$this->redirect(array('admin' => false,'controller'=>'customers', 'action' => 'browser'));
		} elseif(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')) {
			 $this->pageTitle= 'CARS & STARS Online / Your Browser Is Not Supported';
			 $this->redirect(array('admin' => false,'controller'=>'customers', 'action' => 'browser'));
		} else {
		
        $this->Customer->recursive=-1;
        if(!empty($token)){
            $u=$this->Customer->findBytokenhash($token);                       
            if($u){               
                $this->Customer->id=$u['Customer']['id'];                                               
                if(!empty($this->data)){                
					$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);                      
   
                    $this->Customer->data=$this->data;
                    $this->Customer->data['Customer']['customers_email_address']=$u['Customer']['customers_email_address'];                   
                    $new_hash=sha1($u['Customer']['customers_email_address'].rand(0,100)); //created token
                    $this->Customer->data['Customer']['tokenhash']=$new_hash;                   
                    if($this->Customer->validates(array('fieldList'=>array('customers_password','password_confirm')))){ 
                        if($this->Customer->save($this->Customer->data))
                        {
                            $this->Session->setFlash("<p style='color:green'>Your password has been successfully changed.</p>");
                            $this->redirect(array('controller'=>'customers','action'=>'login'));
                        }
                         
                    }
                    else{
                        $this->set('errors',$this->User->invalidFields());                       
                    }
                }
            }
            else
            {
                $this->Session->setFlash('<p style="color:red; display:block; padding-left:20px; padding-right:20px;">Activation link has expired,<br/><a href="http://carsandstars.com.au/customers/forgetpwd" title="Forgot your password?">please click here to request for a new link.</a></p>');
            }
        }
         
        else{
            $this->redirect('/');   
        }   
		
		}
    }
	
	function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('registration');
	}
	
	function admin_search() {
		
		$searchQuery = null;
		if (isset($this->params['url']['search_text'])) {
			$searchQuery = $this->params['url']['search_text'];
		} elseif (isset($this->params['pass'][0])) {
			$searchQuery = $this->params['pass'][0];
		} else {
			$searchQuery;
		}
		
		$this->pageTitle= 'CARS & STARS Online / Student';
		
		if($this->Auth->user('customers_roles') == "superadmin") {

		if ($searchQuery != "") {

		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_name LIKE' => '%'. $searchQuery .'%'), array('Customer.customers_lastname LIKE' => '%'. $searchQuery .'%')
		), array('Customer.customers_types' => 'student')
		);		
		
		} else {
			
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_name LIKE' => ''. $searchQuery .''), array('Customer.customers_lastname LIKE' => ''. $searchQuery .'')
		), array('Customer.customers_types' => 'student')
		);	
		
		}
				
		$this->Customer->recursive = 0;
		if ($searchQuery) {
			$this->set('customers', $this->paginate('Customer', array('OR' => array('Customer.customers_name LIKE' => '%' . 
        $searchQuery . '%', 'Customer.customers_lastname LIKE' => '%' . 
        $searchQuery . '%'),array('Customer.customers_types' => 'student'))));
		
		}
		else {
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student'),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		//$this->set('customers', $this->paginate());
		}
		
		} else if ($this->Auth->user('customers_roles') == "schooladmin") {
		
		if ($searchQuery != "") {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_firstname LIKE' => '%'. $searchQuery .'%'), array('Customer.customers_name LIKE' => '%'. $searchQuery .'%')
		), array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'))
		);	
		
		} else {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_firstname LIKE' => ''. $searchQuery .''), array('Customer.customers_name LIKE' => ''. $searchQuery .'')
		), array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'))
		);	
			
		}
				
		$this->Customer->recursive = 0;
		if ($searchQuery) {
			$this->set('customers', $this->paginate('Customer', array('OR' => array('Customer.customers_firstname LIKE' => '%' . 
        $searchQuery . '%', 'Customer.customers_name LIKE' => '%' . 
        $searchQuery . '%'),array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id')))));
		
		}
		else {
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id')),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		//$this->set('customers', $this->paginate());
		}
		
		} else {
			
		if ($searchQuery != "") {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_firstname LIKE' => '%'. $searchQuery .'%'), array('Customer.customers_name LIKE' => '%'. $searchQuery .'%')
		), array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id' => $this->Auth->user('id'))
		);	
		
		} else {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_firstname LIKE' => ''. $searchQuery .''), array('Customer.customers_name LIKE' => ''. $searchQuery .'')
		), array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id' => $this->Auth->user('id'))
		);	
		
		}
				
		$this->Customer->recursive = 0;
		if ($searchQuery) {
			$this->set('customers', $this->paginate('Customer', array('OR' => array('Customer.customers_firstname LIKE' => '%' . 
        $searchQuery . '%', 'Customer.customers_name LIKE' => '%' . 
        $searchQuery . '%'),array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id' => $this->Auth->user('id')))));
		
		}
		else {
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id' => $this->Auth->user('id')),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		//$this->set('customers', $this->paginate());
		}
		
		}
		
		$totalUsers = $this->Customer->find('count', array('conditions' => $conditions));
				
		$this->set('totalUsers', $totalUsers);
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Search Student</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->layout = 'admin_student';
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name')));

		$this->set(compact('teachers','classes'));		
	}
	
	function admin_search_teachers() {
		
		$searchQuery = null;
		if (isset($this->params['url']['search_text'])) {
			$searchQuery = $this->params['url']['search_text'];
		} elseif (isset($this->params['pass'][0])) {
			$searchQuery = $this->params['pass'][0];
		} else {
			$searchQuery;
		}
	
		$this->pageTitle= 'CARS & STARS Online / Teacher';							
		
		if ($this->Auth->user('customers_roles') == "superadmin") {
		
		if ($searchQuery != "") {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_name LIKE' => '%'. $searchQuery .'%'), array('Customer.customers_lastname LIKE' => '%'. $searchQuery .'%')
		), array('Customer.customers_types' => 'teacher','Customer.id <>' => $this->Auth->user('id'))
		); 
		
		} else {
			
		$conditions = 
		array(
		'OR' => array(
		array('Customer.customers_name LIKE' => ''. $searchQuery .''), array('Customer.customers_lastname LIKE' => ''. $searchQuery .'')
		), array('Customer.customers_types' => 'teacher','Customer.id <>' => $this->Auth->user('id'))
		); 	
		
		}
		
		$totalUsers = $this->Customer->find('count', array('conditions' => $conditions));
				
		$this->Customer->recursive = 0;
		if ($searchQuery) {
			$this->set('customers', $this->paginate('Customer', array('OR' => array('Customer.customers_name LIKE' => '%' . 
        $searchQuery . '%', 'Customer.customers_lastname LIKE' => '%' . 
        $searchQuery . '%'),array('Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id')))));
		
		}
		else {
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id')),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));

		}
		
		// ELSE STATEMENT BELONGS TO THE == SUPERADMIN
		} else {
		
		if ($searchQuery != "") {
			
		$conditions = 
		array(
		'OR' => array(
		array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_name LIKE' => '%'. $searchQuery .'%'), array('Customer.customers_lastname LIKE' => '%'. $searchQuery .'%')
		), array('Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id'))
		); } else {
		
		$conditions = 
		array(
		'OR' => array(
		array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_name LIKE' => ''. $searchQuery .''), array('Customer.customers_lastname LIKE' => ''. $searchQuery .'')
		), array('Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id'))
		);
		
		}
		
		$totalUsers = $this->Customer->find('count', array('conditions' => $conditions));
		
		$this->Customer->recursive = 0;
		if ($searchQuery) {
			$this->set('customers', $this->paginate('Customer', array('OR' => array('Customer.customers_name LIKE' => '%' . 
        $searchQuery . '%', 'Customer.customers_lastname LIKE' => '%' . 
        $searchQuery . '%'),array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id'),'Customer.customers_roles <>' => 'superadmin'))));
		
		}
		else {
		
		$this->paginate = array(
		'conditions' => array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id'), 'Customer.customers_roles <>' => 'superadmin'),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));

		}
		 
		}
		
		$this->set('totalUsers', $totalUsers);

		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Search Teacher</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		$this->layout = 'admin_student';
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name')));

		$this->set(compact('classes'));
	}
	
	// Create admin_index Page
	function admin_index($id = null) {
				
		//$name = $this->Customer->getParentName(1056);
		
		//Debugger::Dump($name[0]['Customer']['customers_name']);
		
		$this->pageTitle= 'CARS & STARS Online / Student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
			
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Student</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		//////
		if($this->Auth->user('customers_roles') == "superadmin") {
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'student')));
		$this->set('totalUsers', $totalUsers);
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student'),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		$this->set('customers', $this->paginate('Customer'));
		
		//////
		} else if ($this->Auth->user('customers_roles') == "schooladmin")  {
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'))));
		$this->set('totalUsers', $totalUsers);
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id')),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		$this->set('customers', $this->paginate('Customer'));
		
		//debug($this->paginate('Customer'));
		
		//////
		} else {
			
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id LIKE' => '%'.$this->Auth->user('id').'%')));
		$this->set('totalUsers', $totalUsers);
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_teacher_id LIKE' => '%'.$this->Auth->user('id').'%'),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		$this->set('customers', $this->paginate('Customer'));
		
		}
		
		//$tnames = ;
		
		//$this->set('tnames', $this->Customer->getTeacherName(172));
		
		//Debugger::dump();
		
		$this->layout = 'admin_student';
								
//		$teachers = $this->Customer->find('list', array('conditions' => array('customers_types' => 'teacher', 'id' => 'customers_teacher_id'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name')));

		$this->set(compact('teachers','classes'));		
	}
	
	
	// Create admin_index Page
	function admin_teachers() {
		
		//Debugger::dump($this->Auth->user('id'));
		
		$this->pageTitle= 'CARS & STARS Online / Teacher';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Teacher</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		if ($this->Auth->user('customers_roles') == "superadmin") {
		
		$this->paginate = array(
		'conditions' => array('Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id')),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'teacher','Customer.id <>' => $this->Auth->user('id'))));
		
		} else {
			
		$this->paginate = array(
		'conditions' => array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_types' => 'teacher', 'Customer.id <>' => $this->Auth->user('id'), 'Customer.customers_roles <>' => 'superadmin'),
    	'limit' => 10,
   	    'order' => array('Customer.customers_lastname' => 'ASC'));
		
		//Debugger::dump($this->Auth->user('school_id'));
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.school_id' => $this->Auth->user('school_id'),'Customer.customers_types' => 'teacher','Customer.id <>' => $this->Auth->user('id'), 'Customer.customers_roles <>' => 'superadmin')));
		
		}
		
		$this->set('customers', $this->paginate('Customer'));
		
		$this->set('totalUsers', $totalUsers);
		// $this->set('customers', $this->Customer->find('all'));
		$this->layout = 'admin_student';
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name')));

		$this->set(compact('classes'));
		
	}

	// Create admin_view page
	function admin_view($id = null) {

		$this->pageTitle= 'CARS & STARS Online / Student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkstudent = Router::url(array('controller' => "customers", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkstudent."'>Student</a><div class='breadcrumb_divider'></div><a class='current'>Student Details</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);

		$this->layout = 'admin_student';
		$this->Customer->id = $id;
		$this->set('customer', $this->Customer->read());
		
		$name = $this->Customer->findById($id);
		
		$classes = $this->Customer->Classroom->find('all',array('conditions' => array('Classroom.id' => $name['Customer']['classroom_id'])));
		
		$schools = $this->Customer->School->find('all',array('conditions' => array('School.id' => $name['Customer']['school_id'])));
		
		$teacherNames = $this->Customer->find('all',array('conditions' => array('Customer.id IN ('.$name['Customer']['customers_teacher_id'].')')));
				
		// $tests = $this->Customer->Test->find('all',array('conditions' => array('Test.customer_id' => $name['Customer']['id'])));
		
		$tests = $this->Customer->Test->Score->find('all',array('conditions' => array('Score.customer_id' =>$name['Customer']['id']),'group' => array('Score.test_bk_session_id')));
		
		$this->set(compact('classes','teacherNames','schools','tests'));
								
		// $totalTests= $this->Customer->Test->find('count',array('conditions' => array('Test.customer_id' =>$name['Customer']['id'])));
		
		// $totalTests = $this->Customer->Test->Score->find('count',array('conditions' => array('Score.customer_id' =>$name['Customer']['id']),'group' => array('Score.test_bk_session_id')));
				
		// $this->set('totalTests', $totalTests);
		 
	}
	
	//function admin_update_students() {
//			
//		    $this->autoRender = false;
//			
//			$item=$this->data;
//        	$dim=count($item['Customer']['field']);
//			
//			$teacherIDs = $this->Customer->find('all',array('conditions' => array('Customer.classroom_id' => $this->data['Customer']['classroom_id'], 'Customer.customers_roles !=' => 'student')));
//			
//			Debugger::Dump($teacherIDs);
//			
//			//, 'Customer.customers_teacher_id' => $teacherID
//						
////			$i=0;
////        	for ($i=0; $i<$dim; $i++) {       
////				if ($item['Customer']['field'][$i] != 0) {
////					$data[] = $item['Customer']['field'][$i];
////					$this->Customer->updateAll(
////    					array('Customer.classroom_id' => $this->data['Customer']['classroom_id']),
////    					array('Customer.id' => $item['Customer']['field'][$i])
////					);
////					
////				}
////			}
//		   
//		   $this->Session->setFlash('<h4 class="alert_success">Student records have been updated.</h4>');
//		   $this->redirect($this->referer());
//	}
	
	function admin_view_teachers($id = null) {

		$this->pageTitle= 'CARS & STARS Online / Teacher';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkteacher = Router::url(array('controller' => "customers", 'action' => "teachers", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkteacher."'>Teacher</a><div class='breadcrumb_divider'></div><a class='current'>Teacher Details</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);

		$this->layout = 'admin_student';
		$this->Customer->id = $id;
		$this->set('customer', $this->Customer->read());
		
		$name = $this->Customer->findById($id);
		
		$classes = $this->Customer->Classroom->find('all',array('conditions' => array('Classroom.id' => $name['Customer']['classroom_id'])));
		
		//PREVIOUS $student condition
		 //$students = $this->Customer->find('all',array('conditions' => array('Customer.customers_teacher_id LIKE' => '%'.$name['Customer']['id'].'%'), 'order' => array('Customer.customers_firstname ASC')));
		
		if($name['Customer']['classroom_id'] == null) {
		$name['Customer']['classroom_id'] = 0;
		}
		
		$students = $this->Customer->find('all',array('conditions' => array('Customer.customers_roles' => 'student','Customer.classroom_id IN ('.$name['Customer']['classroom_id'].')'), 'order' => array('Customer.customers_firstname ASC')));
		
		
		//Debugger::Dump($name['Customer']['classroom_id']);
				
		$this->set(compact('classes','students')); 
		
		//$totalUsers = $this->Customer->find('count',array('conditions' => array('Customer.customers_teacher_id LIKE' => '%'.$name['Customer']['id'].'%')));
				
		//$this->set('totalUsers', $totalUsers);
		
		$classesfiltered = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
		
		$this->set('classesfiltered', $classesfiltered);
		
	}
	
	// Change Password
	function admin_change_password($id = null) {
			
		$this->pageTitle= 'CARS and STARS Portal - Edit Password';
		
		$this->layout = 'admin_student';
		
		$this->Customer->id = $this->params['pass'][0];
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkstudent = Router::url(array('controller' => "customers", 'action' => "index", "admin" => true), true);
		
		$linkteacher = Router::url(array('controller' => "customers", 'action' => "teachers", "admin" => true), true);
		
		$chk = $this->Customer->find('first',array('conditions'=>array('Customer.id'=> $this->params['pass'][0])));	
		
		$filterstudent = $chk['Customer']['customers_types'];
		
		//CHECK FOR TITLE STUDENT OR TEACHER
		$this->set('filterstudent', $filterstudent);
		
			////////////////////////
			//MY ACCOUNT FOR STUDENT
			////////////////////////
			if ($this->params['pass'][0] == $this->Auth->user('id') && $chk['Customer']['customers_types'] == "student") {
		
				$lastbreadcrumb = "My Account";
				$accountbreadcrumb = "";
				
				$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
				
				if (empty($this->data)) {
			$this->data = $this->Customer->read();
			$this->set('customers', $this->paginate('Customer'));
		} else {
			$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Password has been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'edit', $this->Auth->user('id')));
			}
		}
		
			////////////////////////
			//MY ACCOUNT FOR TEACHER
			////////////////////////
		} else if ($this->params['pass'][0] == $this->Auth->user('id') && $chk['Customer']['customers_types'] == "teacher") {
		
				$lastbreadcrumb = "My Account";
				$accountbreadcrumb = "";
				
				$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
				
				
				///CHANGE PASSWORD///
				
		if (empty($this->data)) {
			$this->data = $this->Customer->read();
			$this->set('customers', $this->paginate('Customer'));
		} else {
			$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Password has been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'edit_teachers', $this->Auth->user('id')));
			}
		}
				
				////////////////////////
				//EDIT STUDENT DETAILS
				////////////////////////
		} else if ($this->params['pass'][0] != $this->Auth->user('id') && $chk['Customer']['customers_types'] == "student") {
			
				$lastbreadcrumb = "Edit Student";
				$accountbreadcrumb = "<a href='".$linkstudent."'>Student</a><div 	class='breadcrumb_divider'></div>";
				
				$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
				
		///CHANGE PASSWORD///
				
		if (empty($this->data)) {
			$this->data = $this->Customer->read();
			$this->set('customers', $this->paginate('Customer'));
		} else {
			$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Password has been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'edit', $this->params['pass'][0]));
			}
		}
				
				////////////////////////
				//EDIT TEACHER DETAILS
				////////////////////////
		} else if ($this->params['pass'][0] != $this->Auth->user('id') && $chk['Customer']['customers_types'] == "teacher") {
			
				$lastbreadcrumb = "Edit Teacher";
				$accountbreadcrumb = "<a href='".$linkteacher."'>Teacher</a><div 	class='breadcrumb_divider'></div>";
				
				$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
				
				///CHANGE PASSWORD///
				
		if (empty($this->data)) {
			$this->data = $this->Customer->read();
			$this->set('customers', $this->paginate('Customer'));
		} else {
			$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Password has been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'edit_teachers', $this->params['pass'][0]));
			}
		}
		
		}
		
		
		// END OF ADMIN CHANGE PASSWORD
		
		$this->set('breadcrumbs', $breadcrumbs);
		
		
	}
	
	function change_password($id = null) {
			
		$this->pageTitle= 'SumyKids - Edit Password';
			
		$this->layout = 'admin_student';
		$this->Customer->id = $this->Auth->user('id');
		if (empty($this->data)) {
			$this->data = $this->Customer->read();
			$this->set('customers', $this->paginate('Customer'));
		} else {
			$this->data['Customer']['customers_password'] = Security::hash($this->data['Customer']['customers_password'], 'sha1', TRUE);
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Password have been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'account_edit'));
			}
		}
	}

	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////

	function admin_add() {

		$this->pageTitle= 'CARS & STARS Online / Add Student';
			
		$this->layout = 'admin_student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkstudent = Router::url(array('controller' => "customers", 'action' => "index", "admin" => true), true);
			
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a href='".$linkstudent."'>Student</a><div class='breadcrumb_divider'></div><a class='current'>Add Student</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
			
		if (!empty($this->data)) {
				$this->Customer->create();
				
				$this->data['Customer']['customers_email_address'] = "";
				$this->data['Customer']['customers_password'] = "";
				
				$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime($this->data['Customer']['customers_dob']));
				
				$this->data['Customer']['customers_name'] = $this->data['Customer']['customers_firstname']." ".$this->data['Customer']['customers_lastname'];
				
				$this->data['Customer']['customers_teacher_id'] = implode(',', $this->data['Customer']['customers_teacher_id']);
				
				//////////INCLUDE NEW STUDENT IN THE TEST CLASS LISTS //////
				$updatedtestclasslists = $this->Customer->Test->find('all', array('conditions' => array('Test.customer_customers_teacher_id' => NULL, 'Test.classroom_id' => $this->data['Customer']['classroom_id'])));
				
					if ($this->Customer->save($this->data)) {
				
				//////////INCLUDE NEW STUDENT IN THE TEST CLASS LISTS //////
				if (count($updatedtestclasslists) > 0) {
				
					foreach ($updatedtestclasslists as $updatedtestclasslist) {
						
					$this->Customer->Test->create();
					
					$this->data['Test']['bk_session_id'] = $updatedtestclasslist['Test']['bk_session_id'];
					$this->data['Test']['series_type'] = $updatedtestclasslist['Test']['series_type'];
					$this->data['Test']['book_type'] = $updatedtestclasslist['Test']['book_type'];
					$this->data['Test']['seriesbook'] = $updatedtestclasslist['Test']['seriesbook'];
					$this->data['Test']['customer_customers_teacher_id'] = $updatedtestclasslist['Test']['customer_id'];
					$this->data['Test']['classroom_id'] = $updatedtestclasslist['Test']['classroom_id'];
					$this->data['Test']['school_id'] = $updatedtestclasslist['Test']['school_id'];
					$this->data['Test']['customer_id'] = $this->Customer->getInsertID();
					
					$this->Customer->Test->save($this->data);
					
					}
				
				}
				//////////END OF INCLUDE NEW STUDENT IN THE TEST CLASS LISTS //////
					
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 573,380,160,160, "sets");
	    			if(isset($image_path)) {
	     				$this->Customer->saveField('customers_image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					$this->Session->setFlash('<h4 class="alert_success">Your student record has been saved.</h4>');
					$this->redirect(array('controller' => 'customers', 'action' => 'index'));
				}
		}
		
		$teachers = $this->Customer->find('list', array('conditions' => array('customers_types' => 'teacher'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$teachersfiltered = $this->Customer->find('list', array('conditions' => array('Customer.id' => $this->Auth->user('id')),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$teachersschooladminfiltered = $this->Customer->find('list', array('conditions' => array('Customer.school_id' => $this->Auth->user('school_id'), 'Customer.customers_roles' => 'teacher'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$classesfiltered = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		$classesfilteredteacher = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.id' => $classid), 'order' => 'name ASC'));
		
		$schools = $this->Customer->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$schoolsfiltered = $this->Customer->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
		
		
		
		//Debugger::Dump($classesfilteredmany['Customer']['customers_teacher_id']);	
				
		$teachersschooladminfilteredmany = $this->Customer->find('list', array('conditions' => array('Customer.classroom_id' => $this->Auth->user('classroom_id'),'Customer.customers_roles' => 'teacher'),'fields' => array('customers_name'),'order' => 'Customer.customers_lastname ASC'));
		
		//debug($teachersschooladminfilteredmany);
		
		
			
		$this->set(compact('teachersfiltered','classesfilteredteacher','classes','schools','classesfiltered','schoolsfiltered','teachers','teachersschooladminfiltered', 'teachersschooladminfilteredmany')); 
	}
	
	function browser() {
		$this->layout = 'login';
		
		$this->pageTitle= 'CARS & STARS Online / Your Browser Is Not Supported';
	}
	
	function login() {
		$this->layout = 'login';

if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')) {
	 $this->pageTitle= 'CARS & STARS Online / Your Browser Is Not Supported';
     $this->redirect(array('admin' => false,'controller'=>'customers', 'action' => 'browser'));
} elseif(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')) {
	 $this->pageTitle= 'CARS & STARS Online / Your Browser Is Not Supported';
     $this->redirect(array('admin' => false,'controller'=>'customers', 'action' => 'browser'));
} else {
	$usrInfo = $this->Auth->user();
				
		if (isset($usrInfo)) {
			
			
			  	    $this->pageTitle= 'CARS & STARS Online / Sign In';
                    $this->redirect(array('admin' => true,'controller'=>'customers', 'action' => 'dashboard'));
			
			
                /** if($this->Auth->user('customers_roles') == 'user'){
				    $this->pageTitle= 'CARS & STARS Online / Sign In';
                    $this->redirect(array('admin' => true,'controller'=>'customers', 'action' => 'dashboard'));
					 
					 // $this->Customer->id = $this->Auth->user('id'); // target correct record
       				 // $this->Customer->saveField('lastlogin', date(DATE_ATOM)); // save login time
					 
                 } else {
					 
					  // $this->Customer->id = $this->Auth->user('id'); // target correct record
       				  // $this->Customer->saveField('lastlogin', date(DATE_ATOM)); // save login time					
					 $this->pageTitle= 'CARS & STARS Online / Sign In';
                     $this->redirect(array('admin' => true,'controller'=>'customers', 'action' => 'dashboard'));
				 } **/
		}
}
		
		
	}
	
	function admin_dashboard($id = null) {
		$this->pageTitle= 'CARS & STARS Online / Dashboard';
		
		///////////////////////////////////////////////////////
		///////////////////////////////////////////////////////
		//GRAPH STATS//////////////////////////////////////////
		///////////////////////////////////////////////////////
		///////////////////////////////////////////////////////
		
		//FILTER WHETHER THE STATS DISPLAY IS FOR SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		if ($this->Auth->user('customers_roles') == "schooladmin") {
		
		$conditions_nousers_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('0 days 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_7 = $this->Customer->find('count', $conditions_nousers_7);
		
		$this->set('nousers_7', $nousers_7);
		
		///
		
		$conditions_nousers_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_6 = $this->Customer->find('count', $conditions_nousers_6);
		
		$this->set('nousers_6', $nousers_6);
		
		///
		
		$conditions_nousers_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_5 = $this->Customer->find('count', $conditions_nousers_5);
		
		$this->set('nousers_5', $nousers_5);
		
		///
		
		$conditions_nousers_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_4 = $this->Customer->find('count', $conditions_nousers_4);
		
		$this->set('nousers_4', $nousers_4);
		
		///
		
		$conditions_nousers_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_3 = $this->Customer->find('count', $conditions_nousers_3);
		
		$this->set('nousers_3', $nousers_3);
		
		///
		
		$conditions_nousers_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_2 = $this->Customer->find('count', $conditions_nousers_2);
		
		$this->set('nousers_2', $nousers_2);
		
		///
		
		$conditions_nousers_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$nousers_1 = $this->Customer->find('count', $conditions_nousers_1);
		
		$this->set('nousers_1', $nousers_1);
		
		////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////
		} else if ($this->Auth->user('customers_roles') == "teacher") {  
		
		
		$classid = $this->Auth->user('classroom_id');
		
		if ($this->Auth->user('classroom_id') != null || $this->Auth->user('classroom_id') != 0) {
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		}
		
		$conditions_nousers_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('0 days 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$nousers_7 = $this->Customer->find('count', $conditions_nousers_7);
		
		$this->set('nousers_7', $nousers_7);
		
		///
		
		$conditions_nousers_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_6 = $this->Customer->find('count', $conditions_nousers_6);
		
		$this->set('nousers_6', $nousers_6);
		
		///
		
		$conditions_nousers_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_5 = $this->Customer->find('count', $conditions_nousers_5);
		
		$this->set('nousers_5', $nousers_5);
		
		///
		
		$conditions_nousers_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_4 = $this->Customer->find('count', $conditions_nousers_4);
		
		$this->set('nousers_4', $nousers_4);
		
		///
		
		$conditions_nousers_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_3 = $this->Customer->find('count', $conditions_nousers_3);
		
		$this->set('nousers_3', $nousers_3);
		
		///
		
		$conditions_nousers_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_2 = $this->Customer->find('count', $conditions_nousers_2);
		
		$this->set('nousers_2', $nousers_2);
		
		///
		
		$conditions_nousers_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid 
            )));
		
		$nousers_1 = $this->Customer->find('count', $conditions_nousers_1);
		
		$this->set('nousers_1', $nousers_1);
		
		} else {
		//ELSE FILTER WHETHER THE STATS DISPLAY IS FOR SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		$conditions_nousers_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('0 days 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_7 = $this->Customer->find('count', $conditions_nousers_7);
		
		$this->set('nousers_7', $nousers_7);
		
		///
		
		$conditions_nousers_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_6 = $this->Customer->find('count', $conditions_nousers_6);
		
		$this->set('nousers_6', $nousers_6);
		
		///
		
		$conditions_nousers_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_5 = $this->Customer->find('count', $conditions_nousers_5);
		
		$this->set('nousers_5', $nousers_5);
		
		///
		
		$conditions_nousers_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_4 = $this->Customer->find('count', $conditions_nousers_4);
		
		$this->set('nousers_4', $nousers_4);
		
		///
		
		$conditions_nousers_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_3 = $this->Customer->find('count', $conditions_nousers_3);
		
		$this->set('nousers_3', $nousers_3);
		
		///
		
		$conditions_nousers_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_2 = $this->Customer->find('count', $conditions_nousers_2);
		
		$this->set('nousers_2', $nousers_2);
		
		///
		
		$conditions_nousers_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Customer.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Customer.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$nousers_1 = $this->Customer->find('count', $conditions_nousers_1);
		
		$this->set('nousers_1', $nousers_1);
		
		}
		//END FILTER WHETHER THE STATS DISPLAY IS FOR SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		
		//////////////////
		//TEST DAILY STATS
		//////////////////
		
		//FILTER WHETHER THE STATS DISPLAY IS FOR SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		if ($this->Auth->user('customers_roles') == "schooladmin") {
		
		$conditions_notests_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('0 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_7 = $this->Customer->Test->find('count', $conditions_notests_7);
		
		$this->set('notests_7', $notests_7);
		
		//
		
		$conditions_notests_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_6 = $this->Customer->Test->find('count', $conditions_notests_6);
		
		$this->set('notests_6', $notests_6);
		
		//
		
		$conditions_notests_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_5 = $this->Customer->Test->find('count', $conditions_notests_5);
		
		$this->set('notests_5', $notests_5);
		
		//
		
		$conditions_notests_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_4 = $this->Customer->Test->find('count', $conditions_notests_4);
		
		$this->set('notests_4', $notests_4);
		
		//
		
		$conditions_notests_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_3 = $this->Customer->Test->find('count', $conditions_notests_3);
		
		$this->set('notests_3', $notests_3);
		
		//
		
		$conditions_notests_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_2 = $this->Customer->Test->find('count', $conditions_notests_2);
		
		$this->set('notests_2', $notests_2);
		
		//
		
		$conditions_notests_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id')
            )));
		
		$notests_1 = $this->Customer->Test->find('count', $conditions_notests_1);
		
		$this->set('notests_1', $notests_1);
		
		//ELSE FILTER WHETHER THE STATS DISPLAY IS FOR SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		} else if ($this->Auth->user('customers_roles') == "teacher") {
			
		$classid = $this->Auth->user('classroom_id');
		
		if ($this->Auth->user('classroom_id') != null || $this->Auth->user('classroom_id') != 0) {
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		}
		
		$conditions_notests_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('0 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_7 = $this->Customer->Test->find('count', $conditions_notests_7);
		
		$this->set('notests_7', $notests_7);
		
		//
		
		$conditions_notests_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_6 = $this->Customer->Test->find('count', $conditions_notests_6);
		
		$this->set('notests_6', $notests_6);
		
		//
		
		$conditions_notests_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_5 = $this->Customer->Test->find('count', $conditions_notests_5);
		
		$this->set('notests_5', $notests_5);
		
		//
		
		$conditions_notests_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_4 = $this->Customer->Test->find('count', $conditions_notests_4);
		
		$this->set('notests_4', $notests_4);
		
		//
		
		$conditions_notests_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_3 = $this->Customer->Test->find('count', $conditions_notests_3);
		
		$this->set('notests_3', $notests_3);
		
		//
		
		$conditions_notests_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_2 = $this->Customer->Test->find('count', $conditions_notests_2);
		
		$this->set('notests_2', $notests_2);
		
		//
		
		$conditions_notests_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student',
			'Customer.school_id' => $this->Auth->user('school_id'),
			'Customer.classroom_id' => $classid
            )));
		
		$notests_1 = $this->Customer->Test->find('count', $conditions_notests_1);
		
		$this->set('notests_1', $notests_1);
		
		} else {
	
		$conditions_notests_7 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('0 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('0 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_7 = $this->Customer->Test->find('count', $conditions_notests_7);
		
		$this->set('notests_7', $notests_7);
		
		//
		
		$conditions_notests_6 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-6 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-6 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_6 = $this->Customer->Test->find('count', $conditions_notests_6);
		
		$this->set('notests_6', $notests_6);
		
		//
		
		$conditions_notests_5 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-5 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-5 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_5 = $this->Customer->Test->find('count', $conditions_notests_5);
		
		$this->set('notests_5', $notests_5);
		
		//
		
		$conditions_notests_4 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-4 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-4 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_4 = $this->Customer->Test->find('count', $conditions_notests_4);
		
		$this->set('notests_4', $notests_4);
		
		//
		
		$conditions_notests_3 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-3 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-3 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_3 = $this->Customer->Test->find('count', $conditions_notests_3);
		
		$this->set('notests_3', $notests_3);
		
		//
		
		$conditions_notests_2 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-2 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-2 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_2 = $this->Customer->Test->find('count', $conditions_notests_2);
		
		$this->set('notests_2', $notests_2);
		
		//
		
		$conditions_notests_1 = array(
        'conditions' => array(
        'and' => array(
                        array('Test.created <= ' => date('Y-m-d H:i:s', strtotime('-1 days 23:59')),
                              'Test.created >= ' => date('Y-m-d H:i:s', strtotime('-1 days, 00:00'))
                             ),
            'Customer.customers_types' => 'student'
            )));
		
		$notests_1 = $this->Customer->Test->find('count', $conditions_notests_1);
		
		$this->set('notests_1', $notests_1);
		
		}
		//END FILTER WHETHER THE STATS DISPLAY IS FOR 
		//SUPER ADMIN || SCHOOL ADMIN || TEACHER || STUDENT
		/////////////////////////////////////////////////////////////////////
		//SCHOOL ADMIN
		/////////////////////////////////////////////////////////////////////

		if ($this->Auth->user('customers_roles') == "schooladmin") {
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_roles' => 'student','Customer.school_id' => $this->Auth->user('school_id'))));
		
		$this->set('totalUsers', $totalUsers);
		
		//IDENTITY THE STUDENT WHO ATTEMPTED THE TEST
		
		$totalTests = $this->Customer->Test->find('count', array('conditions' => array('Customer.customers_roles' => 'student','Customer.school_id' => $this->Auth->user('school_id'))));
  		
		
		$this->set('totalTests', $totalTests);
		
		////////////////////////////////////////////////////////////////////////////////////////
		// TEACHER ROLES
		////////////////////////////////////////////////////////////////////////////////////////
		
		} else if ($this->Auth->user('customers_roles') == "teacher") {
		
		$classid = $this->Auth->user('classroom_id');
		
		if ($this->Auth->user('classroom_id') != null || $this->Auth->user('classroom_id') != 0) {
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		}
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_roles' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.classroom_id' => $classid)));
		
		$this->set('totalUsers', $totalUsers);
		
		//IDENTITY THE STUDENT WHO ATTEMPTED THE TEST
		
		$totalTests = $this->Customer->Test->find('count', array('conditions' => array('Customer.customers_roles' => 'student','Customer.school_id' => $this->Auth->user('school_id'),'Customer.classroom_id' => $classid)));
  		
		
		$this->set('totalTests', $totalTests);
		
		} else {
			
		//// SUPER ADMIN / HBE ADMIN ////
		
		$totalUsers = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'student')));
		
		$this->set('totalUsers', $totalUsers);
		
		//IDENTITY THE STUDENT WHO ATTEMPTED THE TEST
		
		$totalTests = $this->Customer->Test->find('count', array('conditions' => array('Customer.customers_roles' => 'student')));
  			
		$this->set('totalTests', $totalTests);
		
		//END OF IDENTITY THE STUDENT WHO ATTEMPTED THE TEST
		
		}
		
		//$days_ago = date('Y-m-d', strtotime('-1 days', strtotime(date(DATE_ATOM))));
		//$totalUsersYest = $this->Customer->find('count', array('conditions' => array('Customer.customers_types' => 'student', 'Customer.created <=' => date('Y-m-d H:i:s', strtotime('-24 hours')))));
		//$this->set('totalUsersYest', $totalUsersYest);
		//$totalTestsYest = $this->Customer->Test->find('count', array('conditions' => array('Test.created <=' => date('Y-m-d H:i:s', strtotime('-24 hours')))));
		//$this->set('totalTestsYest', $totalTestsYest);
		//$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$this->set('eachSchoolName', $this->Customer->School->find('first', array('conditions' => array('School.id' => $this->Auth->user('school_id')))));
		
		$classroomID = $this->Auth->user('classroom_id');
		
		if ($this->Auth->user('classroom_id') != null || $this->Auth->user('classroom_id') != 0) {
		
		$classroomID = explode(',', $this->Auth->user('classroom_id'));
		
		}
		
		$this->set('eachClassroomNames', $this->Customer->Classroom->find('all', array('conditions' => array('Classroom.id' => $classroomID))));
			
		$breadcrumbs = "<a class='current'>Dashboard</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);

		$this->layout = 'admin_student';
								
		$teachers = $this->Customer->find('list', array('conditions' => array('customers_types' => 'teacher'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name')));

		$this->set(compact('teachers','classes'));		
	}
	
	////////////////////////////////////////////////
	////////////////////////////////////////////////
	////////////////////////////////////////////////
	
	function error() {
		
	}
	
	function cust_order() {
	return $this->Customer->find('all', array('conditions' => array('id' => $this->Auth->user('id'))));
	}
	
	function account() {
		$this->layout = 'admin_student';
		$this->pageTitle= 'SumyKids - Personal Information';
		$this->Customer->id = $this->Auth->user('id');
		$this->set('customer', $this->Customer->read());
	}
	
	function account_edit($id = null) {
			
		$this->pageTitle= 'SumyKids - Update Personal Information';
			
		$this->layout = 'admin_student';
			
		$this->Customer->id = $this->Auth->user('id');
		if (empty($this->data)) {
			$this->Customer->id = $this->Auth->user('id');
			$this->data = $this->Customer->read();
			$this->set('custIDedit', $this->Auth->user('id'));
			$this->set('customers', $this->paginate('Customer'));
		} else {
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h4 class="alert_success">Your Personal Information have been updated.</h4>');
				$this->redirect(array('controller' => 'customers', 'action' => 'account'));
			}
		}
	}
	
	function logout() {
		$this->layout = 'admin_student';
		$usrInfo = $this->Auth->user();
	    $this->Customer->id = $this->Auth->user('id'); // target correct record
		$this->Customer->saveField('lastlogin', date(DATE_ATOM)); // save login time
		
		if ($this->Auth->user('customers_roles') == "schooladmin" || $this->Auth->user('customers_roles') == "teacher") {
		
		$expirydate = $this->Customer->School->find('first', array('conditions' => array('School.id' => $this->Auth->user('school_id'))));
		
		$exp = round ((strtotime($expirydate['School']['expiry'])-time())/(60*60*24));
		
		if ($exp <= 0)  {
		$this->Session->setFlash('<p style="color:red">Your account has been locked. Please renew your subscription.</p>');
		} else {
		$this->Session->setFlash('<p style="color:green">You have succesfully logout.</p>');
		}
		
		} else {
			
		$this->Session->setFlash('<p style="color:green">You have succesfully logout.</p>');

		}
		
		$this->redirect($this->Auth->logout());
	}
	
	function registration() {

		$this->pageTitle= 'SumyKids - Registration';
			
		$this->layout = 'admin_student';
			
		if (!empty($this->data)) {
			$this->Customer->create();
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<p style="color:green;">Congratulations. You\'ve successfully registered as a SumyKids Member.</h4>');
				$this->redirect(array('action'=>'login'));
			}
		}
	}

	// Create admin_edit page

	function admin_edit($id = null) {
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
		
		$linkstudent = Router::url(array('controller' => "customers", 'action' => "index", "admin" => true), true);
		
		
		if ($this->params['pass'][0] == $this->Auth->user('id')) { 
				
				$lastbreadcrumb = "My Account";
				$accountbreadcrumb = "";
				$this->pageTitle= 'CARS & STARS Online - My Account';
				
				} else {
					
				$lastbreadcrumb = "Edit Student";
				$accountbreadcrumb = "<a href='".$linkstudent."'>Student</a><div class='breadcrumb_divider'></div>";
				$this->pageTitle= 'CARS & STARS Online - Edit Student';
				
				}
				
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
		
		
		$this->set('breadcrumbs', $breadcrumbs);
						
		$this->layout = 'admin_student';
			
		$this->Customer->id = $id;
				$this->set('customer', $this->Customer->read());
				

				if (empty($this->data)) {
					$this->data = $this->Customer->read();
				} else {
					
					$this->Customer->create();
					
					$this->data['Customer']['customers_email_address'] = "";
					
					$this->data['Customer']['customers_password'] = "";
					
					$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime($this->data['Customer']['customers_dob']));
					
					$this->data['Customer']['customers_name'] = $this->data['Customer']['customers_firstname']." ".$this->data['Customer']['customers_lastname'];
					
					$this->data['Customer']['customers_teacher_id'] = implode(',', $this->data['Customer']['customers_teacher_id']);					
										
				if ($this->Customer->save($this->data)) {
					
					$upload = $this->Customer->findById($id);
							
					$this->Customer->save();

					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,160,160, "sets");
	    			if(isset($image_path)) {
	     				$this->Customer->saveField('customers_image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
	    			}     
					
					$this->Session->setFlash('<h4 class="alert_success">Student record has been updated.</h4>');
					$this->redirect(array('action'=>'index'));
							 }
					}
				
				$fu = $this->Customer->find('first',array('conditions'=>array('Customer.id'=> $this->params['pass'][0])));
				
				//Debugger::dump();
		
		$classes = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $fu['Customer']['school_id']), 'fields' => array('name'), 'order' => 'name ASC'));
		
		$teachersschooladminfiltered = $this->Customer->find('list', array('conditions' => array('Customer.school_id' => $this->Auth->user('school_id'), 'Customer.customers_roles' => 'teacher'),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
		
		
		
		
		$classesfilteredmany = $this->Customer->find('first', array('conditions' => array('Customer.id'=>$id)));
		
		//Debugger::Dump($classesfilteredmany['Customer']['customers_teacher_id']);	
				
		$teachersschooladminfilteredmany = $this->Customer->find('list', array('conditions' => array('Customer.id IN ('.$classesfilteredmany['Customer']['customers_teacher_id'].')'),'fields' => array('customers_name'),'order' => 'Customer.customers_lastname ASC'));
		
		//debug($teachersschooladminfilteredmany);	
			
		
		$classesfiltered = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
				
		$schools = $this->Customer->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$schoolsfiltered = $this->Customer->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
						
		$teachers = $this->Customer->find('list',array('conditions' => array('Customer.classroom_id LIKE' => '%'.$fu['Customer']['classroom_id'].'%','Customer.customers_types' => 'teacher'),'fields' => array('customers_name'), 'order' => 'customers_name ASC'));
		
		$classid = explode(',', $this->Auth->user('classroom_id'));
		
		$classesfilteredteacher = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.id' => $classid), 'order' => 'name ASC'));

		$teachersfiltered = $this->Customer->find('list', array('conditions' => array('Customer.id' => $this->Auth->user('id')),'fields' => array('customers_name'),'order' => 'customers_lastname ASC'));
			
		$this->set(compact('classes','schools','classesfiltered','schoolsfiltered','teachers','teachersschooladminfiltered','classesfilteredteacher','teachersfiltered','teachersschooladminfilteredmany')); 
		
		
		
	}
	
	function admin_edit_teachers($id = null) {
			
				$this->layout = 'admin_student';
								
				$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
				
				$linkteacher = Router::url(array('controller' => "customers", 'action' => "teachers", "admin" => true), true);
				
				if ($this->params['pass'][0] == $this->Auth->user('id')) { 
				
				$lastbreadcrumb = "My Account";
				$accountbreadcrumb = "";
				$this->pageTitle= 'CARS & STARS Online - My Account';
				
				} else {
					
				$lastbreadcrumb = "Edit Teacher";
				$accountbreadcrumb = "<a href='".$linkteacher."'>Teacher</a><div class='breadcrumb_divider'></div>";
				$this->pageTitle= 'CARS & STARS Online - Edit Teacher';
				
				}
				
			$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div>".$accountbreadcrumb."<a class='current'>".$lastbreadcrumb."</a>";
			
				$this->set('breadcrumbs', $breadcrumbs);
				
				//**Important** display the image in the edit form
				$this->Customer->id = $id;
				$this->set('customer', $this->Customer->read());
				

				if (empty($this->data)) {
					$this->data = $this->Customer->read();
				} else {
					
					$this->Customer->create();
					
					$this->data['Customer']['customers_dob'] = date("Y-m-d",strtotime($this->data['Customer']['customers_dob']));
					
					$this->data['Customer']['customers_name'] = $this->data['Customer']['customers_firstname']." ".$this->data['Customer']['customers_lastname'];
					
					if ($this->data['Customer']['classroom_id'] == "") {
				
						$this->data['Customer']['classroom_id'] = NULL; 
					
					} else {
				
						$this->data['Customer']['classroom_id'] = implode(',', $this->data['Customer']['classroom_id']);						
					}
					
					
				$upload = $this->Customer->findById($id);	
				
				
					
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MASS DELETE SELECTED TEACHER ID FROM STUDENT     
		
		
		//CHECK IF HBE ADMIN HAS NO CLASS SKIP THIS ACTION
		if($upload['Customer']['classroom_id'] != "") {                                                   //
		
		$listofstudentbelongstoexistingsclasses = $this->Customer->find('all', array('conditions' => array('Customer.customers_roles' => 'student','Customer.classroom_id IN'."(".$upload['Customer']['classroom_id'].")")));
								
		foreach ($listofstudentbelongstoexistingsclasses as $listofstudentbelongstoexistingsclass) {
			
		if (preg_match('/,'.$upload['Customer']['id'].'/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'])) {		
			$findvalue = ','.$upload['Customer']['id'];
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
			
			//Debugger::Dump($updatedteacherIDS);
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id',$updatedteacherIDS);
			$this->Customer->save();

		} else if (preg_match('/'.$upload['Customer']['id'].'/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']))  {
			
			if (preg_match('/'.$upload['Customer']['id'].',/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'])) {
			
			$findvalue = $upload['Customer']['id'].",";
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
			
			} else {
				
			$findvalue = $upload['Customer']['id'];
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
				
			}
			
			//Debugger::Dump($updatedteacherIDS);
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id',$updatedteacherIDS);
			$this->Customer->save();
			
			}
			
		
										
			}
		
		}
								
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					
					
					
					
					
				if ($this->Customer->save($this->data)) {
					
					$upload = $this->Customer->findById($id);
											
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MASS ADD TO THE NEW STUDENT //
		
		//CHECK IF HBE ADMIN HAS NO CLASS SKIP THIS ACTION
		if($upload['Customer']['classroom_id'] != "") {
		
		$listofstudentbelongstoexistingsclasses = $this->Customer->find('all', array('conditions' => array('Customer.customers_roles' => 'student','Customer.classroom_id IN'."(".$upload['Customer']['classroom_id'].")")));
						
		foreach ($listofstudentbelongstoexistingsclasses as $listofstudentbelongstoexistingsclass) {
			
			if($listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'] != null) {
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id', $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'].",".$upload['Customer']['id']);
			$this->Customer->save();
			
			} else {
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id', $upload['Customer']['id']);
			$this->Customer->save();
				
				}
											
			}
		
		}
								
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		
							$this->Customer->save();
										
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,160,160, "sets");
	    			if(isset($image_path)) {
	     				$this->Customer->saveField('customers_image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
	    			}     
					
					///
					/// CHECK WHETHER MY ACCOUNT OR TEACHER LIST
					
				    if ($this->params['pass'][0] == $this->Auth->user('id')) { 
					
					$this->Session->setFlash('<h4 class="alert_success">Your account details have been updated.</h4>');
					$this->redirect(array('action'=>'edit_teachers', $this->Auth->user('id')));
					
					 } else { 
					
					$this->Session->setFlash('<h4 class="alert_success">Teacher record has been updated.</h4>');
					$this->redirect(array('action'=>'teachers'));
					
					} 
					
							 }
					}
					
		$classes = $this->Customer->Classroom->find('list', array('fields' => array('name'),'order'=>array('Classroom.name ASC')));
		
		$classesfiltered = $this->Customer->Classroom->find('list', array('conditions' => array('Classroom.school_id' => $this->Auth->user('school_id')),'order'=>array('Classroom.name ASC')));
		
		$schools = $this->Customer->School->find('list', array('fields' => array('name'), 'order' => 'name ASC'));
		
		$schoolsfiltered = $this->Customer->School->find('list', array('conditions' => array('School.id' => $this->Auth->user('school_id')), 'order' => 'name ASC'));
			
		$this->set(compact('classes','schools','classesfiltered','schoolsfiltered')); 
		
		}

	/////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////
	
	function admin_delete($id) {
		/*
		$upload = $this->Customer->findById($id);
		
		$vaildOrder = $this->Customer->Test->find('count',array('conditions' => array('Test.customer_id' => $id)));
						
		if ($vaildOrder > 0) {
		$this->Session->setFlash('<h4 class="alert_success">The Student : '.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].' has test record(s) and cannot be deleted.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'index'));
		
		} else {
		$this->Customer->delete($id);
		$this->Session->setFlash('<h4 class="alert_success">The Student : '.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].' has been deleted.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'index'));
		}*/
		
		$upload = $this->Customer->findById($id);
				
		$this->Customer->Test->deleteAll(array('Test.customer_id' => $id), false);
		
		$this->Customer->Test->Score->deleteAll(array('Score.customer_id' => $id), false);
		
		$this->Customer->delete($id);
		
		$this->Session->setFlash('<h4 class="alert_success">The Student : '.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].' has been deleted.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'index'));
		
	}
	
	function admin_delete_teachers($id) {

		$upload = $this->Customer->findById($id);
		
		$classroom_value = $upload['Customer']['classroom_id'];
		
		$vaildStudent = $this->Customer->find('count',array('conditions' => array('Customer.customers_teacher_id IN'."(".$id.")")));
						
	    if ($upload['Customer']['customers_roles'] == "schooladmin" && $this->Auth->user('customers_roles') == "schooladmin") {
			$this->Session->setFlash('<h4 class="alert_error">'.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].' is an School Administrator and cannot be deleted.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'teachers'));
		
		} else if ($vaildStudent > 0) {
			
			$this->Session->setFlash('<h4 class="alert_error">There are '.$vaildStudent.' students assigned to '.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].'. Please reassign the '.$vaildStudent.' students first.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'teachers'));
			
		} else {
			
		$this->Customer->delete($id);
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MASS DELETE SELECTED TEACHER ID FROM STUDENT                                                        //
		
		if ($classroom_value != NULL) {	
				
		$listofstudentbelongstoexistingsclasses = $this->Customer->find('all', array('conditions' => array('Customer.customers_roles' => 'student','Customer.classroom_id IN'."(".$upload['Customer']['classroom_id'].")")));
						
		foreach ($listofstudentbelongstoexistingsclasses as $listofstudentbelongstoexistingsclass) {
			
		if (preg_match('/,'.$upload['Customer']['id'].'/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'])) {		
			$findvalue = ','.$upload['Customer']['id'];
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
			
			//Debugger::Dump($updatedteacherIDS);
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id',$updatedteacherIDS);
			$this->Customer->save();

		} else if (preg_match('/'.$upload['Customer']['id'].'/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']))  {
			
			if (preg_match('/'.$upload['Customer']['id'].',/',$listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id'])) {
			
			$findvalue = $upload['Customer']['id'].",";
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
			
			} else {
				
			$findvalue = $upload['Customer']['id'];
			$updatedteacherIDS = str_replace($findvalue, "", $listofstudentbelongstoexistingsclass['Customer']['customers_teacher_id']);
				
			}
			
			//Debugger::Dump($updatedteacherIDS);
			
			$this->Customer->read(null, $listofstudentbelongstoexistingsclass['Customer']['id']);
			$this->Customer->set('customers_teacher_id',$updatedteacherIDS);
			$this->Customer->save();
			
		}
		
	
									
		}
		
		}
		
		
										
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$this->Session->setFlash('<h4 class="alert_success">The Teacher : '.$upload['Customer']['customers_firstname']." ".$upload['Customer']['customers_lastname'].' has been deleted.</h4>');
		$this->redirect(array('controller' => 'customers', 'action' => 'teachers'));
		}
	}
	
	function admin_settings() {
		
		$this->pageTitle= 'CARS & STARS Online / Settings';
		
		$this->layout = 'admin_student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
					
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Settings</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
	
	}
	
	function admin_help() {
		
		$this->pageTitle= 'CARS & STARS Online / Help';
		
		$this->layout = 'admin_student';
		
		$link = Router::url(array('controller' => "customers", 'action' => "dashboard", "admin" => true), true);
					
		$breadcrumbs = "<a href='".$link."'>Dashboard</a><div class='breadcrumb_divider'></div><a class='current'>Help</a>";
		
		$this->set('breadcrumbs', $breadcrumbs);
	
	}
	
		function admin_readCSV() {
			
		App::import("Vendor","parsecsv");

		$csv = new parseCSV();
		
		$filename = sha1($u['Customer']['customers_email_address'].rand(0,100));
	
		move_uploaded_file($this->data['Customer']['CSV']['tmp_name'], "upload/" . $filename.".csv");
			 
		$filepath = "upload/" . $filename.".csv";
	 
		$csv->auto($filepath);
	
		$this->Customer->saveAll($csv->data);
				
		$this->Session->setFlash('<h4 class="alert_success">Your CSV file has been imported successfully.</h4>');
		
		$this->redirect(array('controller' => 'customers', 'action' => 'settings'));
	
	}
	
	
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	
	function newsfeeds() {
	return $this->Customer->find('all', array('order' => 'Customer.id DESC', 'limit' => 3));
	}
	
	function getteacher($id, $session) {
		
	return $this->Customer->Test->find('first', array('conditions' => array('Test.bk_session_id' => $session,'Customer.customers_types' => 'teacher'), array('order' => 'Customer.customers_name ASC')));
	}
	
	function getactualteacher($id) {
		
	$name = $this->Customer->find('first', array('conditions' => array('Customer.id' => $id)));
		
	return $this->Customer->find('all', array('conditions' => array('Customer.classroom_id' => $name['Customer']['classroom_id'],'Customer.customers_types' => 'teacher'), array('order' => 'Customer.customers_name ASC')));
	}
	
	///////////////////////////////////////////
	//LIST IF STUDENT BASED ON THE TEST LIST
	///////////////////////////////////////////
	
	function listofteststudents($id, $session) {
		
	return $this->Customer->Test->find('all', array('conditions' => array('Test.bk_session_id' => $session,'Customer.customers_types' => 'student'), array('order' => 'Customer.customers_name ASC')));
	}
	
	function noofteststudents($id, $session) {
				
	return $this->Customer->Test->find('count', array('conditions' => array('Test.bk_session_id' => $session,'Customer.customers_types' => 'student'), array('order' => 'Customer.customers_name ASC')));
	}
	
	
	///////////////////////////////////////////
	//FIRST TIME GENERATE THE QNS WITH THE LIST OF STUDENT ASSIGNED TO THE TEACHER (BASED ON THE CUSTOMER LIST)
	///////////////////////////////////////////

	function listofstudents($id) {
		
	$name = $this->Customer->find('first', array('conditions' => array('Customer.id' => $id)));
		
	return $this->Customer->find('all', array('conditions' => array('Customer.classroom_id' => $name['Customer']['classroom_id'],'Customer.customers_types' => 'student'), array('order' => 'Customer.customers_name ASC')));
	}
	
	function noofstudents($id) {
		
	$name = $this->Customer->find('first', array('conditions' => array('Customer.id' => $id)));
		
	return $this->Customer->find('count', array('conditions' => array('Customer.classroom_id' => $name['Customer']['classroom_id'],'Customer.customers_types' => 'student'), array('order' => 'Customer.customers_name ASC')));
	}
	
	///////////////////////////////////////////
	
	function resumetest($users_userID) {
	
	$ScoreLink = $this->Customer->find('first', array('conditions' => array('Customer.id' => $users_userID)));
	
	$fullUrl = $ScoreLink['Customer']['resumetest'];
	
	if($fullUrl != NULL) {
	
	$scoreId = explode("/", $fullUrl);
	
	$checkScoreUrl = $this->Customer->Test->find('all', array('conditions' => array('Test.bk_session_id' => $scoreId[5])));
	
	if (count($checkScoreUrl) == 0) {
		$vaildlink = ""; 
	} else {
		$vaildlink = $ScoreLink['Customer']['resumetest'];
	}
	
	} else {
		$vaildlink = "";
	}
	//Debugger::Dump(count($checkScoreUrl));	
	//Debugger::Dump($checkScoreUrl);	
	
	return $vaildlink;
					
	}
	
	///////////////////////////////////////////
	
	function teachernames($id) {
		return $this->Customer->find('all', array('conditions' => array('Customer.id IN'."(".$id.")")));
	}

}
?>