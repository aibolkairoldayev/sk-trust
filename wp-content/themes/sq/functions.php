<?php

  // register menu and features
  add_action('after_setup_theme', 'custom_setup');
	function custom_setup() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo');
  }


  // disable wp version
  add_filter('the_generator', '__return_empty_string');

  
  // menu
  add_action('after_setup_theme', 'theme_register_nav_menu');
  function theme_register_nav_menu() {
    register_nav_menu('primary', 'Главное меню');
    register_nav_menu('bottom', 'Меню в подвале');
  }


  add_action('wp_enqueue_scripts', 'custom_css_js');
  function custom_css_js() {
    // Регистрируем зависимости
    wp_register_style('swiper-slider', 'https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css');

    $cssVersion = '2.0';
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/styles/main.css', [], $cssVersion);
	  wp_enqueue_style('slides', get_template_directory_uri() . '/assets/styles/slides.css', [], $cssVersion);

    
    // Регистрируем зависимости
    wp_register_script('swiper-slider', 'https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js', [], null, true);

    $jsVersion = '1.4';

    wp_enqueue_script('header', get_template_directory_uri() . '/assets/scripts/header.js', [], $jsVersion, true);
    wp_enqueue_script('footer', get_template_directory_uri() . '/assets/scripts/footer.js', [], $jsVersion, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/scripts/app.js', [], $jsVersion, true);

    if(is_front_page()) {
      wp_enqueue_style('swiper-slider');
      wp_enqueue_script('front-page', get_template_directory_uri() . '/assets/scripts/pages/front-page.js', ['swiper-slider'], null, true);
    }

    if(in_array(get_the_ID(), [14, 19, 24])) {
      wp_enqueue_style('swiper-slider');
      wp_enqueue_script('about-page', get_template_directory_uri() . '/assets/scripts/pages/about-page.js', ['swiper-slider'], null, true);
    }

    if(in_array(get_the_ID(), [34, 32, 36])) {
      wp_enqueue_style('swiper-slider');
      wp_enqueue_script('news-page', get_template_directory_uri() . '/assets/scripts/pages/news-page.js', ['swiper-slider'], null, true);
    }

    if(is_single()) {
      wp_enqueue_style('swiper-slider');
      wp_enqueue_style('lightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css');
      wp_enqueue_script('lightbox', 'https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js', [], null, true);
      wp_enqueue_script('news-single', get_template_directory_uri() . '/assets/scripts/pages/news-single.js', ['swiper-slider'], null, true);
    }
  }


  function get_theme_img($image) {
    return get_template_directory_uri() . '/assets/images/' . $image;
  }


  add_action('init', function() {
    if(!function_exists('pll_register_string')) {
      return;
    }

    $group = 'Theme';
    
    pll_register_string('copyright', 'Копирайт', $group, false);
    pll_register_string('address', 'Адрес', $group, false);
    pll_register_string('contacts-text', 'Текст о правонарушениях', $group, false);
    pll_register_string('site-name', 'Название сайта', $group, false);
    pll_register_string('news', 'Новости', $group, false);
    pll_register_string('projects', 'Проекты', $group, false);
    pll_register_string('contact-heading', 'Заголовок контактов', $group, false);
    pll_register_string('send-application', 'Подать заявку', $group, false);
    pll_register_string('call-center-contacts', 'Контакты call-центра', $group, false);
    pll_register_string('instruction-1', 'Видео-инструкция по подаче заявки', $group, false);
    pll_register_string('instruction-2', 'Видео-инструкция по сдаче отчетности', $group, false);
    pll_register_string('social-heading', 'Заголовок соцсети', $group, false);
    pll_register_string('all-news', 'Все новости', $group, false);
    pll_register_string('all-smi', 'Все упоминания', $group, false);
    pll_register_string('all-stories', 'Все публикации', $group, false);
    pll_register_string('send-order', 'Оставить заявку', $group, false);
    pll_register_string('read-more', 'Читать далее', $group, false);
    pll_register_string('show-more', 'Показать еще', $group, false);
    pll_register_string('comments', 'Комментарии', $group, false);
    pll_register_string('like', 'Мне нравится', $group, false);
  });


  function format_phone($phone, $plus = true) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $phone = '7' . substr($phone, 1);
    
    return $plus ? '+' . $phone : $phone;
  }


  add_shortcode('content-header', 'show_content_header');
  function show_content_header($atts, $content, $tag) {
    $title = get_the_title();

    if(is_category()) {
      $categoryId = get_queried_object_id();
      $category = get_category($categoryId);

      $title = $category->name;
    }

    if(is_tax('docs_category')) {
      $categoryId = get_queried_object_id();
      $tax = get_term($categoryId, 'docs_category');

      $title = $tax->name;
    }

    $h1Class = !empty($atts['template']) ? 'mb-3 pb-3 mb-md-5' : '';

    if(is_single()) {
      $h1Class .= ' h1_single';
    }

    $output = '<div class="content__header white-color">';
    $output .= '<div class="container">';
    $output .= load_template_part('template-parts/layout/breadcrumbs');
    $output .= '<h1 class="h1 ' . $h1Class . ' ttu text-center text-md-left">'. $title .'</h1>';
    $output .= !empty($atts['template']) ? load_template_part($atts['template']) : '';
    $output .= '</div></div>';

    return $output;
  }


  function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
  }


  function get_bottom_nav() {
    switch(pll_current_language()) {
      case 'en': $navId = 24; break;
      case 'kk': $navId = 25; break;
      default: $navId = 23;
    }

    $navData = wp_get_nav_menu_items($navId);
    $nav = [];

    foreach($navData as $navItem) {
      $arr = [
        'url' => $navItem->url,
        'title' => $navItem->title
      ];

      if($navItem->menu_item_parent == '0') {
        $nav[$navItem->ID] = $arr;
      } else {
        $nav[$navItem->menu_item_parent]['submenu'][] = $arr;
      }
    }

    return $nav;
  }


  function applicationLink() {
    switch(pll_current_language()) {
      case 'en':
        return get_permalink(244);
        break;

      case 'kk':
        return get_permalink(242);
        break;
    }

    return get_permalink(240);
  }

  function newsLink() {
    switch(pll_current_language()) {
      case 'en':
        return get_term_link(12);
        break;

      case 'kk':
        return get_term_link(8);
        break;
    }

    return get_term_link(1);
  }

  function getNewsCategoryId() {
    switch(pll_current_language()) {
      case 'en': return 12; break;
      case 'kk': return 8; break;
    }

    return 1;
  }


  add_filter('bcn_breadcrumb_title', 'filter_bcn_breadcrumb_title', 10, 3);
  function filter_bcn_breadcrumb_title($title, $this_type, $this_id) {
    if($this_type[0] == 'home') {
      switch(pll_current_language()) {
        case 'en':
          return 'Home';
          break;
  
        case 'kk':
          return 'Басты';
          break;
      }

      return 'Главная';
    }

    return $title;
  };


  add_filter('bcn_breadcrumb_url', 'filter_bcn_breadcrumb_url', 10, 3);
  function filter_bcn_breadcrumb_url($url, $this_type, $this_id) {
    if($this_type[0] == 'home') {
      return get_home_url();
    }

    return $url; 
  };


  add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
  function kama_reorder_comment_fields( $fields ){
    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author','email','url','comment'); // нужный порядок

    foreach( $myorder as $key ){
      $new_fields[ $key ] = $fields[ $key ];
      unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
      foreach( $fields as $key => $val )
        $new_fields[ $key ] = $val;

    return $new_fields;
  }


  add_filter('comment_form_default_fields', 'website_remove');
  function website_remove($fields) {
    if(isset($fields['url'])) unset($fields['url']);
    if(isset($fields['cookies'])) unset($fields['cookies']);
    
    return $fields;
  }

  function get_post_views() {
    if($views = get_post_meta(get_the_ID(), 'post_views', true)) {
      return $views;
    }

    return 0;
  }

  function get_post_likes() {
    if($likes = get_post_meta(get_the_ID(), 'post_likes', true)) {
      return $likes;
    }

    return 0;
  }

  add_action('wp_ajax_like', 'set_post_like');
  add_action('wp_ajax_nopriv_like', 'set_post_like');
  function set_post_like() {
    update_post_meta($_POST['post'], 'post_likes', $_POST['likes']);
    setcookie('liked_posts_' . $_POST['post'], true, time() + 2592000, COOKIEPATH, COOKIE_DOMAIN);
    die;
  }