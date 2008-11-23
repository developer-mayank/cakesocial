<?
/**
 * 
 *
 * @autor yuriy
 * @autor 7278181@gmail.com
 */
class GuestsController extends AppController {

	var $name = 'Guests';
	var $helpers = array('Form','Javascript','Ajax');
	  
	function add($id=null) {
		$this->data['Guest']['owner_id'] = $id;	
	    $this->data['Guest']['user_id']  = $this->Session->read('Auth.User.id');
			if ($this->Guest->save($this->data)) {
				return true;
			}else {
			    return false;
			}	
	}
	
	function index() {
		Configure::write('debug', 0);
		$user_id = $this->Session->read('Auth.User.id');
		$guests_list = $this->Guest->findAll( array("owner_id =$user_id"));
		$this->set('users',$guests_list);
	}
	
	
}
