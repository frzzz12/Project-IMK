<?php
include 'config/database.php';

if (!isset($_GET['id'])) {
    echo "Course tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($conn, "
    SELECT courses.*, categories.name AS category
    FROM courses
    JOIN categories ON courses.category_id = categories.id
    WHERE courses.id = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data course tidak ditemukan";
    exit;
}

/* =========================
   SIMPAN KOMENTAR
========================= */
if (isset($_POST['submit_comment'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if (!empty($comment)) {
        mysqli_query($conn, "
          INSERT INTO comments (course_id, comment)
          VALUES ('$id', '$comment')
        ");
    }
}

/* =========================
   AMBIL KOMENTAR
========================= */
$comments = mysqli_query($conn, "
  SELECT * FROM comments
  WHERE course_id = '$id'
  ORDER BY created_at DESC
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Detail Materi</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <li><a href="courses.php" class="active">Learn</a></li>
      </ul>
    </nav>
  </div>
</header>

<main class="main">

  <div class="page-title light-background">
    <div class="container">
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Detail Materi</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="container mt-4">

    <h2><?= $data['title']; ?></h2>
    <span class="badge bg-primary mb-3"><?= $data['category']; ?></span>

    <div class="ratio ratio-16x9 mb-4">
      <iframe
        src="<?= $data['youtube_url']; ?>"
        frameborder="0"
        allowfullscreen>
      </iframe>
    </div>

    <h4>Deskripsi</h4>
    <p><?= $data['description']; ?></p>

    <!-- 🔧 SATU-SATUNYA PERUBAHAN ADA DI SINI -->
    
  </div>
  
  <hr class="my-5">
  
  <!-- KOMENTAR SECTION -->
<div class="container my-5">

  <!-- JUDUL -->
  <div class="row justify-content-center mb-4">
    <div class="col-lg-8 col-md-10">
      <h4 class="fw-bold text-center">Komentar</h4>
    </div>
  </div>

  <!-- FORM KOMENTAR -->
  <div class="row justify-content-center mb-5">
    <div class="col-lg-8 col-md-10">
      <form method="post">
        <textarea
          name="comment"
          class="form-control mb-3"
          rows="4"
          placeholder="Tulis komentar kamu..."
          required></textarea>

        <div class="text-end">
          <button
            type="submit"
            name="submit_comment"
            class="btn btn-primary fw-bold px-4">
            Kirim Komentar
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- LIST KOMENTAR -->
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

      <?php if (mysqli_num_rows($comments) > 0) { ?>
        <?php while ($c = mysqli_fetch_assoc($comments)) { ?>
          <div class="card mb-3 shadow-sm">
            <div class="card-body">
              <h6 class="fw-bold mb-1">Anonymous</h6>
              <p class="mb-2"><?= nl2br(htmlspecialchars($c['comment'])); ?></p>
              <small class="text-muted"><?= $c['created_at']; ?></small>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <p class="text-muted text-center">Belum ada komentar.</p>
      <?php } ?>

    </div>
  </div>

</div>

        
        
        
      </div>
      <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
    <a href="courses.php" class="btn btn-primary btn-lg px-4 py-2 fs-5 fw-bold">
      Kembali
    </a>
    </div>
      
    </main>
    
<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Learner</span>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Learner</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
