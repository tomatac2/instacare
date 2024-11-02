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
            <?= $this->Html->link(__('List Join Us'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="joinUs form content">
            <?= $this->Form->create($joinU) ?>
            <fieldset>
                <legend><?= __('Add Join U') ?></legend>
                <?php
                    echo $this->Form->control('pharmacy_name');
                    echo $this->Form->control('pharmacy_phone');
                    echo $this->Form->control('pharmacy_times');
                    echo $this->Form->control('area');
                    echo $this->Form->control('manger_phone');
                    echo $this->Form->control('manger_name');
                    echo $this->Form->control('register_document');
                    echo $this->Form->control('tax_document');
                    echo $this->Form->control('license_document');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
