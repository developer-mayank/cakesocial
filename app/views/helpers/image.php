function img_resize($src,$dest,$w=0,$h=0,$rgb=0xFFFFFF, $quality=80)
{
  if (!file_exists($src)) return false;

  $size = getimagesize($src);

  if ($size === false) return false;

  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;

  if ($h)
  {
  	if ($size[1] < $h)$h=$size[1];
	$new_h = $h;
	$ratio = $h / $size[1];
    $new_w  =  floor($size[0] * $ratio);
  }
  else
  {
    if ($size[0] < $w)$w=$size[0];
	$new_w = $w;
	$ratio = $w / $size[0];
    $new_h  =  floor($size[1] * $ratio);
   }

  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($new_w,$new_h);

  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, 0, 0, 0, 0,
     $new_w,$new_h, $size[0], $size[1]);

  imagejpeg($idest, $dest, $quality);

  imagedestroy($isrc);
  imagedestroy($idest);

  return true;

}

function file_indir($dirname,$maske,$an){

if( !is_dir( $dirname) ) return false;

$name_file =array();

$d=dir($dirname);

	while($e=$d->read())
	{
		if( strcasecmp(substr($e, -4), '.jpg')==0)
		{
			if ($an && strcasecmp(substr($e,0,4), $maske)==0)
			{
			   $name_file[]=$e;
			}
			else if (!$an && !strcasecmp(substr($e,0,4), $maske)==0  )
			{
				$name_file[]=$e;
			}
		}
	}
	
$d->close();

return $name_file;

}