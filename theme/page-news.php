<?php get_header() ?>
<main class="main">
  <?php include('template-parts/breadcrumbs.php') ?>
  
   <section class="news">
      <div class="container">
        <h1 class="news__title section-title">
          <?php the_title() ?>
        </h1>
        
        <div class="news__wrapper row" fade-aos="fade-down">
          <?php 
        // параметры по умолчанию
        $news = get_posts( array(
          'numberposts' => -1,          
          'post_type'   => 'news',
          
        ) );

        global $post;

        foreach( $news as $post ){
          setup_postdata( $post ); ?>

          <div class="news-item col-md-4 mb-4 mb-md-0">
              <a href="<? the_permalink() ?>" class="news-item__thumb"><?php the_post_thumbnail('medium') ?></a>
              <a href="<? the_permalink() ?>" class="news-item__title">
               <?php the_title() ?>
              </a>
              <div class="news-item__date"> <?= get_the_date('d.m.Y') ?> </div>
            </div>

        <? }

        wp_reset_postdata(); // сброс
        
        ?>
        </div>
        
      </div>
    </section>
    
</main>
<?php get_footer() ?>