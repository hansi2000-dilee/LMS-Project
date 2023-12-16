<?php
require "connection.php";
$id = $_POST["id"];
 Database::iud("UPDATE `marks` SET `status`='2' WHERE `m_id`='".$id."'");
 echo "ok";
?>