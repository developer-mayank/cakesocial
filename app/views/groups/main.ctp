<h2>groups</h2>
<?php
$options = $jaxoption->make('div_msg');
echo  $ajax->link('Invite','/groups/inviteUser/'.$user_id,$options);
if (!empty($groups)) :
foreach ($groups as $group):
echo $this->element('groupview', array("group" => $group['Group']));
endforeach;
endif;
?>