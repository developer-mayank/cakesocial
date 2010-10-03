<?php
echo $form->select('SchoolsUser.school_id',$unis,null,array(),$showEmpty='выбирете если есть из списка');

$options = array('url' => '/schools/get_specializations/','update' =>'div_specializations',
	'with' => 'Form.Element.serialize(\'SchoolSchoolId\')',
	'loading' => '$(\'div_spinner\').style.display = \'block\';',
	'complete' => '$(\'div_spinner\').style.display = \'none\';');
	echo $ajax->observeField('SchoolSchoolId',$options);	

?>
