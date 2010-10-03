<h2>Мои фото</h2>
<?

foreach ($fotos  as $foto):
   echo '<div style="float : left;width : 90px;margin:10px;text-align:center;">';
   e($html->link($html->image('profiles/small/'.$foto['Foto']['src']), array('action' => 'edit','id' => $foto['Foto']['id'] ), array('escape' => false)));
   //echo date ('d.m.Y',$foto['Foto']['created']);
   //echo '<input style = "display: inline;" name="data[Foto][id]" value="1" type="checkbox">'; 	
  echo '</div>';
endforeach;

echo '<div id="file-upload">';
echo $form->create('Foto',array('enctype' => 'multipart/form-data'));
echo $form->input('Foto.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('Image.src', array('label'=>'Новое фото', 'type'=>'file'));
//Новое фото: echo $form->file('Image.src'); 
echo $form->input('describe',array('label'=>'Описание'));
echo $form->submit('Добавить фото'); 
echo $form->end();
echo '</div>';
?>