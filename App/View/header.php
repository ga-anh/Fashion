<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <!-- Glide js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="<?= BASE_PATH ?>/layout/css/styles.css" />
  <title>
    <?php
    if ($titlepage != "") echo $titlepage;
    else "My website";
    if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
      extract($_SESSION['s_user']);
      $html_account = '
      <div class="icons d-flex">
          <a href="' . BASE_PATH . '/trangcanhan" class="icon">
            <i class="bx bx-user"></i>' . $username . '
          </a>
          <div class="icon">
            
            <i class="bx bx-search"></i>
          </div>
          <div class="icon">         
            <i class="bx bx-heart"></i>

          </div>
          <a href="' . BASE_PATH . '/cart" class="icon">
            <i class="bx bx-cart"></i>

          </a>
        </div>
      ';
    } else {
      $html_account = '<div class="icons d-flex">
                          <a href="' . BASE_PATH . '/login" class="icon">
                            <i class="bx bx-user"></i>
                          </a>
                          <div class="icon">
                            
                            <i class="bx bx-search"></i>
                          </div>
                          <div class="icon">
                            <i class="bx bx-heart"></i>

                          </div>
                          <a href="' . BASE_PATH . '/cart" class="icon">
                            <i class="bx bx-cart"></i>

                          </a>
                        </div>';
    }

    ?>
  </title>
  <style>
    .logo img {
      margin-top: 5px;
      margin-bottom: 5px;
    }

    .banner .right img {
      position: absolute;
      bottom: 0;
      right: 4%;
      width: 75rem;
    }

    .center .right img.img1 {
      width: 85%;
      right: -25%;
      bottom: -10%;
    }



    
  </style>
</head>

<body>
  <!-- Header -->
  <header class="header" id="header">
    <!-- Top Nav -->

    <div class="top-nav">

      <div class="container d-flex">

        <p>Order Online Or Call Us: (001) 2222-55555</p>
        <ul class="d-flex">
          <li><a href="#">About Us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="navigation">

      <div class="nav-center container d-flex">

        <div class="logo col2"><img src="layout/images/brand.png" alt=""></div>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="<?= BASE_PATH ?>/index" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_PATH ?>/product" class="nav-link">Sản phẩm</a>
          </li>


        </ul>

        <?= $html_account ?>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>