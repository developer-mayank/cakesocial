<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Album extends AppModel
{
	var $name = 'Album';
	
	var $hasMany = array('Foto');               
}
