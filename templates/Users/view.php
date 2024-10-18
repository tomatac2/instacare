<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile') ?></th>
                    <td><?= h($user->mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->hasValue('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= h($user->is_active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Recovery Hash Code') ?></th>
                    <td><?= h($user->recovery_hash_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($user->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Is Primary') ?></th>
                            <th><?= __('Address Lat') ?></th>
                            <th><?= __('Address Long') ?></th>
                            <th><?= __('Address Type') ?></th>
                            <th><?= __('Street Name') ?></th>
                            <th><?= __('Building Number') ?></th>
                            <th><?= __('Floor Number') ?></th>
                            <th><?= __('Apartment Number') ?></th>
                            <th><?= __('Unique Mark') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->addresses as $address) : ?>
                        <tr>
                            <td><?= h($address->id) ?></td>
                            <td><?= h($address->user_id) ?></td>
                            <td><?= h($address->is_primary) ?></td>
                            <td><?= h($address->address_lat) ?></td>
                            <td><?= h($address->address_long) ?></td>
                            <td><?= h($address->address_type) ?></td>
                            <td><?= h($address->street_name) ?></td>
                            <td><?= h($address->building_number) ?></td>
                            <td><?= h($address->floor_number) ?></td>
                            <td><?= h($address->apartment_number) ?></td>
                            <td><?= h($address->unique_mark) ?></td>
                            <td><?= h($address->created) ?></td>
                            <td><?= h($address->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $address->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $address->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Cart') ?></h4>
                <?php if (!empty($user->cart)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Order Temp Id') ?></th>
                            <th><?= __('Is Ordered') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->cart as $cart) : ?>
                        <tr>
                            <td><?= h($cart->id) ?></td>
                            <td><?= h($cart->user_id) ?></td>
                            <td><?= h($cart->product_id) ?></td>
                            <td><?= h($cart->quantity) ?></td>
                            <td><?= h($cart->order_temp_id) ?></td>
                            <td><?= h($cart->is_ordered) ?></td>
                            <td><?= h($cart->created) ?></td>
                            <td><?= h($cart->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cart', 'action' => 'view', $cart->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cart', 'action' => 'edit', $cart->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cart', 'action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Favorites') ?></h4>
                <?php if (!empty($user->favorites)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->favorites as $favorite) : ?>
                        <tr>
                            <td><?= h($favorite->id) ?></td>
                            <td><?= h($favorite->product_id) ?></td>
                            <td><?= h($favorite->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Favorites', 'action' => 'view', $favorite->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Favorites', 'action' => 'edit', $favorite->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favorites', 'action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Health File') ?></h4>
                <?php if (!empty($user->health_file)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weight') ?></th>
                            <th><?= __('Tall') ?></th>
                            <th><?= __('Blood Type') ?></th>
                            <th><?= __('Diseases Array') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->health_file as $healthFile) : ?>
                        <tr>
                            <td><?= h($healthFile->id) ?></td>
                            <td><?= h($healthFile->user_id) ?></td>
                            <td><?= h($healthFile->weight) ?></td>
                            <td><?= h($healthFile->tall) ?></td>
                            <td><?= h($healthFile->blood_type) ?></td>
                            <td><?= h($healthFile->diseases_array) ?></td>
                            <td><?= h($healthFile->created) ?></td>
                            <td><?= h($healthFile->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'HealthFile', 'action' => 'view', $healthFile->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'HealthFile', 'action' => 'edit', $healthFile->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'HealthFile', 'action' => 'delete', $healthFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $healthFile->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Orders') ?></h4>
                <?php if (!empty($user->orders)) : ?>
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
                        <?php foreach ($user->orders as $order) : ?>
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
                <?php if (!empty($user->prescription_orders)) : ?>
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
                        <?php foreach ($user->prescription_orders as $prescriptionOrder) : ?>
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
            <div class="related">
                <h4><?= __('Related Wallet') ?></h4>
                <?php if (!empty($user->wallet)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Points') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->wallet as $wallet) : ?>
                        <tr>
                            <td><?= h($wallet->id) ?></td>
                            <td><?= h($wallet->user_id) ?></td>
                            <td><?= h($wallet->points) ?></td>
                            <td><?= h($wallet->created) ?></td>
                            <td><?= h($wallet->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Wallet', 'action' => 'view', $wallet->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Wallet', 'action' => 'edit', $wallet->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Wallet', 'action' => 'delete', $wallet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wallet->id)]) ?>
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