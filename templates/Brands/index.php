<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Brand> $brands
 */
?>
<div class="categories index content card basic-data-table">
    <div class="card-header">  
        <h3><?= __('العلامات التجارية') ?></h3>
    </div> 
    <div class="table-responsive card-body">
        <table class="table bordered-table mb-0 dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('الاسم') ?></th>
                    <th><?= $this->Paginator->sort('الصورة') ?></th>
                    <th class="actions"><?= __('الخصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($brands as $brand): ?>
                <tr>
                    <td><?= h($brand->name) ?></td>
                    <td><img src="<?= $this->Url->build('/').$brand->photo ?>" width="100" alt="" srcset=""></td>
                    <td>
                        <a href="<?=$this->Url->build('/').'brands/edit/'.$brand->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>

                        <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            
                            <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                ['action' => 'delete', $brand->id],
                                ['confirm' => __('سيتم حذف '.$brand["name"]) , 'escape' => false, ]) 
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