<h2>Create a new album</h2>
<?
echo $form->create('Album');
echo $form->input('entity_id',array('type'=>'hidden', 'value' => $type_id));
echo $form->input('entity_type',array('type'=>'hidden', 'value' => $entity_type));
echo $form->input('redirect',array('type'=>'hidden', 'value' => $redirect));
echo $form->input('name',array('label'=>'Name'));
echo $form->input('description',array('label'=>'Description','type'=>'textarea'));
echo $form->submit('Create');
echo $form->end(); 
?>