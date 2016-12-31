<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<meta name="description" content="Macrgroup Brothers JSC">
<meta property="og:description" content="Macrgroup Brothers JSC">
<meta property="og:type" content="article">
<meta property="og:site_name" content="Macrgroup">
<meta property="og:url" content="http://www.macrgroup.com/">
<meta property="og:title" content="Macrgroup">
<meta property="og:image" content="http://www.macrgroup.com/img/logo/logo_460.png">
    
<title>Macrgroup</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">


<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/classie.js"></script>



</head>
<body>
<div style="overflow:hidden;" id="testimonial-carousel-header" class="owl-carousel owl-theme testimonial-carousel">
    <?php 
        include 'php_controller/service/BannerService.php';
        $bannerService = new BannerService();
        $rs = $bannerService->getList();
        foreach ($rs as $banner) { ?>

        <header class="header banner-top" style="background: url(<?php echo $banner['macr_image']; ?>) no-repeat;">
            <div class="container header-custom">
                <figure class="logo animated fadeInDown delay-07s">
                    <a href="#"><img src="<?php echo $banner['macr_logo']; ?>" height="130" width="130" alt=""></a> 
                </figure>   
                <h1 class="animated fadeInDown delay-07s header-welcome"><?php echo $banner['macr_title']; ?></h1>
                <a class="link animated fadeInUp delay-1s" href="<?php echo $banner['macr_url']; ?>">Tìm hiểu thêm...</a>
            </div>
            <ul class="we-create animated fadeInUp delay-1s ul-custom">
                <li class="sub-welcome"><?php echo $banner['macr_short_slogan']; ?></li>
            </ul>
        </header>

    <?php } ?>
</div>



<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div class="container">
        <ul class="main-nav">
            <li><a href="#about-us">TRANG CHỦ</a></li>
            <li><a href="#id-macr">ĐỊNH GIÁ</a></li>
            <li><a href="#id-dautu">M&A</a></li>
            <li class="small-logo"><a href="#about-us"><img class="menu-logo" src="img/logo/small-logo2.jpg" alt=""></a></li>
            <li><a href="#testimonial">KHỞI NGHIỆP</a></li>
            <li><a href="#team">THƯ VIỆN</a></li>
            <li><a href="#contact">LIÊN HỆ</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->

    <section id="about-us" class="main-section about-us">
        <div class="overlay">
            <div class="container padding-top-large">
                <?php
                     include 'php_controller/service/IntroService.php';
                     $introService = new IntroService();
                     $intro = $introService->findByType("0");
                 ?>
                <h2 class="margin-top-big">Chúng tôi là ai?</h2>
                <h6 style="margin-bottom:20px;"><?php echo $intro["sub_description"]; ?></h6>
                <div class="row">
                    <div>
                    <!--
                        <div class="col-md-5 text-right wow fadeInRight delay-02s" style="float:right;">
                                <img src="img/logo/logo_300.png" alt="About Us Big Image" class="center-block img-responsive" height="160" />
                            </div>
                            -->
                        <div class="about-us-content wow slideInUp wow fadeInRight delay-02s" style="padding: 0 10px 0 20px;"><?php echo $intro["macr_intro_content"]; ?></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row margin-top-medium">
                    <div class="col-md-8-change intro-hide-div">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- =========================
                               Collapsible Panel 0
                            ============================== -->
                            <div class="panel panel-default wow fadeInLeft delay-02s animated"">
                                <div class="panel-heading" role="tab" id="headingZero">
                                    <div class="panel-title">
                                        <a href="#collapseZero" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseZero">
                                            <i class="fa-book" style="color: #e74c3c;"></i>
                                            <strong style="margin-left: 12px;">Ban lãnh đạo</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseZero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <?php echo $intro["macr_story"]; ?>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->


                            <!-- =========================
                               Collapsible Panel 1
                            ============================== -->
                            <div class="panel panel-default wow fadeInLeft delay-03s animated"">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="panel-title">
                                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa-users" style="color: #e74c3c;"></i>
                                            <strong style="margin-left: 12px;">Ban cố vấn</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ul>
                                            <?php echo $intro["adviser"]; ?>
                                        </ul>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 2
                            ============================== -->
                            <div class="panel panel-default wow fadeInLeft delay-04s animated"">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa-globe" style="color: #e74c3c;"></i>
                                            <strong style="margin-left: 12px;">Tầm nhìn - Sứ mệnh - Giá trị cốt </strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body"><?php echo $intro["core_value"]; ?>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 3
                            ============================== -->
                            <div class="panel panel-default wow fadeInLeft delay-05s animated"">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fa-heart" style="color: #e74c3c;"></i>
                                            <strong style="margin-left: 12px;">Bộ Quy tắc ứng xử</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body"><?php echo $intro["destiny"]; ?>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->


                            <div class="row text-center why-choose-us" style="margin-top: 45px;">

                                <!-- *****  Service Single ***** -->
                                <div class="col-md-4">
                                    <div class="service wow slideInLeft">
                                        <div class="icon"><i class="icon-idea"></i></div>
                                        <h4>Chính sách nhân sự</h4>
                                        <p>Con người chính là cốt lõi của doanh nghiệp</p>
                                    </div>
                                </div>

                                <!-- *****  Service Single ***** -->
                                <div class="col-md-4">
                                    <div class="service wow fadeInUp">
                                        <div class="icon"><i class="icon-heart"></i></div>
                                        <h4>Cơ hội nghề nghiệp</h4>
                                        <p>Hãy nhắm thẳng tới mục tiêu bằng đam mê và sự kiên trì. Và tập trung những sức mạnh như những tia sáng đi qua thấu kính hội tụ, bạn sẽ đốt cháy tất cả những khó khăn đó.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="service wow slideInRight">
                                        <div class="icon"><i class="icon-office"></i></div>
                                        <h4>Văn phòng đại diện</h4>
                                        <p>Địa chỉ: Số điện thoại: Người phụ trách.</p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- *** end row *** -->

                        </div> <!-- *** end panel-group *** -->
                    </div> <!-- *** end col-md-8 *** -->
                </div>
            </div>
        </div>
    </section> <!-- *** end About Us *** -->

    <!-- =========================
       Testimonial
    ============================== -->

    <section id="testimonial" class="testimonial padding-large white-color text-center">
        <div class="container">
            <div class="row">
                <h2 class="what-customer-said-h2">BẢN TIN KINH TẾ</h2>
                <div class="col-md-10 col-md-offset-1">

                    <!-- *****  Carousel start ***** -->
                    <div id="testimonial-carousel" class="owl-carousel owl-theme testimonial-carousel">
                        <?php
                             include 'php_controller/service/RssLoader.php';
                             $rssLoader = new RssLoader();
                             $rssList = $rssLoader->loadFeed('http://www.thesaigontimes.vn/rssview/tinnoibat/');
                             foreach ($rssList as $rssItem) { 
                        ?>
                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item margin-bottom-small"> <!-- ITEM START -->
                            <div class="client margin-top-medium clearfix client wow fadeIn delay-05s" >
                                <ul class="client-info main-color customer-short-profile rssfeed-title">
                                    <li><strong><a href="<?php echo $rssItem->link ; ?>" target="_blank"><?php echo $rssItem->title; ?></strong></li></a><br />
                                    <li><?php echo $rssItem->pubDate; ?></li>
                                </ul>
                            </div>
                            <p class="client-part-haead wow fadeInDown delay-05 animated rssfeed-des" style="visibility: visible; animation-name: fadeInDown;">
                            <a href="<?php echo $rssItem->link ; ?>" target="_blank">
                                <?php echo $rssItem->description; ?></p>
                            </a>
                        </div> <!-- ITEM END -->
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Testimonial *** -->

    <section class="main-section paddind" id="id-macr"><!--main-section-start-->
        <div class="container">
            <h2>ĐỊNH GIÁ TÀI SẢN</h2>
            <h6>.</h6>
          <div class="portfolioFilter">  
            <ul class="Portfolio-nav wow fadeIn delay-02s">
                <li><a href="#" data-filter=".m-and-a" >ĐỘNG SẢN</a></li>
                <li><a href="#" data-filter=".appraisal" >BẤT ĐỘNG SẢN</a></li>
                <li><a href="#" data-filter=".consult" >THƯƠNG HIỆU</a></li>
                <li><a href="#" data-filter=".r-and-d" >CỔ PHIẾU</a></li>
                <li><a href="#" data-filter=".library-macr" >DOANH NGHIỆP</a></li>
    			 <li><a href="#" data-filter=".library-macr" >TÀI SẢN KHÁC</a></li>
                <li><a href="#" data-filter=".company-map" >QUY TRÌNH & HỒ SƠ</a></li></a></li>
            </ul>
           </div> 
            
        </div>
        <div class="portfolioContainer wow fadeInUp delay-04s">
                    <div class="Portfolio-box appraisal">
                        <a href="/macr#service_a_2"><img src="img/Portfolio-pic2.jpg" alt=""></a>   
                        <h3>Quyền tài sản</h3>
                        <p>Property rights</p>
                    </div>
                    <div class="Portfolio-box appraisal">
                        <a href="/macr#service_a_2"><img src="img/Portfolio-pic2.jpg" alt=""></a>   
                        <h3>Động sản</h3>
                        <p>Personalty</p>
                    </div>
                    <div class="Portfolio-box appraisal">
                        <a href="/macr#service_a_2"><img src="img/macr_RealEstate.jpg" alt=""></a>   
                        <h3>Bất động sản</h3>
                        <p>Real estate</p>
                    </div>
                    <div class="Portfolio-box appraisal">
                        <a href="/macr#service_a_2"><img src="img/macr_Brand.jpg" alt=""></a>   
                        <h3>Thương hiệu</h3>
                        <p>Brand valuation</p>
                    </div>
                    <div class="Portfolio-box appraisal">
                        <a href="#"><img src="img/macr_StockMarket.jpg" alt=""></a>   
                        <h3>Chứng khoán</h3>
                        <p>Stock</p>
                    </div>
                    <div class="Portfolio-box appraisal">
                        <a href="#"><img src="img/macr_OtherAssets.jpg" alt=""></a>   
                        <h3>Tài sản khác</h3>
                        <p>Others</p>
                    </div>
                    <div class="Portfolio-box library-macr">
                        <a href="/macr#service_a_5"><img src="img/macr_Data.jpg" alt=""></a>   
                        <h3>Dữ liệu</h3>
                        <p>Data</p>
                    </div>
    </div>
    </section><!--main-section-end-->

    <section class="main-section paddind" id="id-dautu" style="background-color: #eeeeee;"><!--main-section-start-->
        <div class="container">
            <h2>TƯ VẤN M&A</h2>
            <h6>Chúng tôi hỗ trợ khách hàng tìm kiếm nhà đầu tư, huy động vốn. Định giá tài sản và doanh nghiệp là thế mạnh của MACR.</h6>
          <div class="dautuFilter">  
            <ul class="Portfolio-nav wow fadeIn delay-02s">
                <li><a href="#" data-filter=".printdesign" >Tư vấn bên Bán</a></li>
    			<li><a href="#" data-filter=".printdesign" >Tư vấn bên Mua</a></li>
    			<li><a href="#" data-filter=".printdesign" >Hỗ trợ đầu tư</a></li>
                <li><a href="#" data-filter=".printdesign" >Chuyên đề</a></li></a></li>
            </ul>
           </div> 
            
        </div>
        <div class="dautuContainer wow fadeInUp delay-04s">
                    <div class=" Portfolio-box printdesign">
                        <a href="#"><img src="img/Portfolio-pic1.jpg" alt=""></a>   
                        <h3>Merger</h3>
                        <p>Sáp nhập</p>
                    </div>
                    <div class=" Portfolio-box printdesign">
                        <a href="#"><img src="img/Portfolio-pic1.jpg" alt=""></a>   
                        <h3>Acquisitions</h3>
                        <p>Mua lại</p>
                    </div>
                   
        </div>
    </section><!--main-section-end-->

    <section class="main-section paddind" id="id-macr"><!--main-section-start-->
        <div class="container">
            <h2>KHỞI NGHIỆP</h2>
            <h6>.</h6>
          <div class="portfolioFilter">  
            <ul class="Portfolio-nav wow fadeIn delay-02s">
                <li><a href="#" data-filter=".m-and-a" >LẬP KẾ HOẠCH</a></li>
                <li><a href="#" data-filter=".appraisal" >ĐÁNH GIÁ KHẢ THI</a></li>
                <li><a href="#" data-filter=".consult" >HUY ĐỘNG VỐN</a></li>
                <li><a href="#" data-filter=".r-and-d" >HỖ TRỢ VỐN</a></li></a></li>
            </ul>
           </div> 
    </div>
    </section><!--main-section-end-->

    <section class="main-section paddind" id="id-macr" style="background-color: #eeeeee;"><!--main-section-start-->
        <div class="container">
            <h2>THƯ VIỆN</h2>
            <h6>.</h6>
          <div class="portfolioFilter">  
            <ul class="Portfolio-nav wow fadeIn delay-02s">
                <li><a href="#" data-filter=".m-and-a" >TRA CỨU GIÁ</a></li>
                <li><a href="#" data-filter=".appraisal" >CHUYÊN ĐỀ</a></li>
                <li><a href="#" data-filter=".consult" >VĂN BẢN</a></li>
                <li><a href="#" data-filter=".r-and-d" >TIN TỨC</a></li>
                <li><a href="#" data-filter=".library-macr" >TRÍCH DẪN</a></li></a></li>
            </ul>
           </div> 
       
    </div>
    </section><!--main-section-end-->

    <script id="hidden-template" type="text/x-custom-template">
         <div class="team-leader-box">
            <div class="team-leader wow fadeInDown delay-09s"> 
                <div class="team-leader-shadow" data-toggle="modal" data-target="#team-member-member_id"><a href="#"></a></div>
                    <img src="member_picture" alt="">
                <ul>
                   <li><a href="#" data-toggle="modal" class="lead-profile" data-target="#team-member-member_id">Thông tin...</a></li>
                </ul>
            </div>
            <h3 class="wow fadeInDown delay-09s">member_displayname</h3>
            <span class="wow fadeInDown delay-09s">member_shortposition</span>
        </div>
        <div class="modal fade contact-form" id="team-member-member_id" tabindex="-1" role="dialog" aria-labelledby="team-member" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body member-info">
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <figure>
                                        <div class="team-leader details"> 
                                            <img src="member_picture" alt="">
                                        </div>  
                                    </figure>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <div class="description details">
                                        <h3><strong class="bold-text">member_fullname</strong></h3>
                                        <div class="light-text full-pos">member_position</div>
                                        <div class="about margin-top-small">
                                            <ul style="padding-left: 19px;">
                                                <li class="li-leader-details"><span class="leader-details-description">Học vấn:</span>member_education</li>
                                                <li class="li-leader-details"><span class="leader-details-description">Chuyên môn:</span>member_major</li>
                                                <li class="li-leader-details"><span class="leader-details-description">Email:</span>member_email</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </script>

    <!-- start Team-->
    <section class="main-section team" id="team"><!--main-section team-start-->
        <div class="container">
            <h2>Ban Lãnh Đạo</h2>
            <h6>Đam mê - Kiên trì - Sáng tạo - Truyền cảm hứng - Hành động</h6>
            <div class="team-leader-block clearfix" id="core-team-list">
               
            </div>
        </div>
    </section><!--main-section team-end-->
 

    <!-- =========================
       Why Coose Us
    ============================== -->
    <section id="why-choose-us" class="why-choose-us main-section" style="background-color: #eeeeee;">
        <div class="container">
            <h2>
                <span>LIÊN HỆ VỚI CHÚNG TÔI</span>
            </h2>

            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                    <?php 
                        include 'php_controller/service/ContactService.php';
                        $contactService = new ContactService();
                        $contact = $contactService->findById("1");                                  
                    ?>
                    <div class="contact-info-box address clearfix">
                        <h3><i class="fa-map-marker"></i>Trụ sở:</h3>
                        <span><?php echo $contact["adress"]; ?></span>
                    </div>
                    <div class="contact-info-box phone clearfix">
                        <h3><i class="fa-phone"></i>Điện thoại:</h3>
                        <span><?php echo $contact["phone"]; ?></span>
                    </div>
                    <div class="contact-info-box email clearfix">
                        <h3><i class="fa-pencil"></i>Email:</h3>
                        <span><?php echo $contact["email"]; ?></span>
                    </div>
                    <div class="contact-info-box hours clearfix">
                        <h3><i class="fa-clock-o"></i>Giờ làm việc:</h3>
                        <span><strong>Thứ 2 - Thứ 6:</strong> <?php echo $contact["workingtimenormal"]; ?><br><strong>Thứ 7 - Chủ nhật:</strong> <?php echo $contact["workingtimeweeken"]; ?></span>
                    </div>
                    <ul class="social-link">
                        <li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li>
                        <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                        <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li>
                        <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>
                        <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
                    <div class="form">
                        <form id="form-contact">
                            <input class="input-text contact-input" type="text" name="contactName" id="contactName" placeholder="Tên của Bạn *" />
                            <input class="input-text contact-input" type="text" name="contactPhone" id="contactPhone" placeholder="Số điện thoại *" />
                            <input class="input-text contact-input" type="text" name="contactMail" id="contactMail" placeholder="E-mail của Bạn *" />
                            <textarea class="input-text text-area contact-input" name="contactMessage" id="contactMessage" cols="0" rows="0" placeholder="Nội dung liên hệ *"></textarea>
                            <div class="captcha-confirm">
                                <img id="captcha_code" class="img-captcha" src="php/captcha_code.php" />
                                <input class="input-text-captcha contact-input" type="text" name="captcha" id="captcha" placeholder="Mã xác nhận *" />
                                <button type="button" class="input-btn-captcha">mã khác</button>
                            </div>
                           
                            <input class="input-btn not-active" id="btn-submit-contact" type="submit" value="Gửi tới MACRGROUP" />
                            <span class="result-contact-message" style="display: none;"></span>
                        </form>
                    </div>  
                </div>
            </div>
        </div> <!-- *** end container *** -->
    </section> <!-- *** end Why Choose Us *** -->


<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a href="#"><img src="img/footer-logo.png" alt=""></a></div>
        <span class="copyright">Bản quyền thuộc về CÔNG TY CỔ PHẦN MACRGROUP BROTHERS - Số 16 đường số 4, P.8, Q.11, Tp.HCM|GP ĐKKD:0314035148
    </div>
    <!-- 
        All links in the footer should remain intact. 
        Licenseing information is available at: http://bootstraptaste.com/license/
        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Knight
    -->
</footer>
<div class="back-to-top" data-rel="header" style="display:none;">
        <i class="icon-up"></i>
    </div>
</div>


  <script type="text/javascript">
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
 
  </script>


<script type="text/javascript" src="js/main.js"></script>
</body>
</html>