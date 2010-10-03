<h2>Add a school where you learn</h2>
<div>

<?php 
echo $form->create('Education',array('action' => 'addUser'));

echo $form->input('school_id',array('type'=>'hidden', 'value' => $school_id));
echo $form->input('type',array('type'=>'hidden', 'value' => $type));

if (isset($departments))
{
	echo $form->input('department_id',
	                   array(
	                       'options' => $departments,
	                       'empty' => '	choose from a list',
	                       'style' => 'width : 300px;',
	                       'label' => 'direction')
	);
}

echo $form->input('year_an', array( 'label' => 'Start',
                                  'dateFormat' => 'Y',
                                  'type' => 'date',
                                  'empty' => '',
                                  'minYear' => 1965,
                                  'maxYear' => date('Y')));
echo $form->input('year_end', array('label' => 'End',
                                  'dateFormat' => 'Y',
                                  'minYear' => 1965,
                                  'type' => 'date',
                                  'maxYear' => date('Y')));
echo $form->submit('send');

echo $form->end(); ?>