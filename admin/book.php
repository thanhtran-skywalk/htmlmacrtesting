

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
				<li class="active">Quản Lý Sách</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sách</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-info btn-lg addnew" data-target="#new-dialog" data-toggle="modal">Thêm mới</button>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover my-custom-table" id="table_user">
						    <tr>
						    	<th>Hình ảnh</th>
						        <th>Tên sách</th>
						        <th style="width:40%;max-width: 40%;">Mô tả</th>
						        <th>Tác giả</th>
						        <th>Nhà xuất bản</th>
						        <th>Thao tác</th>
						    </tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		<div class="row" style="text-align: center;">
			<button type="button" class="btn btn-info btn-lg" id="loadmore">Tải Thêm</button>
		</div>
		

		  <div class="modal fade" id="new-dialog" role="dialog">
		    <div class="modal-dialog my-dialog">
		      <div class="modal-content">
		      	<form role="form" action='/php_controller/bookinsertupdate_controller.php' method='post' enctype="multipart/form-data">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Sách</h2>
			        </div>
			        <div class="modal-body">
			          	<div class="form-group">
							<label>Tên Sách</label>
							<input name="macr_book_name" id="macr_book_name" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Tác giả</label>
							<input name="macr_book_author" id="macr_book_author" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Nhà xuất bản</label>
							<input name="publisher" id="publisher" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Mô tả</label>
							<textarea name="macr_book_description" id="macr_book_description" class="form-control" rows="15"></textarea> 
						</div>
						
														
						<div class="form-group">
							<label>Hình ảnh</label>
							<input type="file" name="imagefile" />
						</div>
						<input type="hidden" name="itemid" id="itemid" />
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
	<script src="js/book.js"></script>
	<script src="js/pass.js"></script>
	
</body>

</html>
<?php 
}else{
	header('Location: /admin/index.php');
}
?>
