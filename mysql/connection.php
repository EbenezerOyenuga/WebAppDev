<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'utils.php';

$host="127.0.0.1";
$user="root";
$password="12345678";
$db="classwork_db";

//PDO, mysqli object oriented, mysqli procedural

$conn=new mysqli($host,$user,$password,$db);

if($conn->connect_error){
    report("Connection failed: " . $conn->connect_error);
}
