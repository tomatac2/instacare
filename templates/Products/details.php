

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
                                                    <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="addToCart theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>  أضف الى السلة   </span>
                                                <!---------hidden inputs --------->
                                                <input type="hidden" name="product_id" value="<?=$details["id"]?>">                        
                                                <input type="hidden" name="price" value="<?=$details["price"]?>">                        
                                                <!---------hidden inputs --------->    
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-3">
                                        <ul>
                                            <li>
                                                <a href="#" class="" title="Wishlist" id="addToFav" data-bs-toggle="modal" >
                                                    <input type="hidden" id="proID" value="<?=$details["id"]?>">
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



        <!-- MODAL AREA START (Wishlist Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="<?= $this->Url->build('/').$details["photo"] ?>" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="#"><?=$details["name_ar"]?></a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>تم الاضافة الى المفضلة بنجاح</p>
                                            <div class="btn-wrapper">
                                                <a href="<?=URL.'المفضلة'?>" class="theme-btn-1 btn btn-effect-1">المفضلة</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="<?= $this->Url->build('/') ?>assets/img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->



    
    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="<?= $this->Url->build('/').$details["photo"] ?>" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="#"><?=$details["name_ar"].'<br>'.$details["name_en"]?></a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> تم اضافة المنتج الى السلة بنجاح</p>
                                            <div class="btn-wrapper">
                                                <a href="<?=URL.'السلة'?>" class="theme-btn-1 btn btn-effect-1">الذهاب الى السلة</a>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->





    <style>
        table , td , tr{border:  1px solid ; padding: 5px}
    </style>


<script>
    $(function(){

        $(".close").click(function(){
            $("#liton_wishlist_modal").css("display","none").css("opacity","0").css("background","#000000ab").css("z-index","99999");
        })

        $("#addToFav").click(function(){
            var proID = $("#proID").val();
            $("#liton_wishlist_modal").css("display","block").css("opacity","1").css("background","#000000ab").css("z-index","99999");

                $.ajax({
                        url: '<?=$this->Url->build('/')?>favorites/addToFav?proID='+proID,
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                            console.log($.parseJSON(res));
                            
                       }
                });
            })
            })
             
     
        </script>
        

  

        
<script>
    $(function(){
        $(".addToCart").click(function(){
            var proID = $(this).find("input[name='product_id']").val();
            var qun = $("input[name='qtybutton']").val();

                $.ajax({
                        url: '<?=$this->Url->build('/')?>cart/addToCart?proID='+proID+'&qun='+qun ,//+'&qun='+qun+'&price='+price,
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                            console.log($.parseJSON(res));
                            
                       }
                });
            })
        })
    </script>