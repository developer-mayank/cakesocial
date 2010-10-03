<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array('Jaxoption');
	var $components = array('Email');
	
	function beforeFilter(){
		
	    if(!empty($this->data)) {
			uses('sanitize');
			//$sanitize = new Sanitize();
			$this->data = Sanitize::clean($this->data);
			//$this->data = Sanitize::html($this->data);
		}
		parent::beforeFilter();
	}
	
	  	
	function index() {
		$user_id = $this->Auth->user('id');
		$post_list = $this->Post->post_list($user_id);
		//debug ($post_list);
		$this->set('post_list',$post_list);
	}
	
	function add($id = null) {

		if (!empty($this->data)) {
			//debug($this->data);
			if ($this->Post->save($this->data)) {
				$this->set('msg','Cообщение отправленно!');
				//send_mail($this->data);
			}else {
			    $this->set('msg','An error occurred in the transfer dannyh.Popytaytest again at another time.');
			}
			
			if ($this->RequestHandler->isAjax()) { 
                $this->render('/users/msg');
            } 
			else
			{
				//$this->redirect('/posts/view/'.$this->data['Post']['user1_id']);
				$this->redirect('/posts/index/');
			}
				
		}
		else{
			$this->set('user1_id',$id);
			$this->set('user_id', $this->Auth->user('id'));
		}
		
	}
	
	function view($id=null) {
		
		$this->layout = 'onebar';
		$user_id = $this->Auth->user('id');
		
		$this->Post->bindModel(array('belongsTo' => array('Otpravitel' =>
                           array('className'  => 'User',
                                 'foreignKey' => 'user_id'
                           ),
						   'Poluzatel' =>
                           array('className'  => 'User',
                                 'foreignKey' => 'user1_id'
                           )
						   
                     )));
		
		
		
		if(empty($user_id)) $this->cakeError('error404', array($this->params['url']));
		$conditions = array('or' => array("(user_id =$user_id AND user1_id = $id)","(user_id =$id AND user1_id =$user_id)"));
		$post_list = $this->Post->find('all',array(
		'conditions' => $conditions,
		'order' => 'Post.id desc',
		'limit' => 24));
		$this->Post->updateAll(array('is_read'=> 1), array('user1_id='.$user_id,'user_id='.$id));
		$this->Session->write('newpost',false);
		//debug($post_list);
		$this->set('post_list',$post_list);
		$this->set('user_id',$user_id);
		$this->set('user1_id',$id);
		if ($post_list[0]['Otpravitel']['id'] == $user_id)
		{
			$this->set('poluzatel',$post_list[0]['Poluzatel']);
		}
		else
		{
			$this->set('poluzatel',$post_list[0]['Otpravitel']);
		}	
		
	}
	
	
}
