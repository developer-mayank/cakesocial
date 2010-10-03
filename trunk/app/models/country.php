<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Country extends AppModel
{

var $name = 'Country';
var $displayField = 'name_en';
    
	function get($id = null,$recursive = 2){
	   $this->id = $id;
	   $this->recursive = $recursive;
	   $country = $this->read();
	   return $country;
	 }
	
    function getList() {
        return  $this->find('list');
	}
	
	function getForUnis() {
         return $this->query("
				SELECT DISTINCT countries.id,countries.name_en, count( unis.id ) c
				FROM countries, cities, unis
				WHERE cities.id
				IN (SELECT DISTINCT city_id FROM unis)
				AND cities.id = unis.city_id
				AND cities.country_id = countries.id
				GROUP BY countries.id order by c desc"
		);
	}
}
