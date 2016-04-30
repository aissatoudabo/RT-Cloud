<h1>Utilisateurs</h1>
<?php
foreach ($users as $user){
    echo $user->getLogin()."<br>";
}