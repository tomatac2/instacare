<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InnerCategory $innerCategory
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Inner Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="innerCategories form content">
            <?= $this->Form->create($innerCategory) ?>
            <fieldset>
                <legend><?= __('Add Inner Category') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
                    echo $this->Form->control('photo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
