<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="index1.css ">
  <title>Canteen</title>
  <script defer src="scroll.js"></script>
</head>

<body>
  <header>
    <img class="logo" src="media/logo.png" alt="logo">
    <nav>
      <ul class="nav_links">
        <li class="links"><a href="menu/index.php">Menu</a></li>
        <?php
        if (isset($_SESSION['authn'])) { ?>
          <li class="links"><a href="carts/index.php">Cart</a></li>
          <li class="links"><a href="orders/index.php">Orders</a></li>
        </ul>
      </nav>
      <ul class="nav_links">
        <li><a class="logout" href="logout.php">Logout</a>
          <?php
        } else {
          ?>
      </ul>
      </nav>
      <ul class="nav_links">
        <li><a class="login"><button id="login" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button></a>
          <!-- Modal -->
          <div class="modal fade" data-bs-focus="false" id="exampleModal" data-focus="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="background-color: rgba(240, 248, 255, 0);">
                <div class="modal-header bg-dark" style="border-color: rgba(255, 237, 191, 0.714);">
                  <h4 class="modal-title bg-dark" id="exampleModalLabel" style="padding-left: 200px;">Login</h4>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark" style="text-align: center;">
                  <form action="authorize.php" method="post">
                    <label for="email_id"
                      style="background-color:rgba(240, 248, 255, 0);padding-bottom:5px;">E-mail</label><br>
                    <input type="email" placeholder="abc@gmail.com" name="email_id" required><br>
                    <label for="u_pass"
                      style="background-color:rgba(240, 248, 255, 0);padding-top:5px;padding-bottom:5px;">Password</label><br>
                    <input type="password" placeholder="password" name="u_pass" required><br>

                </div>
                <div class="modal-footer bg-dark" style="border-color: rgba(240, 248, 255, 0);justify-content: center;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="login" class="btn btn-primary " id="boot_button">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li><a class="register" href="#"><button id="register" data-bs-toggle="modal"
              data-bs-target="#exampleModal2">Register</button></a>
          <div class="modal fade" data-bs-focus="false" id="exampleModal2" data-focus="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="background-color: rgba(240, 248, 255, 0);">
                <div class="modal-header bg-dark" style="border-color: rgba(255, 237, 191, 0.714);">
                  <h4 class="modal-title bg-dark" id="exampleModalLabel" style="padding-left: 187px;">Register</h4>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark" style="text-align: center;">
                  <form action="authorize.php" method="post">
                    <label for="u_name" style="background-color:none;padding-bottom:10px;">Name</label><br>
                    <input type="text" placeholder="Name" name="u_name" required><br>
                    <label for="email_id"
                      style="background-color:none;padding-top:10px;padding-bottom:10px;">E-mail</label><br>
                    <input type="email" placeholder="abc@gmail.com" name="u_email" required><br>
                    <label for="u_pass"
                      style="background-color:none;padding-top:5px;padding-bottom:10px;">Password</label><br>
                    <input type="password" placeholder="Password" name="u_pass" required><br>
                    <label for="u_pass1" style="background-color:none;padding-top:10px;padding-bottom:10px;">Re-enter
                      Password</label><br>
                    <input type="password" placeholder="Password" name="u_pass1" required><br>

                </div>
                <div class="modal-footer bg-dark" style="border-color: rgba(240, 248, 255, 0);justify-content: center;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary " name="register" id="boot_button">Register</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php } ?>
    </ul>

  </header>
  <?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>
        <?= $_SESSION['message'] ?>
      </strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']);
  } ?>
  <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="media\burger.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="caption">BURGERLICIOUS</h2>
          <p class="caption">Use code BUGER20</p>
          <p class="caption">Get up to 20% off on burgers</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="media\wallpaperflare.com_wallpaper.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="caption">FEATURED DEALS</h2>
          <p class="caption">Get Amazing Offers On Thalis</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="media\pizza.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="caption fw-bolder">PIZZERIA</h4>
            <p class="caption">surround yourself with pizza, not negativity.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <div class="sec">
    <section>
      <p class="hidden"> Get your food hot and fast</p>
      <p class="hidden"><img class="feat_img" src="media\hotfood.jpg" alt=".."></p>
    </section>
    <section>
      <p class="hidden">No need to stand in Queues</p>
      <p class="hidden"><img class="feat_img" src="media\queue.png" alt=".."></p>
    </section>
    <section>
      <p class="hidden">Pay Cash Free</p>
      <p class="hidden"><img class="feat_img" src="media\mobpay.jpg" alt=".."></p>
    </section>
    <section1>
      <div class="hidden" style="padding: 1% 3%; background-color: black;border-radius: 10px;"><img
          src="media/para-img.jpg" style="height:19vh; float: left; padding: 10px;" ALIGN=”left” HSPACE=”10”
          VSPACE=”10” />Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto accusantium sint cupiditate
        magnam, corrupti quibusdam ipsa est quasi debitis ipsum et, nesciunt adipisci! Beatae iusto natus maiores animi
        labore dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor recusandae saepe dignissimos
        inventore, architecto tempore. Obcaecati a ducimus cum at ad nulla molestiae perferendis non laborum? Soluta
        omnis adipisci consequuntur!</div>
    </section1>
    <section1>
      <div class="hidden" style="padding: 1% 3%; background-color: black;border-radius: 10px;"><img
          src="media/para-img.jpg" style="height:19vh; float: right; padding: 10px;" ALIGN=”left” HSPACE=”10”
          VSPACE=”10” />Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto accusantium sint cupiditate
        magnam, corrupti quibusdam ipsa est quasi debitis ipsum et, nesciunt adipisci! Beatae iusto natus maiores animi
        labore dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor recusandae saepe dignissimos
        inventore, architecto tempore. Obcaecati a ducimus cum at ad nulla molestiae perferendis non laborum? Soluta
        omnis adipisci consequuntur!</div>
    </section1>
  </div>
  <section>

  </section>
</body>

</html>