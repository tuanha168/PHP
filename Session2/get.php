<?php
function getBook($myDB, $author_name, $title, $year, $isbn)
{
  $author_name = $author_name ? "%" . $author_name . "%" : "%";
  $title = $title ? "%" . $title . "%" : "%";
  $year = $year ? "%" . $year . "%" : "%";
  $isbn = $isbn ? "%" . $isbn . "%" : "%";
  $query = "SELECT bookid,title,pub_year,isbn,author.name FROM Books inner join Author on books.authorid = author.authorid Where available = 1 and name like ? and title like ? and pub_year like ? and isbn like ? order by title";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ssss", $author_name, $title, $year, $isbn);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}
function getAuthor($myDB, $author_name)
{
  $author_name = $author_name ? "%" . $author_name . "%" : "%";
  $query = "SELECT Author.authorid,Author.name FROM Author Where name like ? order by name";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("s", $author_name);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}
