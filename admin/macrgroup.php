

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
				<li class="active">General setting</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Banner</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-info btn-lg addnew" data-target="#banner-dialog" data-toggle="modal">Thêm mới</button>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover my-custom-table" id="table_banner">
						    <tr>
						    	<th>Hình ảnh Banner</th>
						    	<th>Logo</th>
						        <th>Tiêu đề</th>
						        <th>Slogan</th>
						        <th>Link</th>
						        <th>Thao tác</th>
						    </tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		  <div class="modal fade" id="banner-dialog" role="dialog">
		    <div class="modal-dialog my-dialog">
		      <div class="modal-content">
		      	<form role="form" action='/php_controller/bannerinsertupdate_controller.php' method='post' enctype="multipart/form-data">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Banner</h2>
			        </div>
			        <div class="modal-body">
			          	<div class="form-group">
							<label>Tiêu đề</label>
							<input name="macr_title" id="macr_title" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Sologan</label>
							<textarea name="macr_short_slogan" id="macr_short_slogan" class="form-control" rows="3"></textarea> 
						</div>
						<div class="form-group">
							<label>Thứ tự</label>
							<input name="macr_order" id="macr_order" class="form-control"  />
						</div>
						<div class="form-group">
							<label>link</label>
							<input name="macr_url" id="macr_url" class="form-control"  />
						</div>
														
						<div class="form-group">
							<label>Hình ảnh Banner</label>
							<input type="file" name="imagefile" />
						</div>
						<div class="form-group">
							<label>Hình ảnh Logo (Nếu ko chọn, thì sẽ dùng logo mặc định - size: 150 x 150)</label>
							<input type="file" name="imagefilelogo" />
						</div>

						<input type="hidden" name="itemid" id="itemid" />
						<input type="hidden" name="oldimage" id="oldimage" />
						<input type="hidden" name="oldimageLogo" id="oldimageLogo" />

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




		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Giới thiệu</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-info btn-lg " data-target="#intro-dialog" data-toggle="modal" style="float: right; margin: 15px;">Thêm mới</button>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover my-custom-table" id="intro-table">
						    <tr>
						        <th>Giới Thiệu</th>
						        <th>Sub description</th>
						        <th>Macrgroup</th>
						        <th>Macr</th>
						        <th>Thao tác</th>
						    </tr>
						    <?php 
						    	include '../php_controller/service/IntroService.php';
						    	$introService = new IntroService();
						    	$rs = $introService->getList();

						    	foreach ($rs as $intro) { 
						    		$img_macrgroup = '';
						    		$img_macr ='';
						    		if(strcmp($intro['is_macrgroup'], "0") === 0){
						    			$img_macrgroup = '<img src="/admin/img/checked.png" class="checked-img">';
						    		}else {
						    			$img_macr = '<img src="/admin/img/checked.png" class="checked-img">';
						    		}
						    		
						    ?>
						    <tr>
						    	<td><div><?php echo $intro['macr_intro_content'];?></div></td>
						        <td><?php echo $intro['sub_description'];?></td>
						        <td><?php echo $img_macrgroup; ?></td>
						        <td><?php echo $img_macr; ?></td>
						        <td><button class="btn btn-primary control-button-edit" itemid="<?php echo $intro['id'] ?>" data-target="#intro-dialog" data-toggle="modal">Sửa</button>
						        	<a class="btn btn-primary control-button-delete" href="/php_controller/introdelete_controller.php?itemid=<?php echo $intro['id'] ?>" onclick="return confirm('Bạn có muốn xoá giới thiệu này?');">Xoá</a>
						        </td>
						        
						    </tr>

						    <?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		  <div class="modal fade" id="intro-dialog" role="dialog">
		    <div class="modal-dialog my-dialog" style="width: 1000px;">
		      <div class="modal-content">
		      	<form role="form" action='/php_controller/introinsertupdate_controller.php' method='post' enctype="multipart/form-data">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Giới Thiệu</h2>
			        </div>
			        <div class="modal-body">
			          	<div class="form-group">
							<label>Giới Thiệu</label>
							<textarea name="macr_intro_content" id="macr_intro_content" class="form-control" rows="6"></textarea> 
						</div>
						<div class="form-group">
							<label>Sub Description</label>
							<input name="sub_description" id="sub_description" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Chuyện nhà Macr</label>
							<textarea name="macr_story" id="macr_story" class="form-control" rows="5"></textarea> 
							
						</div>
						<div class="form-group">
							<label>Ban Cố Vấn</label>
							<textarea name="adviser" id="adviser" class="form-control" rows="5"></textarea> 
						</div>
														
						<div class="form-group">
							<label>Tầm nhìn</label>
							<textarea name="core_value" id="core_value" class="form-control" rows="5"></textarea> 
						</div>
						<div class="form-group">
							<label>Sứ mệnh</label>
							<textarea name="destiny" id="destiny" class="form-control" rows="5"></textarea> 
						</div>
						<div class="form-group">
							<label>Giới thiệu này là của: </label>
							<div class="ismacrgroup">
								<input type="radio" name="is_macrgroup" id="radiomacrgroup" value="0" checked> Macrgroup<br>
	  							<input type="radio" name="is_macrgroup" id="radiomacr" value="1"> Macr<br>
  							</div>
						</div>

						<input type="hidden" name="intro_itemid" id="intro_itemid" />

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



		  <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thông tin liên hệ</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php 
					    	include '../php_controller/service/ContactService.php';
					    	$contactService = new ContactService();
					    	$contact = $contactService->findById("1");						    		
						?>
						<table class="table table-hover" id="contact-table">
						    <tr>
						        <td style="width: 20%;">Địa Chỉ</td>
						        <td><?php echo $contact["adress"]; ?></td>
						    </tr>
						    <tr>
						        <td>Điện Thoại</td>
						        <td><?php echo $contact["phone"]; ?></td>
						    </tr>
						    <tr>
						        <td>Email</td>
						        <td><?php echo $contact["email"]; ?></td>
						    </tr>
						    <tr>
						        <td>Giờ làm việc 2 - 6</td>
						        <td><?php echo $contact["workingtimenormal"]; ?></td>
						    </tr>
						    <tr>
						        <td>Giờ làm việc T7 - CN</td>
						        <td><?php echo $contact["workingtimeweeken"]; ?></td>
						    </tr>
						    <tr>
						        <td>Map</td>
						        <td><?php echo $contact["map"]; ?></td>
						    </tr>
						    <tr>
						        <td colspan="2"><button class="btn btn-primary control-button-edit" itemid="1" data-target="#contact-dialog" data-toggle="modal">Sửa</button></td>
						    </tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		 <div class="modal fade" id="contact-dialog" role="dialog">
		    <div class="modal-dialog my-dialog" style="width: 1000px;">
		      <div class="modal-content">
		      	<form role="form" action='/php_controller/contactinsertupdate_controller.php' method='post' enctype="multipart/form-data">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h2 class="modal-title">Thông tin liên hệ</h2>
			        </div>
			        <div class="modal-body">
			          	<div class="form-group">
							<label>Địa chỉ</label>
							<input name="adress" id="adress" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Điện thoại</label>
							<input name="phone" id="phone" class="form-control"  />
						</div>
						<div class="form-group">
							<label>email</label>
							<input name="email" id="email" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Giờ làm việc thứ 2-6</label>
							<input name="workingtimenormal" id="workingtimenormal" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Giờ làm việc T7-CN</label>
							<input name="workingtimeweeken" id="workingtimeweeken" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Map</label>
							<textarea name="map" id="map" class="form-control" rows="5"></textarea> 
						</div>
						

						<input type="hidden" name="itemid" id="itemid" value="1" />

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
	<script src="js/banner.js"></script>
	<script src="js/pass.js"></script>
	
</body>

</html>
<?php 
}else{
	header('Location: /admin/index.php');
}
?>
