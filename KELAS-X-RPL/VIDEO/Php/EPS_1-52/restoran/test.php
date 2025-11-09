<?php
require_once 'dbcontroller.php';
$db = new DB;
$count = $db->rowCount("SELECT idmenu FROM tblmenu");
echo "Total menu: " . $count;
?>