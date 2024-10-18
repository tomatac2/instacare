<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Address> $addresses
 */
?>
<div class="addresses index content">
    <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Addresses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('is_primary') ?></th>
                    <th><?= $this->Paginator->sort('address_lat') ?></th>
                    <th><?= $this->Paginator->sort('address_long') ?></th>
                    <th><?= $this->Paginator->sort('address_type') ?></th>
                    <th><?= $this->Paginator->sort('street_name') ?></th>
                    <th><?= $this->Paginator->sort('building_number') ?></th>
                    <th><?= $this->Paginator->sort('floor_number') ?></th>
                    <th><?= $this->Paginator->sort('apartment_number') ?></th>
                    <th><?= $this->Paginator->sort('unique_mark') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= $this->Number->format($address->id) ?></td>
                    <td><?= $address->hasValue('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                    <td><?= h($address->is_primary) ?></td>
                    <td><?= $address->address_lat === null ? '' : $this->Number->format($address->address_lat) ?></td>
                    <td><?= $address->address_long === null ? '' : $this->Number->format($address->address_long) ?></td>
                    <td><?= h($address->address_type) ?></td>
                    <td><?= h($address->street_name) ?></td>
                    <td><?= h($address->building_number) ?></td>
                    <td><?= h($address->floor_number) ?></td>
                    <td><?= h($address->apartment_number) ?></td>
                    <td><?= h($address->unique_mark) ?></td>
                    <td><?= h($address->created) ?></td>
                    <td><?= h($address->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
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