<?php get_header() ?>
<main class="main">
  <?php include('template-parts/breadcrumbs.php') ?>
  <?php if (have_rows('qr') ) : ?>
  <div class="qr">
    <div class="container">
        <h1 class="hero__title mb-5"><?php the_title() ?></h1>
        <div class="qr-wrapper">
          <div class="row">
            <?php while( have_rows('qr') ) : the_row() ;
            $image = get_sub_field('image');
            $title = get_sub_field('title');
             ?>
            <div class="col-sm-6 col-md-4 mb-5">
              <img class="qr-image" src="<?= $image['url']?>" alt="<?= $title?>">
              <p class="qr-title"><?= $title?></p>
            </div>
            <?php endwhile ?>
          </div>
        </div>
      
    </div>
  </div>
  <?php endif; ?>
</main>
<?php get_footer() ?>