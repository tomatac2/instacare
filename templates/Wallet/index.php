<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Wallet> $wallet
 */
?>
<div class="wallet index content">
    <?= $this->Html->link(__('New Wallet'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Wallet') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('points') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wallet as $wallet): ?>
                <tr>
                    <td><?= $this->Number->format($wallet->id) ?></td>
                    <td><?= $wallet->hasValue('user') ? $this->Html->link($wallet->user->name, ['controller' => 'Users', 'action' => 'view', $wallet->user->id]) : '' ?></td>
                    <td><?= $wallet->points === null ? '' : $this->Number->format($wallet->points) ?></td>
                    <td><?= h($wallet->created) ?></td>
                    <td><?= h($wallet->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $wallet->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wallet->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wallet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wallet->id)]) ?>
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