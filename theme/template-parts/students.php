
  <section class="students">
    <div class="container">
      <h2 class="students__title section-title"><? the_field('student_title', 'options')?> </h2>
      <?php 
        $images = get_field('student_gallery','options');
        if( $images ): ?>
            <div class="students-slider">
                <?php foreach( $images as $image ): ?>
                    
                  <div class="students-slider__item">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <p><?php echo esc_attr($image['alt']); ?></p>
                  </div>
                        
                <?php endforeach; ?>
                </div>
        <?php endif; ?>
            
    </div>
  </section>