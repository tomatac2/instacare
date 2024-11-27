<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Gift> $gifts
 */
?>
<div class="gifts index content card basic-data-table">
    <div class="card-header">
        <h3><?= __('منتجات الهدايا') ?></h3>
    </div>

    <div id="dataTable_wrapper" class="dt-container dt-empty-footer">
        <table class="table bordered-table mb-0 dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('product_id', ['name' => 'اسم المنتج']) ?></th>
                    <th><?= $this->Paginator->sort('points', ['name' => 'النقاط']) ?></th>
                    <th><?= $this->Paginator->sort('description', ['name' => 'الوصف']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['name' => 'تاريخ الانشاء']) ?></th>
                    <th class="actions"><?= __('الخصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gifts as $gift): ?>
                    <tr>
                        <td><?= $gift->product->name_ar; ?></td>
                        <td><?= $gift->points ?></td>
                        <td><?= $gift->description ?></td>
                        <td><?= h($gift->created) ?></td>
                        <td class="actions">
                            <div class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <a href="<?= $this->Url->build('/') . 'gifts/edit/' . $gift->id ?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                            </div>

                            <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <?= $this->Form->postLink(
                                    '<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                    ['action' => 'delete', $gift->id],
                                    ['confirm' => __('سيتم حذف الهديه  ' . $gift["product"]["name_ar"]), 'escape' => false,]
                                )
                                ?>
                            </div>

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