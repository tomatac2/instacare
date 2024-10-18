<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthFile $healthFile
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Health File'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="healthFile form content">
            <?= $this->Form->create($healthFile) ?>
            <fieldset>
                <legend><?= __('Add Health File') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('weight');
                    echo $this->Form->control('tall');
                    echo $this->Form->control('blood_type');
                    echo $this->Form->control('diseases_array');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
