
jQuery(document).ready(function ($) {




  function closeOrderPopup() {
    $('.popup').removeClass('popup--active');
    $('.popup-wrapper').removeClass('popup-wrapper--active');
  }


	const reviewsSlider = () => {				
		$('.reviews-slider').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			centerMode: true,
			arrows: false,
			variableWidth: true
		});
	}
	reviewsSlider();

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
		$(title).eq(0).addClass('active');
		$(content).eq(0).slideDown();

		$(title).on("click", function () {
			if ( $(this).hasClass('active') ) {
				$(this).removeClass('active');
				$(this).next().slideUp(500);
			} else {
				$(title).removeClass('active');
				$(content).slideUp(500);
				$(this).addClass('active');
				$(this).next().slideDown(500);
			}
			
		});
	}
	dropdown('.speciality-dropdown__title', '.speciality-dropdown__body' );
	dropdown('.dropdown__title', '.dropdown__body');

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


	$('.content h2').addClass('section-title');
	// Input mask
	$('input[type=tel]').inputmask("+7(999)-999-99-99")
});
