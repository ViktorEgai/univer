<?php 

add_action( 'wp_ajax_show_speciality', 'show_speciality' );
add_action( 'wp_ajax_nopriv_show_speciality', 'show_speciality' );

function show_speciality() {
  $term_id = $_POST['term_id']; 
  $args = [
    'taxonomy'      => [ 'speciality' ],
    'child_of'      => $term_id,
  ];
  $terms = get_terms( $args ); ?>
  <div class="row">
    <? foreach( $terms as $term ){
      $query = new WP_Query( array( 
        'speciality' => $term->slug,
        'post_status' => 'publish'
        ) );
        $post_count =  $query->found_posts;
      ?>
      <div class=" col-sm-6 col-md-4 col-lg-3 mb-2 mb-lg-4">
      <a href="#" class="speciality-item" data-term-id="<?= $term->term_id?>">
        <p class="speciality-item__title">
        <?= $term->name?>
        </p>  
        <span class="speciality-item__count"><?php echo declOfNum($post_count, array('курс', 'курса', 'курсов') ) ?></span>
      </a>
    </div>
    <? } ?>
  </div>
  <?
  wp_die();
}



add_action( 'wp_ajax_show_courses', 'show_courses' );
add_action( 'wp_ajax_nopriv_show_courses', 'show_courses' );

function show_courses() {
  $term_id = $_POST['term_id']; 
  $args = [
    'taxonomy'      => [ 'speciality' ],
    'child_of'      => $term_id,
  ];
  $terms = get_terms( $args ); ?>
  <div class="row">                
      <?php 
      $courses = get_posts( array(
        'numberposts' => -1,
        
        'post_type'   => 'catalog',
        'tax_query' => array(
          array(
            'taxonomy' => 'speciality',
            'field' => 'term_id', 
            'terms' =>  $term_id, 
            'include_children' => false
          )
        ) 
      ));

      global $post;

      foreach( $courses as $post ){
        setup_postdata( $post );                 ?>
        <div class=" col-sm-6 col-md-4 col-lg-3 mb-2 mb-lg-4">
        <a href="<?the_permalink()?>" class="speciality-item" >
          <p class="speciality-item__title">
          <? the_title() ?>
          </p>  
        </a>
      </div>
      <?
      }

      wp_reset_postdata(); // сброс ?>
    </div>
  <?
  wp_die();
}

