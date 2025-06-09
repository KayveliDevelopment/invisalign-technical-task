(function($) {
  $(document).ready(function() {
    var $modalOverlay = $('#yd-book-modal-overlay');
    var $modalClose   = $modalOverlay.find('.yd-modal-close');
    var $modalContent = $modalOverlay.find('.yd-modal-content');
    $(document).on('click', '.yd-open-modal', function(e) {
      e.preventDefault();
      $modalOverlay.fadeIn(200);
    });
    $modalClose.on('click', function() {
      $modalOverlay.fadeOut(200);
    });
    $modalOverlay.on('click', function(e) {
      if ( !$(e.target).closest('.yd-modal-content').length ) {
        $modalOverlay.fadeOut(200);
      }
    });
    $(document).on('keyup', function(e) {
      if ( e.key === "Escape" || e.keyCode === 27 ) {
        $modalOverlay.fadeOut(200);
      }
    });
  });
})(jQuery);
