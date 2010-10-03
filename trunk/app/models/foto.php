<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Foto extends AppModel {
	
        var $name = 'Foto';
		
		var $belongsTo = array('Album');
		
		/*
		var $actsAs= array(
		'Image'=>array(
			'fields'=>array(
				'src'=>array(
					'thumbnail'=>array('create'=>true),
					'resize'=>array(
									 'width'=>'800',
									 'height'=>'800',
						),
					'versions'=>array(
						array('prefix'=>'s',
									 'width'=>'400',
									 'height'=>'300',
						),
						array('prefix'=>'l',
									 'width'=>'700',
									 'height'=>'500',
						)
					)
				)
			)
		)
	);
	*/
}