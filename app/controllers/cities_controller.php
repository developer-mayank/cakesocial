<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class CitiesController extends AppController {

	var $name = 'Cities';
	//var $components = array('Search');
	var $helpers = array('Paginator','Userlist','GoogleMap');

	
	function get($id=null){
		if (is_numeric($id))
		{
			$region_id = $id;
		} 
		else {
			$region_id = $this->params['data']['Geo']['region_id'];
			
		}
		         
		$cities = $this->City->find('list',array('fields'=>array('City.name'),
		'conditions' => array('region_id = '.$region_id),
		'order'=>array('City.name'=>'ASC')));
		if ($this->params['requested']){return 	$cities;}
	
        $this->set('option',$cities);
        //$this->set('empty',9);
		$this->render('/com/options');
	}
	
	function view($id = null){
	 	$this->City->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geos',
					 'foreignKey'   => 'city_id',
                     'associationForeignKey'=> 'user_id',
					 'order' => 'img desc',
					 'limit' => 4
			 ))));
	   $this->City->bindModel(array('belongsTo' => array('Country')));
	   $this->City->id = $id;
	   $this->City->recursive = 2;
	   $group = $this->City->read();
	   //debug($group);
       $this->set('group',$group);
	   
	   	 //$content_for_bar['menuname'] = 'geomenu';
	     //$content_for_bar['parameter'] = array('entity'=>$group['City'],'entity_type'=>6);
	     //$this->set('content_for_bar',$content_for_bar);
		 $group['City']['entity_type'] = 6;
		 $this->elements_right = array('geomenu'=>array('entity'=>$group['City']));
		 //$this->helper_bar_menu();
		 
	  if (isset($group['CitiesMap']))$this->set('map',array(0=>$group['CitiesMap']));
	
	  $this->pageTitle = $group['City']['name'].' :: '.$group['Country']['name'].' '.$group['Country']['alpha2'].' ::  StudIP Ð“ÐµÐ¾-Ð³Ñ€ÑƒÐ¿Ð¿Ð°'; 
		 
	 }

	
	function user_list($id=null){
		$this->City->id = $id;
		$this->City->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'geos',
					 'foreignKey'   => 'city_id',
                     'associationForeignKey'=> 'user_id',
					  'order' => 'img desc'
			 ))));
		//$this->City->recursive = 1;
		//$this->City->User->recursive = -1; 
		$users = $this->City->read();
		$users['City']['entity_type'] = 6;
		$this->elements_right = array('geomenu'=>array('entity'=>$users['City']));
		$this->set('city_name',$users['City']['name']);
		$this->set('users',$users['User']);
		
		//debug($users);
	}
	
	
	function admin_add()
	{

		$geo_ids  = array('country_id' => $this->data['Geo']['country_id'],
						  'region_id' => $this->data['Geo']['region_id'],
						  'city_id' => $this->data['Geo']['city_id']
		);
		$this->set('geo_ids',$geo_ids);

		if (!empty($this->data)) {
			//debug($this->data);
			$this->data['City']['country_id'] = $this->data['Geo']['country_id'];
			$this->data['City']['region_id'] = $this->data['Geo']['region_id'];
	        $this->data['City']['name'] = trim($this->data['City']['name'] );
			if ($this->City->save($this->data)) {
				$this->Session->setFlash('*'.$this->data['City']['name'].'*');
			}else 
			{
			    
			}
		}
		$this->render('/geos/admin_add');
	}
	
}
