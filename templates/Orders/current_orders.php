 <div class="categories index content card basic-data-table">
     <div class="card-header">
         <h3><?= __('الطلبات الحالية') ?></h3>
     </div>

     <div class="table-responsive card-body">
         <div id="dataTable_wrapper" class="dt-container dt-empty-footer">


             <table class="table bordered-table mb-0 dataTable">
                 <thead>
                     <tr>
                         <th><?= $this->Paginator->sort('user_id', ['name' => 'إسم العميل']) ?></th>
                         <th><?= $this->Paginator->sort('total_amount', ['name' => 'اجمالي الطلب']) ?></th>
                         <th><?= $this->Paginator->sort('details', ['name' => 'عرض تفاصيل ']) ?></th>
                         <th><?= $this->Paginator->sort('order_type', ['name' => 'نوع الطلب ']) ?></th>
                         <th><?= $this->Paginator->sort('status', ['name' => 'حالة الطلب ']) ?></th>
                         <th><?= $this->Paginator->sort('address_id', ['name' => 'العنوان ']) ?></th>
                         <th><?= $this->Paginator->sort('created', ['name' => 'تاريخ الطلب ']) ?></th>
                     </tr>
                 </thead>

                 <tbody id="liveOrders">
                     <input type="" id="currentCount">

                     <?php foreach ($orders as $order):    ?>
                         <tr id="tr_<?= $order["id"] ?>">
                             <td><?= $order->user->name ?></td>
                             <td><?= $order->total_amount  ?></td>
                             <td>

                                 <button class="orderDetails btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                     <input type="hidden" class="orderID" value="<?= $order["id"] ?>">
                                     تفاصيل الطلب</button>
                                 <?=
                                    $order->order_type == "normal" ? $this->element("dashboard/orders/details", ["data" => $order])
                                        : $this->element("dashboard/orders/prescription", ["data" => $order])  ?>


                             </td>
                             <td><?= $order->order_type == "normal" ? "طلب عادي" : "طلب روشتة"  ?></td>
                             <td class="actions">
                                <a href="#popup-box" class="changeStatus w-50-px h-50-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" style="cursor: pointer">
                                    <input type="hidden" class="status" value="approved">
                                    <input type="hidden" class="orderID" value="<?= $order["id"] ?>">
                                    <iconify-icon icon="ion:checkmark-sharp"></iconify-icon>قبول
                                </a>

                                <a href="#popup-box" class="changeStatus w-50-px h-50-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" style="cursor: pointer">
                                    <input type="hidden" class="status" value="rejected">
                                    <input type="hidden" class="orderID" value="<?= $order["id"] ?>">
                                    <iconify-icon icon="ion:close-sharp"></iconify-icon>رفض
                                </a>
                    
                             </td>
                             <td style="    width: 200px;"><?= $order->address->full_address ?></td>


                             <td><?php
                                    $created = "" . $order->created . "";
                                    echo $created ? date('Y-m-d h:i A', strtotime($created)) : ""; ?></td>
                             <td> </td>
                         </tr>
                     <?php endforeach; ?>
                     <input type="hidden" id="ids" value="<?= implode(',', array_column($orders->toArray(), "id"))  ?>">
                 </tbody>
             </table>
         </div>
     </div>
     <div class="paginator dt-paging paging_full_numbers">
         <ul class="pagination">
             <?= $this->Paginator->first('<< ' . __('أول')) ?>
             <?= $this->Paginator->prev('< ' . __('سابق')) ?>
             <?= $this->Paginator->numbers() ?>
             <?= $this->Paginator->next(__('تالي') . ' >') ?>
             <?= $this->Paginator->last(__('أخير') . ' >>') ?>
         </ul>
     </div>

 </div>






 <style>
     dialog {
         width: 500px;
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




 <script>
     var ids = $("#ids").val();
     $(function() {
         setInterval(function() {
             getLiveOrders();
         }, 12000); //120000  2mins


         function getLiveOrders() {
             $.ajax({
                 url: '<?= $this->Url->build('/') ?>orders/live_orders',
                 type: 'POST',
                 data: {
                     "ids": $("#ids").val()
                 },
                 cache: false,
                 headers: {
                     'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken') ?>"
                 },
                 success: function(res) {
                     //console.log(res);
                     //$("#currentCount").val(res.);
                     // <input type="hidden" value="<?= $currentCount ?>" id="currentCount">
                     $("#liveOrders").append(res);
                 }
             });
         }

     })
 </script>

 <script>
     $(function() {
       //  $(".changeStatus").click(function() {
            $(document).on('click', '.changeStatus', function () {
            var orderID = $(this).find(".orderID").val();
            var status = $(this).find(".status").val();
            var title, body;

            //  console.log(orderID);
            //  console.log(status);

             if (status == "approved") {
                 title = "تأكيد الموافقة";
                 body = `
                <a class="approved btn btn-success border border-primary-600 text-md px-56 py-12 radius-8">
                    <input type="hidden" class="orderID" value="${orderID}">
                    <input type="hidden" class="status" value="approved">
                    تأكيد الطلب
                </a>
                `;
             } else {
                 title = "سبب الإلغاء";
                 body = `
                        <textarea style="width: 100%; margin: 10px;" id="reject_reason"></textarea>
                        <button class="cancelled btn btn-danger border border-primary-600 text-md px-56 py-12 radius-8" disabled >
                            <input type="hidden" class="orderID" value="${orderID}">
                            <input type="hidden" class="status" value="rejected">
                            الغاء الطلب
                        </button>
                        `;
             }

             $("#title").text(title);
             $("#body").html(body);

             $(".approved , .cancelled").click(function() {

                 var data;
                 status == "approved" ? data = {
                         "orderID": orderID,
                         "status": status
                     } :
                     data = {
                         "orderID": orderID,
                         "status": status,
                         "reject_reason": $("#reject_reason").val()
                     };
                 changeStatus(data) ////{"orderID":orderID , "status":status ,"msg" : msg, "title":title}
             })

         })



         function changeStatus(obj) {
             // console.log({"obj":obj})
             var urlParam;
             obj["status"] == "approved" ? urlParam = "?orderID=" + obj["orderID"] + '&status=' + obj["status"] :
                 urlParam = "?orderID=" + obj["orderID"] + '&status=' + obj["status"] + '&reject_reason=' + obj["reject_reason"];

             $.ajax({
                 url: '<?= $this->Url->build('/') ?>orders/changeOrderStatus' + urlParam, //+'&qun='+qun+'&price='+price,
                 type: 'GET',
                 cache: false,
                 headers: {
                     'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken') ?>"
                 },
                 success: function(res) {
                     //console.log($.parseJSON(res));
                     if (window.location.hash) {
                        window.location.href = "<?=URL.'الطلبات-الحالية#'?>";
                    }
                 
                     $("#tr_" + obj["orderID"]).remove();
                 }
             });
         }

      
         //cool idea (find element by id if not in DOM)
         $(document).on('keyup', '#reject_reason', function () {
            if($('#reject_reason').val().length > 0   ){
                $('.cancelled').prop('disabled', false);
            }else{
                $('.cancelled').prop('disabled', true);
            }
        });

 
                
 
     })
 </script>




 <!--------------pop up----------->
 <?php // $this->element("dashboard/others/popup")
    ?>



 <style>
     .box {
         background-color: black;
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .box a {
         padding: 15px;
         background-color: #fff;
         border-radius: 3px;
         text-decoration: none;
     }

     .modal {
         position: fixed;
         inset: 0;
         background: rgba(254,
                 126,
                 126,
                 0.7);
         display: none;
         align-items: center;
         justify-content: center;
     }

     .content {
         position: relative;
         background: white;
         padding: 1em 2em;
         border-radius: 4px;
     }

     .modal:target {
         display: flex;
     }
 </style>



 <div id="popup-box" class="modal">
     <div class="content">
         <h4 id="title" style="text-align: center;"> </h4>
         <div id="body" style="text-align: center;"></div>
         <a href="#"style="
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        color: #fe0606;
                        font-size: 30px;
                        text-decoration: none;
                    ">&times;</a>
     </div>
 </div>


 <!--------------end pop up----------->