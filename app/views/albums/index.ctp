<h2>Photos and albums</h2>
<?
echo($html->link($html->image('papki/folder_add.png'),array('controller' => 'albums', 'action' => 'add'),
array('escape' => false)));
echo $html->link('Add a new photo album', array('controller' => 'albums', 'action' => 'add'));

echo '<br><br>';

foreach ($albums  as $album):
    echo '<div style = "clear: both;margin-bottom: 15px;">';
    echo '<div style = "width : 250px;display: inline;float: left;">';
    
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
	echo $html->link('Add new photos', array('controller' => 'fotos', 'action' => 'add',$album['Album']['id']));
	echo '</div>';
	echo '<div style = "float: left;width : 100px;">';
	echo($html->link($html->image('edit.png'),array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),
	array('escape' => false)));
	echo '</div>';
	echo '</div>';
endforeach;
// $html->image('warning_16.png').
echo '<br><br>';
foreach ($fotos  as $foto):
   echo '<div style="float : left;width : 90px;margin:10px;text-align:center;position:relative;cursor: move;"
   id = "'.$foto['Foto']['id'].'"
   >';
   echo $html->image('users/small/'.$foto['Foto']['src']);
   echo '<span class="geo_datum">'.date ('d.m.Y',$foto['Foto']['created']).'</span>';
   echo $ajax->drag($foto['Foto']['id'],array('revert' =>true));
   if ($main_foto <> $foto['Foto']['src'])
   {
	   echo '<div style="position:absolute;left:75px; top:-5px; width:18px; height:40px;">'.
	   $html->link($html->image('cancel_16.png'),array('controller' => 'fotos', 'action' => 'delete',$foto['Foto']['id']),
	   array('escape' => false,'title'=>'удалить фото'),'	Are you sure that you want to delete this photo?').
	   '</div>';
   }
  echo '</div>';
endforeach;
?>	
if you want to edit photos for your screensaver simply drag
photo on the right mouse headband.