<?php
require_once('./config.php');
$dbname = DBNAME;
$dbhost = DBHOST;
$dbuser = DBUSER;
$dbpw = DBPW;
$db= new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpw");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('set names utf8');  

function db_select($str){
	global $db;
	$result = $db->query($str);
	$row = $result->fetchall(PDO::FETCH_NUM);
	return $row;
}
function db_exec($str){
	global $db;
	$db->exec($str);
}
?>