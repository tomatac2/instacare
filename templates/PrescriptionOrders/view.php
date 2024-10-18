<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrescriptionOrder $prescriptionOrder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prescription Order'), ['action' => 'edit', $prescriptionOrder->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prescription Order'), ['action' => 'delete', $prescriptionOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionOrder->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prescription Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prescription Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prescriptionOrders view content">
            <h3><?= h($prescriptionOrder->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Prescription') ?></th>
                    <td><?= h($prescriptionOrder->prescription) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $prescriptionOrder->hasValue('address') ? $this->Html->link($prescriptionOrder->address->id, ['controller' => 'Addresses', 'action' => 'view', $prescriptionOrder->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $prescriptionOrder->hasValue('user') ? $this->Html->link($prescriptionOrder->user->name, ['controller' => 'Users', 'action' => 'view', $prescriptionOrder->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($prescriptionOrder->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reject Reason') ?></th>
                    <td><?= h($prescriptionOrder->reject_reason) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= h($prescriptionOrder->notes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($prescriptionOrder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $prescriptionOrder->amount === null ? '' : $this->Number->format($prescriptionOrder->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delivery Cost') ?></th>
                    <td><?= $prescriptionOrder->delivery_cost === null ? '' : $this->Number->format($prescriptionOrder->delivery_cost) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delivery Duration') ?></th>
                    <td><?= $prescriptionOrder->delivery_duration === null ? '' : $this->Number->format($prescriptionOrder->delivery_duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Amount') ?></th>
                    <td><?= $prescriptionOrder->total_amount === null ? '' : $this->Number->format($prescriptionOrder->total_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($prescriptionOrder->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($prescriptionOrder->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>