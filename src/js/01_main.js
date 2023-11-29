jQuery(document).ready(function ($) {
	function togglerMobileMenu() {
		$(".header-menu-btn").on("click", function () {
			$(this).toggleClass("active");
			$(".header-mobile-menu").slideToggle(500);
		});
	}
	togglerMobileMenu();

	function toggleSearch() {
		$(".search-btn").on("click", function (e) {
			e.preventDefault();

			$("#search").slideDown(500);
		});
		$(".search-close-btn").on("click", function (e) {
			e.preventDefault();

			$("#search").slideUp(500);
		});
	}
	toggleSearch();

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

	$(".hero-slider").slick({
		fade: true,
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
		infinite: true,
		speed: 2000,
		autoplay: true,
		autoplaySpeed: 4000,
	});

	// payment slider
	$(".payment-slider").on("init", function () {
		setEqualHeight($(".payment-slider__inner"));
		$(window).resize(function () {
			setEqualHeight($(".payment-slider__inner"));
		});
	});
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
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	// students-slider
	const studentSliderAttr = {
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
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
		],
	};
	$(".students-slider").slick(studentSliderAttr);

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
				// $(title).removeClass("active");
				// $(content).slideUp(500);
				$(this).addClass("active");
				$(this).next().slideDown(500);
			}
		});
	}
	dropdown(".speciality-dropdown__title", ".speciality-dropdown__body");
	dropdown(".dropdown__title", ".dropdown__body");

	// load ajax specilaly list on click
	function closeDropdown(dropdownID) {
		console.log($(dropdownID).find(".speciality-dropdown__title"));
		$(dropdownID).find(".speciality-dropdown__title").removeClass("active");
		$(dropdownID).find(".speciality-dropdown__body").slideUp(500);
	}
	function openDropdown(dropdownID) {
		$(dropdownID).find(".speciality-dropdown__title").addClass("active");
		$(dropdownID).find(".speciality-dropdown__body").slideDown(500);
	}
	function showCourses(term_id, activeItem, action, prevDropddown, nextDropdown) {
		var data = new FormData();
		data.append("action", action);
		data.append("term_id", term_id);

		$.ajax({
			url: ajax_url.url, // сделали запрос
			type: "POST", // указали метод
			data: data,
			processData: false,
			contentType: false,
			beforeSend: function () {
				$(".loader").addClass("active");
			},
			success: function (respond, status, jqXHR) {
				$(".loader").removeClass("active");
				$(prevDropddown).find(".speciality-item").removeClass("active");
				activeItem.addClass("active");

				// Отображение результата
				$(nextDropdown).find(".speciality-dropdown__body").html(respond);

				// Открытие списка и скролл
				openDropdown(nextDropdown);
				$("html, body").animate(
					{
						scrollTop: $(nextDropdown).offset().top,
					},
					1000
				);

				// Клики по специальности
				$("#speciality .speciality-item").on("click", function (e) {
					e.preventDefault();
					const termId = $(this).attr("data-term-id"),
						item = $(this);

					showCourses(termId, item, "show_courses", "#speciality", "#course");
				});
			},
			// функция ошибки ответа сервера
			error: function (jqXHR, status, errorThrown) {
				console.log("ОШИБКА AJAX запроса: " + errorThrown);
			},
		});
	}

	$("#education-level .speciality-item").on("click", function (e) {
		e.preventDefault();
		const termId = $(this).attr("data-term-id"),
			item = $(this);

		showCourses(termId, item, "show_speciality", "#education-level", "#speciality");
		$("#course .speciality-dropdown__body").html('<div class="speciality-dropdown__notice">    Выберите пециальность     </div>');
	});


	

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
		$(".single-tab-nav__item").eq(0).addClass("active");
		$(".single-tab-content").eq(0).addClass("active");

		var nav = $(".single-tab-nav__item");
		var contentItem = $(".single-tab-content");

		for (let i = 0; i < nav.length; i++) {
			nav.eq(i).on("click", function () {
				$(".students-slider").slick("unslick");
				$(".students-slider").slick(studentSliderAttr);
				nav.removeClass("active");
				$(this).addClass("active");
				contentItem.removeClass("active");
				contentItem.eq(i).addClass("active");
			});
		}
	}
	tabs();

	function setHeightContacts() {
		if ($(window).width() > 768) {
			let mapHeight = $(".map").height();
			$(".contacts").height(mapHeight);
		}
	}
	setHeightContacts();
	$(window).resize(setHeightContacts);

	$(".content h2").addClass("section-title");
	// Input mask
	$("input[type=tel]").inputmask("+7(999)-999-99-99");

	$(".section-title").attr("data-aos", "fade-right");

	// Добавление заголовка в  input формы
	$('.btn').on('click', function() {
		const title  = $(this).attr('data-title');
		if(title !== '') {
			$('#title-input').val(title);
		} 
	})

	$('form').on('wpcf7mailsent', function() {
		$.fancybox.close();
	
		if ($(this).hasClass('review-form')) {			
			$.fancybox.open('<div class="message">Спасибо за Ваш отзыв. Он успешно отправлен.</div>');	
		} else {
			$.fancybox.open('<div class="message">Спасибо за Ваше сообщение. Оно успешно отправлено.</div>');			
		}
		setTimeout( function() {
			$.fancybox.close();
		},5000)
	});


	$('.faq-item__title').on('click', function() {
		$(this).find('.faq-item__arrow').toggleClass('active');
		$(this).next().slideToggle()
	})

	AOS.init({
		duration: 600,
	});
});
