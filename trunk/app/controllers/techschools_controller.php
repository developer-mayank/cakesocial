<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class TechschoolsController extends AppController {

	var $name = 'Techschools';
	
	function get()
	{

		$unis = $this->Techschool->find('list',
		array('fields'=>array('Techschool.name'),
		'conditions' => array('city_id = '.$this->params['data']['Geo']['city_id']),
		'order'=>array('Techschool.name'=>'ASC')));
		 $this->set('option',$unis);
		 $this->set('empty',9);
		 $this->render('/com/options');	
	}
	
	function search()
	{
		//$unis = $this->Uni->find('all');
		//'order'=>array('name' => 'asc'),			'conditions' => array('is_active = 1') 
		$this->paginate = array(
			'limit' => 30,
			'fields'=> array('id','name')
		);
		$unis =  $this->paginate('Uni');
		$this->set('unis',$unis);
	}

}
