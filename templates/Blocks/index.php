<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Block> $blocks
 */
?>
<div class="blocks index content">
    <?= $this->Html->link(__('New Block'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Blocks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('area_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blocks as $block): ?>
                <tr>
                    <td><?= $this->Number->format($block->id) ?></td>
                    <td><?= $block->hasValue('area') ? $this->Html->link($block->area->name, ['controller' => 'Areas', 'action' => 'view', $block->area->id]) : '' ?></td>
                    <td><?= h($block->name) ?></td>
                    <td><?= h($block->created) ?></td>
                    <td><?= h($block->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $block->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $block->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $block->id], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?>
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