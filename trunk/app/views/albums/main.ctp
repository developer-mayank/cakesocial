<div style="width : 450px;" id = "div_foto"></div>
<? $options = $jaxoption->make('div_foto');?>
<?
if (!empty($fotos)):
echo '<h2 style="margin-bottom:4px;">'.$fotos[0]['Album']['name'].'</h2>';
echo '<span class="description">'.$fotos[0]['Album']['description'].'</span>';
foreach ($fotos  as $foto):
   echo '<div style="float : left;width : 90px;margin:10px;text-align:center;position:relative;" >';
   // echo $html->image('users/small/'.$foto['Foto']['src']);
   e(
   $ajax->link( 
   				$html->image('users/small/'.$foto['Foto']['src']),
    			'/fotos/view/'.$foto['Foto']['id'],
   				$options,null,array('escape' => false))
   );
   echo '<span class="geo_datum">'.date ('d.m.Y',$foto['Foto']['created']).'</span>';
   echo '</div>';
endforeach;
else:
echo 'no photos...';
endif;

echo '<div style = "clear: both;margin: 10px 0;">';
echo '<h2>Albums</h2>';
echo '</div>';
if (!empty($albums)):
foreach ($albums  as $album):
    echo '<div style = "clear: both;margin-bottom: 7px;">';
    echo '<div style = "width : 250px;display: inline;float: left;">';
    
    if ($album['Album']['id'] == $album_id)
    {
    	echo $html->image('papki/folder_open.png');
    }
    else
    {
    	echo $html->image('papki/folder.png');
    }
    
	echo $html->link($album['Album']['name'],array('controller' => 'albums', 'action' => 'main',
	$album['Album']['id'],1,$entity['id']));
	echo '</div>';
	echo '</div>';
endforeach;
else:
echo 'no albums...';
endif;
?>