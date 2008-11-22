<?if(isset ($post) && $post):?>
<div class = "message">Cообщение было послано</div>
<?else:?>
<h2>Написать личное сообщение</h2>
<?
$options = array(
    'update'   => 'div_studuser',
	'loading'  => '$(\'div_spinner\').style.display = \'block\';',
	'complete' => '$(\'div_spinner\').style.display = \'none\';');
?>
<? 
echo $ajax->form('add','post',$options );
echo $form->input('Post.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('Post.user1_id',array('type'=>'hidden', 'value' => $user1_id));
?>
Сообщение:
<?=$form->input('Post.message',array('label'=>false));?>
<?
echo $form->submit('Отправить');
echo $form->end(); 
?>
<?endif?>

