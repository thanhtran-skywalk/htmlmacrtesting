$(function() {
  
  $('#nav-user').addClass('active');

  function getList(page){
  	$.ajax({
      url: '/php_controller/userlist_controller.php',
      type: 'get',
      data: {'page': page},
      success: function(users, status) {
          var userList = JSON.parse(users);
          var tableHtml = '';
    		$.each(userList, function(key, user){
            var imgPath = '/admin/img/no_image.png';
            if(user.macr_img_path){
              imgPath = user.macr_img_path;
            }

            var macrgroupIcon = '';
            if(user.macrgroup == '1'){
              macrgroupIcon += '<img src="/admin/img/checked.png" class="checked-img" />';
            }

            var macrIcon = '';
            if(user.macr == '1'){
              macrIcon += '<img src="/admin/img/checked.png" class="checked-img" />';
            }

            var editHtml = '<button class="btn btn-primary control-button-edit" userid="'+ user.macr_user_id +'" data-target="#new-user-dialog" data-toggle="modal">Sửa</button>';
            var deleteHtml = '<a class="btn btn-primary control-button-delete" href="/php_controller/userdelete_controller.php?userid=' + user.macr_user_id + '" onclick="return confirm(\'Bạn có muốn xoá người này?\');">Xoá</a>';

        

            tableHtml += '<tr><td><img src="'+ imgPath +'" class="userlist-img"/></td><td>' + user.macr_user_display_name + '</td><td>' +user.macr_full_name+ '</td><td>'+ user.macr_email + '</td><td>'+ macrgroupIcon +'</td><td>' + macrIcon + '</td><td>'+ editHtml + deleteHtml +'</td></tr>';
            
          });

        if (userList.length < 10) {
              $('#loadmoreuser').hide();
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

  $('#loadmoreuser').click(function(e){
    page += 1;
    getList(page);
  });

  function resetForm(){
    $('#displayName').val("");
    $('#fullName').val("");
    $('#email').val("");
    $('#password').val("");
    $('#position').val("");
    $('#education').val("");
    $('#major').val("");
    $('#role').prop('checked', false);
    $('#userid').val("");
    $('#oldimage').val("");
    $('#macrgroup_order').val("");
    $('#macr_order').val("");
    $('#macrgroup').prop('checked', false);
    $('#macr').prop('checked', false);

  }

  $('.addnew').click(function(){
    //resetForm
    resetForm();
  });


  $('#table_user').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('userid');

    $.ajax({
        url: '/php_controller/userfindone_controller.php',
        type: 'get',
        data: {'userid': id},
        success: function(user, status) {
            var rs = JSON.parse(user);
            $('#displayName').val(rs.macr_user_display_name);
            $('#fullName').val(rs.macr_full_name);
            $('#email').val(rs.macr_email);
            $('#position').val(rs.macr_position);
            $('#education').val(rs.macr_education);
            $('#major').val(rs.macr_major);
            $('#userid').val(rs.macr_user_id);
            $('#oldimage').val(rs.macr_img_path);
            $('#macrgroup_order').val(rs.macrgroup_order);
            $('#macr_order').val(rs.macr_order);

            if(rs.macr_user_role == '1'){
              $('#role').prop('checked', true);
            }else{
              $('#role').prop('checked', false);
            }

            if(rs.macrgroup == '1'){
              $('#macrgroup').prop('checked', true);
            }else{
              $('#macrgroup').prop('checked', false);
            }

            if(rs.macr == '1'){
              $('#macr').prop('checked', true);
            }else{
              $('#macr').prop('checked', false);
            }
            
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


});
