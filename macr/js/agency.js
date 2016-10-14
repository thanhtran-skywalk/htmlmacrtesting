// Agency Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){ 
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    });
    
    var hash = $(location).attr('hash');
    if(hash){
        $(hash).trigger( "click" );
    }


    function getList(){
        $.ajax({
          url: '/php_controller/newslist_controller.php',
          type: 'get',
          data: {'page': 0, 'limit': 4},
          success: function(list, status) {
              var items = JSON.parse(list);
              var htmlStr = '';
                $.each(items, function(key, item){
                    var imgPath = '/admin/img/no_image.png';
                    if(item.macr_img_path){
                      imgPath = item.macr_img_path;
                    }
                    var fist = '<div class="timeline-inverted"><div class="timeline-image"><a href="newsdetails.php?newsid='+item.macr_news_id+'">';
                    var second = '<img class="img-news img-responsive" src="'+ imgPath+'" alt="" /></a></div><div class="timeline-panel"><div class="timeline-heading news"><a href="newsdetails.php?newsid='+item.macr_news_id+'">';
                    var third = '<h5 class="h5-line">'+ item.macr_news_title +'</h5></a></div><div class="timeline-body"><p class="text-muted news">'+ item.macr_news_contents +'</p></div></div></div>';
                    var itemStr = fist + second + third;
                    htmlStr+=itemStr;
                });

            if (items.length < 4) {
                  $('#other-news').hide();
            }
            
            $('#news-row').append(htmlStr);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    }

    getList();
    
})(jQuery); // End of use strict
