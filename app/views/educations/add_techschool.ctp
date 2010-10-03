<h2>Добавить учебное заведение , где вы учились</h2>
<div>
Пожалуйста выбирете сначала страну ,регион, город.
После выбора города автоматически создаться список школ из выбранного города.
</div>
<?php 
echo $javascript->link('addUni');

echo $form->create('Education',array('action' => 'addTechschool'));

echo $this->element('geo');

echo $form->input('Education.school_id',
                   array(
                       'options' => '',
                       'empty' => 'пока нет данных',
                       'onChange' => 'noUni();',
                       'id'=>'SchoolId',
                       'label' => 'Школа')
);

$options_region = array('url' => '/techschools/get/','update' =>'SchoolId',
'with' => 'Form.Element.serialize(\'GeoCityId\')',
'loading' => "Effect.Pulsate('SchoolId',{ pulses: 5, duration: 1.5});Element.show('div_spinner')",
'complete' => "Element.hide('div_spinner')");

echo $ajax->observeField('GeoCityId',$options_region);

echo '<div id = "div_autoComplete" style="display :none;">
<div>
Вы можете добавать Ваш техникум,ПТУ,...<br/>
Для этого напишите  в поле Название - название  например "ПТУ №73"<br/>
</div>';
echo $form->input('School.name',array('label'=>'Название'));
echo '</div>';

echo $form->input('year_an', array( 'label' => 'Начало',
                                  'dateFormat' => 'Y',
                                  'type' => 'date',
                                  'minYear' => 1965,
                                  'maxYear' => date('Y')));
echo $form->input('year_end', array('label' => 'Oкончание',
                                  'dateFormat' => 'Y',
                                  'minYear' => 1965,
                                  'type' => 'date',
                                  'maxYear' => date('Y')));
echo $form->submit('Отправить');

echo $form->end(); ?>