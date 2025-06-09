<?php
$features = [];
for ( $i = 1; $i <= 3; $i++ ) {
    $features[] = [
        'icon'     => get_field( "feature_{$i}_icon" ),
        'title'    => get_field( "feature_{$i}_title" ),
        'subtitle' => get_field( "feature_{$i}_subtitle" ),
    ];
}
?>
  <div class="container hero-strip__inner">
    <?php foreach ( $features as $feature ) : ?>
      <div class="hero-strip__item">
        <?php if ( $feature['icon'] ): ?>
          <img src="<?php echo esc_url($feature['icon']['url']); ?>" class="hero-strip__icon" alt="<?php echo esc_attr($feature['icon']['alt'] ?: $feature['title']); ?>">
        <?php endif; ?>

        <div class="hero-strip__text">
          <?php if ( $feature['title'] ): ?>
            <strong><?php echo esc_html($feature['title']); ?></strong><br>
          <?php endif; ?>
          <?php if ( $feature['subtitle'] ): ?>
            <small><?php echo esc_html($feature['subtitle']); ?></small>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

