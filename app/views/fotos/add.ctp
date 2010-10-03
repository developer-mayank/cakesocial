<h2>Add</h2>
<?
echo '<div id="file-upload">';
echo $form->create('Foto',array('enctype' => 'multipart/form-data'));
echo $form->input('album_id',array('type'=>'hidden', 'value' => $album_id));
echo $form->input('R.redirect',array('type'=>'hidden', 'value' => $redirect));
echo $form->input('R.folder',array('type'=>'hidden', 'value' => $folder));
echo $form->input('Image.src', array('label'=>'photo', 'type'=>'file'));
echo $form->input('title',array('label'=>'title'));
echo $form->submit('send'); 
echo $form->end();
echo '</div>';
?>