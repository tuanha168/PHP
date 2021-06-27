<?php
function getBook($myDB, $author_name = "", $title = "", $year = "", $isbn = "")
{
  $author_name = $author_name . "%";
  $title = $title . "%";
  $year = $year . "%";
  $isbn = $isbn . "%";
  $sql = "SELECT bookid,title,pub_year,isbn,author.name FROM Books inner join Author on books.authorid = author.authorid Where available = 1 and name like '%" . $author_name . "' and title like '%" . $title . "'  and pub_year like '%" . $year . "' and isbn like '%" . $isbn . "' order by title";
  $result = $myDB->query($sql);
  return $result;
}
function getAuthor($myDB, $author_name = "")
{
  $author_name = $author_name . "%";
  $sql = "SELECT Author.authorid,Author.name FROM Author Where name like '%" . $author_name . "' order by name";
  $result = $myDB->query($sql);
  return $result;
}
