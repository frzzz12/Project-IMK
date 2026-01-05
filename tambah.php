<?php
include 'config/database.php';

/* =========================
   PROSES SIMPAN DATA
========================= */
if (isset($_POST['save'])) {
  $title       = mysqli_real_escape_string($conn, $_POST['title']);
  $category_id = $_POST['category_id'];
  $youtube_url = mysqli_real_escape_string($conn, $_POST['youtube_url']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $material    = mysqli_real_escape_string($conn, $_POST['material']);

  mysqli_query($conn, "
    INSERT INTO courses (title, category_id, youtube_url, description, material)
    VALUES ('$title', '$category_id', '$youtube_url', '$description', '$material')
  ");

  echo "<script>window.location='courses.php';</script>";
}

/* =========================
   AMBIL DATA
========================= */
$categories = mysqli_query($conn, "SELECT * FROM categories");

$query = mysqli_query($conn, "
  SELECT courses.*, categories.name AS category
  FROM courses
  JOIN categories ON courses.category_id = categories.id
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Video Pembelajaran</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="courses-page">

<!-- ================= HEADER (TIDAK DIUBAH) ================= -->
<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl d-flex align-items-center">
    <a href="index.php" class="logo d-flex align-items-center me-auto">
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

<!-- ================= FORM TAMBAH VIDEO ================= -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card p-4 mb-5">
          <h4 class="mb-3">Tambah Video Pembelajaran</h4>

          <form method="post">
            <div class="mb-3">
              <label>Judul Video</label>
              <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Kategori</label>
              <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                  <option value="<?= $cat['id']; ?>">
                    <?= $cat['name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3">
              <label>Link YouTube (Embed / Playlist)</label>
              <input type="text" name="youtube_url" class="form-control"
                     placeholder="https://www.youtube.com/embed/xxxx" required>
            </div>

            <div class="mb-3">
              <label>Deskripsi</label>
              <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
              <label>Materi Pembelajaran</label>
              <textarea name="material" class="form-control"></textarea>
            </div>

            <button type="submit" name="save" class="btn btn-primary">
              Tambah Video
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>


</main>

<!-- ================= FOOTER (TIDAK DIUBAH) ================= -->
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
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
