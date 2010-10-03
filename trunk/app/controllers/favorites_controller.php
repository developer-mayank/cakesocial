<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class FavoritesController extends AppController {

	var $name = 'Favorites';
	var $helpers = array('Userlist');
      
	function add($id=null){
		
		$user_id = $this->Auth->user('id');
		$this->data['Favorite']['user_id']= $user_id;	
		$this->data['Favorite']['favorite_id']=  $id;
		$cond = array('user_id' => $user_id,'favorite_id' => $id );
		if ($this->Favorite->isUnique($cond,false))
		{
			if ($this->Favorite->save($this->data)) 
			{
				$this->set('msg','Bookmark this personalized page <br/> added to your Favorites page');
			}
			else  
			{
	      		$this->set('msg','error');
	        }
		}
		else
		{	
			$this->set('msg','Bookmark this personalized page was already <br/> you added to your Favorites page');
		}
		$this->render('/com/msg');
	}
	
	function index() {
		$user_id =  $this->Auth->user('id');	
		$favorites = $this->Favorite->find('all',array('conditions' => array('user_id='.$user_id)));
		//debug ($favorites);
		$this->set('users',$favorites);
		$this->set('tit','Favorites');
		$this->render('/com/list');
	}
}
