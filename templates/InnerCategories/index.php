<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InnerCategory> $innerCategories
 */
?>
<div class="innerCategories index content">
    <?= $this->Html->link(__('New Inner Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inner Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('photo') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($innerCategories as $innerCategory): ?>
                <tr>
                    <td><?= $this->Number->format($innerCategory->id) ?></td>
                    <td><?= h($innerCategory->name) ?></td>
                    <td><?= $innerCategory->hasValue('category') ? $this->Html->link($innerCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $innerCategory->category->id]) : '' ?></td>
                    <td><?= h($innerCategory->photo) ?></td>
                    <td><?= h($innerCategory->created) ?></td>
                    <td><?= h($innerCategory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $innerCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $innerCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $innerCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innerCategory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>