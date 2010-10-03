<?php
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
 class GroupsUsersController extends AppController {
 	  
    var $name = 'GroupsUsers';
	
	 function add($group_id=null)
	 {
		$user_id = $this->Auth->user('id');
		$c = $this->GroupsUser->find('count',array('conditions'=>array('user_id'=>$user_id,'group_id'=>$group_id)));
		if ($c == 0)
		{
			$data['GroupsUser']['group_id']=$group_id;
			$data['GroupsUser']['user_id'] =$user_id;
			$data['GroupsUser']['role_id'] =1;
			$data['GroupsUser']['accept'] =1;
			$this->GroupsUser->save($data);
			$this->Session->setFlash(':-)');
			$this->redirect('/groups/view/'.$group_id);
			
		}
		else
		{
			$this->Session->setFlash(';-(');
			$this->redirect('/groups/view/'.$group_id);
			
		}
	 }
	 
	
	 function confirm($id=null)
	 {
		//Configure::write('debug', 2);
		$user_id = $this->Auth->user('id');
		$this->GroupsUser->updateAll (
			array('accept' => 1),
			array('GroupsUser.user_id' => $user_id,'GroupsUser.group_id' => $id )
			);
		$this->redirect('/groups/index');
	 }
	 function denny($id=null)
	 {
		//Configure::write('debug', 2);
		$user_id = $this->Auth->user('id');
		$this->GroupsUser->updateAll (
			array('accept' => -1),
			array('GroupsUser.user_id' => $user_id,'GroupsUser.group_id' => $id )
			);
			$this->redirect('/groups/index');
	 }
	 
}
?>