<?php
print "<h1>The Social Graph</h1>";
foreach ($relations as $user_id => $friends) {
        print "<ul>";
        print "<strong>".$usermap[$user_id]."</strong>'s friends: ";
 
        foreach ($friends as $friend_id) {
            print "<li>".$usermap[$friend_id]."</li>";
        }
 
        print "</ul>";
        print "<br>";
    }
?>