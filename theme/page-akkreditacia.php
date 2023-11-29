<?php get_header() ?>
  <main class="main">
    <?php include ('template-parts/breadcrumbs.php') ?>

    <section class="hero">
      <div class="container">
        <div class="hero__wrapper row">
          <div class="order-md-1 order-2 col-md-6" data-aos="fade-right">
            <div class="hero__info --svg__hero-bg">
              <h1 class="hero__title">
               <?php the_field('hero_title') ?>
              </h1>
              <?php if(get_field('hero_descr')) : ?>
              <div class="hero__text"><?php the_field('hero_descr') ?></div>
              <?php endif ?>
              <div class="hero__buttons">
                
                <button class="hero__btn btn" data-src="#popup" data-fancybox>Получить бесплатную консультацию</button>
              </div>
              
            </div>
          </div>
          <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
            <?php $hero_image = get_field('hero_image');
            if  ( !empty($hero_image) ) : ?>
            <div class="hero__image"><img src="<?= $hero_image['url']?>" alt="<?= $hero_image['alt']?>" /></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>


    <section class="dropdown-section">
      <div class="container">
        <h2 class="dropdown-section__title section-title"><?php the_field('faq_title') ?></h2>
        <?php if (get_field('faq_descr') ) : ?>
        <p class="dropdown-section__text"><?php the_field('faq_descr') ?></p>
        <?php endif; ?>
        <?php if (have_rows('dropdown')) : 
          while (have_rows('dropdown')) : the_row();
          $question = get_sub_field('question');
          $answer = get_sub_field('answer');
          ?>
        <div class="dropdown" data-aos="fade-down">
          <div class="dropdown__title">
            <p><?=  $question ?></p>
            <div class="dropdown__arrow --svg__arrow"></div>
          </div>
          <div class="dropdown__body">
            <div class="content">
              <?=  $answer ?>
            </div>
          </div>
        </div>
        <?php endwhile;
        endif; ?>
      </div>
    </section>
   

    <section class="follow">
      <div class="container">
        <h2 class="follow__title section-title">
         <?php the_field('follow_title') ?>
        </h2>
        <?php if ( have_rows('follow_list') ) : 
          $delay = 0;
        ?>
        <div class="row">
          <?php while ( have_rows('follow_list') ) : the_row();
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $descr = get_sub_field('descr');
            $price = get_sub_field('price');
          ?>
          <div class="col-md-4 mb-3 mb-md-0" data-aos="fade-down" data-aos-delay="<?= $delay; ?>">
            <div class="follow-item">
              <div class="follow-item__title">
                <?= $title ?>
              </div>
              
              <?php if ($subtitle) : ?>
                <div class="follow-item__time"><?= $subtitle ?></div>
              <?php endif ?>
              <div class="follow-item__text">
                <?= $descr ?>
              </div>
              <?php if ($price) : ?>
              <div class="follow-item__price"><?= $price . '₽' ?></div>
              <?php endif; ?>
              <button class="follow-item__btn btn btn--colored" data-fancybox data-src="#popup" data-title="<?= $title ?>">Оставить
                заявку</button>
            </div>
          </div>
          <?php $delay++;
          endwhile; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="process --svg__steps-bg">
      <div class="container">
        <h2 class="process__title section-title">
          <? the_field('process_title');?>
        </h2>
        <?php if (have_rows('process_list')) : 
          $delay = 0;
          $count = 1; ?>       
        <div class="row">
          <? while (have_rows('process_list')) : the_row();
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          ?>
          <div class="col-lg-3 col-md-6 mb-3 mb-lg-0" data-aos="fade-down" data-aos-delay="<?= $delay ?>">
            <div class="process-item">
              <div class="process-item__title"><?= $title ?></div>
              <div class="process-item__text">
                <p><?= $text ?></p>
              </div>
              <div class="process-item__num"><?= '0' . $count ?></div>
            </div>
          </div>
          <? $delay += 100;
          $count++;
          endwhile; ?>
        </div>
        <?php endif; ?>
        <button class=" process__btn btn " data-src="#popup" data-fancybox> Оставить заявку</button>
      </div>
    </section>

    <section class="types ">
      <div class="container">
        <h2 class="types__title section-title"><? the_field('types_title')?></h2>
        <?php if (have_rows('types_list')) : 
        while (have_rows('types_list')) : the_row();
          $title = get_sub_field('title');
          $column_count = get_sub_field('column_count');
          $col_1 = get_sub_field('col_1');
          $col_2 = get_sub_field('col_2'); 
        ?>
        <div class="types-item" data-aos="fade-down">
          <? if ($title) :?>
            <p class="types-item__title"><?= $title?></p>
          <? endif ?>
          <div class="types-item__content row gx-5">
            <?php if ($column_count == 2 ) : ?>
            <div class="col-md-6 mb-3 mb-md-0">
             <?= $col_1 ?>
            </div>
            <div class="col-md-6 mb-3 mb-md-0">
              <?= $col_2 ?>
            </div>
            <? else: ?>
            <div class="mb-3 mb-md-0">
             <?= $col_1 ?>
            </div>
            <? endif ?>
          </div>
        </div>
        <?php endwhile;
        endif; ?>

      </div>
    </section>
    <section class="reestr">
      <div class="container">
        <div class="row d-flex align-items-end">
          <div class="col-md-6">
            <h2 class="reestr__title section-title"><? the_field('reestr_title')?></h2>
          </div>
          <div class="col-md-6">
            <?php if ( get_field('reestr_file') ) : ?>
            <a href="<? the_field('reestr_file') ?>" download class="reestr__btn btn"><? the_field('reestr_btn_text')?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <?php include('template-parts/certificates.php') ?>

    <?php include('template-parts/form-section.php') ?>
    <?php if ( get_field('content')) : ?>
    <div class="content" data-aos="fade-down">
      <div class="container">
      <?php the_field('content') ?>
      </div>
    </div>
    <?php endif; ?>
  </main>
<?php get_footer() ?>