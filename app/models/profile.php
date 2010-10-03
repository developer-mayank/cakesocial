<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Profile extends AppModel {

    var $name = 'Profile';
	
		
	var $family_options = array (
	1 =>'In the active search',
	2 =>'I wait for you',
	3 =>'not married',
	4 =>'Married',
	5 =>'Cohabitation',
	6 =>'I have a friend / girlfriend',
	8 =>'I do not know');
	
	var $children_options = array (
	1 =>'no',
	2 =>'No and no need to',
	3 =>'No, but it would be',
	4 =>'There are, live with me',
	5 =>'Yes, live separately',
	6 =>'I do not know',
	7 =>'There will soon be');
	
	var $sex_options = array (
	1 =>'Female',
	2 =>'Male');
	
     /*
    var $belongsTo = array('User' =>
                           array('className'  => 'User',
                                 'conditions' => '',
                                 'order'      => '',
                                 'foreignKey' => 'id'
                           )
                     );
                     */
  

}