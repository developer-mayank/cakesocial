<h2>Editing album</h2>
<?
echo $form->create('Album',array('action' =>'edit'));
echo $form->input('id',array('type'=>'hidden', 'value' => $album['Album']['id']));
echo $form->input('redirect',array('type'=>'hidden', 'value' => $redirect));
echo $form->input('name',array('label'=>'Name','value'=>$album['Album']['name']));
echo $form->input('description',array('label'=>'Description','type'=>'textarea','value'=>$album['Album']['description']));
echo $form->submit('save');
echo $form->end(); 
?>