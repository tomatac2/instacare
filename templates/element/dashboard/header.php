
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

  </style>
</head>
  <body>
<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="index.html" class="sidebar-logo">
      <img src="<?= $this->Url->build('/') ?>assets/img/logo.png" alt="site logo" class="light-logo">
      <img src="<?= $this->Url->build('/') ?>assets/img/logo-icon.png" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
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
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
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

    <!--------- brands --------->
    <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
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
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
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
 
        <div class="dropdown">
          <button class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
            <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
          </button>
          <div class="dropdown-menu to-top dropdown-menu-lg p-0">
            <div class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
              <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
              </div>
              <span class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
            </div>
            
           <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  <iconify-icon icon="bitcoin-icons:verify-outline" class="icon text-xxl"></iconify-icon>
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile has been Verified. Your profile has been Verified</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
            </a>
            
            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  <img src="<?= $this->Url->build('/') ?>dashboard/assets/images/notification/profile-1.png" alt="">
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can stitch between artboards</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
            </a>
            
            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  AM
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
            </a>

            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  <img src="<?= $this->Url->build('/') ?>dashboard/assets/images/notification/profile-2.png" alt="">
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Annette Black</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
            </a>

            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  DR
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Darlene Robertson</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to prototyping</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
            </a>
           </div>

            <div class="text-center py-12 px-16"> 
                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All Notification</a>
            </div>

          </div>
        </div><!-- Notification dropdown end -->


        
          <a class=" text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="<?=URL.'users/logout'?>"> 
          <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  تسجيل الخروج </a>
      
        </div><!-- Profile dropdown end -->
      </div>
    </div>
  </div>
</div> 
  