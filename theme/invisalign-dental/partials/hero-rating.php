<?php
  $text  = get_field('hero_rating_text')  ?: 'RATED 5.0 GOOGLE REVIEWS';
  $stars = get_field('hero_rating_stars') ?: 5;
?>
<div class="hero-rating-bar">
  <div class="container hero-rating-bar__inner">
    <div class="hero-rating-bar__stars">
      <?php for($i=0;$i<$stars;$i++) echo '<span class="star">★</span>'; ?>
    </div>
    <div class="hero-rating-bar__text"><?php echo esc_html($text); ?></div>
  </div>
</div>
