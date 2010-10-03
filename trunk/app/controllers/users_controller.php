<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Time','GoogleMap');
	var $components = array('Email','Search');

   function login(){
		$this->layout = 'page';
   }
	
	function logout(){
		//$this->Session->setFlash('bye bye'); 
		$this->redirect($this->Auth->logout());
	}
	      
	function register($inviter=null){
		$this->layout = 'page';
		$this->pageTitle = 'free  Registration';
		
		
		if ($inviter!=null) $this->Session->write('inviter',$inviter);	
		if (!empty($this->data)) {
			if (is_numeric($this->data['Geo']['country_id']) && is_numeric($this->data['Geo']['country_id']) && is_numeric($this->data['Geo']['city_id']))
			{
				$user_email = trim($this->data['User']['email']);
				$this->data['User']['password'] = trim($this->data['User']['password']);
				//$this->data['User']['password_plain'] = $this->data['User']['password'];
				$activation_code = Security::hash(Configure::read('Security.salt') . $this->data['User']['name']);
				$this->data['User']['token']  = $activation_code;
				//debug($this->data);
				if ($this->User->save($this->data)) 
				{
					$this->Session->setFlash('Congratulating!You have successfully registered<br/>					
                    To access the site, you must podtvertit your email.<br/>
					['.$user_email.'] Email sent to you with further instructions.');
					
					$this->User->bindModel(array('hasOne' => array('Profile'=>array('className'=>'Profile','foreignKey'=> 'id'))));
					$user_id = $this->User->id;
					$this->data['Profile']['id'] = $user_id;
					$this->data['Profile']['ip'] = $this->RequestHandler->getClientIP();
		            $this->User->Profile->save($this->data);
					$this->User->bindModel(array('hasOne' => array('Geo')));
					$this->data['Geo']['user_id']= $user_id;
					$this->data['Geo']['type'] = 1;
					$this->User->Geo->save($this->data);
					$this->User->bindModel(array('hasMany' => array('Album')));
					$album['entity_id'] = $user_id;
					$album['user_id']   = $user_id;
					$album['entity_type'] = 1;
					$album['name'] = 'Personal photos';
					$this->User->Album->save($album);
					$this->Email->from = Configure::read('Email.from'); 
					$this->Email->to = $user_email;
					$this->Email->subject = 'Confirmation of registration';
					$this->Email->template = 'register';
					$this->Email->sendAs  = 'html';
					$this->set('activation_code',$activation_code); 
					$this->Email->delivery = Configure::read('Email.delivery');
				    $this->Email->send();
					$this->_invitation($user_id,$user_email);
					$this->redirect('/');
					//$this->set('msg',
					//$this->render('/com/msg');
				}
				else 
				{
		      		$this->data['User']['password'] = '';
					$geo_ids  = array('country_id' => $this->data['Geo']['country_id'],
						  			  'region_id' => $this->data['Geo']['region_id'],
						              'city_id' => $this->data['Geo']['city_id']
		            );
					$this->set('geo_ids',$geo_ids);
		        }
			}
			else
			{
				$this->data['User']['password'] = '';
				$this->Session->setFlash('Provide your location : countries, regions and cities.');
			}
		}	
	}
	
	function _invitation($user_id,$user_email)
	{
		App::import('Model', 'Invitation');
		$Invitation = new Invitation();
		$invitation_id = $Invitation->field('id',array("email = '{$user_email}'"));
		if (is_numeric($invitation_id))
		{
			$Invitation->updateAll( array('Invitation.user_id' => $user_id),  
			                        array('Invitation.id'      => $invitation_id));	
		}
		else if ($this->Session->check('inviter'))
		{
			$this->User->recursive = 0;
			$inviter_id = $this->User->field('id',array('username = "'.$this->Session->read('inviter').'"'));
			//debug($inviter_id);
			$data['Invitation']['inviter_id'] = $inviter_id;
			$data['Invitation']['user_id']    = $user_id;
			if ($Invitation->save($data)) {}
		}

	}
	 
	
	function edit(){
		$this->User->id = $this->Auth->user('id');
			
		if (!empty($this->data)) {
			//debug($this->data);
			$this->data['User']['bdate']  =
			$this->data['User']['bdate']['year'].'-'.
			$this->data['User']['bdate']['month'] .'-'.
			$this->data['User']['bdate']['day'];
			
			if ($this->User->save($this->data)) 
			{
				$this->Session->setFlash('The data have been changed!');
				$this->redirect('/users/corner');	
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }
		}
		 $user = $this->User->read();
		 $this->set('user',$user);	
	}
	
	function view($user_id=null)
	{		
		
		$this->User->bindModel(array('hasOne' => array('Profile'=>array('className'=>'Profile','foreignKey'=> 'id'))));
		$this->User->bindModel(array('hasMany' => array('Geo'=>array('className'=>'Geo','order' => 'Geo.type desc'))));

		
		$this->User->recursive = 2;
		if ($user_id)
		{
			$this->User->id = $user_id;
			$user = $this->User->read();
		}
		else
		{
			$name = $this->params['username']; 
			$user     = $this->User->findByName($name);
			$user_id  = $user['User']['id']; 
		}
		 $guest_id = $this->Auth->user('id');
		 ClassRegistry::init('Guest')->add($user_id,$guest_id);
		 $family_options = $this->User->Profile->family_options;
		 $sex_options = $this->User->Profile->sex_options ;
		 $children_options = $this->User->Profile->children_options;
		 $height_options = array (155,160,165,170,175,180,185,190,200);
		 $this->set('family_options',$family_options);
		 $this->set('children_options',$children_options);
		 $this->set('height_options',$height_options);
		 $this->set('sex_options',$sex_options);
		 $this->elements_right = array('studmenu'=>array('entity'=>$user['User']));
		 $this->set('user',$user);
		 $this->pageTitle = $user['User']['name'].' '.$user['User']['sname'].' '.$user['User']['bdate'].' cakesocial';	 
	}
	
	function corner()
	{
		
		$this->User->bindModel(array('hasOne' => array('Profile'=>array('className'=>'Profile','foreignKey'=> 'id'))));
		$this->User->bindModel(array('hasMany' => array('Geo'=>array('className'=>'Geo','order' => 'Geo.type desc'))));
		$this->User->recursive = 2;
		$user_id = $this->Auth->user('id');
		$this->User->id = $user_id;
		$user = $this->User->read();
		 $this->set('user',$user);

		 $family_options = $this->User->Profile->family_options;
		 $sex_options = $this->User->Profile->sex_options ;
		 $children_options = $this->User->Profile->children_options;
		 $height_options = array (155,160,165,170,175,180,185,190,200);
		 $this->set('family_options',$family_options);
		 $this->set('children_options',$children_options);
		 $this->set('height_options',$height_options);
		 $this->set('sex_options',$sex_options);
		 
         $this->elements_right = '';
		 
	}
	
	function show() {
		$this->User->Behaviors->attach('Containable');
		$this->User->bindModel(array('hasOne' => array('Geo')));
		$this->User->Geo->bindModel(array('belongsTo' => array('City')));
		$this->User->Geo->bindModel(array('belongsTo' => array('Country')));
		$this->User->Geo->recursive = 2;
		$this->paginate = array(
			'order'=>array('updated' => 'desc'),
			'limit' => 20,
			'recursive' => 2, 
			'fields'=> array('User.id','name','sname','img','is_online'),
			'conditions' => array('is_active = 1'),
			'contain'=>array('Geo'=>array('conditions'=> array('type'=>1)),
			'Geo.Country'=>array('conditions'=> array(''),'fields'=>'name'),
			'Geo.City'=>array('conditions'=> array(''),'fields'=>'name'))  
		);
		$users =  $this->paginate();
		$this->set('users',$users);
	}

	
	function search(){
		
		$this->User->Behaviors->attach('Containable');  
		$this->User->bindModel(array('hasOne' => array('Profile'=>array('className'=>'Profile','foreignKey'=> 'id'))));
		$this->User->bindModel(array('hasOne' => array('Geo')));
		$filter = $this->Search->process($this);
		//debug($filter);
			$this->paginate = array(
			    'conditions'=> $filter,
				'fields'=> array('User.id','User.fname','User.name','User.img','User.is_online'), 
				'order'=>array('name' => 'asc'),
				'limit' => 20,
				'contain'=>array('Geo'=>array('conditions'=> array('')),'Profile'=>array('conditions'=> array(''))) 
		    );
			$users =  $this->paginate();
			//debug($users); 
			//$users =array_unique($users);
			$this->set('users',$users);

		$sex_options = $this->User->Profile->sex_options ;
		$this->set('sex_options',$sex_options);
		
		//$this->elements_left = array('mymenu'=>array());
	}
	
	function activate($token=null) {
        if (!$token) {
            $this->set('result', 'no_token');
        } else {
        	$token = trim($token);
            $user = $this->User->findByToken($token);
            if (!empty($user)) {
                $user['User']['token'] = null;
				$user['User']['is_active'] = 1;
				
                if ($this->User->save($user, false)) {
                    $this->set('result', 'user_active');
                } else {
                    $this->set('result', 'error');
                }
            } else {
                $this->set('result', 'unknown_token');
            }
        }
        $this->pageTitle = '';
    }
	

	function forget() {
        $this->pageTitle = '';
		if (!empty($this->data)) {
			$this->recursive = -1;
			if ($user = $this->User->find(array('email' => $this->data['User']['email'],'is_active'=>1)))
			{
				$this->User->id = $user['User']['id'];
				$this->Email->from =  Configure::read('Email.from');
                $this->Email->to = $user['User']['email'];
				$this->Email->subject = 'password recovery';
				$this->Email->template = 'forget';
				$this->Email->sendAs = 'html';
				$this->Email->delivery = Configure::read('Email.delivery');
				$activation_code = Security::hash(microtime(). $this->data['User']['email']);
				$this->set('name', $user['User']['name']);
				$this->set('activation_code', $activation_code);
				$user['User']['token']= $activation_code;
				$this->User->saveField('token', $activation_code);
				if ($this->Email->send()) {
					$this->Session->setFlash('Request a password successfully sent. <br/>
						Check your email : '.$user['User']['email']);
				} else {
					$this->Session->setFlash('Error resetting password. Contact Administrator');
				}
				$this->redirect('/');
			} else {
				$this->Session->setFlash('A user with this Email  was not found.
                       <br/> Please try again or sign up and activate your email if you have not done so earlier.');
			}
		}
	}
	
	function reset_pwd($token=null) {
		$this->pageTitle = '';	
	    if (!empty($this->data)) {
	    	$user = $this->User->findByToken($this->data['User']['token']);
			if (!empty($user)) {
                //$user['User']['token'] = null;// if ($this->User->saveField('token', $user['User']['token'], false))
				$user['User']['password'] = $this->Auth->password(trim($this->data['User']['password']));
				if ($this->User->save($user,false)) {
					$this->Session->setFlash('Password was successfully changed.<br>				
                    Your new password is:'.$this->data['User']['password']);
                    $this->redirect('/users/login');
                } else {
                    $this->set('result', 'error');
                }
			}     
	    } else {
	    	if ($token!=null){
	    		$this->set('token', $token);
	    	}
			else
			{
				$this->cakeError('error404', array($this->params['url']));
			}  
	    }
	}  
}
