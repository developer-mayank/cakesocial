<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class BuddiesController extends AppController {

	var $name = 'Buddies';
		
	function main($id = null) {
		
		$this->User->bindModel(array('hasAndBelongsToMany' =>  array(
            'ForwardRelation' => array(
            'className'  => 'User',
            'joinTable'  => 'buddies',
            'foreignKey' => 'user_id',
			'conditions' => array('Buddy.accept' => '1'),
            'associationForeignKey' => 'friend_id',
        ),'ForwardRelationUn' => array(
           'className'  => 'User',
            'joinTable'  => 'buddies',
            'foreignKey' => 'user_id',
			'conditions' => array('Buddy.accept' => '0'),
            'associationForeignKey' => 'friend_id'
        ),
 
        'BackRelation' => array(
            'className'  => 'User',
            'joinTable'  => 'buddies',
            'foreignKey' => 'friend_id',
            'associationForeignKey' => 'user_id',
			'conditions' => array('Buddy.accept' => 1)
        ),
        'BackRelationUn' => array(
            'className'  => 'User',
            'joinTable'  => 'buddies',
            'foreignKey' => 'friend_id',
            'associationForeignKey' => 'user_id',
			'conditions' => array('Buddy.accept' => '0')
        )
       )));

        if ($id == null)  $user_id = $this->Auth->user('id');
		else $user_id = $id;
		$this->User->id = $user_id;
		$user = $this->User->read();
		//debug($user);
        $this->set('users', $user['BackRelation'] + $user['ForwardRelation']);
		$this->set('_users', $user['BackRelationUn']);
		//$this->set('tit','Friends');
		//$this->helper_bar_menu();
		//$this->render('../com/list');
    }
	
	function accept($id = null)
	{
		  $this->Buddy->id = $id;
		  $this->data['accept'] = 1;
          $this->Buddy->save($this->data);
		  $this->redirect('/buddies/main');  
	}
	
	function revoke($id = null)
	{
		  $this->Buddy->id = $id;
		  $this->data['accept'] = -1;
          $this->Buddy->save($this->data);
		  $this->redirect('/users/buddies');   
	}
	
	
	function add($id=null){	
	
		$user_id = $this->Auth->user('id');
		$this->data['Buddy']['user_id']= $user_id;	
		$this->data['Buddy']['friend_id']=  $id;
		$cond = array('user_id' => $user_id,'friend_id' => $id );
		if ($this->Buddy->isUnique($cond,false))
		{
			if ($this->Buddy->save($this->data)) 
			{
				$this->set('msg','Request a friendship has been sent!');
			}
			else 
			{
	      		$this->set('msg','error');
	        }
		}
		else
		{	
			$this->set('msg','You\'ve already made a request for friendship!');
		}
		$this->render('/com/msg');
	}
}
