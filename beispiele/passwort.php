<?php
$passwort="valerijamiranda";
$hashedPassword=password_hash($passwort, PASSWORD_BCRYPT);
echo "Gehashtes Passwort: ". $hashedPassword;
//$2y$10$jZ4TtzcSq6AHjfC/lHmacepix9cHHCSop.H9Iwj3lkeqhuENMus1W