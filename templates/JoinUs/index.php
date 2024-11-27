<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\JoinU> $joinUs
 */
?>
<div class="categories index content card basic-data-table">
    <div class="card-header">
        <h3><?= __('طلبات انضمام') ?></h3>
        <div class="table-responsive card-body">
            <div id="dataTable_wrapper" class="dt-container dt-empty-footer">
                <table class="table bordered-table mb-0 dataTable">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('pharmacy_name',["name"=>"إسم الصيدلية"]) ?></th>
                            <th><?= $this->Paginator->sort('pharmacy_phone',["name"=>"رقم هاتف الصيدلية"]) ?></th>
                            <th><?= $this->Paginator->sort('pharmacy_times',["name"=>"مواعيد الصيدلية"]) ?></th>
                            <th><?= $this->Paginator->sort('area',["name"=>"المنطقة"]) ?></th>
                            <th><?= $this->Paginator->sort('manger_phone',["name"=>"رقم هاتف مدير الصيدلية"]) ?></th>
                            <th><?= $this->Paginator->sort('manger_name',["name"=>"إسم مدير الصيدلية"]) ?></th>
                            <th><?= $this->Paginator->sort('register_document',["name"=>"السجل التجاري"]) ?></th>
                            <th><?= $this->Paginator->sort('tax_document',["name"=>"الملف الضريبي"]) ?></th>
                            <th><?= $this->Paginator->sort('license_document',["name"=>"الرخصة"]) ?></th>
                            <th><?= $this->Paginator->sort('created',["name"=>"تاريخ التقديم"]) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($joinUs as $joinU): ?>
                            <tr>
                                <td><?= h($joinU->pharmacy_name) ?></td>
                                <td><?= h($joinU->pharmacy_phone) ?></td>
                                <td><?= h($joinU->pharmacy_times) ?></td>
                                <td><?= h($joinU->area) ?></td>
                                <td><?= h($joinU->manger_phone) ?></td>
                                <td><?= h($joinU->manger_name) ?></td>
                                <td>
                                    <a href="<?=URL.$joinU["register_document"]?>" download="">
                                        <iconify-icon icon="typcn:download"></iconify-icon>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?=URL.$joinU["tax_document"]?>" download="">
                                        <iconify-icon icon="typcn:download"></iconify-icon>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?=URL.$joinU["license_document"]?>" download="">
                                        <iconify-icon icon="typcn:download"></iconify-icon>
                                    </a>
                                </td>
                                <td><?= h($joinU->created) ?></td>
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