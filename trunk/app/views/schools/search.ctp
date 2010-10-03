<h1 style="margin:25px;">Schools</h1>
<?
//echo $paginator->prev('« назад ', null, null).' :: ';
//echo $paginator->counter();
//echo ' :: '.$paginator->next(' вперед »', null, null);
//echo '<br/><br/>';
echo '<ul>';
foreach ($unis as $uni)
{	
		echo '<li>';
		echo $uni['City']['Country']['name_en'].' :: ';
		echo $uni['City']['Region']['name'].' :: ';
		echo $uni['City']['name'].' :: ';
		echo $html->link($uni['School']['name'],'/schools/view/'.$uni['School']['id'],array ('title' => 'посмотреть группу '.$uni['School']['name']));
		
		echo '</li>';
}

echo '</ul>';echo '<br>';
//echo $paginator->numbers();
echo '<br>';echo '<br>';
?>
<div style ="float : right;">
<? if ($session->check('Auth.User')): 

echo $html->link('add your School', array('controller' => 'educations', 'action' => 'addSchool'));
echo($html->link($html->image('plus.png'),array('controller' => 'educations', 'action' => 'addSchool'),
 array('escape' => false)));

else:

echo $html->link('add your school', array('controller' => 'users', 'action' => 'register'));
echo($html->link($html->image('plus.png'),array('controller' => 'users', 'action' => 'register'),
 array('escape' => false)));

endif; 
?>
</div>
