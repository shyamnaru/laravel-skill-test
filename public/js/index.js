(function($) {
  
$(document).ready(function() {
  $("#form").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: $("#form").attr('action'),
          type: 'POST',
          data: $("#form").serialize(),
          success: function(result) {
            var res = jQuery.parseJSON(result);
            console.log(res);
            $('tbody').prepend(res.html);
            $('#total_val').html(parseInt($('#total_val').html())+parseInt(res.total));
            $('#form')[0].reset();
          }
      });              
  });
});

} )(jQuery);