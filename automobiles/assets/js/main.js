var swiper = new Swiper('.hero-container', {
  slidesPerView: 1,
  spaceBetween: 5,
  centeredSlides: false,
  loop: true,
  // direction: 'vertical',
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.hero-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 1,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});


var swiper = new Swiper('.customer-container', {
  slidesPerView: 3,
  spaceBetween: 5,
  centeredSlides: false,
  loop: true,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.customer-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 3,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 3,
      spaceBetween: 10,
    }
  }
});

var swiper = new Swiper('.client-container', {
  slidesPerView: 7,
  spaceBetween: 50,
  centeredSlides: false,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.news-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 6,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 6,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 6,
      spaceBetween: 10,
    }
  }
});

var swiper = new Swiper('.blog-container', {
  slidesPerView: 1,
  spaceBetween: 50,
  centeredSlides: false,
  loop: true,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.customer-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 1,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

var swiper = new Swiper('.meet-container', {
  slidesPerView: 2,
  spaceBetween: 50,
  centeredSlides: false,
  loop: true,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.meet-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 2,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 2,
      spaceBetween: 10,
    }
  }
});


// $(".scrolling--content").niceScroll({
//       cursorwidth:12,
//       cursoropacitymin:0.4,
//       cursorcolor:'#6e8cb6',
//       cursorborder:'none',
//       cursorborderradius:4,
//       autohidemode:'leave'
// });  // free your immagination


$('.filters ul li').click(function(){
  $('.filters ul li').removeClass('active');
  $(this).addClass('active');

  var data = $(this).attr('data-filter');
  $grid.isotope({
    filter: data
  })
});

var $grid = $(".grid").isotope({
  itemSelector: ".all",
  percentPosition: true,
  masonry: {
    columnWidth: ".all"
  }
})


jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});



$(function() {
   var $slider = $("#slider-range");
   //Get min and max values
   var priceMin = $slider.attr("data-price-min"),
      priceMax = $slider.attr("data-price-max");

   //Set min and max values where relevant
   $("#price-filter-min, #price-filter-max").map(function(){
		$(this).attr({
			"min": priceMin,
			"max": priceMax
		});
	});
	$("#price-filter-min").attr({
		"placeholder": "min " + priceMin,
		"value": priceMin
	});
	$("#price-filter-max").attr({
		"placeholder": "max " + priceMax,
		"value": priceMax
	});

   $slider.slider({
      range: true,
      min: Math.max(priceMin, 0),
      max: priceMax,
      values: [priceMin, priceMax],
      slide: function(event, ui) {
         // $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         $("#price-filter-min").val(ui.values[0]);
         $("#price-filter-max").val(ui.values[1]);
      }
   });

	// Amount is a read only field for textual representation of the range
   //$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

	//this code was an attempt to stop entering wrong values - but I think this is better ux...
	// $("#price-filter-min, #price-filter-max").map(function(){
		// $(this).on("keypress", function(e) {
		// 	if ($(this).val() > priceMax && e.keyCode != 46 && e.keyCode != 8) {
		// 		// e.preventDefault();
		// 		$(this).val(priceMax);
		// 	} else if ($(this).val() < priceMin && e.keyCode != 46 && e.keyCode != 8) {
		// 		// e.preventDefault();
		// 		$(this).val(priceMin);
		// 	}
		// });
	// });

	$("#price-filter-min, #price-filter-max").map(function(){
		$(this).on("input", function() {
			// let pmin = $("#price-filter-min").val(),
			// 	 pmax = $("#price-filter-max").val();
			// if(
			// 	pmin >= priceMin //bigger than min
			// 	&& pmin <= pmax && pmax <= priceMax //smaller than max
			// ) {
			// 	updateSlider();
			// }
			updateSlider();
		});
	});
	function updateSlider(){
		$slider.slider("values", [$("#price-filter-min").val(), $("#price-filter-max").val()]);
	}


	//Only once on load, add classes to checklists
	$( ".checklist" ).map(function(){
		let $list = $(this);
		if($list.children().length > 3){
			$list.addClass('collapsed');
		}
		//function to remove class (once) when more is clicked
		function handleMore(e){
			if($(e.target).is('ul')){
				$(this).removeClass('collapsed');
				$(this).addClass('revealed');

				//make it two columns if items are not long and there's many
				if($(this).hasClass("short") && $(this).children().length >= 5){
					$(this).addClass('columns');
				}
				//remove event handler
				$(this).off('click.moreButton');
			}
		}
		//and attached event handler to ul
		$list.on('click.moreButton', handleMore);
	});
});


$(document).ready(function() {
  $('#filterButton').click(function(hide, show) {
    $('.hide-filter-form').toggle();
  })
})



$(document).ready(function(){
	$(window).bind('scroll', function() {
		var navHeight = $('#header').height();
		if ($(window).scrollTop() > navHeight) {
			$('.navbar').addClass('fixed');
			// $('.nav').addClass('toleft');
		 }
		else {
			$('.navbar').removeClass('fixed');
			// $('.nav').removeClass('toleft');
		 }
	});
});




// var swiper = new Swiper('.check_container', {
//   slidesPerView: 3,
//   spaceBetween: 5,
//   centeredSlides: false,
//   loop: true,
//   // direction: 'vertical',
//   autoplay: {
//     delay: 2500,
//     disableOnInteraction: false,
//   },
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
//   pagination: {
//     el: '.hero-pagination',
//     clickable: true,
//   },
//   breakpoints: {
//     320: {
//       slidesPerView: 1,
//       spaceBetween: 20,
//     },
//     640: {
//       slidesPerView: 1,
//       spaceBetween: 10,
//     },
//     768: {
//       slidesPerView: 1,
//       spaceBetween: 10,
//     },
//     1024: {
//       slidesPerView: 1,
//       spaceBetween: 10,
//     },
//     1300: {
//       slidesPerView: 3,
//       spaceBetween: 10,
//     },
//     1600: {
//       slidesPerView: 3,
//       spaceBetween: 5,
//     },
//     1700: {
//       slidesPerView: 3,
//       spaceBetween: 10,
//     }
//   }
// });