<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<div class="categories index content card basic-data-table">
    <div class="card-header">  
    <h3><?= __('الطلبات السابقة') ?></h3>
    </div> 

    <div class="table-responsive card-body">
    <div id="dataTable_wrapper" class="dt-container dt-empty-footer">

        <table class="table bordered-table mb-0 dataTable">
             <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id',['name'=>'إسم المستخدم']) ?></th>
                    <th><?= $this->Paginator->sort('address_id',['name'=>'العنوان ']) ?></th>
                    <th><?= $this->Paginator->sort('total_amount',['name'=>'اجمالي الطلب']) ?></th>
                    <th><?= $this->Paginator->sort('order_type',['name'=>'نوع الطلب ']) ?></th>
                    <th><?= $this->Paginator->sort('status',['name'=>'حالة الطلب ']) ?></th>
                    <th><?= $this->Paginator->sort('notes',['name'=>'ملاحظات ']) ?></th>
                    <th><?= $this->Paginator->sort('created',['name'=>'تاريخ الطلب ']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?=$order->user->name ?></td>
                    <td style="    width: 200px;"><?=$order->address->full_address ?></td>
                    <td><?= $order->total_amount  ?></td>
                    <td><?= $order->order_type == "normal" ? "طلب عادي": "طلب روشتة"  ?></td>
                    <td>
                        <?= $order->status_ar   ?>
                        <br>
                        <?php   echo $order->reject_reason  ?  '<span style="color:red;    background: #ff000024;padding: 10px;">'.$order->reject_reason.'</span>'  : "" ;   ?>
                    </td>
                     <td style="    width: 200px;"><?= h($order->notes)? h($order->notes):"---" ?></td>
                    <td><?php 
                        $created = "".$order->created."";
                    echo $created ? date('Y-m-d',strtotime($created)) : ""; ?></td>
                </tr>
                <?php endforeach; ?>
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