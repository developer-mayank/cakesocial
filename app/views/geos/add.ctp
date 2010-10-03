<h2>Add location</h2>

<?
echo $form->create('Geo',array('action'=>'add'));


if (isset ($geo_ids))
{
	echo $this->Element('geo',array('geo_ids' => $geo_ids));
}
else
{
	echo $this->Element('geo');
}

echo $form->input('date_an', array( 'label' => 'start',
                                    'dateFormat' => 'Y-M-D',
                                    'type' => 'date',
                                    'maxYear' => date('Y'),
                                    'minYear' => 1950,
                                    'empty' => '...',
                                    'selected'  => '...'));
                                  
echo $form->input('date_end', array('label' => 'end',
                                 'dateFormat' => 'Y-M-D',
                                    'type' => 'date',
                                    'maxYear' => date('Y'),
                                    'minYear' => 1950,
                                    'empty' => '...',
                                    'selected'  => '...'));
echo $form->submit('send'); 
echo $form->end(); 
?> 