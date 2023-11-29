<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php include('template-parts/breadcrumbs.php') ?>
		
			<section class="error-404 not-found">
				<div class="container">
					
						<h1 class="page-title">Упс! Страница не найдена</h1>
						<p>404</p>		
					
				</div>
			</section><!-- .error-404 -->
	
	
	</main><!-- #main -->

<?php
get_footer();
