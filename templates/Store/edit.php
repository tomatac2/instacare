<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $store->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Store'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="store form content">
            <?= $this->Form->create($store) ?>
            <fieldset>
                <legend><?= __('Edit Store') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('purchase_date', ['empty' => true]);
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
