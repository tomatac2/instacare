<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Area $area
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Area'), ['action' => 'edit', $area->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Area'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Areas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Area'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="areas view content">
            <h3><?= h($area->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= $area->hasValue('city') ? $this->Html->link($area->city->name, ['controller' => 'Cities', 'action' => 'view', $area->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($area->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($area->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($area->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($area->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Blocks') ?></h4>
                <?php if (!empty($area->blocks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Area Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($area->blocks as $block) : ?>
                        <tr>
                            <td><?= h($block->id) ?></td>
                            <td><?= h($block->area_id) ?></td>
                            <td><?= h($block->name) ?></td>
                            <td><?= h($block->created) ?></td>
                            <td><?= h($block->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $block->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $block->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $block->id], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>