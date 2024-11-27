<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gift $gift
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gift'), ['action' => 'edit', $gift->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gift'), ['action' => 'delete', $gift->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gift->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gifts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gift'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="gifts view content">
            <h3><?= h($gift->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $gift->hasValue('product') ? $this->Html->link($gift->product->name_ar, ['controller' => 'Products', 'action' => 'view', $gift->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($gift->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gift->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Points') ?></th>
                    <td><?= $this->Number->format($gift->points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($gift->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>