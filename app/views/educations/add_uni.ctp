<h2>Add a Uni where you learn</h2>
<?php 
echo $javascript->link('addUni');

echo $form->create('Education',array('action' => 'addUni'));

echo $this->element('geo');

echo $form->input('Education.school_id',
                   array(
                       'options' => '',
                       'empty' => 'UNI :: ',
                       'onChange' => 'noUni();',
                       'style' => 'width : 490px;font-size: 12px;',
                       'id'=>'SchoolId',
                       'label' => false)
);

$options_region = array('url' => '/unis/get/','update' =>'SchoolId',
'with' => 'Form.Element.serialize(\'GeoCityId\')',
'loading' => "Effect.Pulsate('SchoolId',{ pulses: 5, duration: 1.5});Element.show('div_spinner')",
'complete' => "Element.hide('div_spinner')");

echo $ajax->observeField('GeoCityId',$options_region);

echo '<div id = "div_autoComplete"  style="display :none;">
<div>
You can  your university<br/>
</div>';
echo $form->input('Uni.shortname',array('label'=>'Short title'));
echo $form->input('Uni.name',array('label'=>'title'));
echo '</div>';
//'id'=>'SchoolId',
echo $form->input('Education.department_id',
                   array(
                       'options' => $departments,
                       'style' => 'width : 300px;',
                        'empty' => 'choose from a list',
                       'label' => 'direction')
);

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
echo $form->submit('Send');

echo $form->end(); ?>