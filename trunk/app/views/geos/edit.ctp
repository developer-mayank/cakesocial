<h2>edit location</h2>

<?
echo $form->create('Geo',array('action'=>'edit'));
echo $this->Element('geo',array('geo_ids' => $geo_ids));
echo $form->input('id',array('type'=>'hidden', 'value' => $geo['Geo']['id']));

echo $form->input('date_an', array( 'label' => 'start',
                                  'dateFormat' => 'Y-M-D',
                                  'type' => 'date',
                                  'maxYear' => date('Y'),
                                  'minYear' => 1950,
                                  'empty' => '',
                                  'selected'  => $geo['Geo']['date_an']));
                                  
echo $form->input('date_end', array('label' => 'end',
                                    'selected'  => $geo['Geo']['date_end'],
                                    'type' => 'date',
                                    'dateFormat' => 'Y-M-D',
                                    'maxYear' => date('Y'),
                                    'minYear' => 1950,
                                    'empty' => '',
                                    'maxYear' => date('Y')));
echo $form->submit('send'); 
echo $form->end(); 
?> 