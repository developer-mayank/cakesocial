<h2 style="margin:15px;">Add a school where you learn</h2>
<div class="description">
Please select first the country, region, city.
After choosing the city will automatically create a list of schools in selected cities.
</div>
<?php 
echo $javascript->link('addUni');

echo $form->create('Education',array('action' => 'addSchool'));

echo $this->element('geo');

echo $form->input('Education.school_id',
                   array(
                       'options' => '',
                       'empty' => 'there is no data',
                       'onChange' => 'noUni();',
                       'id'=>'SchoolId',
                       'label' => 'School')
);

$options_region = array('url' => '/schools/get/','update' =>'SchoolId',
'with' => 'Form.Element.serialize(\'GeoCityId\')',
'loading' => "Effect.Pulsate('SchoolId',{ pulses: 5, duration: 1.5});Element.show('div_spinner')",
'complete' => "Element.hide('div_spinner')");

echo $ajax->observeField('GeoCityId',$options_region);

echo '<div id = "div_autoComplete" style="display :none;">
<div>
You can add your school.<br/>	
To do this, write in the name - the name of the school such as "school number 3"<br/>
</div>';
echo $form->input('School.name',array('label'=>'Title'));
echo '</div>';

echo $form->input('year_an', array( 'label' => 'Start',
                                  'dateFormat' => 'Y',
                                  'type' => 'date',
                                  'minYear' => 1965,
                                  'maxYear' => date('Y')));
echo $form->input('year_end', array('label' => 'End',
                                  'dateFormat' => 'Y',
                                  'minYear' => 1965,
                                  'type' => 'date',
                                  'maxYear' => date('Y')));
echo $form->submit('Send');

echo $form->end(); ?>