<? $options = $jaxoption->make('div_userarea');?>
<? 
echo $ajax->form('add','post',$options );
echo $form->input('Post.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('Post.user1_id',array('type'=>'hidden', 'value' => $user1_id));
?>
message :
<?=$form->input('Post.message',array('label'=>false));?>
<?
echo $form->submit('send');
echo $form->end(); 
?>