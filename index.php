<?php 

include 'config/database.php';

/* =============================
   AMBIL JUMLAH VIDEO PER KATEGORI
============================= */
$categoryCount = [];
$result = mysqli_query($conn, "
  SELECT categories.id, categories.name, COUNT(courses.id) AS total_video
  FROM categories
  LEFT JOIN courses ON courses.category_id = categories.id
  GROUP BY categories.id
");

while ($row = mysqli_fetch_assoc($result)) {
  $categoryCount[$row['name']] = $row['total_video'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MyLearn</title>
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

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">MyLearn</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.php">Learn</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="tambah.php">Tambah Video</a>

    </div>
  </header>
  <main class="main">

    <!-- Courses Hero Section -->
    <section id="courses-hero" class="courses-hero section light-background">

      <div class="hero-content">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="hero-text">
                <h1>Belajar Keahlian Baru Kapan Saja Melalui Ribuan Video Edukasi</h1>
                <p>Temukan ribuan materi berkualitas dari para ahli. Mulai dari Teknologi (HCI), Bisnis, Kesehatan, Psikologi, Komunikasi, hingga Olahraga. Akses materi kapan saja dan kembangkan karirmu dari mana saja.</p>

                <div class="hero-stats">
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="50000" data-purecounter-duration="2"></span>
                    <span class="label">Siswa Terdaftar</span>
                  </div>
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="2"></span>
                    <span class="label">Kursus Unggulan</span>
                  </div>
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2"></span>
                    <span class="label">Tingkat Keberhasilan %</span>
                  </div>
                </div>

                <div class="hero-buttons">
                  <a href="#course-categories" class="btn btn-primary">Jelajahi Kelas</a>
                  <a href="#about" class="btn btn-outline">Pelajari Lebih lLanjut</a>
                </div>

                <div class="hero-features">
                  <div class="feature">
                    <i class="bi bi-shield-check"></i>
                    <span>Program Bersertifikat</span>
                  </div>
                  <div class="feature">
                    <i class="bi bi-clock"></i>
                    <span>Akses Seumur Hidup</span>
                  </div>
                  <div class="feature">
                    <i class="bi bi-people"></i>
                    <span>Instruktur Berpengalaman</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="hero-image">
                <div class="main-image">
                  <img src="assets/img/education/courses-13.webp" alt="Online Learning" class="img-fluid">
                </div>

                <div class="floating-cards">
                  <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon">
                      <i class="bi bi-code-slash"></i>
                    </div>
                    <div class="card-content">
                      <h6>Human Computer Interface</h6>
                      <span>2,000 Students</span>
                    </div>
                  </div>

                  <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon">
                      <i class="bi bi-palette"></i>
                    </div>
                    <div class="card-content">
                      <h6>UI/UX Design</h6>
                      <span>1,500 Students</span>
                    </div>
                  </div>

                  <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-icon">
                      <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="card-content">
                      <h6>Digital Marketing</h6>
                      <span>3,200 Students</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="hero-background">
        <div class="bg-shapes">
          <div class="shape shape-1"></div>
          <div class="shape shape-2"></div>
          <div class="shape shape-3"></div>
        </div>
      </div>

    </section><!-- /Courses Hero Section -->

    <!-- Featured Courses Section -->
    <section id="featured-courses" class="featured-courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>E-Book</h2>
        <p>Kumpulan e-book pembelajaran pilihan yang dirancang untuk membantu mahasiswa memahami materi secara mandiri, terstruktur, dan mudah dipahami.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/students-9.webp" alt="Course" class="img-fluid">
                <div class="badge featured">Featured</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Beginner</span>
                  <span class="duration">8 Weeks</span>
                </div>
                <h3><a href="#">Human Computer Interaction (HCI)</a></h3>
                <p>Kursus ini membahas konsep dasar Interaksi Manusia dan Komputer, termasuk prinsip desain antarmuka, pengalaman pengguna (user experience), serta bagaimana sistem dirancang agar mudah digunakan dan efektif bagi pengguna.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-f-3.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>Sarah Johnson</h6>
                    <span>HCI Expert</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>(4.5)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>342 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/campus-4.webp" alt="Course" class="img-fluid">
                <div class="badge new">New</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Intermediate</span>
                  <span class="duration">6 Weeks</span>
                </div>
                <h3><a href="#">Bussiness</a></h3>
                <p>Kursus Business membahas dasar-dasar bisnis, manajemen, dan pengambilan keputusan untuk membantu peserta memahami strategi bisnis serta dinamika dunia usaha secara umum.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-m-5.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>Michael Chen</h6>
                    <span>Full Stack Developer</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <span>(5.0)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>156 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/students-7.webp" alt="Course" class="img-fluid">
                <div class="badge certificate">Certificate</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Beginner</span>
                  <span class="duration">4 Weeks</span>
                </div>
                <h3><a href="#">Health & Medical</a></h3>
                <p>Kursus Health & Medical memberikan pengenalan materi kesehatan dan medis dasar yang berfokus pada pemahaman konsep kesehatan, pencegahan penyakit, dan pemanfaatan informasi medis secara tepat.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-f-7.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>Dr. Emily Watson</h6>
                    <span>Data Scientist</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <span>(4.2)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>789 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/education-5.webp" alt="Course" class="img-fluid">
                <div class="badge popular">Popular</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Advanced</span>
                  <span class="duration">12 Weeks</span>
                </div>
                <h3><a href="#">Psychology</a></h3>
                <p>Kursus Psychology membahas pengenalan ilmu psikologi, perilaku manusia, serta faktor-faktor psikologis yang memengaruhi cara berpikir, emosi, dan interaksi sosial.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-m-8.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>Robert Anderson</h6>
                    <span>Pychology Expert</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>(4.7)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>234 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/activities-3.webp" alt="Course" class="img-fluid">
                <div class="badge certificate">Certificate</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Intermediate</span>
                  <span class="duration">10 Weeks</span>
                </div>
                <h3><a href="#">Communication</a></h3>
                <p>Kursus Communication membahas keterampilan komunikasi efektif, baik secara lisan maupun tulisan, untuk mendukung interaksi yang jelas, persuasif, dan profesional dalam berbagai situasi.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-f-12.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>Lisa Martinez</h6>
                    <span>Communication Expert</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <span>(4.3)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>467 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="course-card">
              <div class="course-image">
                <img src="assets/img/education/teacher-6.webp" alt="Course" class="img-fluid">
                <div class="badge new">New</div>
              </div>
              <div class="course-content">
                <div class="course-meta">
                  <span class="level">Beginner</span>
                  <span class="duration">5 Weeks</span>
                </div>
                <h3><a href="#">Sport & Fitness</a></h3>
                <p>Kursus Sports & Fitness membahas dasar kebugaran jasmani, aktivitas olahraga, serta gaya hidup sehat untuk meningkatkan kondisi fisik dan keseimbangan tubuh.</p>
                <div class="instructor">
                  <img src="assets/img/person/person-m-11.webp" alt="Instructor" class="instructor-img">
                  <div class="instructor-info">
                    <h6>James Wilson</h6>
                    <span>Professional Athlete</span>
                  </div>
                </div>
                <div class="course-stats">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>(4.6)</span>
                  </div>
                  <div class="students">
                    <i class="bi bi-people-fill"></i>
                    <span>298 students</span>
                  </div>
                </div>
                <a href="enroll.html" class="btn-course">Daftar Sekarang</a>
              </div>
            </div>
          </div><!-- End Course Item -->

        </div>

        <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
          <a href="courses.html" class="btn-more">View All Courses</a>
        </div>

      </div>

    </section><!-- /Featured Courses Section -->

    <!-- Course Categories Section -->
    <section id="course-categories" class="course-categories section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Video Categories</h2>
        <p>Beragam kategori video pembelajaran yang dirancang untuk membantu mahasiswa memahami materi secara visual, interaktif, dan mudah diakses.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <a href="hci.php" class="category-card category-tech">
              <div class="category-icon">
                <i class="bi bi-laptop"></i>
              </div>
              <h5>Human Computer Interface</h5>
              <span class="course-count">
              <?= $categoryCount['Human Computer Interface'] ?? 0; ?>  
              Video</span>
            </a>
          </div>

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
            <a href="business.php" class="category-card category-business">
              <div class="category-icon">
                <i class="bi bi-briefcase"></i>
              </div>
              <h5>Business</h5>
              <span class="course-count">
              <?= $categoryCount['Business'] ?? 0; ?>  
              Video</span>
            </a>
          </div><!-- End Category Item -->

          <!-- <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
            <a href="courses.html" class="category-card category-design">
              <div class="category-icon">
                <i class="bi bi-palette"></i>
              </div>
              <h5>Design</h5>
              <span class="course-count">15 Courses</span>
            </a>
          </div>End Category Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
            <a href="health.php" class="category-card category-health">
              <div class="category-icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h5>Health &amp; Medical</h5>
              <span class="course-count">
              <?= $categoryCount['Health & Medical'] ?? 0; ?>  
              Video</span>
            </a>
          </div><!-- End Category Item -->

          

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
            <a href="sport.php" class="category-card category-sports">
              <div class="category-icon">
                <i class="bi bi-trophy"></i>
              </div>
              <h5>Sports &amp; Fitness</h5>
              <span class="course-count">
              <?= $categoryCount['Sports & Fitness'] ?? 0; ?>  
              Video</span>
            </a>
          </div><!-- End Category Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
            <a href="psychology.php" class="category-card category-psychology">
              <div class="category-icon">
                <i class="bi bi-body-text"></i>
              </div>
              <h5>Psychology</h5>
              <span class="course-count">
              <?= $categoryCount['Psychology'] ?? 0; ?>  
              Video</span>
            </a>
          </div><!-- End Category Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="350">
            <a href="communication.php" class="category-card category-communication">
              <div class="category-icon">
                <i class="bi bi-chat-dots"></i>
              </div>
              <h5>Communication</h5>
              <span class="course-count">
              <?= $categoryCount['Communication'] ?? 0; ?>  
              Video</span>
            </a>
          </div>
        </div>

      </div>

  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">MyLearn</span>
          </a>
          <p>MyLearn adalah platform pembelajaran digital yang menyediakan video edukasi dan e-book dari berbagai kategori untuk mendukung proses belajar mahasiswa secara mandiri, fleksibel, dan mudah diakses.</p>
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
            <li><a href="about.php">About us</a></li>
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
          <p>Fakultas Teknik Informatika</p>
          <p>Universitas Halu Oleo</p>
          <p>Indonesia</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 6767676767</span></p>
          <p><strong>Email:</strong> <span>MyLearn@gmail.com</span></p>
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