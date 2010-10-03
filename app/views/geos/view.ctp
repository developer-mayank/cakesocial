<h2>(Location)</h2>
<?php foreach ($geos as $geo): ?>
<?php echo $geo['Country']['name']; ?> - 
<?php echo $geo['Region']['name']; ?> - 
<?php echo $geo['City']['name']; ?><br/>
<?php echo $geo['Geo']['date_an']; ?> - 
<?php echo $geo['Geo']['date_end']; ?><br/>
<br/>
<?php endforeach; ?>
<br/><br/>