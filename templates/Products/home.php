<style>
    .product-title{height: 50px;}
</style>
<?= $this->Flash->render() ?><!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3---  section-bg-1--- mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <?=$this->element('website/pages/home/main_slider',['main'=>$slider5main2sub["main"]])?>
                </div>
                <div class="col-lg-3">
                    <?=$this->element('website/pages/home/sub_slider',['sub'=>$slider5main2sub["sub"]])?>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->
    

    <div class="pt-10 section-bg-1- ">
        <p class="warring_note">جميع الأدوية يتم صرفها من صيدليات مرخصة من وزارة الصحة وبوجود وصفة طبية من طبيب مختص</p>
    </div>

    <div class="section-bg-1- " style="text-align: center;">
        <a href="<?=URL?>إرسال-روشتة">
            <img src="<?=URL?>img/prescription.png" alt="">
        </a>
    </div>

    <!------------------->
         <!-- header-bottom-area start -->
         <div class=" header-bottom-area ltn__border-top---  menu-color-white---- d-none--- d-lg-block" >
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
                                                    <a href="<?=URL.'products/search?cat='.$v["id"]?>">
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

    <?= $homeProducts ?  $this->element('website/pages/home/drugs_sections',["q"=>$homeProducts,"sectionName"=>" أدوية مهمة لكل بيت" ,"showHome"=>1]) : "" ?>

    <?= $summerProducts ? $this->element('website/pages/home/drugs_sections',["q"=>$summerProducts,"sectionName"=>"جاهز للصيف؟" ,"showHome"=>2])  : "" ?>

    <?= $winterProducts ? $this->element('website/pages/home/drugs_sections',["q"=>$winterProducts,"sectionName"=>"جاهز للشتاء" ,"showHome"=>3])  : "" ?>
    
    <?= $face ?  $this->element('website/pages/home/drugs_sections',["q"=>$face,"sectionName"=>"أفضل منتجات البشرة" ,"showHome"=>4])  : "" ?>
    
    <?= $womenTools ?  $this->element('website/pages/home/drugs_sections',["q"=>$womenTools,"sectionName"=>"أفضل الفوط الصحية" ,"showHome"=>5])  : "" ?>
    
    <?= $hair ?  $this->element('website/pages/home/drugs_sections',["q"=>$hair,"sectionName"=>"أفضل منتجات الشعر" ,"showHome"=>6])  : "" ?>
    
    <?= $milk ?  $this->element('website/pages/home/drugs_sections',["q"=>$milk,"sectionName"=>" حليب الاطفال" ,"showHome"=>7])  : "" ?>
    
    <?= $molifx ?  $this->element('website/pages/home/drugs_sections',["q"=>$molifx,"sectionName"=>" حفاضات الاطفال" ,"showHome"=>8])  : "" ?>

    <?= $vitamins ?  $this->element('website/pages/home/drugs_sections',["q"=>$vitamins,"sectionName"=>" أفضل المكملات الغذائية" ,"showHome"=>9])  : "" ?>

    <?= $sex ?  $this->element('website/pages/home/drugs_sections',["q"=>$sex,"sectionName"=>" أفضل منتجات الصحة الجنسية" ,"showHome"=>10])  : "" ?>

     
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


<script>
    $(function(){
  

        // $("#slick-slide01").click();
        // $("#slick-slide02").click();
        var i = 0 ;
        function timerFunction() {
         
        if(! $("#slick-slide0"+i).length) {
            i = 0 ;
        }
        $("#slick-slide0"+i).click();
      
        i ++ ; 
        }

            // Set an interval to call timerFunction every 3 seconds
            setInterval(timerFunction, 3000);
    })
</script>


