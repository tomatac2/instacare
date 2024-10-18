<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrescriptionOrder $prescriptionOrder
 * @var string[]|\Cake\Collection\CollectionInterface $addresses
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prescriptionOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionOrder->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Prescription Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prescriptionOrders form content">
            <?= $this->Form->create($prescriptionOrder) ?>
            <fieldset>
                <legend><?= __('Edit Prescription Order') ?></legend>
                <?php
                    echo $this->Form->control('prescription');
                    echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('delivery_cost');
                    echo $this->Form->control('delivery_duration');
                    echo $this->Form->control('total_amount');
                    echo $this->Form->control('status');
                    echo $this->Form->control('reject_reason');
                    echo $this->Form->control('notes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
