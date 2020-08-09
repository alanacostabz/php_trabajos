<?php
$user = ['name' => 'Frusciante', 'email' => 'johnfrusciante@rhcp.com', 'age' => 49];

$user = serialize($user);

setcookie('user', $user, time() + (86400 * 30));

$user = unserialize($_COOKIE['user']);

print_r($user);
