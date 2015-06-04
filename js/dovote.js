$(document).ready(function() {
		
    $($($('.radiolist')[0]).find('input')[0]).focus();
    
    $(document).on('keydown',function(e) {
      var key = e.keyCode - 48;
      if(key > 0 && key < 6) {
        var rbindex = key - 1;
        $('.radiolist').each(function(i, e) {
          if (!$(this).find('input:checked').val()) {
            $($(this).find('input')[rbindex]).attr('checked','checked');
            $($(this).next().next().find('input')[0]).focus();
            return false;
          }
        });
      }
    });

			
			
});