<h2>Photos</h2>
<div style="width : 495px;margin:15px;" id = "div_foto"></div>
<?
$options = $jaxoption->make('div_foto');

if (!empty($albums)) :
foreach ($albums  as $album):
    echo '<div style = "clear: both;margin-bottom: 15px;">';
    echo '<div style = "width : 270px;display: inline;float: left;">';
    
    if ($album['Album']['id'] == $album_id)
    {
    	echo $html->image('papki/folder_open.png');
    }
    else
    {
    	echo $html->image('papki/folder.png');
    }
	echo $html->link($album['Album']['name'],
	 array('controller' => 'albums', 'action' => 'index',$album['Album']['id'],$entity_type,$entity['id']));
	
	echo '</div>';
	
	echo '<div style = "float: left;width : 50px;">';
		echo($html->link($html->image('image_add_48.png'),
		array('controller' => 'fotos', 'action' => 'add',$album['Album']['id'],$entity_type,$entity['id']),
		array('escape' => false,'title'=>'add photos in this Photo')));
	echo '</div>';
	echo '<div style = "float: left;width :50px;">';
		echo($html->link($html->image('edit.png'),array('controller' => 'albums', 'action' => 'edit',$album['Album']['id'],$entity_type,$entity['id']),
		array('escape' => false,'title'=>'change the title of the photo album')));
	echo '</div>';

	
	echo '</div>';
endforeach;

else :
echo 'no photo';
endif;

//if ($session->read('Auth.User.id') == $entity_admin_id): 
echo '<div style="clear: both;margin-top:15px;">';
echo($html->link($html->image('papki/folder_add.png'),array('controller' => 'albums', 'action' => 'add'),
array('escape' => false)));
echo $html->link('Add a new photo album', array('controller' => 'albums',
 'action' => 'add',0,$entity_type,$entity['id']));
 echo '</div>';
//endif;

echo '<br><br>';
foreach ($fotos  as $foto):
   echo '<div style="float : left;width : 90px;margin:10px;text-align:center;">';
   e(
   $ajax->link($html->image($folder.'/small/'.$foto['Foto']['src']),
    			'/fotos/view/'.$foto['Foto']['id'],$options,null,array('escape' => false))
   );
   echo '<span class="geo_datum">'.date ('d.m.Y',$foto['Foto']['created']).'</span>';
  echo '</div>';
endforeach;
?>