
            
                    <?php    foreach ($orders as $order):     ?>
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
                    <?php 
                        endforeach;
                        if(count($orders->toArray()) > 0){
                            echo '<script>
                                        $(function(){
                                            var a = [$("#ids").val()] ;
                                            a.push(['.implode(",",array_column($orders->toArray(),"id")).'])
                                            $("#ids").val(a);
                                        })
                                </script>' ; 
                        }
                    ?>
        
   

