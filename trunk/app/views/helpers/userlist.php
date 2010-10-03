<?php
class UserlistHelper extends AppHelper {
	
   function make($users,$title='') {
   	    $userlist = '<h3>'.$title.'</h3>';
   		if (!empty($users)){
			$View = ClassRegistry::getObject('view');
			foreach ($users as $user)
			{
				if (isset($user['User'])) $user = $user['User'];
				$userlist .= $View->element('userview', array("user" => $user));
			}
   		}
		else
		{
			$userlist .='has no users ...';
		}
    	return $userlist;
   }
}
?>
