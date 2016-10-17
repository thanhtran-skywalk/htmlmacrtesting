
(function($) {

    function getList(page){
        $.ajax({
          url: '/php_controller/booklist_controller.php',
          type: 'get',
          data: {'page': page},
          success: function(list, status) {
              var items = JSON.parse(list);
              var tableHtml = '';
                $.each(items, function(key, item){
                var imgPath = '/admin/img/no_image.png';
                if(item.macr_book_img_path){
                  imgPath = item.macr_book_img_path;
                }

                var first = '<div class="news-item"><div class="news-thumbnail"><a href="bookdetails.php?bookid='+item.macr_book_id+'"><img class="img-news img-responsive" src="' + imgPath + '" alt="" /> </a></div>';
                var second = '<div class="news-content"><div class="news-title"><a href="bookdetails.php?bookid='+item.macr_book_id+'"><h4>' + item.macr_book_name + '</h4></a></div>';
                var third = '<div class="news-preview"><div class="text-muted news-title"><span>Tác giả:</span><span> '+ item.macr_book_author +'</span></div><p class="text-muted news">' + item.macr_book_description + '</p></div></div></div>';
                var newsStr = first + second + third;

                tableHtml += newsStr;
                
              });

            if (items.length < 10) {
                  $('#loadmore').hide();
            }
            
            $('#book-sheet').append(tableHtml);
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
