
(function($) {

    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }

    function getItem(id){
      $.ajax({
          url: '/php_controller/bookfindone_controller.php',
          type: 'get',
          data: {'itemid': id},
          success: function(item, status) {
              var rs = JSON.parse(item);
              $('#title').text(rs.macr_book_name);
              $('#news-content').text(rs.macr_book_description);
              $('#author').text(rs.macr_book_author);
              if(rs.macr_book_img_path){
                $('#news-image').attr('src', rs.macr_book_img_path);
              }else{
                $('#news-image').hide();
              }
              //$('#oldimage').val(rs.macr_img_path);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
      }); // end ajax call

    }

    function getList(){
        $.ajax({
          url: '/php_controller/booklist_controller.php',
          type: 'get',
          data: {'page': 0, 'limit': 4},
          success: function(list, status) {
              var items = JSON.parse(list);
              var htmlStr = '';
                $.each(items, function(key, item){
                    var imgPath = '/admin/img/no_image.png';
                    if(item.macr_book_img_path){
                      imgPath = item.macr_book_img_path;
                    }
                    var fist = '<div class="timeline-inverted"><div class="timeline-image"><a href="bookdetails.php?bookid='+item.macr_book_id+'">';
                    var second = '<img class="img-news img-responsive" src="'+ imgPath+'" alt="" /></a></div><div class="timeline-panel"><div class="timeline-heading news"><a href="bookdetails.php?bookid='+item.macr_book_id+'">';
                    var third = '<h5 class="h5-line">'+ item.macr_book_name +'</h5></a></div><div class="timeline-body"><p class="text-muted news">'+ item.macr_book_author  +'</p></div></div></div>';
                    var itemStr = fist + second + third;
                    htmlStr+=itemStr;
                });
            
            $('#books-row').append(htmlStr);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    }


    var itemid = getUrlParameter('bookid');
    getItem(itemid);
    getList();


    
})(jQuery); // End of use strict
