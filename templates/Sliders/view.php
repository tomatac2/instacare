<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sliders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Slider'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sliders view content">
            <h3><?= h($slider->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($slider->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($slider->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Link') ?></th>
                    <td><?= h($slider->link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($slider->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($slider->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($slider->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>