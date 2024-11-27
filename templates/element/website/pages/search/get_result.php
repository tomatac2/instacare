<div class="ltn__shop-options">
    <ul>
        <li>
            <div class="showing-product-number text-right">
                <span><?= $title ?></span>
            </div>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade active show" id="liton_product_grid">
        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
            <div class="row">
                <?php foreach ($products as $val) { ?>
                    <!--product item -->
                    <div class="col-xl-3 col-md-3 col-sm-3 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="<?= URL . 'products/details/' . $val["id"] ?>"><img src="<?= URL . $val["photo"] ?>" alt="#"></a>

                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a href="<?= URL . 'products/details' . $val["id"] ?>"><?= $val["name_ar"] ?></a></h2>
                                <div class="product-price">
                                    <span><?= $val["price"] ?> جنيه</span>
                                </div>
                            </div>
                            <button class="add-to-cart add_to_cart w-100 addToCart " id="cartBtn_<?= $val["id"] ?>" style="background-color:#0a9a73;color:white">
                                اضف للسلة
                                <input type="hidden" name="product_id" value="<?= $val["id"] ?>">
                            </button>
                        </div>
                    </div>
                    <!--end product item -->
                <?php } ?>
                <!--product item -->
            </div>
        </div>
    </div>

</div>

<!-- <div class="paginator dt-paging paging_full_numbers">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('أول')) ?>
            <?= $this->Paginator->prev('< ' . __('سابق')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('تالي') . ' >') ?>
            <?= $this->Paginator->last(__('أخير') . ' >>') ?>
        </ul>
    </div> -->

<div class="ltn__pagination-area text-center">
    <div class="ltn__pagination">
        <ul>
            <?= $this->Paginator->first('<< ' . __('أول')) ?>
            <?= $this->Paginator->prev('< ' . __('سابق')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('تالي') . ' >') ?>
            <?= $this->Paginator->last(__('أخير') . ' >>') ?>
        </ul>
    </div>
</div>





<script>
    $(function() {
        $(".addToCart").click(function() {




            var proID = $(this).find("input[name='product_id']").val();
            var thisBtn = $("#cartBtn_" + proID).text("تمت الإضافة للسلة").css("background", "silver").prop("disabled", true);
            // var qun = $(this).find("input[name='quantity']").val();
            //var price = $(this).find("input[name='price']").val();

            //  $("#liton_wishlist_modal").css("display","block").css("opacity","1").css("background","#000000ab").css("z-index","99999");

            $.ajax({
                url: '<?= $this->Url->build('/') ?>cart/addToCart?proID=' + proID, //+'&qun='+qun+'&price='+price,
                type: 'GET',
                cache: false,
                headers: {
                    'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken') ?>"
                },
                success: function(res) {
                    var cartCount = $("sup").text();
                    $("sup").text(cartCount++ + 1);

                    //  console.log($.parseJSON(res));

                }
            });
        })
    })
</script>