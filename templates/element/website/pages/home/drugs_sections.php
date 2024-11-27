<style>
    .slick-track{
        float: inline-start;
    }
  </style>
<div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1--- pt-30--- pt-30 plr--9--- d-none---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title"> <?=$sectionName?></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active-six slick-arrow-1">
             
                <?php foreach($q as $k=>$v){?>
                <div class="col-lg-12" >
                    <div class="ltn__category-item ltn__category-item-6 text-center">
                    <a href="<?= $this->Url->build('/').'product-details/'.$v["id"]?>">
                         <div>
                                <img src="<?= $this->Url->build('/').$v["photo"] ?>" alt="#" style="height:130px">
                        </div>
                        <br>
                        <h2 class="product-title"><?=$v["name_ar"]?></h2>
                        </a>
                        <div class="product-price">
                            <span><?=$v["price"]?> جنيه</span>
                        </div>
                        <button class="add-to-cart add_to_cart w-100 addToCart" id="cartBtn_<?=$v["id"]?>"  style="background-color:#0a9a73;color:white">
                            اضف للسلة
                        <!---------hidden inputs --------->
                        <input type="hidden" name="product_id" value="<?=$v["id"]?>">                        
                        <input type="hidden" name="quantity" value="1">                        
                        <input type="hidden" name="price" value="<?=$v["price"]?>">                        
                        <!---------hidden inputs --------->                        
                        </button>
                        </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-12">
                <a href="<?= URL.'products/search?showHome='.$showHome.'&showHomeTitle='.$sectionName?>" class="add-to-cart add_to_cart w-100 " style="  border: 1px solid #0a9a73; background: white; border-radius: 3px;color:#0a9a73; width: 100px !important;float: left;    text-align: center;" tabindex="0">عرض الكل > </a>
            </div>

            </div>
            </div>