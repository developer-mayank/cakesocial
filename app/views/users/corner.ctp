<h2>Мой ...</h2>

<table style = 'width:400px;'>
<tr>
		<th style = 'width:80px;'></th>
		<th>Username</th>
        <th>Имя</th>
</tr>
<tr>
<td>
<?php if ($user['User']['img'] != null): ?>
<?=$html->image('profiles/small/'.$user['User']['img']); ?>
<?php endif ?>
		</td>
		<td><?php echo $user['User']['username']; ?></td>
	    <td><?php echo $user['User']['name']; ?></td>
	</tr>
</table>
