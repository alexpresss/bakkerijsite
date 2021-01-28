let container = $(".portfolio-items");

// $.getJSON({'url':"js/assortiment.json", 'async':false}, (data) => {
//     loadHTML(data);
//     magnific();
// }).done(() => {
//     // setTimeout(() =>{
//     //     $('[data-filter=".brood"]').trigger("click");
//     // },2500);
// });


// $(function(){
//     $.ajax({
//         'async': false,
//         'url': "js/assortiment.json",
//         'success': function (data) {
//             loadHTML(data);
//             magnific();
//         }
//     });
//     $('[data-filter=".brood"]').trigger("click");
// });

function loadHTML(json){
    for (let element in json){
        list = json[element].sort((a,b) => {return a.naam.localeCompare(b.naam);});
        list.forEach(item => {
            let html = '<div class="portfolio-item '+ element +' col-xs-12 col-sm-4 col-md-3">'+
            '<div class="recent-work-wrap">'+
            '<img class="img-responsive" src="images/assortiment/min/'+item.foto+'" alt="">'+
            '<div class="overlay">'+
                '<div class="recent-work-inner">'+
                '<h3><a class="preview" href="images/assortiment/full/'+item.foto+'" rel="prettyPhoto">'+item.naam+'</a></h3>'+
                '<p>'+item.text+'</p>'+
                '</div>'+
            '</div>'+
            '</div>'+
        '</div>';
            container.append(html);
        });
    };
}

function magnific(){
    container.magnificPopup({
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
}


