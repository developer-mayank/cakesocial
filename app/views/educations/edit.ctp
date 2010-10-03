<h2>Schools, where you learn, or learn more ...</h2>
<h3>Unis</h3>
<?
echo $html->link('add Uni', array('controller' => 'schools_users', 'action' => 'add','uni'));
echo '<br><br>';
?>
<?php if (isset($schools)): ?>
<?php foreach ($schools as $school): ?>
<?php if ($school['School']['type'] == 'uni'): ?>
<?php echo $school['School']['name']; ?>
<?php echo $school['Department']['name']; ?> 
<?php echo $school['SchoolsUser']['year_an']; ?> - 
<?php echo $school['SchoolsUser']['year_end']; ?> <br/> 
<?php 
echo $html->link('delete',"/schools_users/delete/{$school['SchoolsUser']['id']}",null,
'Are you sure?')?>
<?php echo '<br><br>'; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<br/><br/>

<h3>School</h3>
<?php if (isset($schools_user)): ?>
<?php foreach ($schools_user as $school): ?>
<?php if ($school['School']['type'] == 'school'): ?>
<?php echo $school['School']['name']; ?><br/>
<?php echo $school['Department']['name']; ?> 
<?php echo $school['SchoolsUser']['year_an']; ?> - 
<?php echo $school['SchoolsUser']['year_end']; ?> <br/> 
<?php 
echo $html->link('delete',"/schools_users/delete/{$school['SchoolsUser']['id']}",null,
'Are you sure?')?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<br/><br/>
<?
echo $html->link('add school ', array('controller' => 'schools_users', 'action' => 'add','school'));
?>
