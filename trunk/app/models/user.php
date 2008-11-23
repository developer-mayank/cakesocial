<?
/**
 * 
 *
 * @autor yuriy
 * @autor 7278181@gmail.com
 */
class User extends AppModel {

        var $name = 'User';
		
      var $displayField = 'username';  
//     var $name = 'User';  
//    var $useTable = 'users';  
    var $validate = array(  
        'email_address' => array('email'),  
         'password' => array('alphaNumeric'),  
         'active' => array('numeric')  
     );  
     var $hasAndBelongsToMany = array(  
             'Group' => array('className' => 'Group',  
                         'joinTable' => 'groups_users',  
                         'foreignKey' => 'user_id',  
                         'associationForeignKey' => 'group_id',  
                        'unique' => true  
            )  
     );
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
