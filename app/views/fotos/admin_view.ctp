<?
function getFolder($entity_type)
	{
		  switch($entity_type)
			  {
			  		case '1': $folder = 'users';break;
					case '2': $folder = 'groups'; break;
					case '3': $folder = 'unis';break;
					case '4': $folder = 'schools';break;
					case '5': $folder = 'techschools';break;
					case '6': $folder = 'cities';break;
					case '7': $folder = 'regions';break;
					case '8': $folder = 'countries';break;
					default : $folder = 'users';break;
			  }
			  return $folder;	
}
foreach ($fotos as $foto){
$folder = getFolder($foto['Album']['entity_type']);
echo $html->image($folder.'/small/'.$foto['Foto']['src']);
echo $foto['Foto']['id'];
}
?>