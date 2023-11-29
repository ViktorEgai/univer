<section class="payment">
  <div class="container">
    <h2 class="payment__title section-title"><?php the_field('payment_title', 'options') ?></h2>
    <?php if( have_rows('payment_list', 'options')) :   ?>
    <div class="payment-slider">
      <?php while( have_rows('payment_list', 'options') ) : the_row();
        $icon = get_sub_field('icon'); 
        $title = get_sub_field('title');
        $descr = get_sub_field('descr');
          ?>
      <div class="payment-slider__item">
        <div class="payment-slider__inner">
          <div class="payment-slider__item-icon">
            <?php if (!empty($icon) ) : 
            echo '<img src="'. $icon['url'] .'" alt="">';
            endif;?>
          </div>
          <div class="payment-slider__item-title"><?= $title ?></div>
          <div class="payment-slider__item-text">
            <?= $descr ?>
          </div>
        </div>
      </div>
      
      <?php endwhile ?>
    </div>
    <?php endif; ?>
  </div>
</section>