<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Macrgroup</span>Admin</a>
            <ul class="user-menu">
               <li class="dropdown pull-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     <li><a href="#" data-target="#changepass-dialog" data-toggle="modal" ><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Đổi mật khẩu</a></li>
                     <li><a href="/php_controller/userlogout_controller.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                  </ul>
               </li>
            </ul>
         </div>
                     
      </div><!-- /.container-fluid -->
   </nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
   <form role="search">
      <div class="form-group">
         <input type="text" class="form-control" placeholder="Search">
      </div>
   </form>
   <ul class="nav menu">
      <li id="nav-user">
         <a href="main.php">
            <svg class="glyph stroked male-user">
               <use xlink:href="#stroked-male-user"></use>
            </svg>
            Nhân Sự
         </a>
      </li>
      <li id="nav-news">
         <a href="news.php">
            <svg class="glyph stroked chevron-down">
               <use xlink:href="#stroked-chevron-down"></use>
            </svg>
            Tin Tức
         </a>
      </li>
      <li id="nav-book">
         <a href="book.php">
            <svg class="glyph stroked app-window">
               <use xlink:href="#stroked-app-window"></use>
            </svg>
            Sách
         </a>
      </li>
      <li id="nav-law">
         <a href="law.php">
            <svg class="glyph stroked pencil">
               <use xlink:href="#stroked-pencil"></use>
            </svg>
            Văn Bản Pháp Luật
         </a>
      </li>
      <li id="nav-macrgroup">
         <a href="macrgroup.php">
            <svg class="glyph stroked star">
               <use xlink:href="#stroked-star"></use>
            </svg>
            Macrgroup
         </a>
      </li>
   </ul>
</div>

  <div class="modal fade" id="changepass-dialog" role="dialog">
          <div class="modal-dialog my-dialog">
            <div class="modal-content">
               <form role="form" id="change-password-form" method="post">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h2 class="modal-title">Đổi mật khẩu</h2>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                     <label>Mật khẩu cũ</label>
                     <input name="oldpass" id="oldpass" class="form-control" type="password"  />
                  </div>
                  <div class="form-group">
                     <label>Mật khẩu mới</label>
                     <input name="newpass" id="newpass" class="form-control" type="password" />
                  </div>
                             
                  <div class="form-group">
                     <label>Xác nhận mật khẩu mới</label>
                     <input name="confirmpass" id="confirmpass" class="form-control" type="password" />
                  </div>
                  

                  <div class="form-group has-error">
                     <span id="error-msg-change-pass" style="display:none; color:red;"></span>
                  </div>
                 </div>
                 <div class="modal-footer">
                   <input type="submit" name="submit" class="btn btn-default" value="Hoàn Thành" />
                 </div>
               </form>


            </div>
            
          </div>
</div>
<!--/.sidebar-->