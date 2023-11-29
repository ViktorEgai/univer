	<!-- Верстка footer  -->
<footer class="footer">
	<div class="container">
		<div class="footer__wrapper row align-items-start">
			<div class="col-lg-3 mb-3 mb-lg-0">
					<?php
					$logo = get_field('logo', 'options');
					$logo_text = get_field('logo_text', 'options');
					?>
					<a href="<? bloginfo('url') ?>" class="footer__logo logo">
						<img src="<?= $logo['url'] ?>" alt="" />
						<span><?= $logo_text ?></span>
					</a>
				<?php 
					$footer_awards = get_field('footer_awards', 'options');
					if( $footer_awards ): ?>
							<div class="footer-awards">
								<?php foreach( $footer_awards as $image ): ?>
									<div class="footer-awards__item">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div>
										
								<?php endforeach; ?>
							</div>
					<?php endif; ?>
				
			</div>
			<div class="col-lg-3 mb-3 mb-lg-0">
				<div class="footer__col">
					<?php the_field('footer_descr', 'options') ?>
					<?php if ( get_field('license_link', 'options') ) : ?>
					<a href="<? the_field('license_link', 'options') ?>" class="footer__btn">Проверить лицензию</a>
					<?php endif ?>
				</div>
			</div>
			<div class="col-lg-6 mb-3 mb-lg-0">
				<?php wp_nav_menu(['theme_location'=>'footer-menu']) ?>
				
			</div>
		</div>
		<div class="footer-bottom row">
			<div class="col-md-6"><div class="footer__copyrights">©Все права защищены, <?= date('Y')?></div></div>
			<div class="col-md-6"><a href="/privacy-policy/" class="footer-privacy">Политика конфиденциальности</a></div>
		</div>
	</div>
</footer>
<div id="search" class="search-popup">
	<div class="search__wrapper">
		<div class="container">
			<button class="search-close-btn">
				<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M20.3253 1.75L18.5789 0L10.346 8.25L2.11307 0L0.366699 1.75L8.59961 10L0.366699 18.25L2.11307 20L10.346 11.75L18.5789 20L20.3253 18.25L12.0924 10L20.3253 1.75Z"
						fill="white"
					/>
				</svg>
			</button>
			
			<?php echo do_shortcode('[ivory-search id="718" title="Default Search Form"]') ?>
		</div>
	</div>
</div>
<div class="popup" id="popup">
	<?php echo do_shortcode('[contact-form-7 id="782" html_class="form" title="Форма обратной связи"]') ?>
</div>
<div class="popup" id="popup-review">
	<?php echo do_shortcode('[contact-form-7 id="783" title="Форма отзыва" html_class="form" ]') ?>
</div>

<!-- loader -->
<div class="loader">
	<img src="<?= get_template_directory_uri() ?>./img/loader.gif" alt="">
</div>
		<?php wp_footer(); ?>
		</div>
	</body>
</html>
