<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Guest extends AppModel {

	var $name = 'Guest';
	/*	
	var $belongsTo = array('User' =>
                           array('className'  => 'User',
                                 'conditions' => '',
                                 'order'      => '',
                                 'foreignKey' => 'user_id'
                           )
     );
					 
	*/
					   
	function add($user_id,$guest_id) {
		$guest['guest_id'] = $guest_id;	
	    $guest['user_id']  = $user_id;
		$cond = array('user_id' => $user_id,'guest_id' => $guest_id );
		if ($this->isUnique($cond,false))
		{
			$this->save($guest);
		}
		else
		{
			
			$this->updateAll(array('user_id' => $user_id),$cond);
		}
	}
}
