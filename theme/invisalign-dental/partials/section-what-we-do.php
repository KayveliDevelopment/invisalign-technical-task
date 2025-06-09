<?php
  $sub      = get_field('wwd_subtitle');
  $title    = get_field('wwd_title');
  $intro    = get_field('wwd_intro');
  $h2       = get_field('wwd_secondary_heading');
  $para2    = get_field('wwd_secondary_paragraph');
  $btn      = get_field('wwd_button_text');
  $img_data = get_field('wwd_illustration');
  if ( ! empty( $img_data ) ) {
    $img_url = $img_data['sizes']['large'] ?? $img_data['url'];
    $img_alt = $img_data['alt'] ?? '';
  }
?>
<?php if ( $title || $intro || ! empty( $img_data ) ) : ?>
  <section class="what-we-do">
    <div class="container">
      <div class="what-we-do__grid">
        <div class="what-we-do__content">
          <div class="what-we-do__header">
            <?php if ( $sub ) : ?>
              <span class="what-we-do__pretitle"><?= esc_html( $sub ) ?></span>
            <?php endif; ?>
            <?php if ( $title ) : ?>
              <h2 class="what-we-do__title"><?= esc_html( $title ) ?></h2>
            <?php endif; ?>
          </div>
          <div class="what-we-do__text">
            <?= $intro ?>
            <?php if ( $h2 ) : ?>
              <h3 class="what-we-do__subtitle"><?= esc_html( $h2 ) ?></h3>
            <?php endif; ?>
            <?= $para2 ?>
            <?php if ( $btn ) : ?>
              <a
                href="#"
                class="btn hero-card__cta yd-open-modal"
                aria-controls="yd-modal-overlay"
                aria-expanded="false"
              >
                <?= esc_html( $btn ) ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <?php if ( ! empty( $img_data ) ) : ?>
          <div class="what-we-do__image">
            <img
              src="<?= esc_url( $img_url ) ?>"
              alt="<?= esc_attr( $img_alt ) ?>"
              loading="lazy"
            />
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
