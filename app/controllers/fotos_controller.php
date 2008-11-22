<?
class FotosController extends AppController {

	var $name = 'Fotos';
	//var $layout = 'ajax';
	var $helpers = array('Form','Javascript');
	var $components = array('Image');
	
	
	function index()
	{
		  $this->set('user_id',$this->Session->read('Auth.User.id'));
		  $this->layout = 'default';	  	
	}
	
	function add() {
		$image_path = $this->Image->upload_image_and_thumbnail($this->data,"src",200,80,"profiles",true);
					
		$this->data['Foto']['src']=$image_path; 
			
		if (!empty($this->data)) {
			if ($this->Foto->save($this->data)) {
				$this->set('foto',true);
				$this->redirect('/fotos');
			}else {
			    $this->set('foto',false);
			}	
		}
		else{
			$this->set('user1_id',$id);
			$this->set('user_id', $this->Session->read('Auth.User.id'));
		}
		
	}
	
	function get($id = null)
	{
		  return $this->Foto->findAll( array("user_id =".$id));
	}
	
	function view($id=null)
	{
		Configure::write('debug', 0);
		$this->set('user_id',$id);
	}
	
}