<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class FotosController extends AppController {

	var $name = 'Fotos';// , 'Cropimage'
	var $components = array('Image');// ,'JqImgcrop'
	var $helpers = array('Paginator','Jaxoption','Userlist');
	
	function get()
	{
		$this->log($this->params['form']['id'],"drog");
		$this->Foto->id = $this->params['form']['id'];
		$this->User->id = $this->Auth->user('id');
		$foto =$this->Foto->read();
		$this->User->saveField('img',$foto['Foto']['src']);
		$this->Session->write('Auth.User.img',$foto['Foto']['src']);
		$this->set('foto',$foto);
	}
	
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
	
	function add($id=null) {

		if (!empty($this->data)) {
			$image_path = $this->Image->upload_image_and_thumbnail($this->data,495,80,$this->data['R']['folder'],true);
			if (strlen($image_path) > 9) {
				$this->data['Foto']['src']=$image_path;
				$user_id = $this->Auth->user('id');
				$this->data['Foto']['user_id']=$user_id;
				$this->Foto->create();
				//debug($this->data);
				if ($this->Foto->save($this->data)) {
					$this->Session->setFlash('Photos added');
					$this->redirect($this->data['R']['redirect']);
				}else {$this->Session->setFlash('Please correct errors below!');}	
		    }else {
					$this->Session->setFlash('exceeding the maximum size of the file!'.$image_path);
			}
			$this->set('album_id', $this->data['Foto']['album_id']);
			$this->set('folder', $this->data['R']['folder']);
			$this->set('redirect', $this->data['R']['redirect']);	
		}
		else
		{
			$this->set('album_id', $id);
			if (isset($this->passedArgs[1]))
			{
				$this->set('redirect', '/albums/index/'.$id.'/'.$this->passedArgs[1].'/'.$this->passedArgs[2]);
				$entity_type = $this->helper_bar_menu();
			}
			else
			{
				$this->set('redirect', '/albums/index/');
				$entity_type = 1;
			}
			
			$folder = $this->_getFolder($entity_type);
			$this->set('folder',$folder);
		}		
	}
	
	function delete($id=null)
	{
		$this->Foto->id = $id;
		$foto = $this->Foto->read();
		$folder = $foto['Album']['entity_type'];
		switch($folder)
		{
			case 1:$folder= 'users';break;
			case 2:$folder= 'groups';break;
			case 3:$folder= 'unis';break;
			case 4:$folder= 'schools';break;
			case 5:$folder= 'techschools';break;
		}
		//debug($foto);
		$this->Image->delete_image($foto['Foto']['src'],$folder);
		$this->Foto->del($id);
		$this->Session->setFlash('Photo has been removed.');
		$this->redirect('/albums/index');
	}
	
	function edit($id=null)
	{  
		  if (!empty($this->data)) {
		  	if (isset ($this->data['Foto']['main']))
			{
					$this->Foto->id = $this->data['Foto']['id'];
					$this->Foto->bindModel(array('belongsTo' => array('User' =>array('className' => 'User'))));
					$foto = $this->Foto->read();
			}
			if ($this->Foto->save($this->data,null,array('describe'))) {
				$this->Session->setFlash('');
				//debug($this->data);
				$this->redirect('/fotos');
			}else {
				$this->Session->setFlash('Please correct errors below.');
			}	
		  }
		  else
		  {
		  	$this->Foto->id = $id;
		  	$foto = $this->Foto->read();
			$this->set('foto',$foto);
		  }
	}
	
	function admin_view()
	{
		$foto = $this->Foto->find('all');
		$this->paginate = array(
			'limit' => 50,
			'recursive' => 1
		);
		$fotos =  $this->paginate();
		//debug($fotos);
		$this->set('fotos',$fotos);
		$this->elements_right = '';
		$this->elements_left = array('adminmenu'=>array());
	}
	

	
	
	function view($id=null)
	{
		$foto = $this->Foto->findById($id);
		$entity_type = $foto['Album']['entity_type'];
		$folder = $this->_getFolder($entity_type);
		$this->set('foto',$foto);
		$this->set('folder',$folder);	
	}
	
	function main($user_id=null)
	{
		  $fotos = $this->Foto->findAll( array("user_id =".$user_id));
		  ////debug($fotos);
		  $this->set('fotos',$fotos);
	}
	
	
	
	
	function createimage_step2()
	{
		
		 if (!empty($this->data)) {
            $uploaded = $this->JqImgcrop->uploadImage($this->data['Foto']['image'], '/img/upload/', 'prefix_');
            $this->set('uploaded',$uploaded);
        }  
	}
	
	function createimage_step3()
	{
		
		 $this->JqImgcrop->cropImage(151, $this->data['Foto']['x1'],
		 $this->data['Foto']['y1'], $this->data['Foto']['x2'],
		 $this->data['Foto']['y2'], $this->data['Foto']['w'],
		 $this->data['Foto']['h'], $this->data['Foto']['imagePath'],
		 $this->data['Foto']['imagePath']); 
	}
	
}