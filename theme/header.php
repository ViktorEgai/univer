
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
<!-- верстка  header -->	
		<?php $phone = get_field('phone', 'options') ?>
		<header class="header">
			
			<div class="container">
				<div class="header__wrapper">
					<div class="header-top">
						<?php
						$logo = get_field('logo', 'options');
						$logo_text = get_field('logo_text', 'options');
						?>
						<a href="<? bloginfo('url') ?>" class="header__logo logo">
							<img src="<?= $logo['url'] ?>" alt="" />
							<span><?= $logo_text ?></span>
						</a>

						<div class="d-none d-lg-flex align-items-center">
							<?php wp_nav_menu(['theme_location'=>'header-top-menu']) ?>
							<?php if($phone): ?>
							<a href="<?= getPhone($phone) ?>" class="header-phone phone"><?= $phone ?></a>
							<?php endif ?>
							<div class="header-top-menu-buttons">
								
								<div class="header-top-menu-buttons__item"><?php echo do_shortcode( '[bvi]' ); ?> </div>
								<a href="https://uppo.ispringlearn.ru/" class="header-top-menu-buttons__item" target="_blank">
									<svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M21.9398 24.8809C20.3434 23.098 18.0239 21.9761 15.4424 21.9761C12.8609 21.9761 10.5413 23.098 8.9449 24.8809M15.4424 26.9581C9.25158 26.9581 4.23291 21.9394 4.23291 15.7486C4.23291 9.55773 9.25158 4.53906 15.4424 4.53906C21.6333 4.53906 26.6519 9.55773 26.6519 15.7486C26.6519 21.9394 21.6333 26.9581 15.4424 26.9581ZM15.4424 18.2396C13.3788 18.2396 11.7059 16.5667 11.7059 14.5031C11.7059 12.4395 13.3788 10.7666 15.4424 10.7666C17.506 10.7666 19.1789 12.4395 19.1789 14.5031C19.1789 16.5667 17.506 18.2396 15.4424 18.2396Z"
											stroke="#171717"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</a>
								<a href="#" class="header-top-menu-buttons__item search-btn">
									<svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M17.8255 18.2396L24.6758 25.0898M12.117 20.523C7.70313 20.523 4.125 16.9449 4.125 12.531C4.125 8.11719 7.70313 4.53906 12.117 4.53906C16.5308 4.53906 20.1089 8.11719 20.1089 12.531C20.1089 16.9449 16.5308 20.523 12.117 20.523Z"
											stroke="#171717"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</a>
							</div>
						</div>
						<div class="d-block d-lg-none">
							<button class="header-menu-btn">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M24.375 22.5H5.625" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M24.375 15H5.625" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M24.375 7.5H5.625" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
						</div>
					</div>
					<div class="d-none d-lg-block">
						<?php wp_nav_menu(['theme_location'=>'header-menu']) ?>
					</div>
				</div>
			</div>
		</header>
		<div class="header-mobile-menu">
			<div class="container">
				<?php wp_nav_menu(['theme_location'=>'header-menu']) ?>
				<?php if($phone): ?>
				<a href="<?= getPhone($phone) ?>" class="header-phone phone"><?= $phone ?></a>
				<?php endif ?>
				<?php wp_nav_menu(['theme_location'=>'header-top-menu']) ?>
				<ul class="header-top-menu">
					<li class="header-top-menu__item"><a href="https://uppo.ispringlearn.ru/" target="_blank">Личный кабинет</a></li>
					<li class="header-top-menu__item"><?php echo do_shortcode( '[bvi text="Версия для слабовидящих"]' ); ?> </li>
					<li class="header-top-menu__item"><a href="#" class="search-btn">Поиск</a></li>
				</ul>
				<button class="header-mobile-menu__btn btn" data-fancybox data-src="#popup">Связаться с нами</button>
			</div>
		</div>