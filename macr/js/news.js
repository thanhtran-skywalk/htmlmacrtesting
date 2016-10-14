
(function($) {

    function getList(page){
        $.ajax({
          url: '/php_controller/newslist_controller.php',
          type: 'get',
          data: {'page': page},
          success: function(newsList, status) {
              var newss = JSON.parse(newsList);
              var tableHtml = '';
                $.each(newss, function(key, news){
                var imgPath = '/admin/img/no_image.png';
                if(news.macr_img_path){
                  imgPath = news.macr_img_path;
                }

                var first = '<div class="news-item"><div class="news-thumbnail"><a href="newsdetails.php?newsid='+news.macr_news_id+'"><img class="img-news img-responsive" src="' + imgPath + '" alt="" /> </a></div>';
                var second = '<div class="news-content"><div class="news-title"><a href="newsdetails.php?newsid='+news.macr_news_id+'"><h4>' + news.macr_news_title + '</h4></a></div>';
                var third = '<div class="news-preview"><p class="text-muted news">' + news.macr_news_contents + '</p></div></div></div>';
                var newsStr = first + second + third;

                tableHtml += newsStr;
                
              });

            if (newss.length < 10) {
                  $('#loadmore').hide();
            }
            
            $('#news-sheet').append(tableHtml);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    }
    var page = 0;

    getList(page);

    $('#loadmore').click(function(){
        page += 1;
        getList(page);
    });
    
})(jQuery); // End of use strict
