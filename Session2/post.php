<?php
function addBook($myDB, $author_name, $title, $year, $isbn)
{
  $query = "INSERT INTO `Libary`.`Books` (`authorid`, `title`, `ISBN`, `pub_year`, `available`) select author.authorid, ?, ?, ?, 1 from author where author.name like '%?%';";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ssss", $title, $isbn, $year, $author_name);
  $stmt->execute();
}
function deleteBook($myDB, $bookid)
{
  $query = "DELETE FROM `Libary`.`Books` WHERE (`bookid` = ?);";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("i", $bookid);
  $stmt->execute();
}
function addAuthor($myDB, $author_name)
{
  $query = "INSERT INTO `Libary`.`Author` (`name`) VALUES (?);";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("s", $author_name);
  $stmt->execute();
}
function deleteAuthor($myDB, $authorid)
{
  $deleteAllBook = "DELETE FROM `Libary`.`Books` WHERE (`authorid` = ?);";
  $deleteAuthor = "DELETE FROM `Libary`.`Author` WHERE (`authorid` = ?);";
  $stmt = $myDB->prepare($deleteAllBook);
  $stmt->bind_param("i", $authorid);
  $stmt->execute();
  $stmt = $myDB->prepare($deleteAuthor);
  $stmt->bind_param("i", $authorid);
  $stmt->execute();
}
