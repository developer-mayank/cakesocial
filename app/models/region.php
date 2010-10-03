<?
class Region extends AppModel
{
var $name = 'Region';


    function get($id = null,$recursive = 2){
	   $this->id = $id;
	   $this->recursive = $recursive;
	   $region = $this->read();
	   return $region;
	 }

    function getCities($region_id) {
    	
        $cities_id = $this->query("
				SELECT cities.id
				FROM  cities
				WHERE 
				region_id = $region_id");
		$cities_id =  Set::extract('/cities/id', $cities_id);
		$region =  $this->query("
				SELECT id,name
				FROM  regions
				WHERE 
				id = $region_id");
				
		return $this->query("
				SELECT cities.name, unis.id, unis.name
						FROM cities, unis
						WHERE cities.id = unis.city_id
						AND cities.region_id = $region_id
				order by unis.id "
		);
	}

	function getRegionsForUnis($country_id) {
         return $this->query("
				SELECT DISTINCT regions.id,regions.name, count( unis.id ) c
				FROM regions, cities, unis
				WHERE cities.id
				IN (SELECT DISTINCT city_id FROM unis)
				AND cities.id = unis.city_id
				AND cities.region_id = regions.id
				AND regions.country_id = $country_id
				GROUP BY regions.id order by c desc"
		);
	}
	
}
