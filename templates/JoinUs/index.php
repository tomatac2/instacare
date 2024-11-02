<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\JoinU> $joinUs
 */
?>
<div class="joinUs index content">
    <?= $this->Html->link(__('New Join U'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Join Us') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pharmacy_name') ?></th>
                    <th><?= $this->Paginator->sort('pharmacy_phone') ?></th>
                    <th><?= $this->Paginator->sort('pharmacy_times') ?></th>
                    <th><?= $this->Paginator->sort('area') ?></th>
                    <th><?= $this->Paginator->sort('manger_phone') ?></th>
                    <th><?= $this->Paginator->sort('manger_name') ?></th>
                    <th><?= $this->Paginator->sort('register_document') ?></th>
                    <th><?= $this->Paginator->sort('tax_document') ?></th>
                    <th><?= $this->Paginator->sort('license_document') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($joinUs as $joinU): ?>
                <tr>
                    <td><?= $this->Number->format($joinU->id) ?></td>
                    <td><?= h($joinU->pharmacy_name) ?></td>
                    <td><?= h($joinU->pharmacy_phone) ?></td>
                    <td><?= h($joinU->pharmacy_times) ?></td>
                    <td><?= h($joinU->area) ?></td>
                    <td><?= h($joinU->manger_phone) ?></td>
                    <td><?= h($joinU->manger_name) ?></td>
                    <td><?= h($joinU->register_document) ?></td>
                    <td><?= h($joinU->tax_document) ?></td>
                    <td><?= h($joinU->license_document) ?></td>
                    <td><?= h($joinU->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $joinU->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $joinU->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $joinU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinU->id)]) ?>
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