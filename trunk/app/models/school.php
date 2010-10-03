<?
class School extends AppModel {

     var $name = 'School';
		
	 var $belongsTo = array('City');
		
	function get($id = null){
	   $this->id = $id;
	   return $this->read();
	 }
	 	
	function addSchool($name = '',$city_id){
			    $this->data['School']['name']       = $name;
				$this->data['School']['city_id']    = $city_id;
				$this->save($this->data);
				return  $this->getLastInsertID();	
	}	
}
