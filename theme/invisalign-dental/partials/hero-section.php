<?php
$headline      = get_theme_mod('hero_headline', 'Invisalign® clear braces for children (age 6 - 11) & teens in york');
$card_title    = get_field('hero_card_title');
$raw_benefits  = get_field('hero_benefits');
$benefits      = $raw_benefits ? array_filter(array_map('trim', explode("\n", $raw_benefits))) : [];
$cta_text      = get_field('hero_card_cta_text') ?: 'BOOK A FREE CONSULTATION';
$cta_url       = get_field('hero_card_cta_url')  ?: '#';
$rating_text   = get_field('hero_rating_text')   ?: 'RATED 5.0 GOOGLE REVIEWS';
$rating_stars  = intval(get_field('hero_rating_stars')) ?: 5;
$price_top     = get_field('hero_price_top');
$price_bottom  = get_field('hero_price_bottom');
$hero_image    = get_field('hero_image');
$hero_image_alt = get_field('hero_image_alt');
function render_hero_card($card_title, $benefits, $cta_text, $cta_url, $price_top, $price_bottom, $rating_text, $rating_stars, $is_modal = false) {
  ?>
  <div class="hero-card-wrap">
    <div class="hero-card">
      <h2 class="hero-card__title"><?php echo esc_html($card_title); ?></h2>
      <ul class="hero-card__list">
        <?php foreach ($benefits as $item): ?>
          <li class="hero-card__item"><?php echo esc_html($item); ?></li>
        <?php endforeach; ?>
      </ul>
      <a href="<?php echo esc_url($cta_url); ?>"
         class="btn hero-card__cta <?php echo $is_modal ? 'yd-open-modal' : 'js-open-modal'; ?>"
         aria-controls="yd-modal-overlay"
         aria-expanded="false">
        <?php echo esc_html($cta_text); ?>
      </a>
    </div>
    <?php if ($price_top || $price_bottom): ?>
      <div class="hero-price-tag">
        <?php if ($price_top): ?><div class="hero-price-tag__top"><?php echo esc_html($price_top); ?></div><?php endif; ?>
        <?php if ($price_top && $price_bottom): ?><div class="hero-price-tag__divider"></div><?php endif; ?>
        <?php if ($price_bottom): ?><div class="hero-price-tag__bottom"><?php echo esc_html($price_bottom); ?></div><?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="hero-card-rating">
      <div class="rating-row">
        <?php for ($i = 0; $i < $rating_stars; $i++): ?><span class="star">★</span><?php endfor; ?>
        <div class="rating-divider"></div>
      </div>
      <div class="rating-text"><?php echo esc_html($rating_text); ?></div>
    </div>
  </div>
  <?php
}
?>
<section class="hero">
  <div class="hero-strip hero-strip--desktop">
    <?php get_template_part('partials/hero-strip'); ?>
  </div>

  <div class="hero-main-bg" style="background-color: #bcb4ad; background-repeat: no-repeat; background-position: right top; background-size: 50% auto;">
    <div class="container hero-main hero-desktop">
      <div class="hero-content">
        <?php if ($headline): ?><h1 class="hero-title"><?php echo esc_html($headline); ?></h1><?php endif; ?>
        <?php if ($card_title && $benefits): render_hero_card($card_title, $benefits, $cta_text, $cta_url, $price_top, $price_bottom, $rating_text, $rating_stars, true); endif; ?>
      </div>
      <?php if ($hero_image): ?>
        <div class="hero-visual">
          <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image_alt ?: $hero_image['alt']); ?>">
        </div>
      <?php endif; ?>
    </div>
    <div class="container hero-main hero-mobile">
      <div class="hero-content">
        <?php if ($headline): ?><h1 class="hero-title"><?php echo esc_html($headline); ?></h1><?php endif; ?>
        <?php if ($hero_image): ?>
          <div class="hero-visual">
            <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image_alt ?: $hero_image['alt']); ?>">
          </div>
        <?php endif; ?>
        <?php if ($card_title && $benefits): render_hero_card($card_title, $benefits, $cta_text, $cta_url, $price_top, $price_bottom, $rating_text, $rating_stars); endif; ?>
      </div>
      <div class="hero-strip hero-strip--mobile">
        <?php get_template_part('partials/hero-strip'); ?>
        <div class="hero-card-rating--mobile">
          <div class="rating-row">
            <div class="rating-divider"></div>
            <?php for ($i = 0; $i < $rating_stars; $i++): ?><span class="star">★</span><?php endfor; ?>
          </div>
          <div class="rating-text"><?php echo esc_html($rating_text); ?></div>
        </div>
      </div>
    </div>
  </div>
</section>