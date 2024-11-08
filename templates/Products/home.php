    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3---  section-bg-1--- mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ltn__slide-active-2 slick-slide-arrow-1 slick-slide-dots-1 mb-30">
                        <!-- ltn__slide-item -->
                        <div class="ltn__slide-item ltn__slide-item-10 section-bg-1 bg-image" data-bs-bg="<?= $this->Url->build('/') ?>assets/img/drugs/dda0f242-0a51-4a9b-b0a6-c187344c41f9.jpeg" style="height: 330px;">
                        </div>
                        <!-- ltn__slide-item -->
                        <div class="ltn__slide-item ltn__slide-item-10 section-bg-1 bg-image" data-bs-bg="<?= $this->Url->build('/') ?>assets/img/drugs/dda0f242-0a51-4a9b-b0a6-c187344c41f9.png" style="height: 330px;">
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img style="height: 150px;width: 100%;" loading="lazy"  src="<?= $this->Url->build('/') ?>assets/img/drugs/a939279a-fe8a-4974-a52b-5b7efb6f2f98.jpeg" alt="Banner Image"></a>
                        </div>
                    </div>
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img style="height: 150px;width: 100%;" loading="lazy"  src="<?= $this->Url->build('/') ?>assets/img/drugs/a939279a-fe8a-4974-a52b-5b7efb6f2f98.jpeg" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->
    

    <div class="pt-10 section-bg-1- pb-20 ">
        <p class="warring_note">جميع الأدوية يتم صرفها من صيدليات مرخصة من وزارة الصحة وبوجود وصفة طبية من طبيب مختص</p>
    </div>

    <!------------------->
         <!-- header-bottom-area start -->
         <div class="header-bottom-area ltn__border-top---  menu-color-white---- d-none--- d-lg-block" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col--- header-menu-column justify-content-center---">
                            <div class="header-menu header-menu-2 text-start">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <h1 class="section-title" style="padding-right: 35px;">الأقسام</h1>
                                        <ul style="width: 100%;text-align: center;">
                                            <?php foreach($mainCats as $k=>$v){?>
                                                <li>
                                                    <a href="#">
                                                        <img src="<?= $this->Url->build('/').$v["photo"] ?>" width="40" height="50" loading="lazy" style="    display: inline-block;">
                                                        <br>
                                                        <?=$v["name"]?>
                                                    </a>
                                                </li>
                                            <?php }?>
                                      
                                          
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
    <!------------------->
 
    <!-- PRODUCT AREA END -->

    <?= $homeProducts ?  $this->element('website/pages/home/drugs_sections',["q"=>$homeProducts,"sectionName"=>" أدوية مهمة لكل بيت"]) : "" ?>

    <?= $summerProducts ? $this->element('website/pages/home/drugs_sections',["q"=>$summerProducts,"sectionName"=>"جاهز للصيف؟"])  : "" ?>

    <?= $winterProducts ? $this->element('website/pages/home/drugs_sections',["q"=>$winterProducts,"sectionName"=>"جاهز للشتاء"])  : "" ?>
    
    <?= $face ?  $this->element('website/pages/home/drugs_sections',["q"=>$face,"sectionName"=>"أفضل منتجات البشرة"])  : "" ?>
    
    <?= $womenTools ?  $this->element('website/pages/home/drugs_sections',["q"=>$womenTools,"sectionName"=>"أفضل الفوط الصحية"])  : "" ?>
    
    <?= $hair ?  $this->element('website/pages/home/drugs_sections',["q"=>$hair,"sectionName"=>"أفضل منتجات الشعر"])  : "" ?>
    
    <?= $milk ?  $this->element('website/pages/home/drugs_sections',["q"=>$milk,"sectionName"=>" حليب الاطفال"])  : "" ?>
    
    <?= $molifx ?  $this->element('website/pages/home/drugs_sections',["q"=>$molifx,"sectionName"=>" حفاضات الاطفال"])  : "" ?>

    <?= $vitamins ?  $this->element('website/pages/home/drugs_sections',["q"=>$vitamins,"sectionName"=>" أفضل المكملات الغذائية"])  : "" ?>

    <?= $sex ?  $this->element('website/pages/home/drugs_sections',["q"=>$sex,"sectionName"=>" أفضل منتجات الصحة الجنسية"])  : "" ?>

     
    <!---------brands-------->
 
    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1--- pb-50 --- pt-50 plr--9--- d-none---">
        <div class="container">
            <div class="section-title-area ltn__section-title-2 text-center">
                <h1 class="section-title">   العلامات التجارية</h1>
            </div>
            <div class="row ltn__brand-logo-active">
                <?php foreach($brands as $v){ ?>
                <div class="col-lg-12">
                    <div class="ltn__category-item ltn__category-item-6 text-center">
                        <img src="<?= $this->Url->build('/').$v["photo"] ?>" alt="<?=$v["name"]?>">
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->
    <!---------end brands-------->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom d-none" data-bs-bg="<?= $this->Url->build('/') ?>assets/img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>Buy medical disposable face mask <br> to protect your loved ones</h1>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="#">Explore Products <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->



<script>
    $(function(){
        $(".addToCart").click(function(){

           
           

            var proID = $(this).find("input[name='product_id']").val();
            var thisBtn = $("#cartBtn_"+proID).text("تمت الإضافة للسلة").css("background","silver").prop("disabled",true);
           // var qun = $(this).find("input[name='quantity']").val();
            //var price = $(this).find("input[name='price']").val();

          //  $("#liton_wishlist_modal").css("display","block").css("opacity","1").css("background","#000000ab").css("z-index","99999");

                $.ajax({
                        url: '<?=$this->Url->build('/')?>cart/addToCart?proID='+proID ,//+'&qun='+qun+'&price='+price,
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                          var cartCount =  $("sup").text();
                          $("sup").text(cartCount ++ +1);
                
                          //  console.log($.parseJSON(res));
                            
                       }
                });
            })
        })
    </script>