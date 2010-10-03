<?php if (!empty($unis)): ?>
<h3>Unis</h3>
<?php foreach ($unis as $uni): ?>
<?php echo $uni['Uni']['City']['name']; ?> ::
<?php echo $html->link($uni['Uni']['shortname'],'/unis/view/'.$uni['Uni']['id']);?>
<?php echo '<br/>'; ?>
<?php echo $html->link($uni['Uni']['name'],'/unis/view/'.$uni['Uni']['id']);?>
<?php echo '<br>'; ?>
<?php echo $uni['Department']['name'];?>
<span class="geo_datum"> [
<?php echo $uni['Education']['year_an']; ?> - 
<?php echo $uni['Education']['year_end']; ?>]</span>
<?php echo '<br><br>'; ?>
<?php endforeach; ?>
<?php endif; ?>

<h3>Schools</h3>

<?php if (!empty($schools)): ?>

<?php foreach ($schools as $school): ?>
<?php echo $school['School']['City']['name']; ?> ::
<?php echo $html->link($school['School']['name'],'/schools/view/'.$school['School']['id']);?> :: <span class="geo_datum">
[<?php echo $school['Education']['year_an']; ?> - 
<?php echo $school['Education']['year_end']; ?>]</span> <br/>
<?php endforeach; ?>
<?php endif; ?>