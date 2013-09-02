<?php
App::import('Sanitize');
class CategoriesController extends AppController {

    var $name = 'Categories';	
	var $uses = array('Category');
	
	var $helpers = array('Html', 'Form');

	// Pagination 
	var $paginate = array('limit' => 8, 'page' => 1,'order'=>array('name' => 'asc')); 
	
	// Image plug in
	var $components = array("Image","RequestHandler");	
	
	function admin_search() {
		$this->Category->recursive = 0;
		if ($this->data['Category']['search_text']) {
			$this->set('categories', 
			$this->paginate('Category', array('AND' => array('Category.name LIKE' => '%' . 
        $this->data['Category']['search_text'] . '%', 'Category.age_group LIKE' => '%' . 
        $this->data['Category']['search_agegroup'] . '%')))); 
		}
		else {
			$this->set('categories', $this->paginate());
		}
			$this->layout = 'admin';
	}
	
	// Create admin_index page
	function admin_index() {
			$this->pageTitle= 'SumyKids - Categories';
			
			$this->paginate = array('conditions' => array('Category.parent_id' => '0'),'limit' => 8, 'page' => 1,'order'=>array('name' => 'asc'));
			
			$data = $this->paginate('Category');			
			
			$this->set('categories',$data);
			
			// $this->set('categories', $this->Category->find('all'));
			$this->layout = 'admin';
	}
	
	//Create admin_subcategories page
	function admin_subcategories() {
			$this->pageTitle= 'SumyKids - Sub-Categories';
			
			$this->paginate = array('conditions' => array('Category.parent_id <>' => '0'),'limit' => 8, 'page' => 1,'order'=>array('name' => 'asc'));
			
			$data = $this->paginate('Category');			
			
			$this->set('categories',$data);
			
			//$this->set('categories', $this->paginate('Category'));
			// $this->set('categories', $this->Category->find('all'));
			$this->layout = 'admin';
	}
	
	// Create admin_view page
	function admin_view($id = null) {
		
		$this->pageTitle= 'SumyKids - Categories';
		
			$this->Category->id = $id;
			$this->set('category', $this->Category->read());
			$this->layout = 'admin';
			
			$upload = $this->Category->findById($id);
			
			$subtags = $this->Category->find('all',array('conditions' => array('parent_id' => $upload['Category']['id'])));
			
			$listproducts = $this->Category->Product->find('all',array('conditions' => array('Product.category_id' => $upload['Category']['id'])));
			
			//Debugger::dump($this->params);

			$this->set(compact('subtags','listproducts')); 
	}
	
	// Create admin_subcategories_view page
	function admin_subcategories_view($id = null) {
		
		$this->pageTitle= 'SumyKids - Sub-Categories';
		
			$this->Category->id = $id;
			$this->set('category', $this->Category->read());
			$this->layout = 'admin';
			
			$upload = $this->Category->findById($id);
			
			$listproducts = $this->Category->Product->find('all',array('conditions' => array('Product.category_parent_id' => $upload['Category']['id'])));
			
			//Debugger::dump($upload['Category']['id']);

			$this->set(compact('listproducts')); 
	}
	
	// Create admin_add page
	
	function admin_add() {
		
			$this->pageTitle= 'SumyKids - Add Category';
			
			$this->layout = 'admin';
			
			if (!empty($this->data)) {
				$this->Category->create();
				if ($this->Category->save($this->data)) {
					
					//Debugger::dump($this->data);
					
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Category->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					$this->Session->setFlash('<p>Your category has been saved.</p><br/>');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
	
	
	// Delete image
	function admin_delete_image($id = null) {
	
		// set the id of the dvd
		$this->Category->id = $id;

		$this->set('category', $this->Category->read());
		$this->data = $this->Category->read();
		
		// delete the physcial image from the server
		$upload = $this->Category->findById($id);
   		$this->Image->delete_image($upload['Category']['image'],"sets");
		
		// remove the image's title from the database
		$this->Category->saveField('image', "");

		$this->Session->setFlash('<p>Category\'s image has been deleted successfully.</p><br/>');
		
		// redirect to the existing page
		$this->redirect($this->referer());

	}
	
	// Create admin_subcategories_add page
	
	function admin_subcategories_add() {
		
			$this->pageTitle= 'SumyKids - Add Sub-Category';
			
			$this->layout = 'admin';
			if (!empty($this->data)) {
				$this->Category->create();
				if ($this->Category->save($this->data)) {
					
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Category->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					$this->Session->setFlash('<p>Your sub-category has been saved.</p><br/>');
					$this->redirect(array('controller' => 'categories', 'action' => 'subcategories'));
				}
			}
			// find category options in a list format  
			    $categories = $this->Category->find('list',array('conditions' => array('parent_id' => 0),'order' => 'Category.name ASC'));			
				// set the variables so they can be accessed from the view  
				$this->set(compact('categories'));   
			
		}
		
	// Create admin_edit page
		
	function admin_edit($id = null) {
			
			$this->pageTitle= 'SumyKids - Edit Category';
			
			$this->layout = 'admin';
			
			//Display category image in the edit form
			$this->Category->id = $id;
			$this->set('category', $this->Category->read());
			
			$this->Category->id = $id;
				if (empty($this->data)) {
					$this->data = $this->Category->read();
				} else {
					$this->Category->create();
				if ($this->Category->save($this->data)) {
					
					//image and product code
					
					$upload = $this->Category->findById($id);
					
					//sub-category and product code
										
					$subtags = $this->Category->find('all',array('conditions' => array('parent_id' => $upload['Category']['id'])));
												
					if($upload['Category']['status'] == 'Archived') {
										
					//Update the sub-category status to archived
					$this->Category->updateAll(
   					array('Category.status' => "'Archived'"),
   					array('Category.parent_id' => $upload['Category']['id'])
   					);
					
					$this->Category->Product->updateAll(
   					array('Product.status' => "'Archived'"),
   					array('Product.category_id' => $upload['Category']['id'])
   					);}
					
					else {
											
					$this->Category->updateAll(
   					array('Category.status' => "'Published'"),
   					array('Category.parent_id' => $upload['Category']['id'])
   					);
					
					$this->Category->Product->updateAll(
   					array('Product.status' => "'Published'"),
   					array('Product.category_id' => $upload['Category']['id'])
   					);
					
					}
					
					//image code
					
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Category->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
	    			}     
					
					$this->Session->setFlash('<p>Your category has been updated.</p><br/>');
					$this->redirect(array('action'=>'index'));
							 }
					}
			}
	
	// Create admin_subcategories_edit function
			
	function admin_subcategories_edit($id = null) {

			$this->pageTitle= 'SumyKids - Edit Sub-Category';
			
			$this->layout = 'admin';
						
			$this->Category->id = $id;
			
			if (empty($this->data)) {
					$this->data = $this->Category->read();
					//set to enable delete function
					$this->set('category', $this->Category->read());
			} else {
			if ($this->Category->save($this->data)) {
					
					//product and image code
					
					$upload = $this->Category->findById($id);
										
					$subtags = $this->Category->find('all',array('conditions' => array('parent_id' => $upload['Category']['id'])));
												
					if($upload['Category']['status'] == 'Archived') {
										
					//Update the product status to archived
					
					$this->Category->Product->updateAll(
   					array('Product.status' => "'Archived'"),
   					array('Product.category_parent_id' => $upload['Category']['id'])
   					);}
					
					else {
					
					$this->Category->Product->updateAll(
   					array('Product.status' => "'Published'"),
   					array('Product.category_parent_id' => $upload['Category']['id'])
   					);
					
					}
					
					//image code
						
					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Category->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
					}
						$this->Session->setFlash('<p>Your sub-category has been saved.</p><br/>');
						$this->redirect(array('controller' => 'categories', 'action' => 'subcategories'));
}
}
				//find category options in a list format  
			    $categories = $this->Category->find('list',array('conditions' => array('parent_id' => 0),'order' => 'Category.name ASC'));			
				// set the variables so they can be accessed from the view  
				$this->set(compact('categories'));   	
			}

	// Create admin_delete function
	
	function admin_delete($id) {
			
			$upload = $this->Category->findById($id);
   			$this->Image->delete_image($upload['Category']['image'],"sets");
			
			//check whether product is associated to category
			$rowProduct = $this->Category->Product->find( 
			   'count', array(
				  'conditions' => array(
					 'Product.category_id' => $id
				  )
			   )
			);
			
			//check whether sub-category is associated to category
			$rowSubCategory = $this->Category->find( 
			   'count', array(
				  'conditions' => array(
					 'Category.parent_id' => $id
				  )
			   )
			);
			
			if ($rowProduct == 0 && $rowSubCategory == 0) {
			//Can Delete
			$this->Category->delete($id);
			$this->Session->setFlash('<p>The Category: '.$upload['Category']['name'].' has been deleted.</p>'."<br/>");
			//$this->redirect(array('controller' => 'categories', 'action' => 'index'));
			$this->redirect($this->referer()); 
			} else {
			//Cannot Delete
			$this->Session->setFlash('<p>Sorry. This category cannot be deleted. Please ensure that no sub-category or product is associated to this category.</p><br/>');
			$this->redirect($this->referer()); 
			} 	
		
		 	
		}
		
	// Create admin_subcategories_delete function
	
	function admin_subcategories_delete($id) {
			
			$upload = $this->Category->findById($id);
   			$this->Image->delete_image($upload['Category']['image'],"sets");
			
			//check whether product is associated to category
			$rowProduct = $this->Category->Product->find( 
			   'count', array(
				  'conditions' => array(
					 'Product.category_parent_id' => $id
				  )
			   )
			);
			
			if ($rowProduct == 0) {
			//Can Delete
			$this->Category->delete($id);
			$this->Session->setFlash('<p>The Category: '.$upload['Category']['name'].' has been deleted.</p>'."<br/>");
			//$this->redirect(array('controller' => 'categories', 'action' => 'index'));
			$this->redirect($this->referer()); 
			} else {
			//Cannot Delete
			$this->Session->setFlash('<p>Sorry. This category cannot be deleted. Please ensure that no product is associated to this sub-category.</p><br/>');
			$this->redirect($this->referer()); 
			} 	
		
		 	
		}
	
	function getAll() {
		return $this->Category->getCategories();
	}
	
	function getCategoryName() {
    $catyID = $this->Session->read('Category.id');
	$categories = $this->Category->findAllById($catyID);	
	return $categories;
	}
	
	function getSubCategoryName() {
    $catyID = $this->Session->read('Category.id');
	$categories = $this->Category->find('all', array('conditions' => array('parent_id' => $catyID, 'status' => 'Published'),'order' => 'Category.name ASC'));	
	return $categories;
	}
	
	function getProdCategoryName() {
    $catyID = $this->Session->read('Category.id');
	$subcatyID = $this->Session->read('Category.parent_id');
	$categories = $this->Category->find('all', array('conditions' => array('id' => $subcatyID)));	
	return $categories;
	}
	
	function menu() {
	return $this->Category->find('all', array('conditions' => array('parent_id' => 0, 'status' => 'Published'),'order' => 'Category.name ASC'));
	
	}

}
?>