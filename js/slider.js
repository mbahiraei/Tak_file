  $(document).ready(function(){
		$('.CenterA').slick({
  		centerMode: false,
      infinite:true,
      slidesToShow: 6,
  		autoplay: true,
      autoplaySpeed: 2000,
      prevArrow:'#PRV',
      nextArrow:'#NTX',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
				arrows: false,
				centerMode: false,
				slidesToShow: 5
      }
    },
    {
      breakpoint: 600,
      settings: {
				arrows: false,
				centerMode: false,
				slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
				arrows: false,
				centerMode: false,
				slidesToShow: 3
      }
    }
  ]
        });
  
      });
