<?php //var_dump(get_page_template()) ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?= bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400;1,700&display=swap" rel="stylesheet">
  
  <?php wp_head() ?>
</head>

<style>
    img {
    width: 100px;
    height: 100px;
    display: block;
}

.search {
    margin: 50px auto;
    width: 20px;
    position: relative;
}

button {
    background: none;
    box-shadow: none;
    border: none;
    cursor: pointer;
    padding: none;
    margin: 0;
    appearance: none;
    z-index: 2;
    display: none;
}

input {
    width: 170px;
    padding: 5px 45px 5px 10px;
    box-sizing: border-box;
    box-shadow: 0 0 10px 0 #000;
    appearance: none;
    border: none;
    font-size: 16px;
    border-radius: 20px;
    position: absolute;
    left: -135px;
    top: -2px;
    opacity: 0;
    z-index: -1;
    transition-duration: 0.5s;
    transition-property: opacity;
} 

.input_active {
    opacity: 1;
    z-index: 1;
}

.button_active {
    display: block;
}

.img_active {
    display: none;
}
</style>

<body class="d-flex flex-column text-color<?php body_class( $class ) ?>">
  <header class="header header_index">
    <div class="container d-flex align-items-center">
      <div class="nav-toggle d-xl-none mr-3" onclick="document.body.classList.add('nav-opened')">
        <div class="white-bg"></div>
        <div class="white-bg"></div>
        <div class="white-bg"></div>
      </div>
      
      <a class="ml-auto ml-xl-0" href="<?= get_home_url() ?>">
        <div class="logo header__logo">
          <?= get_template_part('template-parts/layout/logo') ?>
        </div>
      </a>
      
      <div class="nav-wrap ml-xl-auto">
        <?php
          require_once(__DIR__ . '/inc/menu-walker.php');
          wp_nav_menu([
            'menu' => 'primary',
            'container' => false,
            'menu_class' => 'nav d-xl-flex px-3 px-xl-0',
            'items_wrap' => '<nav id="%1$s" class="%2$s"><i class="icon icon-close d-xl-none nav-close text-color text-lg" onclick="document.body.classList.remove(\'nav-opened\')"></i>%3$s</nav>',
            'walker' => new New_Walker_Nav_Menu()
          ]);
        ?>
      </div>

      <ul class="lang-switcher d-flex flex-column ttu ml-auto ml-xl-0">
        <?php
          pll_the_languages([
            'show_names' => 0,
            'display_names_as' => 'slug',
            'hide_if_empty' => 0,
          ]);
        ?>
      </ul>
      <div class="search_box">
    <input class="search_input" type="text" name="" id="search" placeholder="Search">
    <a href="#" class="search_btn"><img class="searc_btn ml-3"src="https://sk-trust.kz/wp-content/uploads/2022/07/search_icon.svg"></a>
  </div>
      
    </div>
  </header>
  
  <main class="content flex-grow-1">