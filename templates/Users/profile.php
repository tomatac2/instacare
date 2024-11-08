<?= $this->Flash->render() ?>

<style>

    /***my orders page **/
    input[type="password"] {
                    letter-spacing: unset !important;
                
                }
    input{
        height: 45px !important;margin-bottom: 15px !important;
    }
    .ltn__tab-menu-list .nav a.active{
        background-color: #10ab81 !important;
    }

    .ltn__map-item{
        display: flow-root; 
    }

    .ltn__map-item .ltn__location-name{
        border-bottom: none !important;
    }
    .status{
        background: #e1dcdc82;
        padding: 5px;
        margin-right: 10px;
        border-radius: 3px;
    }
    .ltn__tab-menu-list>div>a{
        display: flow-root  !important;
    }
    .ltn__tab-menu-list>div>a>i{
        padding: 10px !important;
    }


    </style>
<!----------end header-->
    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area pb-70 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12" style="float:right;padding:5px">
                                    <h3>مرحباً أحمد</h3>
                                    <div class="ltn__tab-menu-list mb-50">
                                        <div class="nav">
                                            <a data-bs-toggle="tab"  href="#liton_tab_1_1"><i class="fas fa-file-alt"></i>الطلبات</a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_2"> <i class="fas fa-map-marker-alt"></i>سجل العناوين</a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_3"><i class="fas fa-user"></i>المحفظة</a>
                                            <a class="active" data-bs-toggle="tab" href="#liton_tab_1_4"> <i class="fas fa-user"></i>الملف الشخصي</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
                                    <div class="tab-content">
                                    <div class="tab-pane fade " id="liton_tab_1_1">
                                            <?= $this->element("website/pages/profile/my_orders") ?>
                                        </div>

                                    <div class="tab-pane fade " id="liton_tab_1_2">
                                        <?= $this->element("website/pages/profile/my_addresses") ?>
                                    </div>
                                
                                    <div class="tab-pane fade " id="liton_tab_1_3">
                                        <?= $this->element("website/pages/profile/my_wallet") ?>
                                    </div>

                                    <div class="tab-pane fade active" id="liton_tab_1_4">
                                        <?= $this->element("website/pages/profile/my_profile") ?> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->

