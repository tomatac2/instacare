    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 mb-30 pt-20 pb-20"  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">المنتجات المفضلة</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> الرئيسية</a></li>
                                <li>المنتجات المفضلة</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_product_grid">
                                <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                    <div class="row">
                                        <?php foreach($favorites as $val){?>
                                         <!--product item -->
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-6">
                                            <div class="ltn__product-item ltn__product-item-3 text-center">
                                                <div class="product-img">
                                                    <i class="fa fa-heart" style="position: absolute;right: 10px;top: 5px;z-index: 1; color: red;"></i>
                                                    <a href="<?=URL.'product-details/'.$val["product"]["id"]?>"><img src="<?=URL.$val["product"]["photo"]?>" alt="#"></a>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="product-details.html"><?=$val["product"]["name_ar"]?></a></h2>
                                                   <div class="product-price">
                                                        <span><?=$val["product"]["proie"]?> جنيه</span>
                                                    </div>
                                                    <button class="add-to-cart add_to_cart w-100 " style="background-color:#0a9a73;color:white">اضف للسلة</button>
                                                </div>
                                            </div>
                                        </div>
                                         <!--product item -->
                                         <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->