<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class AlbumsController extends AppController {

	var $name = 'Albums';
	var $helpers = array('Jaxoption');
	
	function _getFolder($entity_type)
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
			  }
			  
			  return $folder;
		
	}

	function index($album_id = null)
	{

		  if (isset($this->passedArgs[1]))
		  {
				$cond = array('conditions'=>array('entity_id'=>$this->passedArgs[2],
												  'entity_type'=>$this->passedArgs[1]));
				$entity_type = $this->passedArgs[1];
				
		  }
		  else
		  {
		  		$user_id = $this->Auth->user('id');
				$main_foto = $this->Auth->user('img');
				$this->set('main_foto',$main_foto);
		  		$cond = array('conditions'=>array('entity_id'=>$user_id,'entity_type'=>1));
				$entity_type = 1;
		  }

		  $albums = $this->Album->find('all',$cond);
		  $this->set('albums',$albums);
		  //$this->Album->bindModel(array('hasMany' => array('Foto')));
		  
		  if (($album_id == null || $album_id == 0) && !empty($albums)) 
		  		{$album_id = $albums[0]['Album']['id'];}		
		  $fotos = $this->Album->Foto->find('all',array('conditions'=>array('album_id'=> $album_id)));
		  //debug($fotos);
		  $this->set('fotos',$fotos);
		  $this->set('album_id',$album_id);
		  $this->set('entity_type',$entity_type);
		  $this->set('folder',$this->_getFolder($entity_type));
		  $this->pageTitle = ' ';
		  if (isset($this->passedArgs[1]))
		  {
				$this->helper_bar_menu();
				$this->render('/albums/index2');
		  }  
	}
	
	function main()
	{

		  $cond = array('conditions'=>array('entity_id'=>$this->passedArgs[2],'entity_type'=>$this->passedArgs[1]));
		  
		  $albums = $this->Album->find('all',$cond);
		  
		  $this->set('albums',$albums);
		  
		  if ($this->passedArgs[0] == 0 && !empty($albums)) 
		  		{$album_id = $albums[0]['Album']['id'];}
		  else
		  		{$album_id =$this->passedArgs[0];}
					
		  $fotos = $this->Album->Foto->find('all',array('conditions'=>array('album_id'=> $album_id)));
		  //debug($fotos);
		  $this->set('fotos',$fotos);
		  $this->set('album_id',$album_id);
		  
          $this->helper_bar_menu();
	}
	
	 function add(){
	 	$user_id = $this->Auth->user('id');
		if (!empty($this->data)) {
			$this->data['Album']['user_id'] = $user_id;
			if ($this->Album->save($this->data)) {
				$this->redirect('/albums/index/'.$this->data['Album']['redirect']);
			}else {
			    $this->Session->setFlash('Please correct errors below.');
			}	
		}
	 	
	     if (isset($this->passedArgs[0]))
		  {
				$entity_type = $this->passedArgs[1];	
				$this->set('type_id',$this->passedArgs[2]);
		        $this->set('entity_type',$entity_type);
				$this->set('redirect','0/'.$this->passedArgs[1].'/'.$this->passedArgs[2]);
		  }
		  else
		  {
				$this->set('type_id',$user_id);
		        $this->set('entity_type',1);
				$this->set('redirect','');
		  }
		  $this->helper_bar_menu();
		  $this->elements_right = '';
	
	 }
	 
	 function edit($id=null){
	 	
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->redirect('/albums/index/'.$this->data['Album']['redirect']);
			}else {
			    $this->Session->setFlash('Please correct errors below.');
			}	
		}
	 	
	     if (isset($this->passedArgs[1]))
		  {
				$this->helper_bar_menu();
				$album = $this->Album->id = $id;
		        $album = $this->Album->read();
		        $this->set('album',$album);	
				$this->set('redirect','0/'.$this->passedArgs[1].'/'.$this->passedArgs[2]);
		  }
		  else
		  {
				$album = $this->Album->id = $id;
		        $album = $this->Album->read();
		        $this->set('album',$album);
				$this->set('redirect','');
		  }
		  
	      $this->helper_bar_menu();
		  $this->elements_right = '';
	 }
	
}