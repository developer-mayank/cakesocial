<?php
class AppController extends Controller {

	//public $components = array(); ,'DebugKit.toolbar'
	public $components = array('Auth','RequestHandler');
	public $helpers = array('Html','Form','Javascript','Ajax','Jaxoption','Paginator','Userlist');
	public $uses = array('User','Post');
	
	// for view
	public $new_post_count = 0;
	public $content_for_logo = '';
	
	public $elements_left  = array('login'=>array());//,'top_city'=>array()
	public $elements_right = array('new_user'=>array());
	
	
	function beforeRender() {
		
			parent::beforeRender();
			$this->set('elements_left', $this->elements_left);
			$this->set('elements_right',$this->elements_right);
			$this->set('new_post_count',$this->new_post_count);
		}

	
	function beforeFilter(){
		
	   if (isset($this->Auth)) {
		   $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		   $this->Auth->fields = array('username' => 'email', 'password' => 'password');
		   $this->Auth->allow('display','register','main','show','get','login','view','forget','activate','reset_pwd','search','sitemap');
		   //$this->Auth->deny('add','edit','corner');
		   $this->Auth->autoRedirect = true;
		   //debug($this);
		   if (isset($this->data['User']['password']))$this->Auth->loginError = '
           false Email/Password :['.$this->data['User']['email'].'/'.$this->data['User']['password'].']<br/>';
		   $this->Auth->authError  = 'To view this page, you must log on or register.';
		   $this->Auth->userScope  = array('User.is_active = 1');
		   $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'corner');
           $this->Auth->logoutRedirect = '/';
		   $this->Auth->authorize = 'controller';
		   $this->set('Auth',$this->Auth->user());
	   }
	   
	   if ($this->RequestHandler->isAjax()) 
	   {
       		$this->layout = 'ajax';
			Configure::write('debug', 0);
	   } 

	   //if($this->action == 'register' || $this->action == 'reset_pwd') {$this->Auth->authenticate = $this->User;}
	   
	   if($this->Auth->user('id'))
	   {
	   		$this->_last_login(1);
			$this->_check_new_posts();
			$this->elements_left = array('mymenu'=>array());
	   		
	   } 
	   if($this->action == 'logout') 
	   {
	   		$this->_last_login(0);
	   }
	}
	
 
	function isAuthorized() {
		if (isset($this->params[Configure::read('Routing.admin')])) {
            if ($this->Auth->user('id') != 1000) {
                return false;
            }
        }
	   return true;
	}
	
	
	function getEntityMenuBypassedArgs()
	{
		 if (isset($this->passedArgs[1]) && is_numeric($this->passedArgs[1]))
		 {
			  switch($this->passedArgs[1])
			  {
			  		case '1': $class_name = 'User';$menu = 'studmenu'; break;
					case '2': $class_name = 'Group';$menu = 'groupmenu'; break;
					case '3': $class_name = 'Uni';$menu = 'unimenu'; break;
					case '4': $class_name = 'School';$menu = 'scoolmenu'; break;
					case '5': $class_name = 'Techschool';$menu = 'schoolmenu'; break;
					case '6': $class_name = 'City';$menu = 'geomenu'; break;
					case '7': $class_name = 'Region';$menu = 'geomenu'; break;
					case '8': $class_name = 'Country';$menu = 'geomenu'; break;
			  }
			  $entity_type = $this->passedArgs[1];
		 }
		 else
		 {
		 	$class_name = 'User';
			$menu = 'studmenu';
			$entity_type = 1;
		 }
		 
		 if (isset($this->passedArgs[2]) && is_numeric($this->passedArgs[2]))
		 {
		 	$entity_id = $this->passedArgs[2];
		 }
		 else if (isset($this->passedArgs[0]) && is_numeric($this->passedArgs[0]))
		 {
		 	$entity_id = $this->passedArgs[0];
		 }
		 
			  
		 $entity = ClassRegistry::init($class_name)->get($entity_id);
		 
		 if (isset($entity['GroupsRole']))
		 {
		 		$her['entity_admin_id'] = $entity['GroupsRole']['user_id'];
		 		$her['entity_admin'] = $entity['GroupsRole']['User'];
		 }
		 else
		 {
		 	$her['entity_admin']    = null;
			$her['entity_admin_id'] = null;
		 }
		 //debug($entity);
		 $her['entity'] = $entity[$class_name];
		 $her['entity']['entity_type'] = $entity_type;
		 $her['menu_name'] = $menu;
		 //debug($her);
		 return $her;
		
	}
	
	
	function helper_bar_menu(){
		 
		 $her = $this->getEntityMenuBypassedArgs();
		 //$content_for_bar['menuname'] = $her['menu_name'];
	     //$content_for_bar['parameter'] = array('entity'=>$her['entity'],'admin'=>$her['entity_admin']);
	     //$this->set('content_for_bar',$content_for_bar);
		 //debug($her);
		 $this->set('entity',$her['entity']);
		 $this->set('entity_admin_id',$her['entity_admin_id']);
		 $this->elements_right = array($her['menu_name'] => 
		 	array('entity'=>$her['entity'],'admin'=>$her['entity_admin']));
		 return $her['entity']['entity_type'];
	}
	
	function _check_new_posts()
	{
		$new_post_count = $this->Post->find('all',array(
						'fields'=>array('count(Post.id)'),
						'conditions' => array(
							'user1_id = '.$this->Auth->user('id'),
							'is_read=0')));
		//debug($new_post_count);
		$this->new_post_count = $new_post_count[0][0]['count(`Post`.`id`)'];
		//if (!empty($new_post))$this->Session->write('newpost',true);'fields'=>array('Post.id'),
		//$content_for_usermenu = array ('new_post_count' => $new_post_count);
		//$this->set('content_for_usermenu',$content_for_usermenu);
	}
	
	function _last_login($b)
	{
		$user_id = $this->Auth->user('id'); 
		$this->User->updateAll(array('is_online'=> $b,'updated'=>time()), 'id='.$user_id);
	}

}
