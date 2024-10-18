<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $address->hasValue('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Primary') ?></th>
                    <td><?= h($address->is_primary) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address Type') ?></th>
                    <td><?= h($address->address_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street Name') ?></th>
                    <td><?= h($address->street_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Building Number') ?></th>
                    <td><?= h($address->building_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Floor Number') ?></th>
                    <td><?= h($address->floor_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apartment Number') ?></th>
                    <td><?= h($address->apartment_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unique Mark') ?></th>
                    <td><?= h($address->unique_mark) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address Lat') ?></th>
                    <td><?= $address->address_lat === null ? '' : $this->Number->format($address->address_lat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address Long') ?></th>
                    <td><?= $address->address_long === null ? '' : $this->Number->format($address->address_long) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($address->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($address->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Orders') ?></h4>
                <?php if (!empty($address->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cart Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Delivery Cost') ?></th>
                            <th><?= __('Delivery Duration') ?></th>
                            <th><?= __('Total Amount') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Reject Reason') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->orders as $order) : ?>
                        <tr>
                            <td><?= h($order->id) ?></td>
                            <td><?= h($order->cart_id) ?></td>
                            <td><?= h($order->user_id) ?></td>
                            <td><?= h($order->address_id) ?></td>
                            <td><?= h($order->amount) ?></td>
                            <td><?= h($order->delivery_cost) ?></td>
                            <td><?= h($order->delivery_duration) ?></td>
                            <td><?= h($order->total_amount) ?></td>
                            <td><?= h($order->status) ?></td>
                            <td><?= h($order->reject_reason) ?></td>
                            <td><?= h($order->notes) ?></td>
                            <td><?= h($order->created) ?></td>
                            <td><?= h($order->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $order->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $order->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Prescription Orders') ?></h4>
                <?php if (!empty($address->prescription_orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Prescription') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Delivery Cost') ?></th>
                            <th><?= __('Delivery Duration') ?></th>
                            <th><?= __('Total Amount') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Reject Reason') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->prescription_orders as $prescriptionOrder) : ?>
                        <tr>
                            <td><?= h($prescriptionOrder->id) ?></td>
                            <td><?= h($prescriptionOrder->prescription) ?></td>
                            <td><?= h($prescriptionOrder->address_id) ?></td>
                            <td><?= h($prescriptionOrder->user_id) ?></td>
                            <td><?= h($prescriptionOrder->amount) ?></td>
                            <td><?= h($prescriptionOrder->delivery_cost) ?></td>
                            <td><?= h($prescriptionOrder->delivery_duration) ?></td>
                            <td><?= h($prescriptionOrder->total_amount) ?></td>
                            <td><?= h($prescriptionOrder->status) ?></td>
                            <td><?= h($prescriptionOrder->reject_reason) ?></td>
                            <td><?= h($prescriptionOrder->notes) ?></td>
                            <td><?= h($prescriptionOrder->created) ?></td>
                            <td><?= h($prescriptionOrder->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PrescriptionOrders', 'action' => 'view', $prescriptionOrder->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PrescriptionOrders', 'action' => 'edit', $prescriptionOrder->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrescriptionOrders', 'action' => 'delete', $prescriptionOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptionOrder->id)]) ?>
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