 <section class="certificates">
    <div class="container">
      <h2 class="certificates__title section-title">Образцы выдаваемых документов</h2>
        <?php 
          $docs_gallery = get_field('doc_gallery', 'options');
          if( $docs_gallery ): ?>
            <div class="certificates__wrapper row" data-aos="zoom-in">
              <?php foreach( $docs_gallery as $image ): ?>
                
                <a href="<?php echo esc_url($image['url']); ?>" class="certificates-item mb-4  mb-md-0 col-md-4 col-6" data-fancybox="gallery">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                    
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
    </div>
  </section>

