<?
class Favorite extends AppModel {
var $name = 'Favorite';
var $belongsTo = array('User' =>
                        array('className'    => 'User',
                              'foreignKey'   => 'favorite_id')
							  );
}

