<?php get_header() ?>
<main class="main">
  <?php include('template-parts/breadcrumbs.php') ?>
  

  <?php 
        // параметры по умолчанию
        $reviews = get_posts( array(
          'numberposts' => -1,          
          'post_type'   => 'reviews',
          
        ) );

        global $post;?>
    <section class="reviews">
      <div class="container">
       
          
        <h1 class="reviews__title section-title mb-5">
          <?php the_title() ?>
        </h1>
        
     
    
        
        <div class="reviews-page" data-aos="fade-down">
         <? foreach( $reviews as $post ){
          setup_postdata( $post ); ?>

          <div class="reviews-slider__item">
            <div class="reviews-slider__info">
              <div class="reviews-slider__photo">
                <?php $reviews_image = get_field("reviews_image");
                if ( !empty ($reviews_image)) :
                echo '<img src="'. $reviews_image['url'] .'" alt="'. get_the_title() .'">';
                endif;
                 ?>
              </div>
              <div>
                <div class="reviews-slider__name"><? the_title() ?></div>
                <?php $reviews_link = get_field('reviews_link') ?>

                <a href="<?=  $reviews_link['url']?>" class="reviews-slider__link"><?=  $reviews_link['title']?></a>
              </div>
            </div>
            <div class="reviews-slider__text"><?php the_content() ?></div>
            <div class="reviews-slider__date"><?= get_the_date('d.m.Y')?>г.</div>
          </div>

          <? }

          wp_reset_postdata(); // сброс
          
          ?>
         
         
        </div>

        <button class="btn  reviews__btn" data-src="#popup-review" data-fancybox>Оставить свой отзыв</button>
      </div>
    </section>
    
</main>
<?php get_footer() ?>