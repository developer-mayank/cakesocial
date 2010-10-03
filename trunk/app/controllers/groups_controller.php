<?php
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
 class GroupsController extends AppController {  
    var $name = 'Groups';
	var $components = array('Email','Search');  
	var $helpers = array('Time');
	
	function search(){
		//$this->Group->Behaviors->attach('Containable');
		//$this->Group->bindModel(array('hasOne' => array('Geo')));'contain'=>array('Geo'=>array('conditions'=> array('')))
		$filter = $this->Search->process($this);
		//debug($filter);
		$this->paginate = array(
			    'conditions'=> $filter,
				'fields'=> array('Group.id','Group.name','Group.img'), 
				'order'=>array('name' => 'asc'),
				'limit' => 20
		 );
		 $groups =  $this->paginate();
			//debug($groups);
			$this->set('groups',$groups);
	}
	
	 function index(){
        $user_id =  $this->Auth->user('id');
		/*
		 $this->Article->ArticlesTag->bindModel(array('belongsTo' => array('Article', 'Tag')));
	$joinRecords = $this->Article->ArticlesTag->findAll(array('ArticlesTag.tag_id' => 3));
	
	,
										'fields' => array('Group.*','GroupsUser.*')
										->GroupsUser
		 */
	    $this->Group->recursive = 2;
		
	    $this->Group->unbindModel(array('hasMany' => array('Forum','Album')));
		$this->Group->unbindModel(array('hasOne' => array('GroupsRole')));
		//debug($this->Group);
		$this->Group->GroupsUser->bindModel(array('belongsTo' => array('Group')));
		$groups =  $this->Group->GroupsUser->find('all', array('conditions'=>
										array('GroupsUser.user_id'=>$user_id,'GroupsUser.accept'=>1)));
			
		//debug($groups);
		
		$this->Group->unbindModel(array('hasAndBelongsToMany' => array('User')));
		
		$this->Group->bindModel(
		array('hasOne' => array('GroupsUser'=>array('className'=>'GroupsUser',
		'conditions'=>array('GroupsUser.user_id'=>$user_id,'GroupsUser.accept'=>0)))));
		$this->Group->GroupsUser->bindModel(array('belongsTo' =>
		 array('User'=>array('className'=>'User','foreignKey'=> 'inviter_id'))));
		
		$groups2confirm = $this->Group->find('all', array(
                'fields' => array('Group.*'),
                 'conditions'=>array('GroupsUser.user_id'=>$user_id,'GroupsUser.accept'=>0) 
                ));														

		//debug($groups2confirm);

						
		$this->set('groups2confirm',$groups2confirm);
		$this->set('groups',$groups);
	 }
	 
	 function view($id = null){
	 
	    $this->Group->recursive = 2;
		$this->Group->id = $id;
	    $group = $this->Group->read();
	    //debug($group);
        $this->set('group',$group);
		$this->elements_right = array('groupmenu'=> array('entity'=>$group['Group'],'admin'=>$group['GroupsRole']['User']));
	    //$content_for_bar['menuname'] = 'groupmenu';
	    //$content_for_bar['parameter'] = array('entity'=>$group['Group'],'admin'=>$group['GroupsRole']['User']);
	    //$this->set('content_for_bar',$content_for_bar);
		$this->pageTitle = ' Group '.$group['Group']['name']; 
	 }
	 
	 function main($user_id = null){
	    $groups = $this->Group->getGroupsForUser($user_id);
		$this->helper_bar_menu();
		$this->set('groups',$groups);
		$this->set('user_id',$user_id);
	 }
	 

	 
	 function add(){
	 	$user_id = $this->Auth->user('id');
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$group_id = $this->Group->getLastInsertID();
				$this->data['GroupsUser']['group_id'] = $group_id;
				$this->data['GroupsUser']['accept'] =1;
				$this->data['GroupsUser']['user_id'] =$user_id;
				$this->Group->bindModel(array('hasOne' => array('GroupsUser')));
				$this->Group->GroupsUser->save($this->data);
				/*
				$this->User->bindModel(array('hasOne' => array(
					'Forum'=>array('className'=>'Forum',
					'foreignKey'=> 'entity_id',
					'conditions' => 'entity_type = 2'))));
					
				$forum['entity_id'] = $group_id;
				$forum['entity_type'] = 2;
				$forum['name'] = 'Ð¤Ð¾Ñ€ÑƒÐ¼Ñ‹ Ð³Ñ€ÑƒÐ¿Ð¿Ñ‹';
				$this->Group->Forum->save($forum);	
				
				
				$this->Group->bindModel(array('hasMany' => array('Album')));
				$album['entity_id'] = $group_id;
				$album['entity_type'] = 2;
				$album['name'] = 'ÐžÑ�Ð½Ð¾Ð²Ð½Ð¾Ð¹ Ð°Ð»ÑŒÐ±Ð¾Ð¼';
				$this->Group->Album->save($album);
                */
				$this->Group->bindModel(array('hasOne' => array('GroupsRole')));
				$admin['role_id']=2;
				$admin['user_id']=$user_id;
				$admin['group_id']=$group_id;
				$admin['group_type']=2;
				$this->Group->GroupsRole->save($admin);
				
				$this->redirect('/groups/view/'.$group_id);
			}else {
			    $this->Session->setFlash('Please correct errors below.');
			}	
		}
		//$this->set('user_id',$user_id);
	 }
	 
	 function edit($id = null){
	   $user_id = $this->Auth->user('id');
	   if ($id == null) $id = $this->data['Group']['id'];
	   if ($this->check_permission($id,$user_id))
	   {
	   		if (!empty($this->data)) {
					if ($this->Group->save($this->data)) 
					{
						$this->Session->setFlash('The data have been changed!');
						$this->redirect('/groups/view/'.$id);
					}
					else 
					{
		      			$this->Session->setFlash('Please correct errors below.');
		            }
		    }
			$this->Group->recursive = 2;
			$this->Group->id = $id;
			$group = $this->Group->read();
			//debug($group);
       		$this->set('group', $group);
			$this->elements_right = array('groupmenu'=> array('entity'=>$group['Group'],'admin'=>$group['GroupsRole']['User']));
		
	   }
	   else
	   {
	   		$this->Session->setFlash('Edit group may only its creator!');
			$this->redirect('/groups/view/'.$id);
	   } 

	 }
	 
	 function check_permission($group_id,$user_id)
	 {
	 	$group = $this->Group->get($group_id,1);
		//debug($group);
	    $admin_id = $group['GroupsRole']['user_id'];
		if ($user_id == $admin_id)
	    {
	    	return true;
	    }
		else
		{
			return false;
		}
	 }
	 
	function delete($id=null) {
	   $user_id = $this->Auth->user('id');
	   if ($this->check_permission($id,$user_id))
	   {
	   		$this->Group->del($id);
			$this->Session->setFlash('	The group has been deleted.');
			$this->redirect('/groups/index');
	   }
	   else
	   {
	   		$this->Session->setFlash('Remove the group may only its creator!');
			$this->redirect('/groups/view/'.$id);
	   }  
	}
	
		 function addUser($group_id=null)
	 {
		$this->set('addUser',$this->Group->addUser($group_id,$this->Auth->user('id')));
	 }
	 
	 function inviteUser($user_id=null)
	 {
		if (!empty($this->data) && $this->Group->inviteUser($this->data)) {
			$this->set('inviteUser', 'request has been sent.');
			//$this->render('/com/msg');	
		}
		else
		{
			$inviter_id = $this->Auth->user('id');
			$groups = $this->Group->getListGroupsForUser($inviter_id);
			//debug($groups);
			$this->set('groups',$groups);
			$this->set('inviter_id',$inviter_id);
			$this->set('user_id',$user_id);
		}	
	 }
}
?>