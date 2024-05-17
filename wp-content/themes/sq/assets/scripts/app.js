document.querySelectorAll('[data-modal-target]').forEach(trigger => {
  trigger.addEventListener('click', event => {
    event.preventDefault();

    const target = document.getElementById(trigger.dataset.modalTarget);
    
    target.classList.add('visible');
  });
});


document.querySelectorAll('.modal__close').forEach(trigger => {
  trigger.addEventListener('click', event => {
    trigger.closest('.modal').classList.remove('visible');
  });
});

$('.news__left').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
});

$('.numbers__items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  centerMode: true,
  centerPadding: '60px',
});