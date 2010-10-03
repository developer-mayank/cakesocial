<h2>Учебные заведения </h2>

<?php if (isset($schools_user)): ?>
<h3>Высшее  образование</h3>
<?php foreach ($schools_user as $school): ?>
<?php if ($school['School']['type'] == 'uni'): ?>
<?php echo $html->link($school['School']['name'],'/users/getBySchool/'.$school['School']['id']); ?>
<br/>
<?php echo $school['Department']['name']; ?> 
<?php echo $school['SchoolsUser']['year_an']; ?> - 
<?php echo $school['SchoolsUser']['year_end']; ?> <br/> 
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<br/><br/>


<?php if (isset($schools_user)): ?>
<h3>Среднее образование</h3>
<?php foreach ($schools_user as $school): ?>
<?php if ($school['School']['type'] == 'school'): ?>
<?php 
echo $html->link($school['School']['name'],'/posts');
?>
<br/>
<?php echo $school['Department']['name']; ?> 
<?php echo $school['SchoolsUser']['year_an']; ?> - 
<?php echo $school['SchoolsUser']['year_end']; ?> <br/> 
<?php 
echo $html->link('удалить',"/users/delete_school/{$school['SchoolsUser']['id']}",null,
'Are you sure?')?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<br/><br/>


<?php if (isset($schools_user)): ?>
<h3>Среднее специальное образование</h3>
<?php foreach ($schools_user as $school): ?>
<?php if ($school['School']['type'] == 'ptu'): ?>
<?php echo $school['School']['name']; ?><br/>
<?php echo $school['Department']['name']; ?> 
<?php echo $school['SchoolsUser']['year_an']; ?> - 
<?php echo $school['SchoolsUser']['year_end']; ?> <br/> 
<?php 
echo $html->link('удалить',"/users/delete_school/{$school['SchoolsUser']['id']}",null,
'Are you sure?')?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<br/><br/>

<?php if (isset($schools)): ?>
<?php foreach ($geos as $geo): ?>
<?php echo $geo['Country']['name']; ?> - 
<?php echo $geo['Region']['name']; ?> - 
<?php echo $geo['City']['name']; ?><br/>
<?php echo $geo['Geo']['date_an']; ?> - 
<?php echo $geo['Geo']['date_end']; ?><br/><br/>
<?php endforeach; ?>
<?php endif; ?>