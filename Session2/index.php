<div style="display: flex;justify-content: space-evenly;">
  <form action="" style="border:1px solid black; padding:6px" method="get" id="search-form">
    <h2>Search Books</h2>
    <h3>Author: <input type="text" name="author"></h3>
    <h3>Title: <input type="text" name="title"></h3>
    <h3>Year: <input type="text" name="year"></h3>
    <h3>ISBN: <input type="text" name="isbn"></h3>
    <button id="search">Search</button>
  </form>
  <form action="" style="border:1px solid black; padding:6px" method="post">
    <h2>Add Book</h2>
    <h3>Author: <input type="text" name="author"></h3>
    <h3>Title: <input type="text" name="title"></h3>
    <h3>Year: <input type="text" name="year"></h3>
    <h3>ISBN: <input type="text" name="isbn"></h3>
    <button>Add</button>
  </form>
  <form action="" style="border:1px solid black; padding:6px" method="post">
    <h2>Add Author</h2>
    <h3>Author: <input type="text" name="author_name"></h3>
    <button>Add</button>
  </form>
</div>
<?php
include 'get.php';
include 'post.php';
$myDB = new mysqli('127.0.0.1', 'root', '01642587195', 'Libary');
if ($myDB->connect_error) {
  die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_error);
}
if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['year']) && isset($_POST['isbn'])) {
  addBook($myDB, $_POST['author'], $_POST['title'], $_POST['year'], $_POST['isbn']);
}
if (isset($_POST['author_name'])) {
  addAuthor($myDB, $_POST['author_name']);
}
?>
<div style="display: flex;justify-content: space-evenly;">
  <div>
    <table cellSpacing="2" cellPadding="6" align="center" border="1">
      <tr>
        <td colspan="5">
          <h3 align="center">These Books are currently available</h3>
        </td>
      </tr>
      <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">Author</td>
        <td align="center">ISBN</td>
        <td align="center">Action</td>
      </tr>
      <?php
      $listBook = getBook($myDB, $_GET['author'], $_GET['title'], $_GET['year'], $_GET['isbn']);
      while ($row = $listBook->fetch_assoc()) {
        echo "<form action='' method='post'>";
        echo "<tr>";
        echo "<input name='bookid' value='" . $row["bookid"] . "' style='display:none;'/>";
        echo "<td>";
        echo $row["title"];
        echo "</td><td align='center'>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["name"];
        echo "</td><td>";
        echo $row["isbn"];
        echo "</td><td><button>Delete</button></td></tr></form>";
      }
      if (isset($_POST['bookid'])) {
        deleteBook($myDB, $_POST['bookid']);
        header("Refresh:0");
      }
      ?>
    </table>
  </div>
  <div>
    <table cellSpacing="2" cellPadding="6" align="center" border="1">
      <tr>
        <td colspan="2">
          <h3 align="center">Author List</h3>
        </td>
      </tr>
      <tr>
        <td align="center">Author Name</td>
        <td>Action</td>
      </tr>
      <?php
      $listAuthor = getAuthor($myDB, $_GET['author'], $_GET['title']);
      while ($row = $listAuthor->fetch_assoc()) {
        echo "<form action='' method='post'>";
        echo "<input name='authorid' value='" . $row["authorid"] . "' style='display:none;'/>";
        echo "<tr>";
        echo "<td>";
        echo $row["name"];
        echo "</td><td><button>Delete</button></td></tr></form>";
      }
      if (isset($_POST['authorid'])) {
        deleteAuthor($myDB, $_POST['authorid']);
        header("Refresh:0");
      }
      ?>
    </table>
  </div>
</div>
<script>
  function checkEmpty() {
    var searchForm = document.getElementById('search-form');
    var allInputs = searchForm.getElementsByTagName('input');
    for (var i = 0; i < allInputs.length; i++) {
      var input = allInputs[i];
      if (input.name && !input.value) {
        input.name = '';
      }
    }
  }
  document.getElementById("search").addEventListener("click", checkEmpty);
</script>