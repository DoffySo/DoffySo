<?php
$host = 'localhost';
$username = 'root';
$passwd = 'root';
$dbname =  'rightwings';

$mysqli = new mysqli($host, $username, $passwd, $dbname);


if ($mysqli->connect_error) {
die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}