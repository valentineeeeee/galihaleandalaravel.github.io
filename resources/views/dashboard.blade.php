<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atlas Coffee and Bike</title>

  <style>
    :root {
      --primary: #b6895b;
      --bg: #010101;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--bg);
      color: #fff;
    }

    /* navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.4rem 7%;
      background-color: rgba(1, 1, 1, 0.8);
      border-bottom: 1px solid #513c28;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 9999;
    }

    .navbar .navbar-logo {
      font-size: 2rem;
      font-weight: 700;
      color: #fff;
    }

    .navbar-logo span {
      color: var(--primary);
    }

    .navbar .navbar-nav a {
      color: #fff;
      display: inline-block;
      font-size: 1.3rem;
      margin: 0 1rem;
    }

    .navbar .navbar-nav a:hover {
      color: var(--primary);
    }

    .navbar .navbar-nav a::after {
      content: "";
      display: block;
      padding-bottom: 0.5rem;
      border-bottom: 0.1rem solid var(--primary);
      transform: scaleX(0);
      transition: 0.2s linear;
    }

    .navbar .navbar-nav a:hover::after {
      transform: scaleX(1);
    }

    .about .row {
      flex-wrap: wrap;
    }

    .navbar .navbar-extra a {
      color: #fff;
      margin: 0 0.5rem;
    }

    .navbar .navbar-extra a:hover {
      color: var(--primary);
    }

    #hamburger-menu {
      display: none;
    }

    /* pencarian */
    .navbar .search-form {
      position: absolute;
      top: 100%;
      right: 7%;
      background-color: #fff;
      width: 50rem;
      height: 5rem;
      display: flex;
      align-items: center;
      transform: scaleY(0);
      transform-origin: top;
      transition: 0.3s;
    }

    .navbar .search-form.active {
      transform: scaleY(1);
    }

    .navbar .search-form input {
      height: 100%;
      width: 100%;
      font-size: 1.6rem;
      color: var(--bg);
      padding: 1rem;
    }

    .navbar .search-form label {
      cursor: pointer;
      font-size: 2rem;
      margin-right: 1.5rem;
      color: var(--bg);
    }

    /* Hero seaction */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      background-image: url("../images/home.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .hero::after {
      content: "";
      display: block;
      position: relative;
      width: 100%;
      height: 30%;
      bottom: 0;
      background: linear-gradient(0deg,
          rgba(1, 1, 3, 1) 8% rgba(255, 255, 255, 0) 50%);
    }

    .hero .content {
      padding: 1.4rem 7%;
      max-width: 60rem;
    }

    .hero .content h1 {
      font-size: 5em;
      color: #fff;
      text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
      line-height: 1.2;
    }

    .hero .content h1 span {
      color: var(--primary);
    }

    .hero .content p {
      font-size: 1.6rem;
      margin-top: 1rem;
      line-height: 1.4;
      font-weight: 100;
      text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
      mix-blend-mode: difference;
    }

    .hero .content .cta {
      margin-top: 1rem;
      display: inline-block;
      padding: 1rem 3rem;
      font-size: 1.4rem;
      color: #fff;
      background-color: var(--primary);
      border-radius: 0.5rem;
      box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
    }

    /* Tentang Kami */
    .about,
    .menu,
    .contact {
      padding: 8rem 7% 1.4rem;
    }

    .about h2,
    .menu h2,
    .contact h2 {
      text-align: center;
      font-size: 2.4rem;
      margin-bottom: 3rem;
    }

    .about h2 span,
    .menu h2 span,
    .contact h2 span {
      color: var(--primary);
    }

    .about .row {
      display: flex;
    }

    .about .row .about-img {
      flex: 1 1 45rem;
    }

    .about .row .about-img img {
      width: 100%;
    }

    .about .row .content {
      flex: 1 1 35rem;
      padding: 0 1rem;
    }

    .about .row .content h3 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }

    .about .row .content p {
      margin-bottom: 0.8rem;
      font-size: 1.4rem;
      font-weight: 100;
      line-height: 1.6;
    }

    .menu p {
      font-size: 1.2rem;
    }

    /* Menu */
    .menu h2 {
      text-align: center;
      font-size: 2.6rem;
      margin-bottom: 3rem;
    }

    .menu {
      padding: 8rem 7% 1.4rem;
    }

    .menu h2 span {
      color: var(--primary);
    }

    .menu h2,
    .contact h2 {
      margin-bottom: 1rem;
    }

    .menu p,
    .contact p {
      text-align: center;
      max-width: 30rem;
      margin: auto;
      font-weight: 100;
      line-height: 1.6;
    }

    .menu .row {
      display: flex;
      flex-wrap: wrap;
      margin-top: 5rem;
      justify-content: center;
    }

    .menu .row .menu-card {
      text-align: center;
      padding-bottom: 3rem;
    }

    .menu .row .menu-card img {
      border-radius: 50%;
      width: 80%;
    }

    .menu .row .menu-card .menu-card-tittle {
      margin-top: 1rem auto 0.5rem;
    }

    /* Kontak */
    .contact .row {
      display: flex;
      margin-top: 2rem;
      background-color: #222;
    }

    .contact .row .map {
      flex: 1 1 45rem;
      width: 100%;
      object-fit: cover;
    }

    .contact .row form {
      flex: 1 1 45rem;
      padding: 5rem 2rem;
      text-align: center;
    }

    .contact .row form .input-group {
      display: flex;
      align-items: center;
      margin-top: 2rem;
      background-color: var(--bg);
      border: 1px solid #eee;
      padding-left: 2rem;
    }

    .contact .row form .input-group input {
      width: 100%;
      padding: 1rem;
      font-size: 1.7rem;
      background: none;
      color: #fff;
    }

    .contact .row form .btn {
      margin-top: 3rem;
      display: inline-block;
      padding: 1rem 3rem;
      font-size: 1.7rem;
      color: #fff;
      background-color: var(--primary);
      cursor: pointer;
    }

    /* Kontak */
    footer {
      background-color: var(--primary);
      text-align: center;
      padding: 1rem 0;
      margin-top: 3rem;
    }

    footer .socials {
      padding: 1rem 0;
    }

    footer .socials a {
      color: #fff;
      margin: 1rem;
    }

    footer .socials a:hover,
    footer .links a:hover {
      color: var(--bg);
    }

    footer .links {
      margin-bottom: 1.4rem;
    }

    footer .links a {
      color: #fff;
      padding: 0.7rem 1rem;
    }

    /* Laptop */
    @media (max-width: 1366px) {
      html {
        font-size: 75%;
      }
    }

    /* Tablet */
    @media (max-width: 768px) {
      html {
        font-size: 62.5%;
      }

      #menu {
        display: inline-block;
      }

      .navbar .navbar-nav {
        position: absolute;
        top: 100%;
        right: -100%;
        background-color: #fff;
        width: 30rem;
        height: 100vh;
        transition: 0.3s;
      }

      .navbar .navbar-nav.active {
        right: 0;
      }

      .navbar .navbar-nav a {
        color: var(--primary);
        display: block;
        margin: 1.5rem;
        padding: 0.5rem;
        font-size: 2rem;
      }

      .navbar .navbar-nav a::after {
        transform-origin: 0 0;
      }
    }

    /* Mobile Phone */
    @media (max-width: 450px) {
      html {
        font-size: 55%;
      }
    }
  </style>
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- Icon -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar">
    <a href="#" class="navbar-logo">Atlas<span>Coffee.</span></a>
    <div class="navbar-nav">
      <a href="#home">Beranda</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Kontak</a>
    </div>
    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="/login" id="shopping-cart"><i data-feather="log-in"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Pencarian -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="Cari disini..." />
      <label for="search-form"><i data-feather="search"></i></label>
    </div>
  </nav>

  <!-- Beranda awal -->
  <section class="hero" id="home">
    <main class="content">
      <h1>Mari Nikmati Secangkir Kopi</h1>
      <p>Kopi nikmat harga merakyat. Ayo beli sekarang!</p>
      <a href="#menu" class="cta">Beli Sekarang</a>
    </main>
  </section>

  <!-- Tentang Kami -->
  <section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>
    <div class="row">
      <div class="about-img">
        <img src="{{ asset('images/about.jpg') }}" alt="Tentang Kami" />
      </div>
      <div class="content">
        <h3>Kenapa Memilih Kopi Kami?</h3>
        <p>
          Atlas Coffee & Bike merupakan salah satu coffee shop yang ada di
          Pekanbaru.
        </p>
        <p>
          Atlas Coffee & Bike ini menjual berbagai macam makanan dan minuman
          yang menajdi ciri khas dari coffee shop mereka sendiri. Selain
          menyediakan makanan dan minuman, atlas juga menyediakan tempat
          reparasi sepeda. Bengkel sepeda itu sendiri, dibangun oleh pemilik
          Atlas untuk komunitas sepeda yang pada saat pandemi istilah “gowes”
          marak terjadi dan keterbatasan masyarakat dalam mencari bengkel
          sepeda. Namun, bengkel tersebut tidak beroperasi dengan baik
          dikarenakan sudah berkurangnya masyarakat yang bermain sepeda.
        </p>
      </div>
    </div>
  </section>

  <!-- Menu -->
  <section id="menu" class="menu">
    <h2><span>Menu</span> Kami</h2>
    <p>Berikut merupakan menu yang disediakan oleh Atlas Coffe & Bike.</p>
    <div class="row">
      <div class="menu-card">
        <img src="{{ asset('images/1.png') }}" alt="Salted Caramel Coffee" class="menu-card-img" />
        <h3 class="menu-card-title">Salted Caramel</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
      <div class="menu-card">
        <img src="{{ asset('images/2.png') }}" alt="Butterscotch Coffee" class="menu-card-img" />
        <h3 class="menu-card-title">Butterscotch Coffee</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
      <div class="menu-card">
        <img src="{{ asset('images/3.jpg') }}" alt="Choco Pistachio" class="menu-card-img" />
        <h3 class="menu-card-title">Choco Pistachio</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
      <div class="menu-card">
        <img src="{{ asset('images/4.jpg') }}" alt="Chocolate" class="menu-card-img" />
        <h3 class="menu-card-title">Chocolate</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
      <div class="menu-card">
        <img src="{{ asset('images/5.jpg') }}" alt="Matcha Frappe" class="menu-card-img" />
        <h3 class="menu-card-title">Matcha Frappe</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
      <div class="menu-card">
        <img src="{{ asset('images/6.jpg') }}" alt="Raspberry Lemon Tea" class="menu-card-img" />
        <h3 class="menu-card-title">Raspberry Lemon Tea</h3>
        <p class="menu-card-price">IDR 25.000</p>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>
      Jika terjadi kendala atau ingin melihat infromasi dari Atlas Coffee &
      Bike, maka lihat info dibawah ini.
    </p>
    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6563596897777!2d101.45154149999999!3d0.5162586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5adabfae58b6f%3A0xeb4d91ac6c648029!2sAtlas%20Coffee%20%26%20Bike!5e0!3m2!1sid!2sid!4v1688909007465!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="Nama" />
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="Email" />
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="No hp" />
        </div>
        <button type="submit" class="btn">Kirim Pesan</button>
      </form>
    </div>
  </section>

  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Kontak</a>
    </div>
  </footer>

  <script>
    feather.replace();
  </script>

  <!-- JavaScript-->
  <script src="js/script.js"></script>

  <script>
    // togle class active untuk hamburger menu
    const navbarNav = document.querySelector(".navbar-nav");

    // ketika menu di klik
    document.querySelector("#hamburger-menu").onclic = () => {
      navbarNav.classList.toggle("active");
    };

    // togle class active untuk pencarian
    const searchForm = document.querySelector(".search-form");
    const searchBox = document.querySelector("#search-box");

    document.querySelector("#search-button").onclick = (e) => {
      searchForm.classList.toggle("active");
      searchBox.focus();
      e.preventDefault();
    };

    const hamburger = document.querySelector("#hamburger-menu");

    document.addEventListener("click", function(e) {
      if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove("active");
      }
    });
  </script>

</body>

</html>
