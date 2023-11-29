<?php 
// Template name: Организациям 
get_header();
?>

<main class="main">

  <?php include( 'template-parts/breadcrumbs.php') ?>

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
              
              <button class="hero__btn btn" data-src="#popup" data-fancybox>Получить коммерческое предложение</button>
            </div>
            
          </div>
        </div>
        <div class="order-md-2 order-1 col-md-6 mb-3 mb-md-0" data-aos="fade-left">
          <div class="hero__image">
            <?php $hero_image = get_field('hero_image');
            if (!empty($hero_image)) :
              echo '<img src="'. $hero_image['url'] .'" alt="'. $hero_image['alt'] .'">';
            endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          <h2 ><?php the_field('org_title') ?></h2>
        </div>
        <div class="col-md-6">          
          <?php the_field('org_text') ?>          
        </div>
      </div>
    </div>
  </section>
    
  <section class="num-list">
    <div class="container">
      <h2 class="num-list__title section-title"><?php the_field('corp_title') ?></h2>
      <?php if ( have_rows('corp_list') ) : 
        $list_count = 1;
      ?>
      <div class="row">
        <?php while( have_rows('corp_list')) : the_row();
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        ?>
        <div class="col-md-6 mb-3">
          <div class="num-list-item">
            <div class="num-list-item__num"><?= '0'. $list_count ?></div>
            <div class="num-list-item__content content">
              <h3 class="num-list-item__title"><?= $title ?></h3>
              <p><?= $text ?></p>
            </div>
          </div>
        </div>
        <?php $list_count++;
        endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <?php include( 'template-parts/students.php') ?>
  <section class="num-list">
    <div class="container">
      <h2 class="num-list__title section-title"><? the_field('study_title') ?></h2>
       <?php if ( have_rows('study_list') ) : 
        $list_count = 1;
      ?>
      <div class="row">
        <?php while(  have_rows('study_list') ) : the_row();
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        ?>
        <div class="col-md-6 mb-3">
          <div class="num-list-item">
            <div class="num-list-item__num"><?= '0'. $list_count ?></div>
            <div class="num-list-item__content content">
              <h3 class="num-list-item__title"><?= $title ?></h3>
              <p><?= $text ?></p>
            </div>
          </div>
        </div>
        <?php $list_count++;
        endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <?php include('template-parts/payment.php') ?>


  <section class="variations">
  <div class="container">
    <h2 class="variations__title section-title"><? the_field('var_title') ?></h2>
     <?php if ( have_rows('var_list') ) : 
        $delay  = 0;
      ?>
    <div class="row">
       <?php while(  have_rows('var_list') ) : the_row();
        $title = get_sub_field('title');        
        $color = get_sub_field('color');        
        ?>
      <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-down" data-aos-delay="<?= $delay ?>">
        <div class="variations-item <?= $color ?>">
          <div class="variations-item__title"><?= $title; ?></div>
          <?php if(  have_rows('list') ) : ?>
          <ul class="variations-item__list">
            <?php while(  have_rows('list') ) : the_row();
              $text = get_sub_field('text');        
              ?>
            <li class="variations-item__list-item"><?= $text ?></li>
            <?php endwhile; ?>
          </ul>
          <?php endif ?>
          <a href="#" class="variations-item__btn btn " data-src="#popup" data-fancybox data-title="<?= $title; ?>">Узнать больше</a>
        </div>
      </div>

      <?php $delay+=100;
        endwhile; ?>
    </div>
     <?php endif; ?>
  </div>
  </section>

  <?php include( 'template-parts/form-section.php') ?>

</main>

<?php get_footer() ?>