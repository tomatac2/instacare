<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\HealthFile> $healthFile
 */
?>
<div class="healthFile index content">
    <?= $this->Html->link(__('New Health File'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Health File') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('weight') ?></th>
                    <th><?= $this->Paginator->sort('tall') ?></th>
                    <th><?= $this->Paginator->sort('blood_type') ?></th>
                    <th><?= $this->Paginator->sort('diseases_array') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($healthFile as $healthFile): ?>
                <tr>
                    <td><?= $this->Number->format($healthFile->id) ?></td>
                    <td><?= $healthFile->hasValue('user') ? $this->Html->link($healthFile->user->name, ['controller' => 'Users', 'action' => 'view', $healthFile->user->id]) : '' ?></td>
                    <td><?= $healthFile->weight === null ? '' : $this->Number->format($healthFile->weight) ?></td>
                    <td><?= $healthFile->tall === null ? '' : $this->Number->format($healthFile->tall) ?></td>
                    <td><?= h($healthFile->blood_type) ?></td>
                    <td><?= h($healthFile->diseases_array) ?></td>
                    <td><?= h($healthFile->created) ?></td>
                    <td><?= h($healthFile->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $healthFile->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $healthFile->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $healthFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $healthFile->id)]) ?>
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