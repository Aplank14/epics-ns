<?php

require_once 'db.php';
session_start();

$id = key($_POST);

$results = $mysqli->query("SELECT hours FROM $db.users WHERE id = '$id'");
$hours = $results->fetch_assoc();

if ($hours['hours'] == NULL){
    $hours['hours'] = 0;
}

$results = $mysqli->query("SELECT login_time FROM $db.users WHERE id = '$id'");
$login_time = $results->fetch_assoc();
$old = date_create($login_time['login_time']);

$time_stamp = date("Y-m-d H:i:s", time());
$curr = date_create($time_stamp);

$diff = date_diff($old, $curr);

$hours = $hours['hours'] + $diff->h;

$update = "UPDATE $db.users SET logged_in = 0, hours = $hours WHERE id =  '$id'";
$mysqli->query($update);

session_unset();
session_destroy();
header ("Location: main.php");

?>