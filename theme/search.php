<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme
 */

get_header();
?>

	<main class="main">

		<?php include('template-parts/breadcrumbs.php') ?>
		<div class="container">
			<?php if ( have_posts() ) : ?>
	
				
				<h1 class="page-title">
					Результаты поиска: <?= get_search_query() ?>
				</h1>
			
				<ul class="search-page-list">
				<?php
				/* Start the Loop */
				
				while ( have_posts() ) :
					the_post();?>
					<li>
						<a href="<? the_permalink() ?>">
							<?the_title();?>
						</a>
					</li>
	
				<? endwhile; ?>
	
				</ul>
	
			 <? else :
	
				
	
			endif;
			?>
		</div>

	</main><!-- #main -->

<?php

get_footer();
