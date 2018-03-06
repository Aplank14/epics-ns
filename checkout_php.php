<?php

require_once 'db.php';
session_start();

$id = key($_POST);

$results = $mysqli->query("SELECT hours, minutes FROM $db.users WHERE id = '$id'");
$hours = $results->fetch_assoc();

if ($hours['hours'] == NULL){
    $hours['hours'] = 0;
}

if ($hours['minutes'] == NULL){
    $minutes = 0;
} else {
    $minutes = $hours['minutes'];
}

$results = $mysqli->query("SELECT login_time FROM $db.users WHERE id = '$id'");
$login_time = $results->fetch_assoc();
$old = date_create($login_time['login_time']);

$time_stamp = date("Y-m-d H:i:s", time());
$curr = date_create($time_stamp);

$diff = date_diff($old, $curr);
echo $minutes;
echo $diff->i;
if ($diff->i+$minutes>=60){
    $minutes = $diff->i + $minutes - 60;
    $hours = $hours + 1;
} else {
    $minutes = $minutes + $diff->i;
}
$hours = $hours['hours'] + $diff->h;

$update = "UPDATE $db.users SET logged_in = 0, hours = $hours, minutes = $minutes WHERE id =  '$id'";
$mysqli->query($update);

session_unset();
session_destroy();
header ("Location: main.php");

?>