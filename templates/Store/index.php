<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Store> $store
 */
?>
<div class="store index content">
    <?= $this->Html->link(__('New Store'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Store') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('purchase_date') ?></th>
                    <th><?= $this->Paginator->sort('notes') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($store as $store): ?>
                <tr>
                    <td><?= $this->Number->format($store->id) ?></td>
                    <td><?= $store->hasValue('product') ? $this->Html->link($store->product->name_ar, ['controller' => 'Products', 'action' => 'view', $store->product->id]) : '' ?></td>
                    <td><?= $store->quantity === null ? '' : $this->Number->format($store->quantity) ?></td>
                    <td><?= h($store->purchase_date) ?></td>
                    <td><?= h($store->notes) ?></td>
                    <td><?= h($store->created) ?></td>
                    <td><?= h($store->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $store->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $store->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
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