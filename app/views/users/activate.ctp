<?php switch ($result) {; 
    case 'no_token': ?>
    
<h1>Error</h1>
<div>
<p>Leider fehlt der Freischaltcode, den Du per E-Mail erhalten hast. Bitte
kopiere den ganze Link aus der E-Mail in die Adresszeile Deines Browsers.</p>
<p>Falls die Mail nicht ankommen sein sollte, oder es Probleme mit der Registierung 
geben sollte, wende Dich bitte direkt per E-Mail an uns.</p>
</div>

<?php break;
    case 'error': ?>
    
<h1>Fehler</h1>
<div>
<p>Leider ist ein Fehler aufgetreten.</p>

<p>Falls das  Probleme mit der Registierung weiter bestehen sollte, wende Dich bitte direkt per E-Mail an uns:
<a href="<?php echo Configure::read('Site.Webmaster.Email')?>"><?php echo Configure::read('Site.Webmaster.Email')?></a>.</p>
</div>
    <?php break;
    case 'unknown_token': ?>    
<h1>Error</h1>
<div>
<p>Leider ist der Freischaltcode abgelaufen oder ungültig. Bitte
kopiere den ganze Link aus der E-Mail in die Adresszeile Deines Browsers.</p>
<p>Falls die Mail nicht ankommen sein sollte, oder es Probleme mit der Registierung 
geben sollte, wende Dich bitte direkt per E-Mail an uns:</p>
</div>
    <?php break;
    case 'user_active': ?>
<h1>OK!</h1>
<div id="users">
</div>
<?php break;}?>