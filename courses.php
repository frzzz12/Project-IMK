<?php
include 'config/database.php';

$query = mysqli_query($conn, "
    SELECT courses.*, categories.name AS category
    FROM courses
    JOIN categories ON courses.category_id = categories.id
");

$categories = mysqli_query($conn, "
  SELECT id, name 
  FROM categories
  ORDER BY name ASC
");

?>


<style>
  .simple-category-card {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;

  height: 50px;
  padding: 5px;

  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e5e7eb;

  font-size: 18px;
  font-weight: 600;
  color: #222;
  text-decoration: none;

  transition: all 0.3s ease;
}

.simple-category-card:hover {
  background: #0d6efd;
  color: #fff;
  transform: translateY(-6px);
  box-shadow: 0 12px 30px rgba(13, 110, 253, 0.25);
}

</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Video Pembelajaran</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Learner
  * Template URL: https://bootstrapmade.com/learner-bootstrap-course-template/
  * Updated: Jul 08 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="courses-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">MyLearn</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.php" class="active">Learn</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="tambah.php">Tambah Video</a>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Learn</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Courses 2 Section -->
    <section id="courses-2" class="courses-2 section">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">

      <!-- CONTENT CENTER -->
      <div class="col-lg-10">

        <!-- SEARCH -->
        <div class="courses-header mb-4" data-aos="fade-left">
          <form action="search.php" method="get" class="d-flex gap-2">
            <div class="search-box flex-grow-1">
              <i class="bi bi-search"></i>
              <input type="text" name="keyword" placeholder="Search courses...">
            </div>
            <button type="submit" class="btn btn-primary" style="border-radius:10px">Search</button>
          </form>
        </div>
    <!-- CATEGORY LIST -->
<div class="container" data-aos="fade-up" data-aos-delay="100">
  <div class="row justify-content-center">

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="hci.php" class="simple-category-card w-100 text-center">
        Human Computer Interface
      </a>
    </div>

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="business.php" class="simple-category-card w-100 text-center">
        Business
      </a>
    </div>

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="health.php" class="simple-category-card w-100 text-center">
        Health &amp; Medical
      </a>
    </div>

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="sport.php" class="simple-category-card w-100 text-center">
        Sports &amp; Fitness
      </a>
    </div>

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="psychology.php" class="simple-category-card w-100 text-center">
        Psychology
      </a>
    </div>

    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
      <a href="communication.php" class="simple-category-card w-100 text-center">
        Communication
      </a>
    </div>

  </div>
</div>


        <!-- GRID -->
        <div class="courses-grid" data-aos="fade-up">
          <div class="row justify-content-center">

            <?php while($row = mysqli_fetch_assoc($query)) { ?>
              <div class="col-lg-6 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="course-card w-100">

                  <!-- VIDEO -->
                  <div class="course-image">
                    <iframe
                      width="100%"
                      height="215"
                      src="<?= $row['youtube_url']; ?>"
                      frameborder="0"
                      allowfullscreen
                      style="border-radius:10px;">
                    </iframe>
                  </div>

                  <!-- CONTENT -->
                  <div class="course-content">
                    <div class="course-meta">
                      <span class="category"><?= $row['category']; ?></span>
                      <span class="level">Online</span>
                    </div>

                    <h3><?= $row['title']; ?></h3>

                    <div class="course-stats">
                      <div class="stat">
                        <i class="bi bi-clock"></i>
                        <span>Flexible</span>
                      </div>
                      <div class="stat">
                        <i class="bi bi-people"></i>
                        <span>E-Learning</span>
                      </div>
                    </div>

                    <a href="detail.php?id=<?= $row['id']; ?>" class="btn-course">
                      Lihat Materi
                    </a>
                  </div>

                </div>
              </div>
            <?php } ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>