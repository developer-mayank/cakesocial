<?
class MyFile extends AppModel {

        var $name = 'MyFile';
		
		    var $belongsTo = array('User' =>
                             array('className'  => 'User',
                                 'conditions' => '',
                                 'order'      => '',
                                 'foreignKey' => 'user_id'
                             )
            );
  
		
}
