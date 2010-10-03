<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class RegionsController extends AppController {

	var $name = 'Regions';
	var $helpers = array('Paginator','Userlist');
	
	function get($id=null){
		if(isset($this->params['requested'])) {
			 $regions = $this->Region->find('list',
		     array('fields'=>array('Region.name'),
		     'conditions' => array('country_id = '.$id),
		     'order'=>array('Region.name'=>'ASC'))); 
             return $regions; 
        } 
		$regions = $this->Region->find('list',
		array('fields'=>array('Region.name'),
		'conditions' => array('country_id = '.$this->params['data']['Geo']['country_id']),
		'order'=>array('Region.name'=>'ASC')));
        $this->set('option',$regions); 
		$this->render('/com/options');
	}
	
		
	function show($id=null){
		$this->Region->id = $id;
		$this->Region->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geo',
					 'foreignKey'   => 'region_id',
                     'associationForeignKey'=> 'user_id'
			 )))); 
		$users = $this->Region->read();
		$this->set('users',$users['User']);
		$this->set('geo',$users['Region']['name']);
		$this->render('/users/show1');
	}
	
	function view($id = null){
	 	$this->Region->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geos',
					 'foreignKey'   => 'region_id',
                     'associationForeignKey'=> 'user_id'
			 )))); 
	   $this->Region->id = $id;
	   $group = $this->Region->read();
	   //debug($group);
       $this->set('group',$group);
	   
	   	 $group['Region']['entity_type'] = 7;
		 $this->elements_right = array('geomenu'=>array('entity'=>$group['Region']));
		 
	   $this->pageTitle = $group['Region']['name'];
	   	 //$content_for_bar['menuname'] = 'geomenu';
	     //$content_for_bar['parameter'] = array('entity'=>$group['Region']);
	     //$this->set('content_for_bar',$content_for_bar);
	 }

}
