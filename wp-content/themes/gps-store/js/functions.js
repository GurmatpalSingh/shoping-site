var $ = jQuery.noConflict();
(function ($) {
  $(document).ready(function(){
  $('.gc-srch-icon').click(function(){
    $( '.search-form' ).toggleClass( 'd-none' );
  });
  $('.search-submit').click(function(){
    $( '.search-form' ).toggleClass( 'd-none' );
  });
});
})(jQuery);