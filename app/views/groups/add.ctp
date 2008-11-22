<h2>Создание новой группы</h2>
<? 
echo $form->create('Group');
echo $form->input('name',array('label'=>'Название'));
echo $form->submit('Создать');
echo $form->end(); 
?>