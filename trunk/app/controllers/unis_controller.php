<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class UnisController extends AppController {

	var $name = 'Unis';
	var $helpers = array('Paginator','Userlist');

	
	function search()
	{
		 $geouni = array();
		 $this->pageTitle ='Unis';
		 if (isset($this->passedArgs[0]) && is_numeric($this->passedArgs[0]) && !isset($this->passedArgs[1]) )
		 {
		 	$country_id = $this->passedArgs[0];
			$this->Session->del('region_id');
			$geouni = array('country_id' => $country_id);
			
		 }
		 
		 if (isset($this->passedArgs[1]) && is_numeric($this->passedArgs[1]) || $this->Session->check('region_id'))
		 {
		 	if (isset($this->passedArgs[1]))
			{
				$region_id = $this->passedArgs[1];
				$this->Session->write('region_id', $region_id);
			}
			else
			{
				$region_id = $this->Session->read('region_id');
			}
			$geouni = array('region_id' => $region_id);
			$this->Uni->Behaviors->attach('Containable');
			$this->Uni->bindModel(array('belongsTo' => array('City')));
			$filter = array();
			$this->paginate = array(
				'order'=>array('Uni.name' => 'asc'),
				'conditions'=> array('City.region_id' => $region_id),
				'limit' => 30,
				'fields'=> array('Uni.id','Uni.name'),
				'contain'=>array('City'=>array('conditions'=> array(),
				                           'fields'=> array('City.name'))
		      ));
		    $unis =  $this->paginate();
			$this->set('unis',$unis);
		 }
		$this->set('geouni',$geouni);
		$this->elements_right = '';
		
	}

	
	function view($id = null){
	 	$this->Uni->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'educations',
					 'foreignKey'   => 'school_id',
					 'conditions' => array('type = 3'),
                     'associationForeignKey'=> 'user_id'
			 ))));
	   $this->Uni->id = $id;
	   $group = $this->Uni->read();
       $this->set('group',$group);
	   $this->elements_right = array('unimenu'=> array('entity'=>$group['Uni']));
	   $this->pageTitle = $group['Uni']['name'].' :: '.$group['Uni']['shortname'].' :: '.$group['City']['name'];
	 }
	

	
	function show($id=null){
		$this->Uni->id = $id;
		$this->Uni->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'education',
					 'foreignKey'   => 'school_id',
                     'associationForeignKey'=> 'user_id'
		))));
		$users = $this->Uni->read();
		$this->set('users',$users['User']);
		$this->set('geo',$users['Uni']['name']);
		$this->render('/users/show1');
	}
	
		
	function edit()
	{}
	
		
	function get()
	{
		$unis = $this->Uni->find('list',array('fields'=>array('Uni.name'),
		'conditions' => array('city_id = '.$this->params['data']['Geo']['city_id']),
		'order'=>array('Uni.name'=>'ASC')));
		 $this->set('option',$unis);
		 $this->set('empty',9);
		 $this->render('/com/options'); 	
	}
   
	function admin_add()
	{
		//$filter = $this->Search->process($this);
		$geo_ids  = array('country_id' => $this->data['Geo']['country_id'],
						  'region_id' => $this->data['Geo']['region_id'],
						  'city_id' => $this->data['Geo']['city_id']
		);
		$this->set('geo_ids',$geo_ids);
		if (!empty($this->data)) {
			    $this->data['Uni']['city_id']    = $this->data['Geo']['city_id'];
				$this->data['Uni']['name'] = trim($this->data['Uni']['name']);
				$this->data['Uni']['shortname'] = trim($this->data['Uni']['shortname']);
			if ($this->Uni->save($this->data)) {
				$this->Session->setFlash('OK *'.$this->data['Uni']['name'].'*::*'.$this->data['Uni']['shortname']);
			}else {
			    
			}
		}
		$this->data['Uni']['shortname']='';
		$this->data['Uni']['name']='';
	}
}