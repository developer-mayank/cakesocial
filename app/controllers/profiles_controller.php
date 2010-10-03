<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class ProfilesController extends AppController {

	var $name = 'Profiles';
       
	function edit(){
		
		if (!empty($this->data)) {
			//debug($this->data);
			if ($this->Profile->save($this->data)) 
			{
				$this->Session->setFlash('The data have been changed!');
				$this->redirect('/users/corner');	
			}
			else 
			{
      			$this->Session->setFlash('Please correct errors below.');
            }
		}
		 $this->Profile->id = $this->Auth->user('id');
		 $profile = $this->Profile->read();
		 $family_options = $this->Profile->family_options;
		 $sex_options = $this->Profile->sex_options ;
		 $children_options = $this->Profile->children_options;
		 $height_options = array (155,160,165,170,175,180,185,190,200);
		 $this->set('family_options',$family_options);
		 $this->set('children_options',$children_options);
		 $this->set('height_options',$height_options);
		 $this->set('sex_options',$sex_options);
		 $this->set('profile',$profile);
		 //debug($profile);
		 //$this->set('id',$this->Profile->id);	
		 
		 
	}
}
