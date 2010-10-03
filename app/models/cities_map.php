<?
class CitiesMap extends AppModel
{
	var $name = 'CitiesMap';

	var $primaryKey   = 'city_id';

	//var $hasOne = array('City' => array('className'    => 'City','foreignKey'   => 'city_id'));
	
		
	function addLL($geo)
	{
		$cond = array('city_id' => $geo['city_id']);
		if ($this->isUnique($cond,false))
		{
			$this->save($geo);
		}
	}
}