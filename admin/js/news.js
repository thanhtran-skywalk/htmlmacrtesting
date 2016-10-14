$(function() {
  
  $('#nav-news').addClass('active');

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

            var editHtml = '<button class="btn btn-primary control-button-edit" newsid="'+ news.macr_news_id +'" data-target="#news-dialog" data-toggle="modal">Sửa</button>';
            var deleteHtml = '<a class="btn btn-primary control-button-delete" href="/php_controller/newsdelete_controller.php?newsid=' + news.macr_news_id + '" onclick="return confirm(\'Bạn có muốn xoá tin tức này?\');">Xoá</a>';

        

            tableHtml += '<tr><td><img src="'+ imgPath +'" class="userlist-img"/></td><td>' + news.macr_news_title + '</td><td><div class="shortent-text">' + news.macr_news_contents + '</div></td><td>'+ news.macr_news_date + '</td><td>'+ editHtml + deleteHtml +'</td></tr>';
            
          });

        if (newss.length < 10) {
              $('#loadmore').hide();
        }
        
        $('#table_user').append(tableHtml);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  }

  var page = 0;
  getList(page);

  $('#loadmore').click(function(e){
    page += 1;
    getList(page);
  });

  function resetForm(){
    $('#title').val("");
    $('#content').val("");
    $('#newsid').val("");
    $('#oldimage').val("");
  }

  $('.addnew').click(function(){
    //resetForm
    resetForm();
  });


  $('#table_user').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('newsid');

    $.ajax({
        url: '/php_controller/newsfindone_controller.php',
        type: 'get',
        data: {'newsid': id},
        success: function(news, status) {
            var rs = JSON.parse(news);
            $('#title').val(rs.macr_news_title);
            $('#content').val(rs.macr_news_contents);
            $('#newsid').val(rs.macr_news_id);
            $('#oldimage').val(rs.macr_img_path);
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


});
