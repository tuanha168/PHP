<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>My Portfolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <?php
  include 'get.php';
  include 'post.php';
  $myDB = new mysqli('127.0.0.1', 'root', '01642587195', 'UploadFile');
  if ($myDB->connect_error) {
    die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_error);
  }
  ?>
  <header>
    <a href="index.html" class="header-brand">mmtuts</a>
    <nav>
      <ul>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li><a href="about.html">About me</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <a href="cases.html" class="header-cases">Cases</a>
    </nav>
  </header>
  <main>
    <section class="cases-links">
      <div class="wrapper">
        <h2>Cases</h2>
        <?php
        $listCase = getCase($myDB);
        while ($row = $listCase->fetch_assoc()) {
          echo '<div class="cases-link">';
          echo '<img src="' . $row['file_url'] . '" alt="' . $row['file_name'] . '">';
          echo '</div>';
        }
        ?>
        </a>

      </div>
    </section>
    <form enctype="multipart/form-data" action="" method="post" style="text-align: center;">
      <input type="file" name="fileUpload">
      <input type="submit">
    </form>
    <?php
    echo '<div style="text-align: center; color: red">';
    if (isset($_FILES['fileUpload'])) {
      uploadFile($myDB, $_FILES['fileUpload']);
      header("Refresh:0");
    }
    echo '</div>';
    ?>
  </main>
  <div class="wrapper">
    <footer>
      <ul class="footer-links-main">
        <li><a href="#">Home</a></li>
        <li><a href="#">Cases</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">About me</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="footer-links-cases">
        <li>
          <p>Latest cases</p>
        </li>
        <li><a href="#">MALING SHAOLIN - WEB DEVELOPMENT</a></li>
        <li><a href="#">EXCELLENTO - WEB DEVELOPMENT, SEO</a></li>
        <li><a href="#">MMTUTS - YOUTUBE CHANNEL</a></li>
        <li><a href="#">WELTEC - VIDEO PRODUCTION</a></li>
      </ul>
      <div class="footer-sm">
        <a href="#">
          <img src="img/youtube-symbol.png" alt="youtube icon">
        </a>
        <a href="#">
          <img src="img/twitter-logo-button.png" alt="youtube icon">
        </a>
        <a href="#">
          <img src="img/facebook-logo-button.png" alt="youtube icon">
        </a>
      </div>
    </footer>
  </div>
</body>

</html>