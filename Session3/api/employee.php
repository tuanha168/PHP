<?php
include '../config.php';
function addEmployee($data)
{
  $myDB = $GLOBALS['myDB'];
  $name = $data["name"];
  $email = $data["email"];
  $address = $data["address"];
  $phone = $data["phone"];
  $query = "INSERT INTO `employee` (`name`, `email`, `address`, `phone`) VALUES (?,?,?,?)";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ssss", $name, $email, $address, $phone);
  $stmt->execute();
}
function editEmployee($data)
{
  $myDB = $GLOBALS['myDB'];
  $empid = $data["empid"];
  $name = $data["name"];
  $email = $data["email"];
  $address = $data["address"];
  $phone = $data["phone"];
  $query = "UPDATE `Employee`.`employee` SET `name` = ?, `email` = ?, `address` = ?, `phone` = ? WHERE (`empid` = ?);";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("sssss", $name, $email, $address, $phone, $empid);
  $stmt->execute();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  addEmployee(json_decode(file_get_contents("php://input"), true));
}
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  editEmployee(json_decode(file_get_contents("php://input"), true));
}
