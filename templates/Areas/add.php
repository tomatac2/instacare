<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Area $area
 * @var \Cake\Collection\CollectionInterface|string[] $cities
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Areas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="areas form content">
            <?= $this->Form->create($area) ?>
            <fieldset>
                <legend><?= __('Add Area') ?></legend>
                <?php
                    echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
