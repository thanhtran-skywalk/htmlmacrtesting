$(function() {
  
  $('#nav-law').addClass('active');

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

            var editHtml = '<button class="btn btn-primary control-button-edit" itemid="'+ item.macr_law_id +'" data-target="#new-dialog" data-toggle="modal">Sửa</button>';
            var deleteHtml = '<a class="btn btn-primary control-button-delete" href="/php_controller/lawdelete_controller.php?itemid=' + item.macr_law_id + '" onclick="return confirm(\'Bạn có muốn xoá sách này?\');">Xoá</a>';

            tableHtml += '<tr><td><img src="'+ imgPath +'" class="userlist-img"/></td><td>' + item.macr_law_id + '</td><td><div class="shortent-text">' + item.macr_law_titile + '</div></td><td>'+ item.macr_law_content + '</td><td>'+ item.macr_law_date + '</td><td>'+ editHtml + deleteHtml +'</td></tr>';
            
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
    $('#macr_law_id').val("");
    $('#macr_law_titile').val("");
    $('#macr_law_content').val("");
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
        url: '/php_controller/lawfindone_controller.php',
        type: 'get',
        data: {'itemid': id},
        success: function(item, status) {
            var rs = JSON.parse(item);
            $('#macr_law_id').val(rs.macr_law_id);
            $('#macr_law_titile').val(rs.macr_law_titile);
            $('#macr_law_content').val(rs.macr_law_content);
            $('#itemid').val(rs.macr_law_id);
            $('#oldimage').val(rs.macr_img_path);
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


});
