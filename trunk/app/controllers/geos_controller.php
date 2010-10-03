<?
class GeosController extends AppController {

	var $name = 'Geos';
	
	var $helpers = array('GoogleMap');
	
	function map() {
        //$this->layout = "map";
        $this->Geo->recursive = 0;
        $this->set('points', $this->Geo->find('all'));
    }  
	
	function add($city_id = null) {
		if (!empty($this->data)) {
			$this->data['Geo']['user_id'] = $this->Auth->user('id');
		    $this->data['Geo']['date_an'] = implode('-',$this->data['Geo']['date_an']);
			$this->data['Geo']['date_end'] = implode('-',$this->data['Geo']['date_end']);
			$address = $this->Geo->getAdress($this->data['Geo']['city_id']);
		    $address = $address[0]['countries']['name'].', '.$address[0]['cities']['name'];
			App::import('vendor','googlegeo',array('file' => 'google_geo.php'));
			$googleGeo = new GoogleGeo($address);
			$geo = $googleGeo->geo();
            //debug($geo);
			$this->data['Geo']['latitude'] = $geo['latitude'];
			$this->data['Geo']['longitude'] = $geo['longitude']; 
	
			 
			if ($this->Geo->save($this->data)) {
				$this->Session->setFlash('OK');
				$this->redirect('/geos/index');
			}else {
			    $this->Session->setFlash('Please correct errors below.');
			}	
		}
		if (!is_null($city_id))
		{
			$city = ClassRegistry::init('City')->getCity($city_id);
			//debug($city);
			$geo_ids  = array('country_id' => $city['City']['country_id'],
						      'region_id'  => $city['City']['region_id'],
						      'city_id' => $city['City']['id']
		    );
		    $this->set('geo_ids',$geo_ids);
		}
	}
	
	function index() {
		$user_id = $this->Auth->user('id');
		$cond = array("user_id =$user_id");
		if (isset($this->passedArgs['main']))
		{
			$this->Geo->updateAll(array('type' => 0),$cond);
			$this->Geo->id = $this->passedArgs['main'];
			$this->Geo->saveField('type',1);
		}
		//$this->Geo->bindModel(array('belongsTo' => array('CitiesMap'=> array('className' => 'CitiesMap','foreignKey' => 'city_id'))));
		$geos = $this->Geo->find('all',array('conditions' => $cond));
		//debug($geos);
		$this->set('geos',$geos);
		$this->elements_right = '';
	}
	
	function edit($id=null) {
		
		if (!empty($this->data)) {
			//debug($this->data);
			$this->data['Geo']['date_an'] = implode('-',$this->data['Geo']['date_an']);
			$this->data['Geo']['date_end'] = implode('-',$this->data['Geo']['date_end']);
			$address = $this->Geo->getAdress($this->data['Geo']['city_id']);
		    $address = $address[0]['countries']['name'].', '.$address[0]['cities']['name'];
			App::import('vendor','googlegeo',array('file' => 'google_geo.php'));
			$googleGeo = new GoogleGeo($address);
			$geo = $googleGeo->geo();
            //debug($geo);
			$this->data['Geo']['latitude'] = $geo['latitude'];
			$this->data['Geo']['longitude'] = $geo['longitude']; 
			if ($this->Geo->save($this->data)) 
			{
				$this->Session->setFlash('The data have been changed!');	
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }
	        $this->redirect('/geos/index');
		}
	
        $this->Geo->id = $id;
		$geo = $this->Geo->read();
		//debug($geo);
		$geo_ids  = array('country_id' => $geo['Geo']['country_id'],
						  'region_id' => $geo['Geo']['region_id'],
						  'city_id' => $geo['Geo']['city_id']
		);
		$this->set('geo',$geo);
		$this->set('geo_ids',$geo_ids);
	}
	
	function delete($id=null) {
	    $this->Geo->del($id);
        $this->Session->setFlash('Removal is successful!');
	    $this->redirect('/geos/index');
	}
	
	
	function view($user_id=null) {

		$geos = $this->Geo->findAll(array("user_id =$user_id"));
		$this->set('geos',$geos);
	}
	
}
