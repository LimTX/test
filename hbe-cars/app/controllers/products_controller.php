<?php
class ProductsController extends AppController {	
	var $name = 'Products';	
	var $uses = array('Product');
	
	var $helpers = array('Html','Form','Ajax','Javascript', 'Text', 'Paginator');

	// Pagination 
	var $paginate = array('limit' => 8, 'page' => 1,'order'=>array('Product.name' => 'asc')); 
	
	// Image Plug in
	var $components = array("Image","RequestHandler","Password");
	
	// Create Advanced Search 
	
	function adv_search() {
	
	$this->data['Product']['search_text3'];
	
		$conditions = 
		array(
		'AND' => array(
		array('Product.name LIKE' => '%'. $this->data['Product']['search_text3'] .'%'),
		array('Product.suburb LIKE' => '%'. $this->data['Product']['search_suburb2'] .'%'),
		array('Product.category_id LIKE' => '%'. $this->data['Product']['search_category2'] .'%'),
		array('Product.age_group LIKE' => '%'. $this->data['Product']['search_agegroup2'] .'%')
		)
		);		
		
	$this->Product->recursive = 0;
		if ($this->data['Product']['search_text3']) {
			$this->set('products', $this->paginate('Product', array('AND' => array('Product.name LIKE' => '%' . 
        $this->data['Product']['search_text3'] . '%', 'Product.age_group LIKE' => '%' . 
        $this->data['Product']['search_agegroup2'] . '%','Product.suburb LIKE' => '%' . 
        $this->data['Product']['search_suburb2'] . '%','Product.category_id LIKE' => '%' . 
        $this->data['Product']['search_category2'] . '%','Product.description LIKE' => '%' . 
        $this->data['Product']['search_text3'] . '%')))); 
		
		}
		else {
			$this->set('products', $this->paginate());
		}
			
			$suburb = $this->Product->find('list',  array(
'fields' => array('Product.suburb','Product.suburb'),'group' => 'Product.suburb','order'=>array('Product.suburb ASC')));
			
			$categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));
			
			$this->set(compact('suburb','categories'));
		
			$this->layout = 'advsearch';
			
			$totalUsers2 = $this->Product->find('count', array('conditions' => $conditions));
			$this->set('totalUsers2', $totalUsers2);
			
	}
	
	
	// Create admin_search
	
	function admin_search() {
		
		//Debugger::dump($this->data['Product']['search_suburb']);
		
		$this->Product->recursive = 0;
		if ($this->data['Product']['search_text2']) {
			$this->set('products', 
			$this->paginate('Product', array('AND' => array('Product.name LIKE' => '%' . 
        $this->data['Product']['search_text2'] . '%', 'Product.age_group LIKE' => '%' . 
        $this->data['Product']['search_agegroup'] . '%','Product.suburb LIKE' => '%' . 
        $this->data['Product']['search_suburb'] . '%','Product.category_id LIKE' => '%' . 
        $this->data['Product']['search_category'] . '%')))); 
		}
		else {
			$this->set('products', $this->paginate());
		}
			$this->layout = 'admin';
			
			$suburb = $this->Product->find('list',  array(
'fields' => array('Product.suburb','Product.suburb'),'group' => 'Product.suburb','order'=>array('Product.suburb ASC')));
			
			$categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));
			
			$this->set(compact('suburb','categories'));
	}
	
		function latest() {
			
			$this->paginate = array(
    'limit' => 4,
    'order' => array('Product.id' => 'DESC'));

			
			$this->set('products', $this->paginate());
			$this->layout = 'user';
		}
		
		function featured() {
			
			$this->paginate = array('conditions' => array('Product.featured'=>1),
    'limit' => 3,
    'order' => array('Product.id' => 'DESC'));

			
			$this->set('products', $this->paginate());
			$this->layout = 'user';
		}
	
		function search() {
			
			$this->params['url']['search_text'];

		$conditions = 
    array(
    'OR' => array(
    array('Product.name LIKE' => '%'. $this->params['url']['search_text'] .'%'),
	array('Product.description LIKE' => '%'. $this->params['url']['search_text'] .'%'),
    array('Product.suburb LIKE' => '%'. $this->params['url']['search_text'] .'%')
    )
    );			
		$totalUsers = $this->Product->find('count', array('conditions' => $conditions));
				
		$this->set('totalUsers', $totalUsers);
		//Debugger::dump($searchtag);
		$this->Product->recursive = 0;
		if ($this->params['url']['search_text']) {
			$this->set('products', $this->paginate('Product', array('OR' => array('Product.name LIKE' => '%' . 
        $this->params['url']['search_text'] . '%', 'Product.description LIKE' => '%' . 
        $this->params['url']['search_text'] . '%', 'Product.suburb LIKE' => '%' . 
        $this->params['url']['search_text'] . '%'))));
		/**,'Product.age_group LIKE' => '%' . 
        $this->data['Product']['search_agegroup'] . '%','Product.category_id LIKE' => '%' . 
        $this->data['Product']['search_category'] . '%')))); 
		} 
		
		/**,'Product.age_group LIKE' => '%' . 
        $this->data['Product']['search_agegroup'] . '%','Product.category_id LIKE' => '%' . 
        $this->data['Product']['search_category'] . '%')))); **/
		}
		else {
		$this->set('products', $this->paginate());
		}
			
		
			$this->layout = 'advsearch';
			
			/**$suburb = $this->Product->find('list',  array(
'fields' => array('Product.suburb','Product.suburb'),'group' => 'Product.suburb','order'=>array('Product.suburb ASC')));
			
			$categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));
			
			$this->set(compact('suburb','categories')); **/
	}
	
	// Create admin_index Page
	function admin_index() {
			$this->pageTitle= 'SumyKids - Products';
			
			$this->set('products', $this->paginate('Product'));
			// $this->set('categories', $this->Category->find('all'));
			$this->layout = 'admin';
			
			$suburb = $this->Product->find('list', array(
'fields' => array('Product.suburb','Product.suburb'),'group' => 'Product.suburb','order'=>array('Product.suburb ASC')));

			$categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));
			
			$this->set(compact('suburb','categories'));  
	}
	
	// Create admin_view page
	function admin_view($id = null) {
		
		$this->pageTitle= 'SumyKids - Products';
			
			$this->layout = 'admin';

			$this->Product->id = $id;
			$this->set('product', $this->Product->read());
			
			$upload = $this->Product->findById($id);
			
			$upload2 = $this->Product->findById($id);

			//Debugger::dump($upload['Product']['category_id']);
			
			$upload2['Product']['category_parent_id'] = explode(',', $upload2['Product']['category_parent_id']);
			
			$subtags = $this->Product->Category->find('all',array('conditions' => array('id' => $upload2['Product']['category_parent_id'])));
			
			$upload['Product']['category_id'] 	= explode(',', $upload['Product']['category_id']);
			
			$tags = $this->Product->Category->find('all',array('conditions' => array('id' => $upload['Product']['category_id'])));
			
			$suppliers = $this->Product->Supplier->find('all',array('conditions' => array('id' => $upload['Product']['supplier_id'])));

			$this->set(compact('tags','subtags','suppliers'));  
	}
	
	//Create AJAX sub-category
	function admin_get_models_ajax() {
  		if($this->RequestHandler->isAjax()) {
    		$this->set('Categories', $this->Product->Category->find('list',
				array('conditions' =>
                array('Category.parent_id' => $this->params['url']['category_id']),
                )));
  		}
	}
	
	// Create admin_add page
	function admin_add() {
		
			$this->pageTitle= 'SumyKids - Add Product';

			$this->layout = 'admin';
			
			if (!empty($this->data)) {
				$this->Product->create();				
		
  				//Debugger::dump($this->data['Product']['category_id']);
				
				$this->data['Product']['category_id'] = implode(',', $this->data['Product']['category_id']);
							
				$this->data['Product']['category_parent_id'] = implode(',', $this->data['Product']['category_parent_id']);
				
				$this->Product->saveField('category_id', $this->data['Product']['category_id']);
				
				$this->Product->saveField('category_parent_id', $this->data['Product']['category_parent_id']);
				
				$this->Product->saveField('featured', 0);					

				if ($this->Product->save($this->data)) {

					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Product->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('The image for the set could not be saved. Please, try again.');
	    			}     
					$this->Session->setFlash('<p>Your product has been saved.</p><br/>');
					$this->redirect(array('action'=>'index'));
				}
			}
				// find category options in a list format  
			    $categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));		
				
				$subcategories = $this->Product->Category->find('list',array('conditions' => array('parent_id !=' => 0),'order' => array('Category.name ASC')));	
				
				$suppliers = $this->Product->Supplier->find('list',array('order' => array('Supplier.name ASC')));			
	
				// set the variables so they can be accessed from the view  
				$this->set(compact('categories','suppliers','subcategories'));   
			
		}
	
	// Delete image
	function admin_delete_image($id = null) {
	
		// set the id of the dvd
		$this->Product->id = $id;

		$this->set('product', $this->Product->read());
		$this->data = $this->Product->read();
		
		// delete the physcial image from the server
		$upload = $this->Product->findById($id);
   		$this->Image->delete_image($upload['Product']['image'],"sets");
		
		// remove the image's title from the database
		$this->Product->saveField('image', "");

		$this->Session->setFlash('<p>Product\'s image has been deleted successfully.</p><br/>');
		
		// redirect to the existing page
		$this->redirect($this->referer());

	}
		
	
	// Create admin_edit page	
	function admin_edit($id = null) {
							
			$this->pageTitle= 'SumyKids - Edit Product';
			
			$this->layout = 'admin';

			//**Important** display the image in the edit form
			$this->Product->id = $id;
			$this->set('product', $this->Product->read());

			
				if (empty($this->data)) {
					$this->data = $this->Product->read();
				} else {
					
					$this->Product->create();
					
					$this->data['Product']['category_id'] = implode(',', $this->data['Product']['category_id']);
							
				$this->data['Product']['category_parent_id'] = implode(',', $this->data['Product']['category_parent_id']);
				
				if ($this->Product->save($this->data)) {
					
					
					$upload = $this->Product->findById($id);
					
					//Debugger::dump($upload['Product']['featured']);
		
					if($upload['Product']['featured'] == 1) {
										
					//Update the sub-category status to archived
					$this->Product->updateAll(
   					array('Product.featured' => 1),
					array('Product.id' => $upload['Product']['id'])
   					);
					} else {
						$this->Product->updateAll(
   					array('Product.featured' => 0),
					array('Product.id' => $upload['Product']['id'])
   					);
					}


	
				
				

					$this->Product->save();

					$image_path = $this->Image->upload_image_and_thumbnail($this->data['Image']['name1'], 542,350,80,80, "sets");
	    			if(isset($image_path)) {
	     				$this->Product->saveField('image',$image_path);
	   	    		}
	    			else {
	     				$this->Session->setFlash('<p>The image for the set could not be saved. Please, try again.</p><br/>');
	    			}     
					
					$this->Session->setFlash('<p>Your product has been updated.</p><br/>');
					$this->redirect(array('action'=>'index'));
							 }
					}
					// find category options in a list format  
			    $categories = $this->Product->Category->find('list',array('conditions' => array('parent_id ' => 0),'order' => array('Category.name ASC')));
				
				$upload = $this->Product->findById($id);
				
				//Debugger::dump($upload['Product']['category_id']);
				
				$suppliers = $this->Product->Supplier->find('list',array('order' => array('Supplier.name ASC')));			


				$subcategories = $this->Product->Category->find('list',array('conditions' => array('parent_id !=' => 0),'order' => array('Category.name ASC')));
				
				
				// set the variables so they can be accessed from the view  
				$this->set(compact('suppliers','categories','subcategories')); 
			}
			
	// Create admin_delete function
	
	function admin_delete($id) {
		
			$upload = $this->Product->findById($id);
   			$this->Image->delete_image($upload['Product']['image'],"sets");
			
			$this->Product->delete($id);
			$this->Session->setFlash('<p>The Product: '.$upload['Product']['name'].' has been deleted.</p>'."<br/>");
			$this->redirect(array('controller' => 'products', 'action' => 'index'));
			
	}
	
	function cat() {
		
		//Debugger::dump($this->getNamedArgs);

		$catyID = $this->Session->write('Category.id', $this->passedArgs['cat_id']);
			$catyID = $this->Session->read('Category.id');
		
			if (isset($this->params['named']['sort'])) {
        $this->params['order'] = $this->params['named']['sort'];
    } elseif (isset($this->params['named']['order'])) {
        $this->params['order'] = $this->params['named']['order'];  
    } else {
        $this->params['order'] = 'price';
    }	
	

	
	$totalProducts = $this->Product->find('count', array('conditions' => array('Product.category_id LIKE' => '%'.$catyID.'%'),'limit' => 1, 'page' => 1,'order'=>array('Product.price' => 'desc')));
				
		$this->set('totalProducts', $totalProducts);
			
			if ( isset( $this->passedArgs['cat_id'] ) )
      		$category = $this->passedArgs['cat_id'];
					
					
			$this->paginate = array('conditions' => array('Product.category_id LIKE' => '%'.$catyID.'%'),'limit' => 8, 'page' => 1,'order'=>array('Product.price' => 'desc'));
			
			$data = $this->paginate('Product');			
			
			$this->set('products',$data);
			
			$this->layout = 'default';
	}
	
	function subcat() {
		$catyID = $this->Session->write('Category.id', $this->passedArgs['cat_id']);
		$catyID = $this->Session->read('Category.id');
			
			$subcatyID = $this->Session->write('Category.parent_id', $this->passedArgs['subcat_id']);
			$subcatyID = $this->Session->read('Category.parent_id');
			
			
			//featured products code
			$conditions =  array(
    'AND' => array(
    array('Product.featured' => 1 ),
    array('Product.category_id <>' => $subcatyID),
	array('Product.status' => 'Published')));		
					
			$featuredproducts = $this->Product->find('all', array('order' => 'RAND()','conditions' => $conditions, 'limit' => 4));
				$this->set(compact('featuredproducts'));
				
			//end of featured products code
		
			if (isset($this->params['named']['sort'])) {
        $this->params['order'] = $this->params['named']['sort'];
    } elseif (isset($this->params['named']['order'])) {
        $this->params['order'] = $this->params['named']['order'];  
    } else {
        $this->params['order'] = 'price';
    }	
	
	$totalProducts = $this->Product->find('count', array('conditions' => array('Product.category_parent_id LIKE' => '%'.$catyID.'%'),'limit' => 1, 'page' => 1,'order'=>array('Product.price' => 'desc')));
				
		$this->set('totalProducts', $totalProducts);
	
	$catProducts = $this->Product->find('all', array('conditions' => array('Product.category_id' => '%'.$catyID.'%'),'limit' => 1));
				
		$this->set('catProducts', $catProducts);		
			
			if ( isset( $this->passedArgs['cat_id'] ) )
      		$category = $this->passedArgs['cat_id'];
					
			$this->paginate = array('conditions' => array('Product.category_parent_id LIKE' => '%'.$catyID.'%'),'limit' => 1, 'page' => 1,'order'=>array('Product.price' => 'desc'));
			
			$data = $this->paginate('Product');			
			
			$this->set('products',$data);
			
			$this->layout = 'default';
	}
	
	function lists() {
		$categories = $this->Category->find('all', array('order' => 'Category.id ASC' ));		
		$categories = $this->Category->buildCategories($categories, $this->passedArgs['c']);
		$children_ids  = $this->Category->getChildCategories($categories, $this->passedArgs['c'], true);
		$allCatIds = array_merge(array($this->passedArgs['c']), $children_ids);
		//return lists
		return $this->Product->lists($allCatIds, $this->paginate());
	}
	
	function latestlists() {
		return $categories = $this->Product->find('all', array('order' => 'RAND()','conditions' => array('Product.featured' => 1,'Product.status' => 'Published')));		

	}
	
	function view() {
					
	//Debugger::dump($this->Session->read('Cart.keypass'));

					
			$this->layout = 'admin';
		
			$conditions =  array(
    'AND' => array(
    array('Product.featured' => 1 ),
    array('Product.id <>' => $this->passedArgs['pd_id']),
	array('Product.status' => 'Published')));		
					
			$featuredproducts = $this->Product->find('all', array('order' => 'RAND()','conditions' => $conditions, 'limit' => 4));
				$this->set(compact('featuredproducts'));
				
		
		$result = $this->Product->find( 'all', array('conditions'=>array('Product.id'=> $this->passedArgs['pd_id'] )));
		if (!is_array($result) ) {
			$this->redirect(array('controller'=>'/Ecommerce', 'action'=>'index'));
		}
		$this->set('product', $result);
		
		
		$this->Product->id = $this->passedArgs['pd_id'];
				
		$upload = $this->Product->findById($this->passedArgs['pd_id']);
			
		$upload2 = $this->Product->findById($this->passedArgs['pd_id']);
		
		
		$upload2['Product']['category_parent_id'] = explode(',', $upload2['Product']['category_parent_id']);

		
		$subtags = $this->Product->Category->find('all',array('conditions' => array('id' => $upload2['Product']['category_parent_id'])));
		
			$upload2['Product']['category_id'] 	= explode(',', $upload2['Product']['category_id']);

			
			$tags = $this->Product->Category->find('all',array('conditions' => array('id' => $upload2['Product']['category_id'])));
			
			//Debugger::dump($tags);
			
			$suppliers = $this->Product->Supplier->find('all',array('conditions' => array('id' => $upload['Product']['supplier_id'])));

		$this->set(compact('tags','subtags','suppliers'));  
		
	}
}	
?>