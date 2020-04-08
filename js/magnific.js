$(function(){
  gallery = $(".popup-gallery");
  //placing images dynamically
  for(i=1; i<=20; i++){
      img = '<a href="images/historiek/'+i+'.jpg">'+
          '<img src="images/historiek/'+i+'.jpg">'+
      '</a>';
      gallery.append(img);
  }
  
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });
});