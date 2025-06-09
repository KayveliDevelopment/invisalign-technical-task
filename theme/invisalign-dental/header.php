<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <?php
    $invisalign_logo   = get_field('invisalign_logo');
    $invisalign_alt    = get_field('invisalign_logo_alt') ?: $invisalign_logo['alt'];
    $site_logo         = get_field('site_logo');
    $site_logo_alt     = get_field('site_logo_alt') ?: $site_logo['alt'];
    $phone             = get_field('header_contact_phone');
    $email             = get_field('header_contact_email');
    $phone_icon        = get_field('contact_phone_icon');
    $email_icon        = get_field('contact_email_icon');
  ?>
  <div class="header-inner container">
    <?php if ($invisalign_logo): ?>
      <div class="header-col header-col--left">
        <img src="<?php echo esc_url($invisalign_logo['url']); ?>" alt="<?php echo esc_attr($invisalign_alt); ?>">
      </div>
    <?php endif; ?>
    <?php if ($site_logo): ?>
      <div class="header-col header-col--center">
        <img src="<?php echo esc_url($site_logo['url']); ?>" alt="<?php echo esc_attr($site_logo_alt); ?>">
      </div>
    <?php endif; ?>
    <div class="header-col header-col--right">
      <a href="#"
         class="btn btn--book-now yd-open-modal"
         aria-controls="yd-modal-overlay"
         aria-expanded="false">
        Book Now
      </a>
      <?php if ($phone || $email): ?>
        <div class="contact-block">
          <?php if ($phone): ?>
            <div class="contact-item">
              <?php if ($phone_icon): ?>
                <img src="<?php echo esc_url($phone_icon['url']); ?>" alt="<?php echo esc_attr($phone_icon['alt'] ?: 'Phone Icon'); ?>" class="contact-icon">
              <?php endif; ?>
              <div class="contact-divider-vertical"></div>
              <span class="contact-text"><?php echo esc_html($phone); ?></span>
            </div>
          <?php endif; ?>
          <?php if ($email): ?>
            <div class="contact-item">
              <?php if ($email_icon): ?>
                <img src="<?php echo esc_url($email_icon['url']); ?>" alt="<?php echo esc_attr($email_icon['alt'] ?: 'Email Icon'); ?>" class="contact-icon">
              <?php endif; ?>
              <div class="contact-divider-vertical"></div>
              <span class="contact-text"><?php echo esc_html($email); ?></span>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>
<?php wp_footer(); ?>
</body>
</html>
