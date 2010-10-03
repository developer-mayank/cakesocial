<h2>edit</h2>
<?php 
echo $form->create('User', array('action' => 'edit'));
echo $form->input('fname',array('label'=>'name','value'=>$user['User']['fname']));
echo $form->input('sname',array('label'=>'family name','value'=>$user['User']['sname']));
echo '<div>';
echo $form->label('dateTime','	
Date of Birth');
echo $form->dateTime('bdate','Y-M-D','NONE',
$user['User']['bdate'],array('maxYear'=>date('Y')-15,'minYear'=>1955,'empty' => ''),false); 
echo '</div>';
echo $form->submit('send');

echo $form->end(); 
?>