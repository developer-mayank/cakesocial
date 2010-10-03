<?
class Comment extends AppModel {

    var $name = 'Comment';

    var $belongsTo = array('User' =>
                           array('className'  => 'User',
                                 'conditions' => '',
                                 'order'      => '',
                                 'foreignKey' => 'user_id'
                           )
                     );
  

}