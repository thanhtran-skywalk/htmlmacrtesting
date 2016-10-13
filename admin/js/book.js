$(function() {
  
  $('#nav-book').addClass('active');

  function getList(page){
    $.ajax({
      url: '/admin/php_controller/booklist_controller.php',
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

            var editHtml = '<button class="btn btn-primary control-button-edit" itemid="'+ item.macr_book_id +'" data-target="#new-dialog" data-toggle="modal">Sửa</button>';
            var deleteHtml = '<a class="btn btn-primary control-button-delete" href="/admin/php_controller/bookdelete_controller.php?itemid=' + item.macr_book_id + '" onclick="return confirm(\'Bạn có muốn xoá sách này?\');">Xoá</a>';

        

            tableHtml += '<tr><td><img src="'+ imgPath +'" class="userlist-img"/></td><td>' + item.macr_book_name + '</td><td><div class="shortent-text">' + item.macr_book_description + '</div></td><td>'+ item.macr_book_author + '</td><td>'+ item.publisher + '</td><td>'+ editHtml + deleteHtml +'</td></tr>';
            
          });
        if (items.length < 10) {
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
    $('#macr_book_name').val("");
    $('#macr_book_author').val("");
    $('#publisher').val("");
    $('#macr_book_description').val("");
    $('#itemid').val("");
    $('#oldimage').val("");
  }

  $('.addnew').click(function(){
    //resetForm
    resetForm();
  });


  $('#table_user').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('itemid');

    $.ajax({
        url: '/admin/php_controller/bookfindone_controller.php',
        type: 'get',
        data: {'itemid': id},
        success: function(item, status) {
            var rs = JSON.parse(item);
            $('#macr_book_name').val(rs.macr_book_name);
            $('#macr_book_author').val(rs.macr_book_author);
            $('#publisher').val(rs.publisher);
            $('#macr_book_description').val(rs.macr_book_description);
            $('#itemid').val(rs.macr_book_id);
            $('#oldimage').val(rs.macr_book_img_path);
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


});
