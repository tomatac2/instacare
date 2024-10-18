<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Area> $areas
 */
?>
<div class="areas index content">
    <?= $this->Html->link(__('New Area'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Areas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('city_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($areas as $area): ?>
                <tr>
                    <td><?= $this->Number->format($area->id) ?></td>
                    <td><?= $area->hasValue('city') ? $this->Html->link($area->city->name, ['controller' => 'Cities', 'action' => 'view', $area->city->id]) : '' ?></td>
                    <td><?= h($area->name) ?></td>
                    <td><?= h($area->created) ?></td>
                    <td><?= h($area->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $area->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $area->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id)]) ?>
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