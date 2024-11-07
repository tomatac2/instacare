
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>انستاكير</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?= $this->Url->build('/') ?>assets/img/logo-icon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>assets/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>assets/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>assets/css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        #select{
            color: var(--ltn__paragraph-color) !important;
            display: inline !important;
            text-align: right !important;
            border: 2px solid;
            border-color: var(--border-color-1);
            border-radius: 0;
            font-size: 14px;
            font-weight: 400;
            height: 65px;
            line-height: 60px;
            width: 100%;
            margin-bottom: 30px;
        }
        .list>li{
            text-align: right !important;
        }
        @font-face { font-family: zain; 
			 src: url('<?= $this->Url->build('/') ?>assets/fonts/Zain-Regular.ttf'); } 
             h1,h2,h3,h4,h5,h6,a,p,li,div,span,strong,input,select,.section-title ,button ,textarea, textarea::placeholder{
                    font-family: zain !important; 
                }


                /* @media (max-width: 1199px) {
   
} */
.product-title{font-weight: 400 !important;}
.ltn__main-menu > ul > li > a {
        padding: 16px 0px;
    }

    .warring_note{
        border-radius: 5px;
        width: 75%;
        margin-right: 12.5%;
        padding: 10px;
        text-align: center;
        font-weight: 900;
        font-size: 20px;
        border: 1px solid #66ef24b0;
        background: #e0f4ef;    color: black;
    }
    .section-title{
         text-align: right; font-size: 28px !important;
    }
    .product-img{
        height: 290px;
    }
    .ltn__category-item ltn__category-item-6 text-center{
    padding: 10px;
    }
    .section-title-area {
        margin-bottom: 10px !important;
    }
    .message.error{
        text-align: center;
    background: #fa000024;
    color: red;
    padding: 10px;
    }
    .message.success{
        text-align: center;
        background: #4caf50;
        color: #ffffff;
    padding: 10px;
    }

    .error{
        color: red; 
    }
 
    </style>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-3) -->
    <header class="ltn__header-area ltn__header-3 section-bg-6---">   
    
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo">
                            <a href="<?=URL?>"><img src="<?= $this->Url->build('/') ?>assets/img/logo.png" alt="Logo" width="100px"></a>
                        </div>
                    </div>
                    <div class="col">
                        <!-- header-options -->
                        <div class="ltn__header-options">
                            <ul>
                       
                                <li class="d-none---"> 
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <?php if($auth->role_id){ ?>
                                            <li>
                                                <a href="<?=URL.'users/profile'?>"><i class="icon-user"></i> الملف الشخصي</a>
                                            </li>
                                            <?php }else{?>
                                            <li>
                                                <a href="<?=URL.'users/login'?>"><i class="icon-user"></i> تسجيل الدخول</a>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                               
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
      <!-- ltn__header-top-area start -->
      <div class="ltn__header-top-area border-bottom top-area-color-white--- ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg----" style="padding: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                         <!-- header-search-2 -->
                         <div class="header-search-2">
                            <form id="#123" method="get"  action="#">
                                <input type="text" name="search" value="" style="box-shadow: none; border-radius: 7px; border: 1px solid #ddd;border-radius: 7px;" placeholder="ابحث فى المنتجات الآن .... "/>
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li style="margin: 0;">
                                    <div class="mobile-menu-toggle d-lg-none">
                                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                            <svg viewBox="0 0 800 600">
                                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                                <path d="M300,320 L540,320" id="middle"></path>
                                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                                <li style="margin: 0;">
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li>
                                                     <!-- mini-cart 2 -->
                                                <div class="mini-cart-icon mini-cart-icon-2">
                                                    <a href="<?=URL.'المفضلة'?>" class="">
                                                        <h6 style="margin-left: 10px;    display: block;"><span>المفضلة </span> </h6>
                                                        <span class="mini-cart-icon ">
                                                            <i class="flaticon-heart-1"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li  style="margin: 0;">
                                    <!-- cart -->
                                    <div class="mini-cart-icon mini-cart-icon-2">
                                        <a href="<?=URL.'السلة'?>" >
                                            <h6 style="margin-left: 10px;    display: block;"><span>السلة </span> </h6>
                                            <span class="mini-cart-icon">
                                                <i class="icon-shopping-cart"></i>
                                                <sup><?=$cartCount?></sup>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                     
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->   
        
        <!-- header-bottom-area start -->
        <div class="header-bottom-area ltn__border-top---  menu-color-white---- d-none--- d-lg-block" style="background: #10ab8121;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col--- header-menu-column justify-content-center---">
                            <div class="header-menu header-menu-2 text-start">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <ul style="width: 100%;text-align: center;">
                                            <?php foreach($getCatsAnsSubCats as $k=>$v){    ?>
                                                <li><a href="#"><?=$v["name"]?></a>
                                                <ul class="sub-menu menu-pages-img-show ltn__sub-menu-col-2---">
                                                    <?php foreach($v["inner_categories"] as $subK => $subV){   ?>
                                                    <li>
                                                        <a href="#"><?=$subV["name"]?></a>
                                                    </li>
                                                    <?php    }     ?>
                                                </ul>
                                            </li>
                                            <?php      }   ?>
                                    
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom-area end -->
    </header>
    <!-- HEADER AREA END -->


    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="<?=URL?>"><img src="<?= $this->Url->build('/') ?>assets/img/logo.png" width="100" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li>
                        <a href="#">الرئيسية</a>
                    </li>
                    <li><a href="#">عن انستاكير</a>
                    </li>
                    <li><a href="#">تواصل معنا</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="#" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                           تسجيل الدخول
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                            </span>
                           المفضلة
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            السلة
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay">    </div> 

<!----------end header-->