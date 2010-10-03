<?php if ($entity['img'] != null): ?>
<? echo $html->image('groups/big/'.$entity['img'],array('width' => 200 ,'alt' => $entity['name'])); ?>
<?php else: ?>
<?=$html->image('groups/netfotogroup.jpg'); ?>
<?php endif ?>

 <div class="usermenu">  
        <ul>  
	    <? if ($session->check('Auth.User')): ?>
	    
		    <li><? echo $html->link('Join to Group', '/groups_users/add/'.$entity['id']);?></li>      	
		    <li><?echo $html->link('Photo Albums', '/albums/index/0/2/'.$entity['id']);?></li>
		    <? if ($session->read('Auth.User.id') == $admin['id']): ?>
			    <li><? echo $html->link('edit',"/groups/edit/".$entity['id']);?></li>
			    <li><? echo $html->link('delete',"/groups/delete/{$entity['id']}",null,'Are you sure?');?></li>
		    <?php endif ?>
	    <?php else: ?>
		    <li><?echo $html->link('Join to Group', '/users/register/'.$entity['id']);?></li>    	
			<li><?echo $html->link('Photo Albums', '/users/register/'.$entity['id']);?></li>
	    <?php endif ?>
	    </ul>
</div>
<br/>
Creator : <? echo $this->element('userview', array('user'=>$admin));?>