<?php
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
	{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Macrgroup - Admin</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<?php include 'menu.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản Lý Nhân Sự</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Nhân Sự</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-info btn-lg addnew" data-target="#new-user-dialog" data-toggle="modal">Thêm mới</button>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover my-custom-table" id="table_user">
						    <tr>
						    	<th>Hình ảnh</th>
						        <th>Tên ngắn</th>
						        <th>Tên đầy đủ</th>
						        <th>Email</th>
						        <th>Macrgroup</th>
						        <th>Macr</th>
						        <th>Thao tác</th>
						    </tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		<div class="row" style="text-align: center;">
			<button type="button" class="btn btn-info btn-lg" id="loadmoreuser">Tải Thêm</button>
		</div>
		

		  <div class="modal fade" id="new-user-dialog" role="dialog">
		    <div class="modal-dialog my-dialog">
		      <div class="modal-content">
		      	<form role="form" action='/php_controller/userinsertupdate_controller.php' method='post' enctype="multipart/form-data">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Nhân Sự</h2>
			        </div>
			        <div class="modal-body">
			          	<div class="form-group">
							<label>Tên Ngắn</label>
							<input name="displayName" id="displayName" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Tên đầy đủ</label>
							<input name="fullName" id="fullName" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" id="email" class="form-control" type="email" />
						</div>
														
						<div class="form-group">
							<label>Mật khẩu</label>
							<input name="password" id="password" type="password" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Quyền</label>
							<div class="form-group checkbox">
							  <label><input name="role" id="role" type="checkbox" value="yes">Có quyền admin</label>
							</div>
						</div>
						<div class="form-group">
							<label>Chức vụ</label>
							<input name="position" id="position" class="form-control" />
						</div>
						<div class="form-group">
							<label>Học vấn</label>
							<input name="education" id="education" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Chuyên ngành</label>
							<textarea name="major" id="major" class="form-control" rows="3"></textarea> 
						</div>
						<div class="form-group">
							<label>Hiển thị trên web</label>
							<div class="form-group checkbox">
							  <label><input name="macrgroup" id="macrgroup" type="checkbox" value="yes">Hiển Thị Trên Macrgroup</label>
							  <input name="macrgroup_order" id="macrgroup_order" placeholder="Thứ tự hiển thị" style="margin-right: 30px;" />
							  <label><input name="macr" id="macr" type="checkbox" value="yes">Hiển Thị Trên Macr</label>
							  <input name="macr_order" id="macr_order" placeholder="Thứ tự hiển thị"  />
							</div>
						</div>
						
														
						<div class="form-group">
							<label>Hình ảnh</label>
							<input type="file" name="imagefile" />
						</div>
						<input type="hidden" name="userid" id="userid" />
						<input type="hidden" name="oldimage" id="oldimage" />
						

						<div class="form-group has-error" style="display:none;">
							<span id="error-msg"></span>
						</div>
			        </div>
			        <div class="modal-footer">
			          <input type="submit" name="submit" class="btn btn-default" value="Hoàn Thành" />
			        </div>
		   		</form>


		      </div>
		      
		    </div>
		  </div>
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/user.js"></script>
	
</body>

</html>
<?php 
}else{
	header('Location: /admin/index.php');
}
?>