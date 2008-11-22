<?
/**
 * 
 *
 * @autor yuriy
 * @autor 7278282@gmail.com
 */
class Guest extends AppModel {

        var $name = 'Guest';
		
		    var $belongsTo = array('User' =>
                           array('className'  => 'User',
                                 'conditions' => '',
                                 'order'      => '',
                                 'foreignKey' => 'user_id'
                           )
                     );
		

}
