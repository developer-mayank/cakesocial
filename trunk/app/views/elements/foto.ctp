<?
$fotos = $this->requestAction('fotos/get/'.$user_id);

foreach ($fotos  as $foto):
   echo $html->image('profiles/small/'.$foto['Foto']['src']);

   echo date ('d.m.Y',$foto['Foto']['created']);
endforeach;
?>