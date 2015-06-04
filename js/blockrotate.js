			
    var numfloatees = $("#floatcontainer .floatee").length;
    var stopanim = false;
    var currentImages;
    var curind = 0;
    var numimg = 0;
    
			
  $(document).ready(function() {
    $('.loadchunk').click(function() {
      var findId = 'chunk_' + $(this).prop('id');
      $("#floatcontainer .floatee").each(function(index, value) {
        if($(this).prop('id') != findId) {
          $("#floatcontainer").append($(this).clone());
          $(this).remove();
        }
      });
      stopanim = true;
      $('#contSlide').show();
      initSlideImages();
      return false;
    })
    
    $('#contSlide').click(function() {
      stopanim = false;
      $(this).hide();
      initSlideImages();
      return false;
    });
    
    
    initSlideImages();
    
  });
  
  
  function doSlide() {
    if(stopanim) return;
    var firstElem = $($("#floatcontainer .floatee")[0]);
    var floateeCopy = firstElem.clone();
    firstElem.delay(4000).animate({marginLeft: '-610px'}, 2000, function() {
      $("#floatcontainer").append(floateeCopy);
      firstElem.remove();
      initSlideImages();
    });
  }

  function doSlide2() {
    curind++;
    var firstImg = $(currentImages.find('img')[0]);
    
    if(stopanim) {
      if(currentImages.find('img').length < 2) return;
      curind = 1;
    } else if(currentImages.find('img').length < 2 || curind == numimg) {
      window.setTimeout(doSlide(), 3000);
      return;
    }
    var imgCopy = firstImg.clone();
    firstImg.delay(3000).animate({marginLeft: '-610px'}, 2000, function() {
      currentImages.append(imgCopy);
      firstImg.remove();
      doSlide2();
    });
  }

  function initSlideImages() {
    currentImages = $($("#floatcontainer .floatee")[0]).find('.images');
    numimg = currentImages.find('img').length;
    curind = 0;
    doSlide2();
  }