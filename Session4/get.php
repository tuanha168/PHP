<?php
function getCase($myDB)
{
  $query = "SELECT * FROM UploadFile.File;";
  $stmt = $myDB->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}
