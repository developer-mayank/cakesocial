<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Favorite extends AppModel {
var $name = 'Favorite';
var $belongsTo = array('User' =>
                        array('className'    => 'User',
                              'foreignKey'   => 'favorite_id')
							  );
}

