<?php get_header() ?>

    <main class="main">
      <?php include('template-parts/breadcrumbs.php') ?>


      <section class="hero">
        <div class="container">
          <div class="hero__wrapper row">
            <div class="order-md-1 order-2 col-md-6" data-aos="fade-right">
              <div class="hero__info --svg__hero-bg">
                <h1 class="hero__title">
                  <?php the_field('hero_title') ?>
                </h1>
                
                <div class="hero__text"><?php the_field('hero_descr') ?></div>
                
              </div>
            </div>
            <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
              <div class="hero__image">
                <?php $hero_image = get_field("hero_image");
                if ( !empty($hero_image) ) :
                  echo '<img src="'.$hero_image['url'].'" alt="'.$hero_image['alt'].'">'; 
                endif ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="courses-search">
        <div class="container">
          <?= do_shortcode( '[ivory-search id="721" title="Поиск курсы"]') ?>
        </div>
      </div>
      
      <section class="speciality">
        <div class="container">
          <h2 class="speciality__title section-title">Специальности</h2>
          <div class="speciality-dropdown " data-aos="fade-down" id="education-level">
            <div class="speciality-dropdown__title">
              <p>Выберете уровень образования</p>

              <div class="speciality-dropdown__arrow --svg__arrow"></div>
            </div>
            <div class="speciality-dropdown__body ">
              <div class="row">                
                <?php
                $args = [
                  'taxonomy'      => [ 'speciality' ],
                  'parent'         => '0',
                ];
                $terms = get_terms( $args );

                foreach( $terms as $term ){ ?>
                  <div class=" col-sm-6 col-md-4 col-lg-3 mb-2 mb-lg-4">
                  <a href="#" class="speciality-item" data-term-id="<?= $term->term_id?>">
                    <p class="speciality-item__title">
                    <?= $term->name?>
                    </p>  
                  </a>
                </div>
                <? } ?>
              </div>
            </div>
          </div>
          <div class="speciality-dropdown" data-aos="fade-down" id="speciality">
            <div class="speciality-dropdown__title">
              <p>Выберете специальность</p>
               
              <div class="speciality-dropdown__arrow --svg__arrow"></div>
            </div>
            <div class="speciality-dropdown__body ">
              <div class="speciality-dropdown__notice">
                Выберите уровень образования
              </div>
            </div>
          </div>
          <div class="speciality-dropdown" data-aos="fade-down" id="course">
            <div class="speciality-dropdown__title">
              <p>Выберете тип курса</p>

              <div class="speciality-dropdown__arrow --svg__arrow"></div>
            </div>
            <div class="speciality-dropdown__body ">
              <div class="speciality-dropdown__notice">
                Выберите специальность
              </div>
            </div>
          </div>
        </div>

      </section>

      <section class="content" data-aos="zoom-in">
        <div class="container">
         <?php the_field('content') ?>
        </div>
      </section>

     
<?php include('template-parts/documents.php') ?>


<?php include('template-parts/form-section.php') ?>


    </main>
   <?php get_footer() ?>