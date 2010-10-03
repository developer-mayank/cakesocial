<?php
class Education extends AppModel {

	var $name = 'Education';
	
	var $belongsTo = array('Uni' =>
                              array('className'    => 'Uni',
							  'conditions' => 'Education.type = 3',
                              'foreignKey'   => 'school_id'),
							'Techschool' =>
                              array('className'    => 'Techschool',
							         'conditions' => 'Education.type = 2',
                                     'foreignKey'   => 'school_id'),
							'School' =>
                              array('className'    => 'School',
							         'conditions' => 'Education.type = 1',
                                     'foreignKey'   => 'school_id')			
    );	
}	
?>
