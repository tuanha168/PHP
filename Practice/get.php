<?php
function getBook($myDB, $author_name, $title)
{
  $author_name = $author_name ? "%" . $author_name . "%" : "%";
  $title = $title ? "%" . $title . "%" : "%";
  $query = "SELECT bookid,title,pub_year,isbn,author.name FROM BookStore inner join Author on BookStore.authorid = Author.authorid Where name like ? and title like ? order by bookid";
  $stmt = $myDB->prepare($query);
  $stmt->bind_param("ss", $author_name, $title);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}
