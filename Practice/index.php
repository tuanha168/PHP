<!DOCTYPE html>
<html lang="en" style="max-height: 100vh;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body style="height: 100%; background-image: url(https://www.detroitlabs.com/wp-content/uploads/2018/02/alfons-morales-YLSwjSy7stw-unsplash.jpg);">
  <?php
  include './get.php';
  include './post.php';
  $myDB = new mysqli('127.0.0.1', 'root', '01642587195', 'Practice');
  if ($myDB->connect_error) {
    die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_error);
  }
  ?>
  <div class="wrap-content">
    <div class="card" style="width: 60%; margin: 4rem auto;">
      <div class="card-body">
        <form action="" method="get" id="search-form">
          <h3 class="text-center">Search Books</h3>
          <div class="d-flex mt-4">
            <p>Author: <input type="text" name="author"></p>
            <p class="ms-5">Title: <input type="text" name="title"></p>
          </div>
          <button id="search" type="submit" class="btn btn-primary text-end">Search</button>
        </form>
      </div>
    </div>
    <div class="card" style="width: 80%; margin: 4rem auto; padding: 2rem;">
      <h3 align="center">These Books are currently available</h3>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Year Published</th>
            <th scope="col">Author</th>
            <th scope="col">ISBN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $listBook = getBook($myDB, $_GET['author'], $_GET['title']);
          while ($row = $listBook->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>";
            echo $row["bookid"];
            echo "</th><td>";
            echo $row["title"];
            echo "</td><td>";
            echo $row["pub_year"];
            echo "</td><td>";
            echo $row["name"];
            echo "</td><td>";
            echo $row["isbn"];
            echo "</td></tr>";
          }
          ?>
        </tbody>
      </table>
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
  </div>
</body>

</html>