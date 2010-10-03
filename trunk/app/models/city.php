<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class City extends AppModel
{
	var $name = 'City';
	
	//var $belongsTo = array('CitiesMap' => array('className' => 'CitiesMap','foreignKey' => 'id'));
	
    function get($id = null,$recursive = 2){
	   $this->id = $id;
	   $this->recursive = $recursive;
	   $city = $this->read();
	   return $city;
	 }
	
	function getCity($id)
	{
		//$this->id = $city_id;
		$cond = array( "or" => array (
   							"City.id" => $id,
   							"City.region_id" => $id,
							"City.country_id" => $id,
   									 )
                     );

		$city = $this->find('first',array('conditions' =>$cond));
		if ($city['City']['country_id'] == $id)
		{
			$city['City']['region_id'] = 0;
			$city['City']['id'] = 0;
		}
		if ($city['City']['region_id'] == $id)
		{
			$city['City']['id'] = 0;
		} 
		return $city;
	}
	
	function getForUnis($country_id) {
         return $this->query("
				SELECT DISTINCT cities.id,cities.name, count( unis.id ) c
				FROM cities, unis
				WHERE cities.id
				IN (SELECT DISTINCT city_id FROM unis)
				AND cities.id = unis.city_id
				AND cities.country_id = $country_id
				GROUP BY cities.id order by c desc"
		);
	}
	
	function getForUsers() {
         return $this->query("
				select count(users.id) c,cities.id, cities.name  from
					users, geos , cities
					where
					geos.user_id = users.id
					AND
					geos.city_id = cities.id
					group by  cities.name order by c desc"
		);
	}
	
	
	// TODO
	/*
	var $belongsTo = array('Region' =>
                               array('className'    => 'Region',
                                     'foreignKey'   => 'region_id')			
        );  
        */                  
}
