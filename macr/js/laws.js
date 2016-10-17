
(function($) {

    function getList(page){
        $.ajax({
          url: '/php_controller/lawlist_controller.php',
          type: 'get',
          data: {'page': page},
          success: function(list, status) {
              var items = JSON.parse(list);
              var tableHtml = '';
                $.each(items, function(key, item){
                var imgPath = '/admin/img/no_image.png';
                if(item.macr_img_path){
                  imgPath = item.macr_img_path;
                }

                var first = '<div class="news-item"><div class="news-thumbnail"><a href="lawdetails.php?lawid='+item.macr_law_id+'"><img class="img-news img-responsive" src="' + imgPath + '" alt="" /> </a></div>';
                var second = '<div class="news-content"><div class="news-title"><a href="lawdetails.php?lawid='+item.macr_law_id+'"><h4>' + item.macr_law_titile + '</h4></a></div>';
                var third = '<div class="news-preview"><div class="text-muted news-title"><span>Mã số:</span><span> '+ item.macr_law_id +'</span></div><p class="text-muted news">' + item.macr_law_content + '</p></div></div></div>';
                var newsStr = first + second + third;

                tableHtml += newsStr;
                
              });

            if (items.length < 10) {
                  $('#loadmore').hide();
            }
            
            $('#laws-sheet').append(tableHtml);
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
