<h2>Location Group :: <?=$city_name?> - users</h2>
<?php
foreach ($users as $user):; 
	echo $this->element('userview', array("user" => $user));
endforeach;
?>