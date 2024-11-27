<h3>العناوين</h3>
<?php 
foreach ($my_addressess["data"] as $k => $v) { ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="float:right;padding:5px">
        <div class="ltn__map-item">
            <div style="text-align: center;">
                <h3 class="ltn__location-name animated fadeIn pb-10" style=" text-align: right; border-bottom: 1px solid #dcdcdc !important;  color: black;">
                    <i class="fas fa-map-marker-alt" style="    background: #10ab81;padding: 5px;border-radius: 50%;color: white;font-size: 11px;"></i> <?= $v["address_type"] ?>

                    <?= $this->Form->postLink(' <i class="fas fa-trash" style="float: left; cursor: pointer;    background: #10ab81;padding: 5px;border-radius: 50%;color: white;font-size: 11px;"></i>',
                                    ['controller'=>'Addresses','action' => 'delete', $v->id],
                                    ['confirm' => __('تأكيد حذف العنوان '.$v["full_address"]) , 'escape' => false, ]) 
                                ?>

                </h3>
                <h6 class=" ltn__location-name animated fadeIn mb-0 ">
                    العنوان
                </h6>
                <strong><?= $v["full_address"] ?></strong>
                <br><br>
                <h6 class=" ltn__location-name animated fadeIn mb-0 ">
                    رقم المبني / الفيلا
                </h6>
                <strong> <?= $v["building_number"] ?> </strong>
                <br><br>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h6 class=" ltn__location-name animated fadeIn mb-0 ">
                            رقم الطابق
                        </h6>
                        <strong><?= $v["floor_number"] ?></strong>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <h6 class=" ltn__location-name animated fadeIn mb-0 ">
                            رقم الشقة
                        </h6>
                        <strong><?= $v["apartment_number"] ?></strong>
                    </div>
                </div>
                <br>
                <h6 class=" ltn__location-name animated fadeIn mb-0 ">
                    علامة مميزة
                </h6>
                <strong><?= $v["unique_mark"] ?></strong>

            </div>

        </div>
    </div>
<?php } ?>


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="float:right;padding:5px">
    <div class="ltn__map-item">
        <div style="text-align: center;">
            <a href="<?=URL.'إضافة-عنوان-جديد'?>" class="ltn__location-name animated fadeIn" >
                <span class="plus_css">+</span>    
            
            <h3 class="ltn__location-name animated fadeIn">
                أضف عنوان جديد
            </h3>
            </a>
        </div>

    </div>
</div>


<style>
    .plus_css{
       text-align: center;    cursor: pointer;background: #10ab8147;color: black;border-radius: 50%;font-size: 30px;color: #10ab81;padding: 3px 13px 0px 13px
    }
</style>