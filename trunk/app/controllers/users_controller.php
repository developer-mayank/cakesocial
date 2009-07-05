<?
/**
 * 
 * @author yuriy
 * @email 7278181@gmail.com
 */
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Captcha', 'Email');
	
   function login(){
	$this->layout = 'page';
   }
	
    function logout(){
            $this->Session->setFlash('bye bye');
            $this->redirect($this->Auth->logout());
    }
	
    function captcha() {
        $this->Captcha->render();
    }
	      
	function register(){
		$this->layout = 'page';	
		if (!empty($this->data)) {
			
			$this->data['User']['bdate']  =
			$this->data['User']['bdate']['year'].'-'.
			$this->data['User']['bdate']['month'] .'-'.
			$this->data['User']['bdate']['day'];
			
			if(isset($this->data['User']['captcha']))
			$this->data['User']['captcha2'] = $this->Session->read('captcha');
			
			if ($this->User->save($this->data)) 
			{
				$this->Session->setFlash('Поздравлем! Вы успешно зарегистрировасись!
			     Войдите в систему испотльзуя данные которые Вы указали при регистрации.');
				$this->redirect('/users/login');
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }

		}
		
	}
	
	function edit(){
		Configure::write('debug', 0);
		$this->User->id = $this->Session->read('Auth.User.id');	
		if (!empty($this->data)) {
			$this->data['User']['bdate']  =
			$this->data['User']['bdate']['year'].'-'.
			$this->data['User']['bdate']['month'] .'-'.
			$this->data['User']['bdate']['day'];
			if ($this->User->save($this->data)) 
			{
				$this->Session->setFlash('Данные были изменены!');	
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }
		}
		
		 $user = $this->User->read();
		 $this->set('user',$user);
		 $this->layout = 'ajax';	
		
	}
	
	function listing() {
		// TODO Pangnite
		$users = $this->User->findAll();
		$this->set('users',$users);
	}
	
	function view($id=null)
	{	
		$this->User->id = $id;	
		$user = $this->User->read();
		$this->set('user',$user);
		$this->requestAction('guests/add/'.$id);
	}
	
	function corner($id=null)
	{
		if ($id==null)
		{
			$this->User->id = $this->Session->read('Auth.User.id');	
		}
		else
		{
			$this->User->id = $id;	
		}
		$user = $this->User->read();
		$this->set('user',$user);
		
	}
	
	
	function get_foto()
	{
		$this->User->id = $this->Session->read('Auth.User.id');	
		return $user = $this->User->read();
		
	}
}
