<?php get_header() ?>
<main class="main">
    <?php include('template-parts/breadcrumbs.php') ?>

   <section class="dropdown-section">
      <div class="container">
        <h1 class="dropdown-section__title section-title"><?php the_title() ?></h1>
        <?php if (get_field('faq_descr') ) : ?>
        <div class="dropdown-section__text"><?php the_field('faq_descr') ?></div>
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
</main>
<?php get_footer() ?>