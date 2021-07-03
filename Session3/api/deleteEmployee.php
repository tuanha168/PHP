<?php
include '../config.php';
function deleteEmployee($data)
{
  $myDB = $GLOBALS['myDB'];
  $id = $data["empid"];
  $query = "DELETE FROM `Employee`.`employee` WHERE (`empid` = ?);";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("s", $id);
  $stmt->execute();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  deleteEmployee(json_decode(file_get_contents("php://input"), true));
}
