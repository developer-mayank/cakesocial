<?
class Album extends AppModel
{
	var $name = 'Album';
	
	var $hasMany = array('Foto');               
}
