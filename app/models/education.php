<?php
class Education extends AppModel {

	var $name = 'Education';
	
	 function getAllForUser($user_id){
	   	    if(is_null($user_id)) return array();
			$this->recursive = 2;

			$this->bindModel(array('belongsTo' => array('Techschool' =>
                              array('className'    => 'Techschool',
                              'foreignKey'   => 'school_id'))));
	   		$cond = array("user_id = $user_id",'type = 2');
		    $techschool =  $this->find('all',array('conditions' => $cond));
	
			$this->bindModel(array('belongsTo' => array('School' =>
                              array('className'    => 'School',
                              'foreignKey'   => 'school_id'))));
	   		$cond = array("user_id = $user_id",'type = 1');
		    $school =  $this->find('all',array('conditions' => $cond));
			
			$this->bindModel(array('belongsTo' => array('Uni' =>
                              array('className'    => 'Uni',
                              'foreignKey'   => 'school_id'))));
			$this->bindModel(array('belongsTo' => array('Department')));
	   		$cond = array("user_id = $user_id",'type = 3');
		    $unis =  $this->find('all',array('conditions' => $cond));
			
			$education['unis'] = $unis;
			$education['techschool'] = $techschool;
			$education['school'] = $school;
			return $education;
	 }
	   	
}	
?>
