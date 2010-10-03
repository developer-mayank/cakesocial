<h2>edit</h2>
<?
echo $form->create('Group',array('action' => 'edit'));
echo $form->input('id',array('type'=>'hidden', 'value' => $group['Group']['id']));
echo $form->input('name',array('label'=>'Groupname','value'=>$group['Group']['name']));
echo $form->input('purpose',array('label'=>'purpose','type'=>'textarea','value'=>$group['Group']['purpose']));
echo $form->input('title',array('label'=>'title','type'=>'textarea','value'=>$group['Group']['title']));
echo $form->submit('send');
echo $form->end(); 
?>