<?
class Geo extends AppModel
{
var $name = 'Geo';

	var $belongsTo = array('City' =>
                        array('className'    => 'City',
                              'foreignKey'   => 'city_id'),
					    'Region' =>
                        array('className'    => 'Region',
                              'foreignKey'   => 'region_id'),
						'Country' =>
                        array('className'    => 'Country',
                              'foreignKey'   => 'country_id')					
    );
	
		
	function getAdress($city_id)
	{
	    return $this->query("
				SELECT countries.name,cities.name    
				FROM countries,cities
				WHERE 
				cities.id = $city_id
				AND cities.country_id = countries.id
				"
		);
	}
	
	/*
	function afterSave()
	{
	  //$userId = $this->data['TodoList']['user_id'];
	  //$this->clearCache('element_'.$userId.'_todo', 'views', '');
	  parent::afterSave();
	}
	*/ 

}
