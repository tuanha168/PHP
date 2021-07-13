<?php
function uploadFile($myDB, $file)
{
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if (false === $ext = array_search(
    $finfo->file($file['tmp_name']),
    array(
      'jpeg' => 'image/jpeg',
      'png' => 'image/png',
      'gif' => 'image/gif',
    ),
    true
  )) {
    echo 'Invalid file format.';
    return;
  }
  if ($file['size'] > 10000000) {
    echo 'Exceeded filesize limit.';
    return;
  }
  $bytes = random_bytes(20);
  $uploadfile = sprintf(
    'img/uploads/%s%s.%s',
    basename($file['name'], $ext),
    bin2hex($bytes),
    $ext
  );
  if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
    echo 'Failed to move uploaded file.';
    return;
  }
  $query = "INSERT INTO `UploadFile`.`File` (`file_name`, `file_url`) VALUES (?, ?);";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ss", $file['name'], $uploadfile);
  $stmt->execute();
}
