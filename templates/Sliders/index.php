<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Slider> $sliders
 */
?>
<div class="sliders index content card basic-data-table">
    <div class="card-header">  
        <h3><?= __('قائمة السيلدير') ?></h3>
    <div class="table-responsive">
            <table id="dataTable_wrapper"  class="table bordered-table mb-0 dataTable dt-container dt-empty-footer">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name',['name'=>'الاسم']) ?></th>
                    <th><?= $this->Paginator->sort('الصورة') ?></th>
                    <th><?= $this->Paginator->sort('link',['name'=>'الرابط']) ?></th>
                    <th><?= $this->Paginator->sort('type',['name'=>'نوع السيلدير']) ?></th>
                    <th><?= $this->Paginator->sort('created',['name'=>'تاريخ الانشاء']) ?></th>
                    <th class="actions"><?= __('الخصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliders as $slider): ?>
                <tr>
                    <td><?= h($slider->name) ?></td>
                    <td><img src="<?=URL.$slider["photo"]?>" width="150"></td>
                    <td><a href="<?= h($slider->link) ?>"><iconify-icon icon="websymbol:link"></iconify-icon></a></td>
                    <td><?= h($slider->type) ?></td>
                    <td><?= h($slider->created) ?></td>
                    <td>
                            <a href="<?=$this->Url->build('/').'sliders/edit/'.$slider->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>

                            <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                
                                <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                    ['action' => 'delete', $slider->id],
                                    ['confirm' => __('سيتم حذف '.$slider["name"]) , 'escape' => false, ]) 
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