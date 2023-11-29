<?php get_header() ?>
<main class="main">
  <?php include('template-parts/breadcrumbs.php') ?>
  
  <div class="qr">
    <div class="container">
        <h1 class="hero__title mb-5"><?php the_title() ?></h1>
        <div class="content">
          <?php the_content() ?>
        </div>      
    </div>
  </div>
</main>
<?php get_footer() ?>