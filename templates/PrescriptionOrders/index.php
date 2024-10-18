<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PrescriptionOrder> $prescriptionOrders
 */
?>
<div class="prescriptionOrders index content">
    <?= $this->Html->link(__('New Prescription Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prescription Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('prescription') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('delivery_cost') ?></th>
                    <th><?= $this->Paginator->sort('delivery_duration') ?></th>
                    <th><?= $this->Paginator->sort('total_amount') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('reject_reason') ?></th>
                    <th><?= $this->Paginator->sort('notes') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prescriptionOrders as $prescriptionOrder): ?>
                <tr>
                    <td><?= $this->Number->format($prescriptionOrder->id) ?></td>
                    <td><?= h($prescriptionOrder->prescription) ?></td>
                    <td><?= $prescriptionOrder->hasValue('address') ? $this->Html->link($prescriptionOrder->address->id, ['controller' => 'Addresses', 'action' => 'view', $prescriptionOrder->address->id]) : '' ?></td>
                    <td><?= $prescriptionOrder->hasValue('user') ? $this->Html->link($prescriptionOrder->user->name, ['controller' => 'Users', 'action' => 'view', $prescriptionOrder->user->id]) : '' ?></td>
                    <td><?= $prescriptionOrder->amount === null ? '' : $this->Number->format($prescriptionOrder->amount) ?></td>
                    <td><?= $prescriptionOrder->delivery_cost === null ? '' : $this->Number->format($prescriptionOrder->delivery_cost) ?></td>
                    <td><?= $prescriptionOrder->delivery_duration === null ? '' : $this->Number->format($prescriptionOrder->delivery_duration) ?></td>
                    <td><?= $prescriptionOrder->total_amount === null ? '' : $this->Number->format($prescriptionOrder->total_amount) ?></td>
                    <td><?= h($prescriptionOrder->status) ?></td>
                    <td><?= h($prescriptionOrder->reject_reason) ?></td>
                    <td><?= h($prescriptionOrder->notes) ?></td>
                    <td><?= h($prescriptionOrder->created) ?></td>
                    <td><?= h($prescriptionOrder->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $prescriptionOrder->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prescriptionOrder->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prescriptionOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionOrder->id)]) ?>
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