<?
 class Group extends AppModel {
 	 
     var $name = 'Group';
	 
	var $hasAndBelongsToMany  = array('User'=>array(
	                'className'=>'User',
					'joinTable' => 'groups_users',
					'foreignKey'=> 'group_id',
					'associationForeignKey' => 'user_id',
					'unique' => true
	));
	
	// ,'conditions' => array('GroupsUser.accept'=>1)
	 
	 var $hasOne = array('GroupsRole'=>array(
	                'className'=>'GroupsRole',
					'foreignKey'=> 'group_id',
					'conditions' => array('group_type = 2'),
					'dependent' => true
					));
	 
	 var $hasMany = array('Forum'=>array(
	                'className'=>'Forum',
					'foreignKey'=> 'entity_id',
					'conditions' => array('entity_type = 2'),
					'dependent' => true
					),'Album'=>array(
	                'className'=>'Album',
					'foreignKey'=> 'entity_id',
					'conditions' => array('entity_type = 2'),
					'dependent' => true
					)
					);
	
     
	 
	 function get($id = null,$recursive = 2){
	   $this->id = $id;
	   $this->recursive = $recursive;
	   $this->unbindModel(array('hasMany' => array('Forum')));
	   $this->unbindModel(array('hasAndBelongsToMany' => array('User')));
	   $group = $this->read();
	   return $group;
	 }
	 
	 function getGroupsForUser($user_id = null)
	 {
           $this->bindModel(array('hasOne' => array('GroupsUser')));
           $groups = $this->find('all', array('fields' => array('Group.id','Group.name'),
		                                    'conditions'=>array('GroupsUser.user_id'=>$user_id,'accept' => 1)));
	 }
	 // TODO LIST OHNE akzeptierte groups
	 function getListGroupsForUser($user_id = null)
	 {
	 	   $this->bindModel(array('hasOne' => array('GroupsUser')));
           $groups = $this->find('all', array('fields' => array('Group.id','Group.name'),
		                                    'conditions'=>array('GroupsUser.user_id'=>$user_id,'accept' => 1)));
		   $groups = Set::combine($groups,"{n}.Group.id", "{n}.Group.name");
		   return $groups;
	 }
	 
	 function inviteUser($data)
	 {
	 	
		App::import('Model', 'GroupsUser');
		$groupsUser = new GroupsUser();
		$this->data = $data;
		//$c = $groupsUser->find('count',array('conditions'=>array('user_id'=>$user_id,'group_id'=>$group_id)));
		$c = 0;
		if ($c == 0)
		{
			if ($groupsUser->save($this->data))
			{
				return 1;	
			}
			else
			{
				return -2;
			}
		}
		else
		{
			return -1;
		}
	 }
	 
	 function addUser($group_id,$user_id)
	 {
	 	
		App::import('Model', 'GroupsUser');
		$groupsUser = new GroupsUser();
		$c = $groupsUser->find('count',array('conditions'=>array('user_id'=>$user_id,'group_id'=>$group_id)));
		if ($c == 0)
		{
			$this->data['GroupsUser']['group_id']=$group_id;
			$this->data['GroupsUser']['user_id'] =$user_id;
			$this->data['GroupsUser']['role_id'] =1;
			$this->data['GroupsUser']['accept'] =1;
			return $groupsUser->save($this->data);
		}
		else
		{
			return -1;
		}
		
	 }
 } 
 ?>