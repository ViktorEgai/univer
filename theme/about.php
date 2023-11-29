<?php //Template name: Об университете 
get_header() ?>
    <main class="main">

      <?php include ('template-parts/breadcrumbs.php') ?>

      <div class="container  mb-4">
        <?php wp_nav_menu( ['theme_location' => 'about-nav-menu'] ) ?>
    
      </div>
     

      <section class="hero">
          <div class="container">
            <div class="hero__wrapper row">
              <div class="order-md-1 order-2 col-md-6" data-aos="fade-right">
                <div class="hero__info --svg__hero-bg">
                  <h1 class="hero__title">
                    <?php the_title() ?>
                  </h1>
                  <?php if ( get_field('hero_descr') ) : ?>
                  <div class="hero__text"><? the_field('hero_descr') ?></div>
                  <?php endif ?>
                  <?php if (get_field('btn_visibility')) : ?>
                  <div class="hero__buttons">
						
                    <a href="<? the_field('btn_link') ?>" class="hero__btn btn"><? the_field('btn_text') ?></a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
                <?php $hero_image = get_field('hero_image');
                if ( !empty($hero_image) ): ?>
                <div class="hero__image"><img src="<?= $hero_image['url']?>" alt="<?= $hero_image['url']?>" /></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>

      <?php if( have_rows('content_list')) : while( have_rows('content_list') ) : the_row(); 
      $column_count  = get_sub_field('column_count'); ?>
      <section class="content" data-aos="fade-down">
        <div class="container">
          <?php if ($column_count == 2 ) : ?>
          <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">

             <?php
              // Check value exists.
              if( have_rows('col_1') ):

                  // Loop through rows.
                  while ( have_rows('col_1') ) : the_row();

             
                      if( get_row_layout() == 'text' ):
                          $text = get_sub_field('text_field');

                          echo $text;

                     
                      elseif( get_row_layout() == 'files' ): 
                          if ( have_rows ('file_list') ) : ?>
                            <ul class="doc-list">
                            <?while ( have_rows ('file_list') ) : the_row();
                            $link = get_sub_field('link');
                            $name = get_sub_field('name');
                             ?>
                            
                              <li class="doc-list__item">
                                <a href="<?= $link ?>" class="--svg__doc-before" target="_blank"><?= $name ?></a>
                              </li>

                            <? endwhile;  ?>
                            </ul>

                          <? endif;
                      endif;

                  // End loop.
                  endwhile;
        
              endif; ?>

            </div>
            <div class="col-md-6">

              <?php
              // Check value exists.
              if( have_rows('col_2') ):

                  // Loop through rows.
                  while ( have_rows('col_2') ) : the_row();

             
                      if( get_row_layout() == 'text' ):
                          $text = get_sub_field('text_field');

                          echo $text;

                     
                      elseif( get_row_layout() == 'files' ): 
                          if ( have_rows ('file_list') ) : ?>
                            <ul class="doc-list">
                            <?while ( have_rows ('file_list') ) : the_row();
                            $link = get_sub_field('link');
                            $name = get_sub_field('name');
                             ?>
                            
                              <li class="doc-list__item">
                                <a href="<?= $link ?>" class="--svg__doc-before" target="_blank"><?= $name ?></a>
                              </li>

                            <? endwhile;  ?>
                            </ul>

                          <? endif;
                      endif;

                  // End loop.
                  endwhile;
        
              endif; ?>

            </div>
            <? else: ?>
              <div class="row">
                <div class=" mb-4 mb-md-0">
                  <?php
              // Check value exists.
              if( have_rows('col_1') ):

                  // Loop through rows.
                  while ( have_rows('col_1') ) : the_row();

             
                      if( get_row_layout() == 'text' ):
                          $text = get_sub_field('text_field');

                          echo $text;

                     
                      elseif( get_row_layout() == 'files' ): 
                          if ( have_rows ('file_list') ) : ?>
                            <ul class="doc-list">
                            <?while ( have_rows ('file_list') ) : the_row();
                            $link = get_sub_field('link');
                            $name = get_sub_field('name');
                             ?>
                            
                              <li class="doc-list__item">
                                <a href="<?= $link ?>" class="--svg__doc-before" target="_blank"><?= $name ?></a>
                              </li>

                            <? endwhile;  ?>
                            </ul>

                          <? endif;
                      endif;

                  // End loop.
                  endwhile;
        
              endif; ?>

                </div>
            
            <?endif;?>
          </div>
        </div>
      </section>
      <?php endwhile;
      endif; ?>

      <?php if (get_field('cert_visibility')) : ?>
      <section class="certificates">
        <div class="container">
          <h2 class="certificates__title section-title"><? the_field('cert_title') ?></h2>
          <?php 
          $cert_gallery = get_field('cert_gallery');
          if( $cert_gallery ): ?>
          <div class="certificates__wrapper row">
            <?php foreach( $cert_gallery as $image ): ?>
            <a href="<?php echo esc_url($image['url']); ?>" class="certificates-item mb-4  mb-md-0 col-md col-6"
              data-fancybox="gallery">
              <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">

            </a>
            
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>

 <?php include ('template-parts/form-section.php') ?>


    </main>
<?php get_footer() ?>