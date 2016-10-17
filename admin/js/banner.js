$(function() {
  
  $('#nav-macrgroup').addClass('active');

  function getListBanner(){
  	$.ajax({
      url: '/php_controller/bannerlist_controller.php',
      type: 'get',
      data: {},
      success: function(list, status) {
          var items = JSON.parse(list);
          var tableHtml = '';
    		$.each(items, function(key, item){
            var imgPath = '/admin/img/no_image.png';
            if(item.macr_image){
              imgPath = item.macr_image;
            }

            var editHtml = '<button class="btn btn-primary control-button-edit" itemid="'+ item.id +'" data-target="#banner-dialog" data-toggle="modal">Sửa</button>';
            var deleteHtml = '<a class="btn btn-primary control-button-delete" href="/php_controller/bannerdelete_controller.php?itemid=' + item.id + '" onclick="return confirm(\'Bạn có muốn xoá banner này?\');">Xoá</a>';

        

            tableHtml += '<tr><td><img src="'+ imgPath +'" class="userlist-img"/></td><td><img src="'+ item.macr_logo +'" class="userlist-img"/></td><td>' + item.macr_title + '</td><td>' + item.macr_short_slogan + '</td><td>'+ item.macr_url + '</td><td>'+ editHtml + deleteHtml +'</td></tr>';
            
          });

        
        $('#table_banner').append(tableHtml);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  }

  
  getListBanner();


  function resetForm(){
    $('#macr_title').val("");
    $('#macr_short_slogan').val("");
    $('#macr_order').val("");
    $('#macr_url').val("");
    $('#itemid').val("");
    $('#oldimage').val("");
    $('#oldimageLogo').val("")
  }

  $('.addnew').click(function(){
    //resetForm
    resetForm();
  });


  $('#table_banner').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('itemid');

    $.ajax({
        url: '/php_controller/bannerfindone_controller.php',
        type: 'get',
        data: {'itemid': id},
        success: function(item, status) {
            var rs = JSON.parse(item);
            $('#macr_title').val(rs.macr_title);
            $('#macr_short_slogan').val(rs.macr_short_slogan);
            $('#macr_order').val(rs.macr_order);
            $('#macr_url').val(rs.macr_url);

            $('#itemid').val(rs.id);
            $('#oldimage').val(rs.macr_image);
            $('#oldimageLogo').val(rs.macr_logo)
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });



  function resetIntroForm(){
    $('#macr_intro_content').val("");
    $('#sub_description').val("");
    $('#macr_story').val("");
    $('#adviser').val("");
    $('#core_value').val("");
    $('#destiny').val("");
    $('#intro_itemid').val("")
  }

  $('.addnewintro').click(function(){
    //resetForm
    resetIntroForm();
  });

  $('#intro-table').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('itemid');

    $.ajax({
        url: '/php_controller/introfindone_controller.php',
        type: 'get',
        data: {'itemid': id},
        success: function(item, status) {
            var rs = JSON.parse(item);
            $('#macr_intro_content').val(rs.macr_intro_content);
            $('#sub_description').val(rs.sub_description);
            $('#macr_story').val(rs.macr_story);
            $('#adviser').val(rs.adviser);
            $('#core_value').val(rs.core_value);
            $('#destiny').val(rs.destiny);
            $('#intro_itemid').val(rs.id);
            if(rs.is_macrgroup == "0"){
              $("#radiomacrgroup").prop("checked", true);
            }else{
              $("#radiomacr").prop("checked", true);
            }
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


  $('#contact-table').on('click', '.control-button-edit', function(){ 
    var id = $(this).attr('itemid');

    $.ajax({
        url: '/php_controller/contactfindone_controller.php',
        type: 'get',
        data: {'itemid': id},
        success: function(item, status) {
            var rs = JSON.parse(item);
            $('#adress').val(rs.adress);
            $('#phone').val(rs.phone);
            $('#email').val(rs.email);
            $('#workingtimenormal').val(rs.workingtimenormal);
            $('#workingtimeweeken').val(rs.workingtimeweeken);
            $('#map').val(rs.map);
            $('#intro_itemid').val("1");
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call

  });


});
