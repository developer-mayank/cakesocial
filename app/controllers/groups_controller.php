<?php
/**
 * 
 *
 * @autor yuriy
 * @autor 7278282@gmail.com
 */
 class GroupsController extends AppController {  
     var $name = 'Groups';  
	 
	 function index($user_id = null){

		$this->set('groups',$this->Group->findAll( array("admin_id =$user_id")));
		// TODO andere gruppen
	 	
	 }
	 
	 function add(){
		if (!empty($this->data)) {
			$user_id = $this->Session->read('Auth.User.id');
			$this->data['Group']['admin_id'] = $user_id;
			if ($this->Group->save($this->data)) {
				$this->redirect('/groups/index/'.$user_id);
			}else {
			    $this->Session->setFlash('Please correct errors below.');
			}	
		}
	 }
	 
	 function edit($id = null){

	   $this->Group->id = $id;
       $this->set('group', $this->Group->read());
	 	
	 }
	 
	function delete($id=null) {
	   $user_id = $this->Session->read('Auth.User.id');
	   $this->Group->del($id);
	   $this->redirect('/groups/edit/'.$user_id);
	}
	
	 function view($id = null){
	   $this->Group->id = $id;
       $this->set('group', $this->Group->read());
	 }
	  
	 function main($user_id = null){
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->set('groups',$this->Group->GroupsUser->find('all',array('conditions' => array("user_id =$user_id"))));
		$this->set('his_groups',$this->Group->find('all',array('conditions' => array("admin_id =$user_id"))));
		$this->set('user_id',$user_id);
	 	
	 }
	 
	
	function invite($student_id=null){
		$this->layout = 'ajax';
		$user_id =  $this->Session->read('Auth.User.id');
		if (!empty($this->data)) {
			if ($this->Group->GroupsUser->save($this->data)) 
			{
				$this->redirect('/groups/main/'.$this->data['GroupsUser']['user_id']);
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }
		}
		else
		{	
		$his_groups = $this->Group->getGroupsForUserAdmin($user_id);
		$groups = $this->Group->getGroupsForUser($user_id);
		$groups_all  = $his_groups + $groups;
		$groups_all = Set::combine($his_groups,"{n}.groups.id", "{n}.groups.name");
		$this->set('groups', $groups_all);
		$this->set('user_id',$student_id);
		}
		
	}
}
/*
App::import('Model', 'User');
$user = new User();
$u = $user->read(null,$user_id); 
debug($u);
*/
?>