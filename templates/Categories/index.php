<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
 */
?>

<div class="categories index content card basic-data-table">
     <div class="card-header">  
    <h3><?= __('التصنيفات الرئيسية') ?></h3>
    </div> 
    <div class="table-responsive card-body">
        <div id="dataTable_wrapper" class="dt-container dt-empty-footer">
            <table class="table bordered-table mb-0 dataTable">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('الاسم') ?></th>
                        <th><?= $this->Paginator->sort('الصورة') ?></th>
                        <th class="actions"><?= __('الخصائص') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= h($category->name) ?></td>
                        <td><img src="<?= $this->Url->build('/').$category->photo ?>" width="100" alt="" srcset=""></td>
                        <td>
                            <a href="<?=$this->Url->build('/').'categories/edit/'.$category->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>

                            <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                
                                <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                    ['action' => 'delete', $category->id],
                                    ['confirm' => __('سيتم حذف '.$category["name"]) , 'escape' => false, ]) 
                                ?>
                            </div>
                        </td>
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