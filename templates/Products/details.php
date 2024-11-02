

 

    <div class="ltn__utilize-overlay"></div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 mb-30 pt-20 pb-20"  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="#"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> الرئيسية</a></li>
                                <li><a href="#"><span class="ltn__secondary-color"><i class="fas fa-list-alt"></i></span> <?=$details["category"]["name"]?></a></li>
                                <li><a> <?=$details["name_ar"]?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="<?= $this->Url->build('/').$details["photo"] ?>" data-rel="lightcase:myCollection">
                                                <img src="<?= $this->Url->build('/').$details["photo"] ?>" alt="Image">
                                            </a>
                                        </div>

                                        <?php foreach($details["product_images"] as  $val): ?>
                                            <div class="single-large-img">
                                                <a href="<?= $this->Url->build('/').$val["photo"] ?>" data-rel="lightcase:myCollection">
                                                    <img loading="lazy" src="<?= $this->Url->build('/').$val["photo"] ?>" alt="Image">
                                                </a>
                                            </div>
                                        <?php endforeach;?>
                                 
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                            <div class="single-small-img">
                                                <img loading="lazy" src="<?= $this->Url->build('/').$details["photo"] ?>" alt="Image">
                                            </div>
                                        <?php foreach($details["product_images"] as  $val): ?>
                                            <div class="single-small-img">
                                                <img loading="lazy" src="<?= $this->Url->build('/').$val["photo"] ?>" alt="Image">
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3><?=$details["name_ar"].'<br>'.$details["name_en"]?> </h3>
                                  
                                    <div class="product-price">
                                        <span><?=$details["price"]?> جنيه</span>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <span>زمن التوصيل : <span style="color:black;font-weight: 600;">فى خلال ساعتين</span></span> 
                                                <hr>
                                            </li>
                                            <li>
                                                <span>  يباع بواسطة  : <span  style="color:black;font-weight: 600;">أقرب صيدلية  </span></span> 
                                                <hr>
                                            </li>
                                            <li>
                                                <span>  يمكنك استبدال او استرجاع هذا المنتج    <a href="<?= $this->Url->build('/').'كيفية-الاستخدام'?>" style="color:blue;font-weight: 600;">أعرف اكثر  </a></span> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span> أضف الى السلة</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-3">
                                        <ul>
                                            <li>
                                                <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i>
                                                    <span>أضف الى المفضلة</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>نسخ الرابط: </li>
                                            <li>
                                                <a  onclick="myFunction()"  style="cursor: pointer;" >
                                                    <i class="fa fa-link"></i>
                                                    <input id="myInput" style="opacity: 0;" value="<?=URL.'product-details/'.$details["id"] ?>" > 
                                                </a>
                                            </li>

                                            <script>
                                                function myFunction() {
                                                // Get the text field
                                                var copyText = document.getElementById("myInput");

                                                // Select the text field
                                                copyText.select();
                                                copyText.setSelectionRange(0, 99999); // For mobile devices

                                                // Copy the text inside the text field
                                                navigator.clipboard.writeText(copyText.value);

                                                // Alert the copied text
                                                alert("Copied");
                                                }
                                            </script>
                                            
                                        </ul>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">نظرة عامة</a>
                                <a  data-bs-toggle="tab" href="#liton_tab_details_1_2">المواصفات</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <?= $details["description"]?>          
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_2">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">العلامة التجارية  :  <?=$details["brand"]["name"]?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->


    <style>
        table , td , tr{border:  1px solid ; padding: 5px}
    </style>