
let asides = [...document.querySelectorAll('.slide-aside')]
let harmburger = document.querySelector('.nav-toggle');
     let body = document.querySelector('body');

harmburger.addEventListener('click',function(){
    let navbarNav = document.querySelector('.navbar-nav');
    let imgSrc = this.querySelector('img');

    //toggle show classes for elements
    body.classList.toggle('toggle')
    navbarNav.classList.toggle('show')
    
   
})

harmburger.addEventListener('click',()=>{
  navAlt.classList.toggle('slide-left');
  harmburger.classList.toggle('roll')
})

if (asides.length < 2) {
   
   $('.slide-review').slick({
     centerMode: true,
     centerPadding: '60px',
     slidesToShow: 1,
     arrows:false,
     autoplay:false,
     });
}else{
  $('.slide-review').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 2,
    arrows:false,
    autoplay:false,
    responsive: [
    {
        breakpoint: 1240,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '20px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 1080,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 2,
          autoplaySpeed:2000
        }
      },
      {
        breakpoint: 1060,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 1,
          autoplaySpeed:1500,
          cssEase:'ease-out'
        }
      },
      {
        breakpoint: 730,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '0px',
          slidesToShow: 1,
          autoplaySpeed:1500,
          cssEase:'ease-out'
        }
      }
    ]
  });
}





