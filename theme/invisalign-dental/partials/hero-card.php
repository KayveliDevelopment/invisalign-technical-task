<?php
  $title    = get_field('hero_card_title');
  $raw      = get_field('hero_benefits') ?: '';
  $lines    = array_filter(array_map('trim',explode("\n",$raw)));
  $cta_text = get_field('hero_card_cta_text') ?: 'BOOK A FREE CONSULTATION';
  $cta_url  = get_field('hero_card_cta_url')  ?: '#';
?>
<?php if ( $title && $lines ) : ?>
  <div class="hero-card">
    <h2 class="hero-card__title"><?php echo esc_html($title); ?></h2>
    <ul class="hero-card__list">
      <?php foreach($lines as $li): ?>
        <li class="hero-card__item"><?php echo esc_html($li); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="<?php echo esc_url($cta_url); ?>"
       class="btn hero-card__cta yd-open-modal">
      <?php echo esc_html($cta_text); ?>
    </a>
  </div>
<?php endif; ?>