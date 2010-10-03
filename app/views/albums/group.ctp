<h2>Photos and photoalbums of Group</h2>
<?
echo($html->link($html->image('papki/folder_add.png'),array('controller' => 'albums', 'action' => 'add'),
array('escape' => false)));
echo $html->link('Add a new photo album', array('controller' => 'albums', 'action' => 'add'));

echo '<br><br>';

foreach ($albums  as $album):
    echo '<div style = "clear: both;margin-bottom: 15px;">';
    echo '<div style = "width : 200px;display: inline;float: left;">';
    
    if ($album['Album']['id'] == $album_id)
    {
    	echo $html->image('papki/folder_open.png');
    }
    else
    {
    	echo $html->image('papki/folder.png');
    }
	echo $html->link($album['Album']['name'],
	 array('controller' => 'albums', 'action' => 'index',$album['Album']['id']));
	echo '</div><div style = "float: left;width : 200px;">';
	echo $html->image('image_add_48.png');
	echo $html->link('Добавить новое фото', array('controller' => 'fotos', 'action' => 'add',$album['Album']['id']));
	echo '</div>';
	echo '<div style = "float: left;width : 150px;">';
	echo $html->link('Редактировать альбом', array('controller' => 'fotos', 'action' => 'edit',$album['Album']['id']));
	echo '</div>';
	echo '</div>';
endforeach;

echo '<br><br>';
foreach ($fotos  as $foto):
   echo '<div style="float : left;width : 90px;margin:10px;text-align:center;">';
   e($html->link($html->image('users/small/'.$foto['Foto']['src']),
    array('action' => 'edit','id' => $foto['Foto']['id'] ), array('escape' => false)));
   echo '<span class="geo_datum">'.date ('d.m.Y',$foto['Foto']['created']).'</span>';
   //echo '<input style = "display: inline;" name="data[Foto][id]" value="1" type="checkbox">'; 	
  echo '</div>';
endforeach;
?>