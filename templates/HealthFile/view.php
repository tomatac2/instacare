<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthFile $healthFile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Health File'), ['action' => 'edit', $healthFile->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Health File'), ['action' => 'delete', $healthFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $healthFile->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Health File'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Health File'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="healthFile view content">
            <h3><?= h($healthFile->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $healthFile->hasValue('user') ? $this->Html->link($healthFile->user->name, ['controller' => 'Users', 'action' => 'view', $healthFile->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Blood Type') ?></th>
                    <td><?= h($healthFile->blood_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diseases Array') ?></th>
                    <td><?= h($healthFile->diseases_array) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($healthFile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= $healthFile->weight === null ? '' : $this->Number->format($healthFile->weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tall') ?></th>
                    <td><?= $healthFile->tall === null ? '' : $this->Number->format($healthFile->tall) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($healthFile->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($healthFile->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>