<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Store> $store
 */
?>
<div class="store index content card basic-data-table">
    <div class="card-header">
        <h3><?= __('مخزن المنتجات') ?></h3>
    </div>
    <div id="dataTable_wrapper" class="dt-container dt-empty-footer">
        <table class="table bordered-table mb-0 dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('product_id', ['name' => 'اسم المنتج']) ?></th>
                    <th><?= $this->Paginator->sort('quantity', ['name' => 'الكمية']) ?></th>
                    <th><?= $this->Paginator->sort('remmaing', ['name' => 'المتبقي']) ?></th>
                    <th><?= $this->Paginator->sort('purchase_date', ['name' => 'تاريخ الشراء']) ?></th>
                    <th><?= $this->Paginator->sort('type_ar', ['name' => 'تم بواسطة']) ?></th>
                    <th><?= $this->Paginator->sort('notes', ['name' => 'ملاحظات']) ?></th>
                    <th class="actions"><?= __('خصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($store as $store): ?>
                    <tr>
                        <td><?= $store->product->name_ar ?></td>
                        <td><?= $store->quantity === null ? '' : $this->Number->format($store->quantity) ?></td>
                        <td><?= $store->product->quantity ; ?></td>
                        <td><?= h($store->purchase_date) ?></td>
                        <td><?= $store->type_ar ?></td>
                        <td>
                            <?php   if($store->type != "bill"){ ?>
                                <div class="changeStatus w-50-px h-50-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center" style="cursor: pointer">
                                <iconify-icon icon="ion:plus"></iconify-icon>
                            </div>
                           <?php  }else{ ?>
                                <div class="changeStatus w-50-px h-50-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" style="cursor: pointer">
                                    <iconify-icon icon="ion:minus"></iconify-icon>
                                </div>
                            <?php } ?>
                            <?= h($store->notes) ?>
                        </td>
                        <td>
                        <?php if($store["type"]=="bill"){ ?>
                            <div class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <a href="<?= $this->Url->build('/') . 'store/edit/' . $store->id ?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                </div>
                              
                               <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <?= $this->Form->postLink(
                                    '<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                    ['action' => 'delete', $store->id],
                                    ['confirm' => __('سيتم حذف كمية  '. $store["quantity"].' من المنتج ' . $store["product"]["name_ar"]), 'escape' => false,]
                                )
                                ?>
                                </div>
                            <?php }?>
                      
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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