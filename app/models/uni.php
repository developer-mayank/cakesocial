<?
class Uni extends AppModel {

       var $name = 'Uni';
		
	   var $belongsTo = array('City');
		
	   function get($id = null){
	   		$this->id = $id;
	   		return $this->read();
	   }
	   
		
		function addUni($name = '',$shortname='',$city_id)
		{
			    $this->data['Uni']['name']       = trim($name);
				if (strlen($name) < 2)
				{
					$this->data['Uni']['name'] = trim($shortname);	
				}
				$this->data['Uni']['shortname']  = trim($shortname);
				$this->data['Uni']['city_id']    = $city_id;
				$this->save($this->data);
				return  $this->getLastInsertID();
				
		}	
}
