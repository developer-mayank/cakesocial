<h2>users</h2>

<?php 
foreach ($users as $user):
echo $this->element('userview', array("user" => $user['User'],'geo'=>$user['Geo']));
endforeach;
echo '<div style = "clear: both;">';
 echo $paginator->numbers(); 
 //echo $paginator->prev('« назад ', null, null);
 //echo $paginator->next(' вперед »', null, null);
 //echo $paginator->counter();
echo '</div>';
?>