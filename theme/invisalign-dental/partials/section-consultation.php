<?php
$section_title  = get_field('form_section_title');
$name_ph        = get_field('form_name_placeholder');
$email_ph       = get_field('form_email_placeholder');
$phone_ph       = get_field('form_phone_placeholder');
$button_label   = get_field('form_button_label');
$form_shortcode = get_field('form_shortcode');
?>
<section class="consultation-inline">
  <div class="container">
    <?php if ( $section_title ): ?>
      <h2 class="consultation-inline__title"><?php echo esc_html( $section_title ); ?></h2>
    <?php endif; ?>

    <?php if ( $form_shortcode ): ?>
      <?php echo do_shortcode( $form_shortcode ); ?>
    <?php else: ?>
      <form class="consultation-inline__form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
        <input type="hidden" name="action" value="submit_consultation">

        <input type="text"
               name="name"
               placeholder="<?php echo esc_attr( $name_ph ); ?>"
               required
               class="consultation-inline__input">
        <input type="email"
               name="email"
               placeholder="<?php echo esc_attr( $email_ph ); ?>"
               required
               class="consultation-inline__input">
        <input type="text"
               name="phone"
               placeholder="<?php echo esc_attr( $phone_ph ); ?>"
               required
               class="consultation-inline__input">

        <button type="submit" class="consultation-inline__button">
          <?php echo esc_html( $button_label ); ?>
        </button>
      </form>
    <?php endif; ?>
  </div>
</section>
