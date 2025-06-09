<?php
$testi = new WP_Query([
  'post_type'      => 'testimonial',
  'posts_per_page' => 3,
]);

if ( $testi->have_posts() ) : ?>
  <section id="testimonials" class="testimonials-section">
    <div class="container">
      <small class="section-label">TESTIMONIALS</small>
      <h2 class="section-title">What our patients say</h2>
      <div class="testi-grid">
        <?php while ( $testi->have_posts() ) : $testi->the_post(); 
          $rating   = get_field('rating')   ?: 5;
          $subtitle = get_field('subtitle');
        ?>
          <article <?php post_class('testi-item'); ?>>
            <div class="testi-header">
              <img 
                class="quote-icon" 
                src="<?php echo esc_url( get_template_directory_uri() . '/images/quote-icon.svg' ); ?>" 
                alt="Quote icon" />
              <span class="line"></span>
                <span class="star-rating">
                    <img
                    class="star-icon"
                     src="<?php echo esc_url( get_template_directory_uri() . '/images/star-icon.png' ); ?>"
                    alt="star icon"/>
                        <span class="testi-rating-text">
                            <?php echo esc_html( $rating . '/5' ); ?>
                         </span>
                </span>
            </div>
            <div class="testi-content">
              <?php the_content(); ?>
            </div>
            <?php if ( $subtitle ) : ?>
              <div class="testi-subtitle">
                <?php echo esc_html( $subtitle ); ?>
              </div>
            <?php endif; ?>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>
