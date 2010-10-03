<?
class Invitation extends AppModel
{
var $name = 'Invitation';

    var $validate = array(  
        'email' => array(
             'mail' => array(
                 'rule' => array('email', true),
                 'message' => 'Проверьте правильность Email!'),
             'unique' => array(
                 'rule' => 'isUnique',
                 'required' => true,
                 'allowEmpty' => false,
                 'message' => 'Приглашение на данный  Email уже было послано раннее.
				 Попробуйте пригласить других знакомых!')),
	    'title' => array(
           'rule' => 'notEmpty',
           'message' => 'пожалуйста напишите что то в сообщении')
	 
	 );
}
