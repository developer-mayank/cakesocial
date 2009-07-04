<h2>Register</h2>

<? echo $form->create('User',array('action' => 'register'));?>
<?=$form->input('username',array('label'=>'Ник (логин)'));?>
<?=$form->input('password',array('label'=>'Пароль'));?>
<?=$form->input('email',array('label'=>'E-mail'));?>
<?=$form->input('name',array('label'=>'Имя'));?>
<?=$form->input('sname',array('label'=>'Фамилия'));?>

<?
//echo '<div>';
//echo $form->label('dateTime','Дата рождения');
//echo $form->dateTime('bdate','Y-M-D','NONE','1980-01-01',array('maxYear'=>date('Y')-15,'minYear'=>1955),false); 
//echo '</div>';

echo $form->input('bdate', array( 'label' => 'Дата рождения',
                                  'dateFormat' => 'Y-M-D',
                                  'minYear' => date('Y') - 17,
                                  'maxYear' => date('Y') - 60 ));



echo $form->input('captcha',array('label'=>'Введите текст с картинки'));
echo $html->image('/users/captcha');
echo $form->submit('Отправить');
echo $form->end(); 
?>