<h2>Добавить учебное заведение</h2>

<?php echo $form->create('Uni',array('action' => 'add'));

echo $this->element('geo',array('geo_ids' => $geo_ids));

echo $form->input('Uni.shortname',array('label'=>'shortname'));

echo $form->input('Uni.name',array('label'=>'name'));

echo $form->submit('Отправить');

echo $form->end(); ?>