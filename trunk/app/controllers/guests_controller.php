<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class GuestsController extends AppController {
	
	var $name = 'Guests';
	var $helpers = array('Userlist');
	
	function index() {
		$user_id = $this->Auth->user('id');
		$this->Guest->bindModel(array('belongsTo' => array('User'=>
		                                 array(
										 'className' => 'User',
										 'foreignKey' => 'guest_id'
										 )
		
		)));
		$cond = array("user_id = $user_id"); 
		$guests_list = $this->Guest->find('all',array('conditions' => $cond));
		//debug($guests_list);
		$this->set('users',$guests_list);
		$this->set('tit','Who is watching my page');
		$this->render('/com/list');
	}
}
