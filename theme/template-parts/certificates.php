<section class="certificates">
      <div class="container">
        <h2 class="certificates__title section-title"><? the_field('certificates_title')?></h2>
        <?php 
          $certificates_gallery = get_field('certificates_gallery');
          if( $certificates_gallery ): ?>
            <div class="certificates__wrapper row">
              <?php foreach( $certificates_gallery as $image ): ?>
                
                <a href="<?php echo esc_url($image['url']); ?>" class="certificates-item mb-4  mb-md-0 col-md-4 col-6" data-fancybox="gallery">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                    
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        
      </div>
    </section>