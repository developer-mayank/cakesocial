<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class CountriesController extends AppController {

	var $name = 'Countries';
	var $helpers = array('Paginator','Userlist');
	
	function get() {
        return  $this->Country->find('list');
	}
	
	function show($id=null){
		$this->Country->id = $id;
		$this->Country->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geo',
					 'foreignKey'   => 'country_id',
                     'associationForeignKey'=> 'user_id'
			 )))); 
		$users = $this->Country->read();
		$this->set('users',$users['User']);
		$this->set('geo',$users['Country']['name']);
		//debug($users);
		$this->render('/users/show1');
	}
	
	function view($id = null){
	 	$this->Country->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geos',
					 'foreignKey'   => 'country_id',
                     'associationForeignKey'=> 'user_id'
			 )))); 
	   $this->Country->id = $id;
	   $group = $this->Country->read();
	   //debug($group);
       $this->set('group',$group);
	   $this->pageTitle = $group['Country']['name'].' :: Ð“Ñ€ÑƒÐ¿Ð¿Ð° Ð½Ð° StudIP';
	   
	   $group['Country']['entity_type'] = 8;
	   $this->elements_right = array('geomenu'=>array('entity'=>$group['Country']));
	   
	   	// $content_for_bar['menuname'] = 'geomenu';
	    // $content_for_bar['parameter'] = array('entity'=>$group['Country']);
	    // $this->set('content_for_bar',$content_for_bar);
	 }
}