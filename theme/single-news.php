<?php
get_header();
?>

	<main  class="main">

	<main class="main">

   <?php include('template-parts/breadcrumbs.php') ?>

    <section class="single-news">
      <div class="container">
        <h1 class="section-title"><? the_title() ?></h1>
        <div class="news-item__date"> <?= get_the_date('d.m.Y') ?> </div>
        <div class="content">
          <? the_content() ?>
        </div>
      </div>
    </section>


  <?php include('template-parts/form-section.php') ?>


    </main>
	</main>
	

<?php

get_footer();
