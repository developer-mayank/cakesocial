<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class EducationsController  extends AppController {

	var $name = 'Educations';
	
	function edit(){
		$user_id = $this->Auth->user('id');
		$schools = $this->Edu->findAll( array("user_id = $user_id"));
		$this->set('schools',$schools);
	}
	
   function index(){
		$user_id = $this->Auth->user('id');
		$educations = $this->Education->getAllForUser($user_id);
		$this->set('educations',$educations);
		//debug($unis);
		$this->elements_right = '';
	}
	
	function delete($id=null) {
	   $this->Education->del($id);
       $this->Session->setFlash('OK!');
	   $this->redirect('/educations/index');
	}
	
	function addSchool()
	{
		$this->pageTitle = 'addSchool';
		//debug ($this->data);
		if (!empty($this->data)) {
			$this->data['Education']['year_an'] = $this->data['Education']['year_an']['year'];
			$this->data['Education']['year_end'] = $this->data['Education']['year_end']['year'];
			$this->data['Education']['type'] = 1; // skola
			if (strlen($this->data['School']['name']) > 2 ){
				$name = trim($this->data['School']['name']);
				App::import('Model', 'School');
		        $school = new School();
				$this->data['Education']['school_id'] = $school->addSchool(
					$name,
					$this->data['Geo']['city_id']
				); 
	        } 
			$this->data['Education']['user_id'] = $this->Auth->user('id');
			
			if ($this->Education->save($this->data)) {
				$this->Session->setFlash('OK!');
				$this->redirect('/educations/index/');
			}else {
			    $this->Session->setFlash('error!');
			}
		}
		$this->elements_right = '';
	}
	
	
	function addTechschool()
	{
		$this->pageTitle = 'addTechschool';
		//debug ($this->data);
		if (!empty($this->data)) {
			$this->data['Education']['year_an'] = $this->data['Education']['year_an']['year'];
			$this->data['Education']['year_end'] = $this->data['Education']['year_end']['year'];
			$this->data['Education']['type'] = 2; // tskola
			if (strlen($this->data['School']['name']) > 2 ){
				$name = trim($this->data['School']['name']);
				App::import('Model', 'Techschool');
		        $school = new Techschool();
				$this->data['Education']['school_id'] = $school->addTechschool(
					$name,
					$this->data['Geo']['city_id']
				); 
	        } 
			$this->data['Education']['user_id'] = $this->Auth->user('id');
			
			if ($this->Education->save($this->data)) {
				$this->Session->setFlash('OK!');
				$this->redirect('/educations/index');
			}else {
			    $this->Session->setFlash('error!');
			}
		}
	}
	
	function addUni()
	{
		$this->layout = 'onebar';
		$this->pageTitle = 'Add a school where you learn ...';
		//debug ($this->data);
		if (!empty($this->data)) {
			$this->data['Education']['year_an'] = $this->data['Education']['year_an']['year'];
			$this->data['Education']['year_end'] = $this->data['Education']['year_end']['year'];
			$this->data['Education']['type'] = 3; // vus , 1 skola
			if (strlen($this->data['Uni']['name']) > 2 || strlen($this->data['Uni']['shortname']) > 2 ){
				$name = trim($this->data['Uni']['name']);
				$shortname = trim($this->data['Uni']['shortname']);
				App::import('Model', 'Uni');
		        $uni = new Uni();
				$this->data['Education']['school_id'] =  ClassRegistry::init('Uni')->addUni(
					$name,
					$shortname,
					$this->data['Geo']['city_id']
				);
			}
			$this->data['Education']['user_id'] = $this->Auth->user('id');
			
			if ($this->Education->save($this->data)) {
				$this->Session->setFlash('OK!');
				$this->redirect('/educations/index');
			}else {
			    $this->Session->setFlash('error!');
			}
		}
		$departments = ClassRegistry::init('Department')->get();
		$this->set('departments',$departments);
		$this->elements_right = '';
	}
	
	function addUser($id = null)
	{
		if (!empty($this->data)) {
			$this->data['Education']['year_an'] = $this->data['Education']['year_an']['year'];
			$this->data['Education']['year_end'] = $this->data['Education']['year_end']['year'];
			$this->data['Education']['user_id'] = $this->Auth->user('id');
			if ($this->Education->save($this->data)) {
				$this->Session->setFlash('Ok!');
				$this->redirect('/educations/index');
			}else {
			    $this->Session->setFlash('error!');
			}
		}
		$type = $this->passedArgs[1];
		if ($type == 3)
		{
			$departments = ClassRegistry::init('Department')->get();
			$this->set('departments',$departments);	
		}

		$this->set('school_id',$id);
		$this->set('type',$type);
	}
}
