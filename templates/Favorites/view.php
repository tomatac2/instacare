<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorite $favorite
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Favorites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Favorite'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="favorites view content">
            <h3><?= h($favorite->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $favorite->hasValue('product') ? $this->Html->link($favorite->product->name_ar, ['controller' => 'Products', 'action' => 'view', $favorite->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $favorite->hasValue('user') ? $this->Html->link($favorite->user->name, ['controller' => 'Users', 'action' => 'view', $favorite->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($favorite->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>