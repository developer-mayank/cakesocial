<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class InvitationsController extends AppController {

	var $name = 'Invitations';
	var $components = array('Email');
	
	function index(){
		$user_id =  $this->Auth->user('id');
		$reffers = $this->Invitation->find('all',array(
							'conditions' => array('inviter_id = '.$user_id , 'user_id = 0')));
		$this->set('reffers',$reffers);

		$this->Invitation->bindModel(array('belongsTo' => array('User'))); 
		
		$downlines = $this->Invitation->find('all',array(
							'conditions' => array('inviter_id = '.$user_id , 'user_id > 0')));
		//debug($downlines);
		$this->set('downlines',$downlines);
		$this->set('name',$this->Auth->user('name'));
		
	}
	
	function add()
	{
		$user_id =  $this->Auth->user('id');
		
		$this->set('user_id',$user_id);
		
		if (!empty($this->data)) {
			if ($this->Invitation->save($this->data)){
				$this->Email->to = trim($this->data['Invitation']['email']);
				$this->Email->from = Configure::read('Email.from'); 
				$this->Email->subject = 'invitation';
				$this->Email->template = 'invitation';
				$this->Email->sendAs = 'html';
				$name =  $this->Auth->user('name');
				$fname = $this->Auth->user('fname');
				if (!empty($fname))$fname = $name;
				$this->set('username',$name);
				$this->set('fistname',$fname);
				$this->set('name',$this->data['Invitation']['name']);
				$this->set('text',$this->data['Invitation']['title']);
				$this->Email->delivery = Configure::read('Email.delivery');
        		$this->Email->send();
				$this->Session->setFlash('invitation '.$this->data['Invitation']['email'].' successfully sent. You can send a new invitation.');
				$this->data['Invitation']['email'] = '';
				$this->data['Invitation']['title']= '';
				$this->data['Invitation']['name']= '';
			}
		}
	}
}
