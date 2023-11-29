<?php 
//Template name: Поступающим
get_header() ?>
    <main class="main">

      <?php include('template-parts/breadcrumbs.php') ?>


      <section class="hero">
        <div class="container">
          <div class="hero__wrapper row">
            <div class="order-md-1 order-2 col-md-6" data-aos="fade-right">
              <div class="hero__info --svg__hero-bg">
                <h1 class="hero__title">
                  <?php the_title() ?>
                </h1>
                
                <div class="hero__text"><?php the_field('hero_descr') ?></div>
                
                <div class="hero__buttons">
                  
                  <button class="hero__btn btn" data-src="#popup" data-fancybox>Получить бесплатную консультацию</button>
                </div>
                
              </div>
            </div>
            <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
              <?php $hero_image = get_field('hero_image');
              if( !empty($hero_image)) : ?>
              <div class="hero__image"><img src="<?= $hero_image['url']?>" alt="<?= $hero_image['alt']?>" /></div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </section>


      <section class="num-list">
        <div class="container">
          <h2 class="num-list__title section-title"><?php the_field('numn_title') ?></h2>
          <?php if( have_rows('num_list')) :
            $delay = 0;
            $list_count = 1; ?>
            <div class="row">
              <?php while( have_rows('num_list') ) : the_row();
              $text = get_sub_field('text'); ?>
              <div class="col-md-6 mb-3" data-aos="fade-down" data-aos-delay="0">
                <div class="num-list-item">
                  <div class="num-list-item__num"><?= '0'. $list_count;?></div>
                  <div class="num-list-item__content content">
                    <?= $text; ?>
                  </div>
                </div>
              </div>             
              <?php $list_count++;
              $delay +=100;
              endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>

      <?php include('template-parts/documents.php') ?>


      <section class="dropdown-section"> 
        <div class="container">
          <h2 class="dropdown-section__title section-title"><?php the_field('dropdown_title') ?></h2>
          <?php if( have_rows('dropdown_list')) : 
            while(have_rows('dropdown_list')) : the_row(); 
            $title = get_sub_field('title')?>
          <div class="dropdown" data-aos="fade-down" >
            <div class="dropdown__title">
              <p><?= $title ?></p>
              <div class="dropdown__arrow --svg__arrow"></div>
            </div>
            <div class="dropdown__body">
              <div class="content">
                <? if ( have_rows ('docs') ) : ?>
                  <ul class="doc-list">
                  <?while ( have_rows ('docs') ) : the_row();
                  $file = get_sub_field('file');
                  $name = get_sub_field('name');
                    ?>
                  
                    <li class="doc-list__item">
                      <a href="<?= $file ?>" class="--svg__doc-before" target="_blank"><?= $name ?></a>
                    </li>

                  <? endwhile;  ?>
                  </ul>

                <? endif;?>
              </div>
            </div>
          </div>
            <?php endwhile;
            endif; ?>
        </div>
      </section>

      
      <?php include('template-parts/payment.php') ?>


      <section class="info-block">
        <div class="container">
          <div class="row">
            <?php 
            $info_title = get_field('info_title');
            $info_image = get_field('info_image');
            $info_text = get_field('info_text');
            ?>
            <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right" >
              <?php if (!empty($info_image) ) : 
                echo '<img class="info-block__image" src="'. $info_image['url'] .'" alt="'. $info_image['alt'] .'">' ;
              endif;?>              
            </div>
            <div class="col-md-6" data-aos="fade-left" >
              <div class="info-block__descr">
                <h2 class="info-block__title section-title"><?= $info_title ?></h2>
                <div class="info-block__content content">
                <?= $info_text ?>             
                </div>
                <button class="info-block__btn btn" data-src="#popup" data-fancybox>Получить консультацию</button>
              </div>
            </div>
          </div>
        </div>
      </section>   
      <?php include('template-parts/form-section.php') ?>


    </main>
<?php get_footer() ?>