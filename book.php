<?php
include 'config/database.php';

/* ==========================
   LOGIKA SEARCH & E-BOOK
========================== */

// ambil keyword dari search bar
$keyword = $_GET['keyword'] ?? '';

// jika search kosong → ambil banyak kategori
if (empty($keyword)) {
  $keyword = 'education OR business OR technology OR health OR psychology OR communication OR sports';
}

$url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($keyword) . "&maxResults=20";

// ambil data API
$response = @file_get_contents($url);
$data = json_decode($response, true);

// simpan hasil buku
$books = $data['items'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-Book Pembelajaran</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="courses-page">

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl d-flex align-items-center">
    <a href="index.php" class="logo me-auto">
      <h1 class="sitename">MyLearn</h1>
    </a>
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="courses.php">Learn</a></li>
          <li><a href="book.php" class="active">E-book</a></li>

      </ul>
    </nav>
  </div>
</header>

<main class="main">
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Learn</li>
          </ol>
        </nav>
      </div>
    </div>

<section class="courses-2 section">
<div class="container">

<!-- SEARCH -->
<div class="courses-header mb-4">
  <form method="get" class="d-flex gap-2">
    <div class="search-box flex-grow-1">
      <i class="bi bi-search"></i>
      <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Cari e-book...">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
</div>

<!-- GRID -->
<div class="courses-grid">
<div class="row justify-content-center">

<?php
if (!empty($books)) {

  $count = 0;
  foreach ($books as $book) {

    if ($count >= 10) break;

    $info = $book['volumeInfo'] ?? [];

    $title = $info['title'] ?? 'No Title';
    $authors = isset($info['authors']) ? implode(', ', $info['authors']) : 'Unknown Author';
    $thumbnail = $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/300x400?text=No+Cover';
    $preview = $info['previewLink'] ?? '#';

    $count++;
?>

<div class="col-lg-6 col-md-6 mb-4 d-flex align-items-stretch">
  <div class="course-card w-100">

    <div class="course-image">
      <img src="<?= htmlspecialchars($thumbnail); ?>"
           style="width:100%; height:215px; object-fit:cover; border-radius:10px;">
    </div>

    <div class="course-content">
      <div class="course-meta">
        <span class="category">E-Book</span>
        <span class="level">Online</span>
      </div>

      <h3><?= htmlspecialchars($title); ?></h3>

      <div class="course-stats">
        <div class="stat">
          <i class="bi bi-person"></i>
          <span><?= htmlspecialchars($authors); ?></span>
        </div>
        <div class="stat">
          <i class="bi bi-book"></i>
          <span>Google Books</span>
        </div>
      </div>

      <a href="<?= htmlspecialchars($preview); ?>" target="_blank" class="btn-course">
        Baca E-Book
      </a>
    </div>

  </div>
</div>

<?php
  }
} else {
  echo '<p class="text-center text-muted">E-Book tidak ditemukan.</p>';
}
?>

</div>
</div>

</div>
</section>

</main>

<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <span class="sitename">MyLearn</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="courses.php">Learn</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">MyLearn</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer>



<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
