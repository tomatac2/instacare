
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSTACARE</title>
  <link rel="icon" type="image/png" href="<?= $this->Url->build('/') ?>assets/img/logo-icon.png" sizes="16x16">
  <!-- remix icon font css  -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/remixicon.css">
  <!-- BootStrap css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/bootstrap.min.css">
  <!-- Data Table css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/dataTables.min.css">
  <!-- Text Editor css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/editor-katex.min.css">
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/editor.atom-one-dark.min.css">
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/editor.quill.snow.css">
  <!-- Date picker css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/flatpickr.min.css">
  <!-- Calendar css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/full-calendar.css">
  <!-- Vector Map css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/jquery-jvectormap-2.0.5.css">
  <!-- Popup css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/magnific-popup.css">
  <!-- Slick Slider css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/slick.css">
  <!-- prism css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/prism.css">
  <!-- file upload css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/file-upload.css">
  
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/lib/audioplayer.css">
  <!-- main css -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>dashboard/assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
        @font-face { font-family: zain; 
			 src: url('<?= $this->Url->build('/') ?>assets/fonts/Zain-Regular.ttf'); } 
             h1,h2,h3,h4,h5,h6,a,p,li,div,span,strong,input,select,.section-title ,button{
                    font-family: zain !important; 
                }

        .text-danger , .error-message {
    color: red;
    font-size: 14px;
}

td , th ,tr { text-align: center !important;}

.notes{
  width: 90%;
  background: #ddd;
    color: black;
    padding: 5px;
    text-align: center;
    font-size: 16px;
    border: 1px solid black;
}
.tableClass{
  border: 1px solid;width: 90%;
}
.tableClass>tbody>tr,.tableClass>tbody>tr>td,.tableClass>tbody>tr>th {
  border: 1px solid;
}


  </style>
</head>
  <body>
<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="<?=URL?>" class="sidebar-logo">
      <img src="<?= $this->Url->build('/') ?>assets/img/logo.png" alt="site logo" class="light-logo">
      <img src="<?= $this->Url->build('/') ?>assets/img/logo-icon.png" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="carbon:collapse-categories" class="menu-icon"></iconify-icon>
          <span>التصنيفات الرئيسية</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>categories"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> قائمة التصنيفات الرئيسية</a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>categories/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> اضافة تصنيف رئيسس</a>
          </li>
        </ul>
      </li>
      <!----------sub cats----------->
      <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="carbon:expand-categories" class="menu-icon"></iconify-icon>
          <span>التصنيفات الفرعية</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>inner-categories"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> قائمة التصنيفات الفرعية</a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>inner-categories/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> اضافة تصنيف فرعي</a>
          </li>
        </ul>
      </li>
    <!---------end sub cats --------->

    <!---------slider-------->
    <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="lineicons:photos"  class="menu-icon"></iconify-icon>
        <span> سيلدير الرئيسية</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>sliders"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> قائمة كل السيلدير</a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>sliders/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> اضافة سيلدير </a>
          </li>
        </ul>
      </li>
    <!---------end slider-------->
    <!--------- brands --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="tabler:brand-denodo" class="menu-icon"></iconify-icon>
          <span> العلامات التجارية</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>brands"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> قائمة العلامات التجارية</a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>brands/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> اضافة علامة تجارية</a>
          </li>
        </ul>
      </li>
    <!---------end brands --------->
    <!--------- products --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:drugs" class="menu-icon"></iconify-icon>
          <span> المنتجات </span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>products"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> قائمة المنتجات </a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>products/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> اضافة منتج </a>
          </li>
        </ul>
      </li>
    <!---------end products --------->
    <!--------- orders --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="lsicon:work-order-info-filled" class="menu-icon"></iconify-icon>
          <span> الطلبات </span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>الطلبات-الحالية"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> الطلبات الحالية  </a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>الطلبات-السابقة"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> الطلبات السابقة </a>
          </li>
        </ul>
      </li>
    <!---------end products --------->
    <!--------- join us  --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="mdi:papers-outline"  class="menu-icon"></iconify-icon>
          <span> طلبات انضمام صيدليات </span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>طلبات-الانضمام"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>  طلبات-الانضمام  </a>
          </li>
        </ul>
      </li>
    <!---------end products --------->

    <!--------- store   --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="mdi:store-plus" class="menu-icon"></iconify-icon>
          <span> مخزن المنتجات   </span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>store"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>  المخزن  </a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>store/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>  إضافة مخزون جديد  </a>
          </li>
        </ul>
      </li>
    <!---------end store --------->
    <!--------- store   --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
        <iconify-icon icon="typcn:gift" class="menu-icon"></iconify-icon>
          <span>  هدايا النقاط   </span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="<?= $this->Url->build('/') ?>gifts"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>  منتجات الهدايا  </a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/') ?>gifts/add"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>  إضافة منتج هديه جديد  </a>
          </li>
        </ul>
      </li>
    <!---------end store --------->
    </ul>
  </div>
</aside>

<main class="dashboard-main">
  <div class="navbar-header">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-4">
        <button type="button" class="sidebar-toggle">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
          <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
        </button>
        <button type="button" class="sidebar-mobile-toggle">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
        </button>

      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-3">
 
        <?php // echo $this->element("dashboard/notifications"); ?>

        
          <a class=" text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="<?=URL.'users/logout'?>"> 
          <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  تسجيل الخروج </a>
      
        </div><!-- Profile dropdown end -->
      </div>
    </div>
  </div>
</div> 
  