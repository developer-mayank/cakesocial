<?
/**
 *
 * @author yuriy
 * @autor 7278181@gmail.com
 *
 * @author Sardorbek Pulatov (pROCKramer)
 * @email : sardor90@gmail.com 
 */
class User extends AppModel {

    var $name = 'User';
    var $actsAs = array('Acl' => array('requester'));
    
    var  $validate = array(
       'username' => array(
             'between' => array(
                 'rule' => array('between', 5, 15),
                 'message' => 'must be minumum of 5 characters'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'Such Login is already busy. Try to think of another.....'),
             'alphanum' => array(
                 'rule' => 'alphaNumeric',
                 'message' => 'Please enter Nick  in Latin letters, and (or) the numbers !')
              ),
             'email' => array('mail' => array(
		                 'rule' => array('email', true),
						 'allowEmpty' => false,
		                 'message' => 'Проверьте правильность Email!'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'The database already exists a user with this Email!'))
	 );

     
     var $hasAndBelongsToMany = array(  
             'Group' => array('className' => 'Group',  
                         'joinTable' => 'groups_users',  
                         'foreignKey' => 'user_id',  
                         'associationForeignKey' => 'group_id',  
                        'unique' => true  
            )  
     );

    var $belongsTo = array('Usertype');


     function parentNode()
     {
         if (!$this->id && empty($this->data))
         {
            return null;
         }

         $data = $this->data;

         if (empty($this->data))
         {
             $data = $this->read();
         }


         if (!$data['User']['usertype_id'])
         {
            return null;
         }
         else
         {
            return array('Group' => array('id' => $data['User']['usertype_id']));
         }
     }
		/*
		var $hasAndBelongsToMany = array(
        'ForwardRelation' => array(
            'className'  => 'User',
            'joinTable'  => 'relations',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'friend_id',
        ),
 
        'BackRelation' => array(
            'className'  => 'User',
            'joinTable'  => 'relations',
            'foreignKey' => 'friend_id',
            'associationForeignKey' => 'user_id',
        ),
    );

		
		
		var $hasOne = array('Profile' =>
                        array('className'    => 'Profile',
                              'conditions'   => '',
                              'order'        => '',
                              'dependent'    =>  true,
                              'foreignKey'   => 'id'
                        )
                  );
		
		var $hasAndBelongsToMany = 
		   array('Geo' =>
                 array('className'    => 'Geo',
                 'joinTable'    => 'geos_users',
                 'foreignKey'   => 'user_id',
                 'associationForeignKey'=> 'geo_id',
                 'conditions'   => '',
                 'order'        => '',
                 'limit'        => '',
                 'unique'       => false,
                 'finderQuery'  => '',
                 'deleteQuery'  => '',
             )
        );
		
		
		
				  
	
        var $belongsTo = array(
                   'Country' => array('className' => 'Country',
                                      'foreignKey' => 'country_id',
                                      'conditions' => '',
                                      'fields' => '',
                                      'order' => ''),
                    'Region' => array('className' => 'Region',
                             'foreignKey' => 'region_id',
                             'conditions' => '',
                             'fields' => '',
                             'order' => ''
                     ) ,
					 'City' => array('className' => 'City',
                             'foreignKey' => 'city_id',
                             'conditions' => '',
                             'fields' => '',
                             'order' => ''
                     ) 
        );
      */

}
