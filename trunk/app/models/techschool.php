<?
class Techschool extends AppModel {

        var $name = 'Techschool';
		
		var $belongsTo = array('City' =>
                               array('className'    => 'City',
                                     'foreignKey'   => 'city_id')			
        );
		
	function get($id = null){
	   $this->id = $id;
	   return $this->read();
	 }
		
		function addTechschool($name = '',$city_id)
		{
			    $data['Techschool']['name']       = $name;
				$data['Techschool']['city_id']    = $city_id;
				$this->save($data);
				return  $this->getLastInsertID();	
		}
		
}
