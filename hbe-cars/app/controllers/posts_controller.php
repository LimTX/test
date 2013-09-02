<?php
    class PostsController extends AppController {
    	var $name = 'Posts';
		
		var $components = array("Image","RequestHandler");
		
		var $helpers = array('Cache');	
			
		var $paginate = array('limit' => 5, 'page' => 1,'order'=>array('title' => 'asc')); 
		
		function index() {
			$this->set('posts', $this->paginate('Post'));
			// $this->set('posts', $this->Post->find('all'));
			$this->layout = 'admin';
		}
		
		function view($id = null) {
			$this->Post->id = $id;
			$this->set('post', $this->Post->read());
			$this->layout = 'admin';
		}
		
		function add() {
			$this->layout = 'admin';
			
			if (!empty($this->data)) {
				$this->Post->create();
				if ($this->Post->save($this->data)) {
					
					//Debugger::dump($this->data);
					//Debugger::dump($this->data['Image']);
					//Debugger::dump($this->data['Image']['name1']);
					
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 573,380,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Post->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					$this->Session->setFlash('<p>Your category has been saved.</p><br/>');
					$this->redirect(array('controller' => 'posts', 'action' => 'index'));
				}
			}
		}
		
		function delete($id) {
			$upload = $this->Post->findById($id);
   			$this->Image->delete_image($upload['Post']['image'],"sets");
			
			$this->Post->delete($id);
			$this->Session->setFlash('<p>The post with id: '.$id.' has been deleted.</p>'."<br/>");
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			
		}
		
		function edit($id = null) {
			
			$this->layout = 'admin';
			
			$this->Post->id = $id;
				if (empty($this->data)) {
					$this->data = $this->Post->read();
				} else {
					
					$upload = $this->Post->findById($id);
   					$this->Image->delete_image($upload['Post']['image'],"sets");
					
					$this->Post->create();
				if ($this->Post->save($this->data)) {
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 573,380,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Post->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
	    			}     
					
					$this->Session->setFlash('<p>Your category has been updated.</p><br/>');
					$this->redirect(array('controller' => 'posts', 'action' => 'index'));
							 }
					}
			}
	}
?>