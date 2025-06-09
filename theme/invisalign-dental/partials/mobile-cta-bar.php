<?php
$phone_number = get_field('mobile_cta_phone_number');
$clean_number = preg_replace('/\\s+/', '', $phone_number);
?>

<div class="mobile-cta-bar">
  <a href="tel:<?php echo esc_attr($clean_number); ?>" class="mobile-cta-btn">
    <span>Call Us</span>
  </a>
  <button class="mobile-cta-btn yd-open-modal" aria-controls="yd-modal-overlay" aria-expanded="false">
    <span>Book Online</span>
  </button>
</div>