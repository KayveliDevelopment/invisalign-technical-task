<?php
/**
 * Template Name: Front Page
 * Description: Landing page with hero section (strip, main, mobile strip).
 */

get_header(); 
get_template_part('partials/modal-book-now');
get_template_part('partials/hero-section');
get_template_part('partials/section-testimonials');
get_template_part('partials/section-what-we-do');
get_template_part('partials/section-consultation');
get_template_part('partials/mobile-cta-bar'); 
get_footer();
