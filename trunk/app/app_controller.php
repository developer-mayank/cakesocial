<?php
/**
 * 
 * @autor yuriy
 * @autor 7278181@gmail.com
 */
class AppController extends Controller {

	var $components = array('Acl','Auth','RequestHandler');
	var $helpers = array('Form','Javascript','Ajax','Paginator');

	 
	function beforeFilter(){
	   
	   if (isset($this->Auth)) {
		   $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		   $this->Auth->autoRedirect = true;
		   //$this->Auth->fields = array('username' => 'email', 'password' => 'pasword'); 
		   $this->Auth->loginError = 'Invalid username / password combination.Please try again.';
		   $this->Auth->authError  = 'Для просмотра этой страницы Вы должны залогиниться или зарегистрироваться.';
		   
		   $this->Auth->userScope = array('User.is_active = 1');
		   //$this->Auth->logoutRedirect =  array('controller' => 'pages', 'action' => 'display','test');
		   $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'corner');
           $this->Auth->logoutRedirect = '/';
		   $this->Auth->allow('display','register','captcha','login','view_all','view');
		   $this->Auth->authorize = 'controller';
		   //$this->set('Auth',$this->Auth->user()); 
	   }
	   
	   if ($this->RequestHandler->isAjax()) 
	   {
       		$this->layout = 'ajax';
	   } 
	   
	}
	   
	function isAuthorized() { 
	   return true;
	}

}
