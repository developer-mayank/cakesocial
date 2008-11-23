<?
/**
 * 
 *
 * @autor yuriy
 * @autor 7278181@gmail.com
 */
 class Group extends AppModel {  
     var $name = 'Group';  
     var $useTable = 'groups';  
     var $hasAndBelongsToMany = array('User' => array('className' => 'User',  
                         'joinTable' => 'groups_users',  
                         'foreignKey' => 'group_id',  
                         'associationForeignKey' => 'user_id',  
                         'unique' => true  
             )  
    );
	
	var $belongsTo = array('User' =>
                        array('className'    => 'User',
                        'foreignKey'   => 'admin_id')				
    );

	
	function getGroupsForUserAdmin($user_id)
	{
		return   $this->query("
		     select 
			 	id,name
			 from 
			 	groups 
			 where 
			 	admin_id = $user_id");	
	} 
	
	function getGroupsForUser($user_id)
	{
		return   $this->query("
		     select 
			 	groups.id,groups.name
			 from 
			 	groups , groups_users 
			 where 
			 	groups.id = groups_users.group_id
			 AND
			 	groups_users.user_id = $user_id
			 AND 
			    groups_users.accept = 1	");	
	}  
 } 
 ?>