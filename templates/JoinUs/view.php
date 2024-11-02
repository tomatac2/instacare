<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinU $joinU
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Join U'), ['action' => 'edit', $joinU->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Join U'), ['action' => 'delete', $joinU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinU->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Join Us'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Join U'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="joinUs view content">
            <h3><?= h($joinU->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pharmacy Name') ?></th>
                    <td><?= h($joinU->pharmacy_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pharmacy Phone') ?></th>
                    <td><?= h($joinU->pharmacy_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pharmacy Times') ?></th>
                    <td><?= h($joinU->pharmacy_times) ?></td>
                </tr>
                <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= h($joinU->area) ?></td>
                </tr>
                <tr>
                    <th><?= __('Manger Phone') ?></th>
                    <td><?= h($joinU->manger_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Manger Name') ?></th>
                    <td><?= h($joinU->manger_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Register Document') ?></th>
                    <td><?= h($joinU->register_document) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Document') ?></th>
                    <td><?= h($joinU->tax_document) ?></td>
                </tr>
                <tr>
                    <th><?= __('License Document') ?></th>
                    <td><?= h($joinU->license_document) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($joinU->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($joinU->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>