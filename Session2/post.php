<?php
function addBook($myDB, $author_name, $title, $year, $isbn)
{
  $sql = "INSERT INTO `Libary`.`Books` (`authorid`, `title`, `ISBN`, `pub_year`, `available`) select author.authorid, '" . $title . "', '" . $isbn . "', '" . $year . "', 1 from author where author.name like '%" . $author_name . "%';";
  $myDB->query($sql);
}
function deleteBook($myDB, $bookid)
{
  $sql = "DELETE FROM `Libary`.`Books` WHERE (`bookid` = " . $bookid . ");";
  $myDB->query($sql);
}
function addAuthor($myDB, $author_name)
{
  $sql = "INSERT INTO `Libary`.`Author` (`name`) VALUES ('" . $author_name . "');";
  $myDB->query($sql);
}
function deleteAuthor($myDB, $authorid)
{
  $deleteAllBook = "DELETE FROM `Libary`.`Books` WHERE (`authorid` = " . $authorid . ");";
  $deleteAuthor = "DELETE FROM `Libary`.`Author` WHERE (`authorid` = " . $authorid . ");";
  $myDB->query($deleteAllBook);
  $myDB->query($deleteAuthor);
}
