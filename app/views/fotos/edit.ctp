<h2>Мои фото</h2>
<?
echo '<div style="text-align:center;">';
echo $form->create('Foto',array('action' => 'edit'));
echo $form->input('Foto.id',array('type'=>'hidden', 'value' => $foto['Foto']['id']));
       echo $html->image('users/big/'.$foto['Foto']['src']);
       echo '<div style="text-align:center;">';
       echo $form->input('describe',array('label'=>'Описание','value' => $foto['Foto']['title']));
	   //echo date ('d.m.Y',$foto['Foto']['created']);
	   echo '</div>';
echo $form->submit('Сохранить'); 
echo $form->end(); 	
echo '</div>';
?>