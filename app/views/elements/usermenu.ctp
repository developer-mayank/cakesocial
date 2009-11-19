<?php if ($user['User']['img'] != null): ?>
<?=$html->image('profiles/big/'.$user['User']['img']); ?>
<?php else: ?>
<?=$html->image('profiles/big/netfoto.png'); ?>
<?php endif ?>


<?
$options = array(
    'update'   => 'div_studuser',
	'loading'  => '$(\'div_spinner\').style.display = \'block\';',
	'complete' => '$(\'div_spinner\').style.display = \'none\';');
?>
 <div id="usermenu">
	    <ul>
	    <li><?echo $ajax->link('Groups', '/groups/main/'.$user['User']['id'],$options);?></li>
	    <li><?echo $ajax->link('My Photos', '/fotos/view/'.$user['User']['id'],$options);?></li>
	    </ul>
</div>