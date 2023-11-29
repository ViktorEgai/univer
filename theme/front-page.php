<?php get_header() ?>
<main class="main">
		<div class="hero-slider">
      <?php if ( have_rows('hero_slider') ) : 
        $slide_count = 0;
        while( have_rows('hero_slider') ) : the_row(); 
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        ?>
			<div class="hero-slider__item">
				<section class="hero">
          <div class="container">
            <div class="hero__wrapper row">
              <div class="order-md-1 order-2 col-md-6" data-aos="fade-right">
                <div class="hero__info --svg__hero-bg">
                  <?php if( $slide_count == 0) : ?>
                    <h1 class="hero__title"><?= $title ; ?></h1>
                  <?php else: ?>
                    <div class="hero__title"><?= $title ; ?></div>
                  <?php endif; ?>
                  <?php if ($text) : ?>
                  <div class="hero__text"><?= $text ?></div>
                  <?php endif; ?>
                  <div class="hero__buttons">
                    
                    <a href="/courses/" class="hero__btn btn btn--transparent">Выбрать направление</a>
                    
                    <button class="hero__btn btn" data-src="#popup" data-fancybox>Оставить заявку</button>
                  </div>
                  
                </div>
              </div>
              <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
                <div class="hero__image">
                  <img src="<?= $image['url']?>" alt="<?= $image['alt']?>" />
                </div>
              </div>
            </div>
          </div>
        </section>

			</div>
      <?php $slide_count++;
        endwhile; ?>
      <?php endif ?>
		</div>

    <section class="advantages">
      <div class="container">
        <h2 class="advantages__title section-title"><?php the_field('advantages_title') ?></h2>
        <?php if ( have_rows('advantages_list') ) :
          $delay = 0; ?>
        <div class="advantages__wrapper row ">
          <?php while( have_rows('advantages_list') ) : the_row(); 
            $icon = get_sub_field('icon');
            $text = get_sub_field('text');
          ?>
          <div class="col-md-6 col-lg-3 col-12 mb-3 mb-lg-0" data-aos="fade-down" data-aos-delay="<?= $delay ?>">
            <div class="advantages-item ">
              <div class="advantages-item__inner">
                <div class="advantages-item__icon">
                  <?php if (!empty($icon)) : ?>
                  <img src="<?= $icon['url']?>" alt="<?= $icon['alt']?>">
                  <?php endif ?>
                </div>
                <div class="advantages-item__title"><?= $text ?></div>
              </div>
            </div>
          </div>
         
          <?php $delay += 100;
          endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="steps --svg__steps-bg">
      <div class="container">
        <h2 class="steps__title section-title"><?php the_field("steps_title") ?></h2>
         <?php if ( have_rows('steps_list') ) :
          $delay = 0;
          $steps_count = 1; ?>
        <div class="steps__wrapper row">
          <?php while( have_rows('steps_list') ) : the_row(); 
          $text = get_sub_field('text'); ?>
          <div class="steps-item col-md-6 col-lg-3 col-12 mb-3 mb-lg-0" data-aos="fade-down" data-aos-delay="<?= $delay; ?>">
            <div class="steps-item__inner">
              <div class="steps-item__num"><?= '0'. $steps_count; ?></div>
              <div class="steps-item__title"><?= $text ?></div>
            </div>
          </div>
          <?php $delay += 100;
            $steps_count++; 
          endwhile; ?>
      
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php 
        // параметры по умолчанию
        $reviews = get_posts( array(
          'numberposts' => -1,          
          'post_type'   => 'reviews',
          
        ) );

        global $post;?>

        
    <section class="reviews">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <h2 class="reviews__title section-title">
              <?php the_field('reviews_title') ?>
            </h2>
            <?php if (get_field('reviews_descr')) : ?>
              <div class="reviews__text"><? the_field('reviews_descr') ?></div>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <div class="reviews-thumbs">
              <img src="<?= get_template_directory_uri(  )?>/img/reviews-dots.svg" alt="">
              <? $image_count = 0;
               foreach( $reviews as $post ){
                setup_postdata( $post ); 
                  if ($image_count < 3) {
                      $reviews_image = get_field("reviews_image");
                    if ( !empty ($reviews_image)) :
                    echo '<img src="'. $reviews_image['url'] .'" alt="'. get_the_title() .'">';
                    endif;
                  }
                $image_count++;
              } ?>
            </div>
          </div>
        </div>
        
        <div class="reviews-slider" data-aos="fade-down">
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
    
    <section class="docs">
      <div class="container">
        <h2 class="docs__title section-title">
          <?php the_field('doc_title') ?>
        </h2>
        <?php if ( have_rows('doc_list') ) :
        $delay = 0; ?>
        <div class="docs__wrapper row">
          <?php while( have_rows('doc_list') ) : the_row(); 
          $descr = get_sub_field('descr'); 
          $title = get_sub_field('title'); 
          $image = get_sub_field('image'); ?> 
          <div class="docs-item mb-4 mb-lg-0 col-lg-3 col-6" data-aos="fade-down" data-aos-delay="0">
            <?php if ( !empty($image)) : ?>
            <div class="docs-item__image">
              <img src="<?= $image['url'] ?>" alt="<?= $title ?>">
            </div>
            <?php endif; ?>
            <div class="docs-item__title"><?= $title ?></div>
            <?php if ( $descr) : ?>
            <div class="docs-item__text">
              <?= $descr ?> 
            </div>
            <?php endif; ?>
          </div>
          <?php $delay+=100;
          endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="prepair">
      <div class="container">
        <div class="prepair__wrapper row">
          <div class="prepair__image col-md-6 mb-4 mb-md-0" data-aos="fade-right">
            <?php $prepair_image = get_field("prepair_image");
            if ( !empty($prepair_image) ) : ?>
            <img src="<?= $prepair_image['url'] ?>" alt="<?= $prepair_image['alt'] ?>">
            <?php endif; ?>
          </div>
          <div class="prepair__info col-md-6" data-aos="fade-left">
            <h2 class="prepair__title section-title"><?php the_field('prepair_title') ?></h2>
            <?php if ( have_rows('prepair_list') ) : ?>
            <ul class="prepair-list">
              <?php while( have_rows('prepair_list') ) : the_row(); 
              $text = get_sub_field('text'); ?>
              <li class="prepair-list__item "><?= $text ?></li>
              
              <?php endwhile ?>
            </ul>
            <?php endif ?>
            <button class="prepair__btn btn btn--colored" data-src="#popup" data-fancybox data-title="Получить подробности сопровождения">Получить подробности сопровождения</button>
          </div>
        </div>	
      </div>
    </section>

    <section class="help" data-aos="fade-down">
      <div class="container">
        <h2 class="help__title section-title">
          <?php the_field('help_title') ?>
        </h2>
        <?php if ( have_rows('help_list') ) : ?>
        <div class="help__wrapper row">
          <?php while( have_rows('help_list') ) : the_row(); 
              $text = get_sub_field('text'); ?>
          <div class="help-item col-md-6 ">
            <?= $text; ?>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    
    <?php include('template-parts/certificates.php') ?>
    
    <section class="news">
      <div class="container">
        <h2 class="news__title section-title">
          Новости
        </h2>
        
        <div class="news__wrapper row" fade-aos="fade-down">
          <?php 
        // параметры по умолчанию
        $news = get_posts( array(
          'numberposts' => 3,          
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
        <a href="/news/" class="news__btn btn "> Все новости</a>
      </div>
    </section>
    
    <?php include('template-parts/form-section.php') ?>
  


	</main>
<?php get_footer() ?>