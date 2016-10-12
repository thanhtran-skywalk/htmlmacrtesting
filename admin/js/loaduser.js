$(function() {
  
  if (window.location.search) {
    $('#error-msg').text('Sai tên email hoặc mật khẩu!');
  }

  function loadUser(page){
  	$.ajax({
      url: '/admin/php_controller/loaduser_controller.php',
      type: 'get',
      data: {'page': page},
      success: function(users, status) {
        var userList = JSON.parse(users);
        var tableHtml = '';
		$.each(userList, function(key, user){
			tableHtml += '<tr><td><img src="'+ user.macr_img_path +'" class="userlist-img"/></td><td>' + user.macr_user_display_name + '</td><td>' +user.macr_full_name+ '</td><td>'+ user.macr_email + '</td><td>Hình ảnh</td><td>Hình ảnh</td><td>Sửa , Xoá</td></tr>';
        });
        $('#table_user').append(tableHtml);

      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  }

  loadUser(0);
});
