<h2>creat new group</h2>
<?
echo $form->create('Group');
echo $form->input('name',array('label'=>'name'));
echo $form->input('purpose',array('label'=>'The goal of a group','type'=>'textarea'));
echo $form->input('title',array('label'=>'Description','type'=>'textarea'));
echo $form->submit('creat');
echo $form->end(); 
?>