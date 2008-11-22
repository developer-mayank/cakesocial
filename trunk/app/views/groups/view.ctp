<h2>
<?=$group['Group']['name']?>
</h2>
<?php 
echo $html->link('удалить',"/groups/delete/{$group['Group']['id']}",null,'Are you sure?')
?>