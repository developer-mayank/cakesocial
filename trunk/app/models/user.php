<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class User extends AppModel {

    var $name = 'User';
	/*
	public $hasOne = array('Geo' => array('className' => 'Geo',
 								'conditions' => array('Geo.type' => '1'))
    );
    */ 
	
	var  $validate = array(  
       'name' => array(
             'between' => array(
                 'rule' => array('between', 5, 15),
                 'message' => 'must be minumum of 5 characters'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'Such Login is already busy. Try to think of another.....'),
             'alphanum' => array(
                 'rule' => 'alphaNumeric',
                 'message' => 'Please enter Nick (ID) in Latin letters, and (or) the numbers !')
              ),
             'email' => array('mail' => array(
		                 'rule' => array('email', true),
						 'allowEmpty' => false,
		                 'message' => 'Verify your Email!'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'The database already exists a user with this Email!'))
	 );
		 
	 function get($id = null){
	   $this->id = $id;
	   return $this->read();
	 }
	 
	function get_latest($limit=5) {
		$this->recursive = -1;
		$users =  $this->find('all', array('order'=>array('id' => 'desc'),
			'limit' => $limit,'fields'=> array('id','name','sname','img'),
			'conditions' => array('is_active = 1','img <> ""')));
			return $users;
			
	}
}
