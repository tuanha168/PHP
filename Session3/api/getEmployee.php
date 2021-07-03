<?php
include '../config.php';
function getEmployee($name, $email, $address, $phone)
{
  $myDB = $GLOBALS['myDB'];
  $name = $name ? "%" . $name . "%" : "%";
  $email = $email ? "%" . $email . "%" : "%";
  $address = $address ? "%" . $address . "%" : "%";
  $phone = $phone ? "%" . $phone . "%" : "%";
  $query = "SELECT empid,name,email,address,phone FROM employee WHERE name like ? and email like ? and address like ? and phone like ? order by name";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ssss", $name, $email, $address, $phone);
  $stmt->execute();
  if ($result = $stmt->get_result()) {
    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
      $newArr[] = $db_field;
    }
    echo json_encode($newArr);
  }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  getEmployee($_GET['name'], $_GET['email'], $_GET['address'], $_GET['phone']);
}
