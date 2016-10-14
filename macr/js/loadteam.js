
(function($) {

    function getList(){
        $.ajax({
          url: '/php_controller/usergetdisplaylistmacr_controller.php',
          type: 'get',
          data: {},
          success: function(list, status) {
              var items = JSON.parse(list);
              var tableHtml = '';
                $.each(items, function(key, item){
                var imgPath = '/admin/img/no_image.png';
                if(item.macr_img_path){
                  imgPath = item.macr_img_path;
                }
                
                var first = '<div class="team-leader-box macr"><div class="team-leader wow fadeInDown delay-03s" style="height: 200px; width: 200px"> <div class="team-leader-shadow"><a href="#"></a></div><img class="team-img-mem" src="' + imgPath + '" alt=""></div>';
                var second = '<h3 class="wow fadeInDown delay-03s">'+item.macr_user_display_name +'</h3><span class="wow fadeInDown delay-03s">'+ item.macr_short_position +'</span></div>';
               
                var newsStr = first + second;

                tableHtml += newsStr;
                
              });

            $('#team-macr').append(tableHtml);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    }

    getList();
    
})(jQuery); // End of use strict
