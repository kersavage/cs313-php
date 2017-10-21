<?php
try
{
$user = 'postgres';
$password = '1234';
$db = new PDO('pgsql:host=127.0.0.1;dbname=scriptures', $user, $password);
}
catch (PDOException $ex)
{
echo 'Error!: ' . $ex->getMessage();
die();
}
?>