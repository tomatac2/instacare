<div class="col-lg-12">
    <h3>الطلبات</h3>
   
    <?php 
    
    if(!$my_orders["data"]){
            echo "<h4 class='no_records'>لايوجد طلبات</h4>";
    }
    foreach($my_orders["data"] as $k=>$v){ 
        $orderDate = date("d-m-Y",strtotime($v["created"]));
        $productsCount = count($v["cart"]) ; 
        ?>
    <div class="ltn__map-item" style="margin-top: 15px;;">
        <div class="col-lg-8  col-md-8 col-sm-12" style="float: right;">
            <h3 class="ltn__location-name animated fadeIn">
                    طلب رقم #<?=$v["order_temp_id"]?>
                    <span class="status"><?=$v["status_ar"]?></span>
                </h3>
            <h5 class="ltn__location-single-info"><i class="fas fa-file-alt"></i> تاريخ الطلب : <?=$orderDate?> <br><?= $v->order_type == "normal" ?   "عدد المنتجات".$productsCount :""?></h5>
        </div>
        <div class="col-lg-4  col-md-4 col-sm-12" style="float: left;">
            <div class="btn-wrapper" >
                <a class="orderDetails btn btn-transparent btn-border btn-effect-3" style="    border: 2px solid #10ab81;">عرض التفاصيل
                <input type="hidden" class="orderID" value="<?= $v["id"] ?>">      
                </a>
             </div>
        </div>
        <br><br><br>
        <br><br><br>
    <div class="col-sm-12">
                    <?=
                        $v->order_type == "normal" ? $this->element("dashboard/orders/details", ["data" => $v])
                                                : $this->element("dashboard/orders/prescription", ["data" => $v])
                    ?>  
                </div>

                </div>
    <?php }?>
</div>



<style>
    dialog {
        width: 100%;
        padding: 30px 30px 70px 30px;
        border: 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        position: relative;
    }

    dialog button {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #ff0000;
        color: #ffffff;
        font-size: 25px;
        border-radius: 6px;
        width: 32px;
    }

    p {
        color: #aaa;
        padding-bottom: 10px;
        line-height: 2;
        font-size: 14px;
    }

    .ui-dialog .ui-dialog-buttonpane {
        padding: 5px !important;
    }

    .ui-dialog .ui-dialog-buttonpane button {
        background: #c0c0c069;
    }
</style>