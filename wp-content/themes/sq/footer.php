  </main>

  <footer class="footer white-color py-xl-5 py-4">
    <div class="container py-xl-0 py-3">
      <div class="d-md-flex justify-content-xl-between flex-wrap footer__row">
        <div class="d-flex align-items-center d-xl-block mb-4 mb-md-5 mb-xl-0">
          <div class="mb-xl-4">
            <div class="logo footer__logo">
              <?= get_template_part('template-parts/layout/logo') ?>
            </div>
          </div>
          <div class="footer__scl d-flex justify-content-between ml-auto">
            <a class="footer__scl-link brown-hover" href="<?= do_shortcode('[cgv youtube]') ?>" target="_blank">
              <i class="icon icon-youtube"></i>
            </a>
            
            <a class="footer__scl-link brown-hover" href="<?= do_shortcode('[cgv facebook]') ?>" target="_blank">
              <i class="icon icon-facebook"></i>
            </a>
            
            <a class="footer__scl-link brown-hover" href="<?= do_shortcode('[cgv instagram]') ?>" target="_blank">
              <i class="icon icon-instagram"></i>
            </a>
          </div>
        </div>
        
        <?php

          $nav = get_bottom_nav();

          $index = 1;

        ?>

       

        <?php foreach($nav as $navItem):

          $isParent = isset($navItem['submenu']);  

        ?>

        <div class="d-block <?= $index > 4 ? 'mt-md-5 mt-xl-0' : '' ?>">

          <div class="footer__col">

            <div class="footer__heading py-3 py-md-0 d-flex align-items-center d-md-block<?= $isParent ? ' parent' : '' ?>">

              <a class="footer__heading-link text-md ttu white-color fw-700" href="<?= $navItem['url'] ?>">

                <?= $navItem['title'] ?>

              </a>

            </div>

           

            <?php if($isParent): ?>

            <nav class="footer__nav text mt-md-3">

              <?php foreach($navItem['submenu'] as $navSubItem): ?>

              <a class="footer__nav-link white-color fw-400 brown-hover" href="<?= $navSubItem['url'] ?>">

                <?= $navSubItem['title'] ?>

              </a>

              <?php endforeach; ?>

            </nav>

            <?php endif; ?>

          </div>

        </div>

        <?php $index++; ?>

        <?php endforeach; ?>

      </div>
      
      <div class="footer__copyright text-center text-sm mt-3 mt-md-5">
        <?= pll__('Копирайт') ?>
      </div>
    </div>
  </footer>

  <!--<script src="https://code.jquery.com/jquery-3.6.3.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <?php wp_footer() ?>

<script>
    let btn= document.getElementById(search_btn);
    console.log(btn)
    btn.addEventListener('click', () => {
        let menu = document.getElementsByClassName("nav-wrap")
        let searchInput = document.getElementsByClassName("search_input")
        menu.style.opacity = 0;
        searchInput.style.display = "block"

    })
    
</script>
<script>
$(".years").on("change", function () {
  var $option = $(this).find("option:selected");
  var value = $option.val();
	if ($("#" + value).hasClass("active")) {
		$("#" + value).removeClass("active");
		$("#" + value).css('display', 'none');
	}
	else {
		$("#" + value).addClass("active");
		$("#" + value).fadeToggle('slow');
		$("#" + value).siblings().css('display', 'none');
		$("#" + value).siblings().removeClass('active');
	}
});
</script>
</body>
</html>