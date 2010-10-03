<h3>search for group</h3>
<?php 
echo $form->create('Group', array('action' => 'search'));
//echo $this->Element('geo');
echo $form->input('name',array('label'=>'name'));
echo $form->submit('search');
echo $form->end();
?>
<? if (!empty($groups)):?>
<h2> </h2>

<?php 
foreach ($groups as $group):
echo $this->element('groupview', array("group" => $group['Group']));
endforeach;
echo '<div style = "clear: both;">';
echo $paginator->numbers(); 
echo '</div>';
?>
<? endif ?>