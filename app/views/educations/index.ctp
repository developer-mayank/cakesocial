<h2>Schools, where you learn and learn</h2>

<div style ="clear: both;height : 22px;margin-bottom : 10px;">
<div style ="float:left;color:color: #e32;font-size: 120%;">
Unis
</div>
<div style ="float : right;">
<?
echo $html->link('add Uni', array('controller' => 'educations', 'action' => 'addUni'));
echo($html->link($html->image('plus.png'),array('controller' => 'educations', 'action' => 'addUni'),
array('escape' => false))); 
?>
</div>
</div>


<?php if (!empty($educations['unis'])): ?>
<div style ="clear: both;">
<?php foreach ($educations['unis'] as $uni): ?>
<?php echo $uni['Uni']['City']['name']; ?> ::
<?php echo $html->link($uni['Uni']['name'],'/unis/view/'.$uni['Uni']['id']);?>(
<?php echo $html->link($uni['Uni']['shortname'],'/unis/view/'.$uni['Uni']['id']);?>)<br/>
<?php echo $uni['Department']['name'];?><span class="geo_datum">
 [<?php echo $uni['Education']['year_an']; ?> - 
<?php echo $uni['Education']['year_end']; ?>]
</span>
<?php echo '<br>'; ?>
<?php
echo $html->link('delete',"/educations/delete/{$uni['Education']['id']}",null,
'Are you sure?')?>
<?php echo '<br><br>'; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>
<div style ="clear: both;height : 22px;margin-bottom : 10px;">
<div style ="float:left;color:color: #e32;font-size: 120%;">
my Schools
</div>
<div style ="float : right;">
<?
echo $html->link('add School', array('controller' => 'educations', 'action' => 'addSchool'));
echo($html->link($html->image('plus.png'),array('controller' => 'educations', 'action' => 'addSchool'),
 array('escape' => false)));
?>
</div>
</div>

<?php if (!empty($educations['school'])): ?>
<div style ="clear: both;">
<?php foreach ($educations['school'] as $school): ?>
<?php echo $school['School']['City']['name']; ?> ::
<?php echo $html->link($school['School']['name'],'/schools/view/'.$school['School']['id']);?>

<span class="geo_datum">
[<?php echo $school['Education']['year_an']; ?> - 
<?php echo $school['Education']['year_end']; ?>]</span><br/> 
<?php
//echo($html->link($html->image('del.png'),array('controller' => 'educations', 'action' => 'delete',$school['Education']['id']),
//array('escape' => false)));
echo $html->link('delete',"/educations/delete/{$school['Education']['id']}",null,
'Are you sure?')?>
<br/><br/>
<?php endforeach; ?>
</div>
<?php endif; ?>