<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="file/css/style.css">
</head>

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
  background-image: url("../img/menu/home.jpg");
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
  background: linear-gradient(
    0deg,
    rgba(1, 1, 3, 1) 8% rgba(255, 255, 255, 0) 50%
  );
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
  font-size: 2.6rem;
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
  padding: 2rem;
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

<body>

    <!-- <a href="https://front.codes/" class="logo" target="_blank">
        <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
      </a> -->
      
      <div class="section">
        <div class="container">
          <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
              <div class="section pb-5 pt-5 pt-sm-2 text-center">
                <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log">
                <label for="reg-log"></label>
                <div class="card-3d-wrap mx-auto">
                  <div class="card-3d-wrapper">
                    <div class="card-front">
                      <div class="center-wrap">
                        <div class="section text-center">
                          <h4 class="mb-4 pb-3">Log In</h4>
                          <div class="form-group">
                            <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                            <i class="input-icon uil uil-lock-alt"></i>
                          </div>
                          <a href="Index.html" class="btn mt-4">submit</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-back">
                      <div class="center-wrap">
                        <div class="section text-center">
                          <h4 class="mb-4 pb-3">Sign Up</h4>
                          <div class="form-group">
                            <input type="text" name="logname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
                            <i class="input-icon uil uil-user"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                            <i class="input-icon uil uil-lock-alt"></i>
                          </div>
                          <a for="reg-log" class="btn mt-4">submit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

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

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) --></html>