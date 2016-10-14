$(function() {

    function validateForm(){
      
      if($('#oldpass').val().length == 0){
        return false;
      }else if( $('#newpass').val() !== $('#confirmpass').val() ){
        return false;
      }
      return true;
    }

    function resetForm(){
      $('#oldpass').val("");
      $('#newpass').val("");
      $('#confirmpass').val("");
    }

    $("#change-password-form").submit(function(event){
        event.preventDefault();
        if(validateForm()){
          var serializedData = $(this).serialize();
          $.ajax({url: "/php_controller/userupdatepass_controller.php",
            type: "post",
            data: serializedData,
            success:function(data){

              if(data.indexOf('success_change') >= 0){
                  resetForm();
                  $('#error-msg-change-pass').text('Đổi mật khẩu thành công!');
                  $('#error-msg-change-pass').show();
              }else{
                  $('#error-msg-change-pass').text('Mật khẩu cũ sai!');
                  $('#error-msg-change-pass').show();
              }
            }
          });
        }else{
            $('#error-msg-change-pass').text('Giá trị nhập không đúng!');
            $('#error-msg-change-pass').show();
        }
    });
});
