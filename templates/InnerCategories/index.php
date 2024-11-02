<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InnerCategory> $innerCategories
 */
?>
<div class="categories index content card basic-data-table">
    <h3><?= __('التصنيفات الفرعية') ?></h3>
    <div class="table-responsive card-body">
        <table class="table bordered-table mb-0 dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('التصنيف الفرعي') ?></th>
                    <th><?= $this->Paginator->sort('التصنيف الرئيسي') ?></th>
                    <th><?= $this->Paginator->sort('الصورة') ?></th>
                    <th class="actions"><?= __('الخصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($innerCategories as $innerCategory): ?>
                <tr>
                    <td><?= h($innerCategory->name) ?></td>
                    <td><?= $innerCategory->category->name ?></td>
                    <td><img src="<?= $this->Url->build('/').$innerCategory->photo ?>" width="100" alt="" srcset=""></td>
                    <td class="actions">
                        <a href="<?=$this->Url->build('/').'innerCategories/edit/'.$innerCategory->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>

                        <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            
                            <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                ['action' => 'delete', $innerCategory->id],
                                ['confirm' => __('سيتم حذف '.$innerCategory["name"]) , 'escape' => false, ]) 
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