<h2>Добавить</h2>

<?php echo $form->create('City',array('action' => 'add'));

echo $this->element('geo',array('geo_ids' => $geo_ids));

echo $form->input('name',array('label'=>'name'));

echo $form->submit('Отправить');

echo $form->end(); ?>