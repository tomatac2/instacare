<?= $this->Flash->render() ?>
<style>
    .nice-select{display: none;}
</style>
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left  mb-10" style="padding-top: 20px ; padding-bottom: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">سلة التسوق</h1>
                                         
                        <span class="btn removeCart" style=" float:left;  color: red; margin:5px; padding:5px !important;border: 1px solid;border-radius: 5px !important;">  تفريغ السلة</span>

                        <a href="<?=URL.'السلة'?>" class="btn"  style=" float:left;  color: #005af7; margin:5px; padding:5px !important; border: 1px solid;border-radius: 5px !important;"> تحديث السلة</a> 

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <?= $this->Form->create($newOrder["data"]) ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive"  style="    border: 1px solid #ddd;   overflow: unset !important;">
                                <table class="table">
                                    <tbody>
                                        <?php 
                                        if($gift):
                                           foreach($gift as $giftV){
                                          echo '<tr id="gift_'.$giftV["product_id"].'" style="background-color: #0a9a7326;">
                                            <td class="cart-product-remove" style="color: red;font-weight:600;" >x  
                                                <input type="hidden" class="proID" value="'.$giftV["product_id"].'">
                                                <input type="hidden" class="type" value="gift">
                                            </td>
                                            <td class="col-sm-4 cart-product-image" style="    text-align: center;">
                                                <a href="'.URL.'products/details/'.$giftV["product_id"].'"><img src="'.URL.$giftV["photo"].'" alt="#"></a>
                                            </td>
                                            <td class="col-sm-6 cart-product-info" style="    text-align: center;">
                                                <h4><a href="'.URL.'products/details/'.$giftV["product_id"].'">'.$giftV["name"].'</a></h4>
                                                </td>
                                            <td class="col-sm-2 cart-product-info" style="    text-align: center;">
                                                    هدية <i class="fa fa-gift" style="padding: 5px;color:rgb(10 154 115)"></i>
                                                </td>
                                            
                                              </tr>' ;
                                           } 
                                        endif;
                                        ?>
                                        <?php foreach($cart as $items){ 
                                                $price[] = $items["price"];
                                                $quantity[] = $items["quantity"];
                                                $amount[] = $items["quantity"] * $items["price"] ; 
                                            ?>
                                            <tr id="item_<?=$items["product_id"]?>">
                                                <td class="cart-product-remove" style="color: red;font-weight:600;" >x 
                                                     <input type="hidden" class="proID" value="<?=$items["product_id"]?>">
                                                     <input type="hidden" class="type" value="cart">
                                                </td>
                                                <td class="cart-product-image">
                                                    <a href="<?=URL.'products/details/'.$items["product_id"]?>"><img src="<?=URL.$items["photo"]?>" alt="#"></a>
                                                </td>
                                                <td class="cart-product-info">
                                                    <h4><a href="<?=URL.'products/details/'.$items["product_id"]?>"><?=$items["name"]?></a></h4>
                                                </td>
                                                <td class="cart-product-price"><?=$items["price"]?> جنيه</td>
                                                <td class="cart-product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input  type="text" product-data="<?=$items["product_id"]?>" value="<?=$items["quantity"]?>" name="qtybutton" class="cart-plus-minus-box plusmiuns">
                                                    </div>
                                                </td>
                                                <td class="cart-product-subtotal"><?=$items["price"]*$items["quantity"]?> جنيه</td>
                                            </tr>
                                        <?php }   ?>
                                    </tbody>
                                </table>
                        
                            
                            <div class="container mt-25">
                                <h4>اجمالي السلة  
                
                            </h4>

                                <table class="table" >
                                    <tbody>
                                        <tr >
                                            <td style="border: unset !important;">قيمة المنتجات</td>
                                            <td style=" border: unset !important;   text-align: center;">
                                                <?php 
                                                echo $amount ? $amount = array_sum($amount) .' جنيه' : $amount = 0 ;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>رسوم التوصيل</td>
                                            <td style="    text-align: center;">15 جنيه  &nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="border: unset !important;"><strong>اجمالي الطلب</strong></td>
                                            <td  style="border: unset !important;text-align: center;"><strong><?= $amount+15 .' جنيه' ?> </strong></td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    <div class="col-lg-4" style="    border: 1px solid #ddd; padding: 15px;">
                        <p style="    text-align: center;  background: #0a9a731a;   color: #0a9a73;  padding: 10px;">ستحصل على نقاط تساوي <?=$amount?> نقطة عند اكتمال الطلب <i class="fa fa-gift"></i></p>
                    

                        <div class="cart-coupon" >
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-10" style="    padding: 0 15px 0 0;">
                                    <input type="text" name="promo" value="<?=$extraCart["promo"]?$extraCart["promo"]:""?>" placeholder="ادخل كوبون الخصم هنا" style="max-width: 350px !important;">
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-2" style="    padding-left: 0;padding-right: 0;">
                                    <button type="button" class="btn  btn-success " style="       background: #085641;   margin-left: 10px;  padding: 0 10px 0 9px;height: 65px;">تفعيل الكوبون</button>
                                </div>
                            </div> 
                            
                        </div>
                        
                        
                        <div class="container pt-15">
                            <h4>عنوان التوصيل  </h4>
                            <div class="row">
                                <?php 
                                if($addresses && count($addresses) > 0 ){?>
                                    <label for="">اختر عنوان التوصيل</label>
                                    <div class="col-md-12">
                                        <div>
                                            <select name="address_id" id="select" style="    margin-bottom: 5px;">
                                                <option value="">اختر عنوان التوصيل</option>
                                                <?php foreach($addresses as $val){?>
                                                    <option value="<?=$val["id"]?>" <?=$extraCart["address_id"] == $val["id"] ? "selected" : "" ?> ><?=$val["full_address"]?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <textarea name="full_address"  placeholder="أكتب العنوان بالتفصيل او اختر العنوان ...." name="" id="" style="min-height: 80px;"><?=$extraCart["full_address"]?$extraCart["full_address"]:""?></textarea>
                                    </div>
                                <?php }    else { ?>
                                    <textarea name="full_address"  placeholder="أكتب العنوان بالتفصيل او اختر العنوان ...." name="" id="" style="min-height: 80px;"><?=$extraCart["full_address"]?$extraCart["full_address"]:""?></textarea>
                                 <!-- echo '<textarea name="full_address" placeholder="أكتب العنوان بالتفصيل او اختر العنوان ...." name="" id="" style="min-height: 80px;">'.$extraCart["full_address"]?$extraCart["full_address"]:"".'</textarea>'; -->
                            <?php } ?>

                                            
                        </div>
                            <!-- <a href="#">+ اضف عنوان</a> -->
                        </div>
                        
                        <div class="container pb-15">
                            <h4> ملاحظات  </h4>
                        <textarea placeholder="أضف أي ملاحظات هنا  ...." name="notes" id="" style="min-height: 80px;"><?=$extraCart["notes"]?$extraCart["notes"]:""?></textarea>
                        </div>

                        <div class="shoping-cart-total">
                            <div class="btn-wrapper text-right">
                                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken');?>">
                                <button type="submit" style="width: 100%;" class="theme-btn-1 btn btn-effect-1">اتمام عملية الشراء</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->



    <script>
        $(function(){


            $(".cart-product-remove").click(function(){
            var type  = $(this).find(".type").val();
            var proID = $(this).find(".proID").val();

            console.log(type);
            console.log(proID);
        
                $.ajax({
                        url: '<?=$this->Url->build('/')?>cart/removeFromCart?proID='+proID+'&type='+type , 
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                          //  console.log($.parseJSON(res));
                          type == "gift" ?   $("#gift_"+proID).remove() :  $("#item_"+proID).remove();
                            
                       }
                });
            })

            ////////////   (+ - product)
            $(".cart-plus-minus").click(function(){

                var proAttrID  =  $(this).find(".plusmiuns").attr("product-data");
                var qunAttr  =  $(this).find(".plusmiuns").val();

                $.ajax({
                        url: '<?=$this->Url->build('/')?>cart/plusMiuns?proID='+proAttrID+'&qun='+qunAttr , 
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                          //  console.log($.parseJSON(res));
                            $("#item_"+proID).remove();
                            
                       }
                });
            })

            ////////////
            ////////////   (+ - product)
            $(".removeCart").click(function(){

                $.ajax({
                        url: '<?=$this->Url->build('/')?>cart/removeCart' , 
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                            window.location.reload();
                       }
                });
            })

            ////////////
        })
    
    </script>




<?php if($newOrder["success"]==true): ?>

    <style>
       #order_done {
            display: block;
    padding-left: 0px;
    background: #000000cc;
    z-index: 999999999999999;
        }
        .closeBtn{
            text-align: center;
        background: red;
        color: white;
        border-radius: 25%;
        }
        .closeBtn>span{
            font-size: 40px !important;
            padding-top: 3px  !important;color: white !important;
        }
        .closeBtn>span:hover{
            color: white !important;
        }
    </style>
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade show" id="order_done" tabindex="-1" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="<?=URL?>" type="button" class="close closeBtn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                         <div class="modal-product-info" style="    text-align: center; padding: 40px;">
                                            <p class="added-cart" style="    font-size: 24px;"><i class="fa fa-check-circle"></i> تم استلام طلبك بنجاح سيتم تأكيده ويصلك فى خلال ساعة - ساعتين</p>
                                            <div class="btn-wrapper">
                                                <a href="<?=URL?>" class="theme-btn-1 btn btn-effect-1">الذهاب الى الرئيسية</a>
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

<?php endif;?>