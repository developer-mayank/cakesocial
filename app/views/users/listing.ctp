<h2>Users</h2>
<?php 
foreach ($users as $user):
//echo '<div style="float : left;width : 500px;margin-right :  20px;">'; 
echo $this->element('userview', array("user" => $user));
//echo '</div>';
endforeach;
?>