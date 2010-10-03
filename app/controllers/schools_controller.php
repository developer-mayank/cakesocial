<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class SchoolsController extends AppController {

	var $name = 'Schools';
	var $helpers = array('Paginator','Userlist');
	
	function get()
	{
		 $unis = $this->School->find('list',
		 array('fields'=>array('School.name'),
		'conditions' => array('city_id = '.$this->params['data']['Geo']['city_id']),
		'order'=>array('School.name'=>'ASC')));
		 $this->set('option',$unis);
		 $this->set('empty',9);
		 $this->render('/com/options');	
	}
	
	function search()
	{   
	    $this->School->Behaviors->attach('Containable');
		$this->School->bindModel(array('belongsTo' => array('City')));
		$this->School->City->bindModel(array('belongsTo' => array('Region')));
		$this->School->City->bindModel(array('belongsTo' => array('Country')));
		$this->School->recursive = 2;
		$unis = $this->School->find('all');
		/*
		$this->paginate = array(
			'limit' => 30,
			'fields'=> array('id','name'),
			'contain'=>array('City'=>array
			                        ('conditions'=> array(''),
									'fields'=> array('City.name'),
									'Region'=>array('conditions'=> array(''),'fields'=> array('Region.name')
							 ))
		));
		$unis =  $this->paginate();
		
		debug($unis);
		*/
		$this->set('unis',$unis);
	    $this->elements_right = '';
	    /*
	     * 	array('foreignKey' => false, 'conditions' => array('School.city_id = City.id')
		$this->School->Behaviors->attach('Containable');
		$this->School->bindModel(array('belongsTo' => array('City')));
		$this->paginate = array(
			'limit' => 30,
			'fields'=> array('id','name'),
			'contain'=>array('City'=>array('conditions'=> array(''),'fields'=> array('City.name'))
		));
		$unis =  $this->paginate();
		debug($unis);
		$this->set('unis',$unis);
		*/
	}
	
	function view($id = null){
		$this->School->bindModel(array('belongsTo' => array('City')));
		$this->School->City->bindModel(array('belongsTo' => array('Region')));
		$this->School->City->bindModel(array('belongsTo' => array('Country')));
		$this->School->recursive = 2;
	 	$this->School->bindModel(array('hasAndBelongsToMany' =>
			 array('User' =>array('className' => 'User',
			         'joinTable'  => 'educations',
					 'foreignKey'   => 'school_id',
					 'conditions' => array('type = 1'),
                     'associationForeignKey'=> 'user_id'
			 ))));
	   $this->School->id = $id;
	   $group = $this->School->read();
	   //debug($group);
       $this->set('group',$group);
	   $this->pageTitle = $group['School']['name'].' :: '.
	   $group['City']['Country']['name'].' :: '.
	   $group['City']['Region']['name'].' :: '.
	   $group['City']['name'].' :: '.
	   'Группа на StudIP';
	   //$content_for_bar['menuname'] = 'schoolmenu';
	   //$content_for_bar['parameter'] = array('entity'=>$group['School']);
	   //$this->set('content_for_bar',$content_for_bar);
	   
	   $this->elements_right = array('scoolmenu'=> array('entity'=>$group['School']));

	 }

}
