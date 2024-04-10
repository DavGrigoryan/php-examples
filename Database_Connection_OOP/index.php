<?php
include("MySqlDb.php");

$mysql = new MySqlDb();

$insert = $mysql->createData(
    'users',
    "(name, email, password, remember_token)",
    "('Davit', 'davit@mail.loc', '12345678', 'exampleToken')");

$fetch = $mysql->getData("users", "name = 'Davit'");

print_r($insert);
echo "\n";
print_r($fetch);
