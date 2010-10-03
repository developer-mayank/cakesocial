<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Invitation extends AppModel
{
var $name = 'Invitation';

    var $validate = array(  
        'email' => array(
             'mail' => array(
                 'rule' => array('email', true),
                 'message' => 'wrong Email!'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'required' => true,
                 'allowEmpty' => false,
                 'message' => 'send ok!')),
	    'title' => array(
           'rule' => 'notEmpty',
           'message' => 'not empty')
	 
	 );
}
