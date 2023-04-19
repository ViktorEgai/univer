jQuery(document).ready(function ($) {
	function closeOrderPopup() {
		$(".popup").removeClass("popup--active");
		$(".popup-wrapper").removeClass("popup-wrapper--active");
	}

	const reviewsSlider = () => {
		$(".reviews-slider").slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			centerMode: true,
			arrows: false,
			variableWidth: true,
		});
	};
	reviewsSlider();

	// payment slider
	$(".payment-slider").on('init', function() {
	setEqualHeight($(".payment-slider__inner"));
		$(window).resize( function() {
				setEqualHeight($(".payment-slider__inner"));
		})

	})
	$(".payment-slider").slick({
		infinite: true,
		dots: false,
		speed: 8000,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
    autoplaySpeed: 0,
		arrows: false,
		cssEase: "linear",
    responsive: [
    
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll:1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  
  ]
	});

// studentscslider 
$(".students-slider").slick({
		infinite: true,
		dots: false,		
		slidesToShow: 6,
		slidesToScroll: 1,
		arrows: true,	
		prevArrow: `<button class="prev"><svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="18.5" cy="18.5" r="18.5" transform="matrix(-1 0 0 1 37 0)" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.0303 14.4697C19.7374 14.1768 19.2626 14.1768 18.9697 14.4697L14.9697 18.4697C14.6768 18.7626 14.6768 19.2374 14.9697 19.5303L18.9697 23.5303C19.2626 23.8232 19.7374 23.8232 20.0303 23.5303C20.3232 23.2374 20.3232 22.7626 20.0303 22.4697L16.5607 19L20.0303 15.5303C20.3232 15.2374 20.3232 14.7626 20.0303 14.4697Z" fill="#747474"/>
</svg>
</button>`,
nextArrow: `<button class="next"><svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="18.5" cy="18.5" r="18.5" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M16.9697 14.4697C17.2626 14.1768 17.7374 14.1768 18.0303 14.4697L22.0303 18.4697C22.3232 18.7626 22.3232 19.2374 22.0303 19.5303L18.0303 23.5303C17.7374 23.8232 17.2626 23.8232 16.9697 23.5303C16.6768 23.2374 16.6768 22.7626 16.9697 22.4697L20.4393 19L16.9697 15.5303C16.6768 15.2374 16.6768 14.7626 16.9697 14.4697Z" fill="#747474"/>
</svg>
</button>`,
    responsive: [
    
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll:1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  
  ]
	});


	// одинаковая высота
	function setEqualHeight(columns) {
		var tallestcolumn = 0;
		columns.each(function () {
			currentHeight = $(this).height();
			if (currentHeight > tallestcolumn) {
				tallestcolumn = currentHeight;
			}
		});
		columns.height(tallestcolumn);
	}

	setEqualHeight($(".product-item"));

	// droplist
	function dropdown(title, content) {
		$(title).eq(0).addClass("active");
		$(content).eq(0).slideDown();

		$(title).on("click", function () {
			if ($(this).hasClass("active")) {
				$(this).removeClass("active");
				$(this).next().slideUp(500);
			} else {
				$(title).removeClass("active");
				$(content).slideUp(500);
				$(this).addClass("active");
				$(this).next().slideDown(500);
			}
		});
	}
	dropdown(".speciality-dropdown__title", ".speciality-dropdown__body");
	dropdown(".dropdown__title", ".dropdown__body");

	// load ajax specilaly list on click

	// табы
	function tabs() {
		$(".news-tab-nav__item").eq(0).addClass("active");
		$(".news-tab-content__item").eq(0).addClass("active");

		var nav = $(".news-tab-nav__item");
		var contentItem = $(".news-tab-content__item");

		for (let i = 0; i < nav.length; i++) {
			nav.eq(i).on("click", function () {
				nav.removeClass("active");
				$(this).addClass("active");
				contentItem.removeClass("active");
				contentItem.eq(i).addClass("active");
			});
		}
		$(".product-tabs-nav__item").eq(0).addClass("active");
		$(".product-tabs-content__item").eq(0).addClass("active");

		var nav = $(".product-tabs-nav__item");
		var contentItem = $(".product-tabs-content__item");

		for (let i = 0; i < nav.length; i++) {
			nav.eq(i).on("click", function () {
				nav.removeClass("active");
				$(this).addClass("active");
				contentItem.removeClass("active");
				contentItem.eq(i).addClass("active");
			});
		}
	}
	tabs();

	function setHeightContacts() {
		if($(window).width()> 768) {
			let mapHeight = $('.map').height();
		$('.contacts').height(mapHeight);
		}
	}
	setHeightContacts();
	$(window).resize(setHeightContacts);


	$(".content h2").addClass("section-title");
	// Input mask
	$("input[type=tel]").inputmask("+7(999)-999-99-99");
});
