<h2>Регистрационые  данные</h2>
<?php 
echo $form->create('User', array('action' => 'edit'));
echo $form->input('name',array('label'=>'Имя','value'=>$user['User']['name']));
echo $form->input('sname',array('label'=>'Фамилия','value'=>$user['User']['sname']));
echo '<div>';
echo $form->label('dateTime','Дата рождения');
echo $form->dateTime('bdate','Y-M-D','NONE',$user['User']['bdate'],array('maxYear'=>date('Y')-15,'minYear'=>1955),false); 
echo '</div>';
echo $form->submit('Изменить данные');

echo $form->end(); 
?>