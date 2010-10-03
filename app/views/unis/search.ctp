<h1 style = "margin:30px;">unis</h1>
<?php 
echo $this->Element('geouni',$geouni);
if (!empty($unis)) :
echo $paginator->prev('« prev ', null, null).' :: ';
echo $paginator->counter();
echo ' :: '.$paginator->next(' next »', null, null);
echo '<br><br>';echo '<ul>';
foreach ($unis as $uni)
{	
		echo '<li>';
		echo $html->link($uni['Uni']['name'],'/unis/view/'.$uni['Uni']['id'],array ('title' => 'посмотреть группу '.$uni['Uni']['name']));
		echo ' :: <span class="geo_datum">['.$uni['City']['name'].']</span>';
		echo '</li>';
}
echo '</ul>';echo '<br>';
echo $paginator->numbers();
endif;
?>